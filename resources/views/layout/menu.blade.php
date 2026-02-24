<div id="ieducar-quick-search" class="ieducar-quick-search">
    <h4 class="ieducar-quick-search-title">Busca rápida</h4>
    <quick-search></quick-search>
</div>

@php
  $dashboardUrl = config('services.siduc_dashboard.url');
  if (!$dashboardUrl) {
    $host = request()->getHost();

    if (str_ends_with($host, '.siduc.test')) {
      $dashboardUrl = 'http://dashboard.siduc.test:5174';
    } elseif (str_ends_with($host, '.didax.com.br')) {
      $dashboardUrl = 'https://dashboard-siduc.didax.com.br';
    } elseif ($host === 'siduc.com.br' || str_ends_with($host, '.siduc.com.br')) {
      $dashboardUrl = 'https://dashboard.siduc.com.br';
    }
  }
@endphp

<ul class="ieducar-sidebar-menu">
  @if($dashboardUrl)
    <li>
      <a href="{{ $dashboardUrl }}">
        <i class="fa fa-dashboard"></i>
        <span>Dashboard</span>
      </a>
    </li>
  @endif

  @foreach($menu as $item)
      @if($item->hasLinkInSubmenu())
          <li>
              <a class="@if($root === $item->getKey()) {{ 'ieducar-sidebar-menu-active' }} @endif"
                 href="{{ $item->link }}">
                <i class="fa {{$item->icon}}"></i>
                <span>{{$item->title}}</span>
              </a>
          </li>
      @endif
  @endforeach
</ul>
