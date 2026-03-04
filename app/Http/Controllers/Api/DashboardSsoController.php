<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, DB};

class DashboardSsoController
{
    public function me(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'ok' => false,
                'message' => 'Unauthenticated'
            ], 401);
        }

        $employeeId =
            data_get($user, 'employee_id')
            ?? data_get($user, 'ref_cod_pessoa_fj')
            ?? data_get($user, 'cod_servidor')
            ?? data_get($user, 'id');

        $matricula = data_get($user, 'matricula');

        if (!$employeeId && $matricula) {
            $employeeId = DB::table('portal.funcionario')
                ->where('matricula', $matricula)
                ->value('ref_cod_pessoa_fj');
        }

        $email = data_get($user, 'email');
        $email = is_string($email) ? trim($email) : $email;

        $emailFromFuncionario = null;

        if ($employeeId) {
            $emailFromFuncionario = DB::table('portal.funcionario')
                ->where('ref_cod_pessoa_fj', $employeeId)
                ->value('email');
        }

        if (!$emailFromFuncionario && $matricula) {
            $emailFromFuncionario = DB::table('portal.funcionario')
                ->where('matricula', $matricula)
                ->value('email');
        }

        $emailFromFuncionario = is_string($emailFromFuncionario) ? trim($emailFromFuncionario) : $emailFromFuncionario;

        if ($emailFromFuncionario) {
            $email = $emailFromFuncionario;
        }

        return response()
            ->json([
                'ok' => true,
                'employee_id' => $employeeId,
                'user' => [
                    'id' => data_get($user, 'id') ?? data_get($user, 'cod_usuario') ?? $employeeId,
                    'name' => data_get($user, 'name') ?? data_get($user, 'nome') ?? 'Usuário',
                    'email' => $email,
                ],
            ])
            ->header('Cache-Control', 'no-store');
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'ok' => false,
                'message' => 'Unauthenticated'
            ], 401);
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()
            ->json(['ok' => true])
            ->withCookie(cookie()->forget(config('session.cookie')));
    }
}
