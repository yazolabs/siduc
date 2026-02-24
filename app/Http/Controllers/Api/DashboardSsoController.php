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

        if (!$employeeId) {
            $matricula = data_get($user, 'matricula');
            if ($matricula) {
                $employeeId = DB::table('portal.funcionario')
                    ->where('matricula', $matricula)
                    ->value('ref_cod_pessoa_fj');
            }
        }

        return response()
            ->json([
                'ok' => true,
                'employee_id' => $employeeId,
                'user' => [
                    'id' => data_get($user, 'id') ?? data_get($user, 'cod_usuario') ?? $employeeId,
                    'name' => data_get($user, 'name') ?? data_get($user, 'nome') ?? 'Usuário',
                    'email' => data_get($user, 'email'),
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
