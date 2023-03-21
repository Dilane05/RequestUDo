@inject('request', 'Illuminate\Http\Request')
<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">RequestUDo</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Dashboard
            </li>

            <li class="sidebar-item  {{ $request->routeIs('portal.dashboard') ? 'active' : '' }}" href="{{ route('portal.dashboard') }}">
                <a class="sidebar-link {{ $request->routeIs('portal.dashboard') ? 'active' : '' }}" href="{{ route('portal.dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-header">
                Request Management
            </li>
            @if (auth()->user()->is_query_student ==  1)
            <li class="sidebar-item  {{ $request->routeIs('portal.create.query') ? 'active' : '' }}" href="{{ route('portal.create.query') }}">
                <a class="sidebar-link {{ $request->routeIs('portal.create.query') ? 'active' : '' }}" href="{{ route('portal.create.query') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Make a Request</span>
                </a>
            </li>
            @endif
            
            @if (auth()->user()->is_query_manager ==  1 || auth()->user()->is_query_teacher ==  1)
            <li class="sidebar-item  {{ $request->routeIs('portal.query.admin') ? 'active' : '' }}" href="{{ route('portal.query.admin') }}">
                <a class="sidebar-link {{ $request->routeIs('portal.query.admin') ? 'active' : '' }}" href="{{ route('portal.query.admin') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle"> All Requests</span>
                </a>
            </li>
            @endif
            
            @if (auth()->user()->is_query_manager ==  1)
            <li class="sidebar-header">
                Setup
            </li>


            <li class="sidebar-item {{ $request->routeIs('portal.setup.type_query') ? 'active' : '' }}" href="{{ route('portal.setup.type_query') }}">
                <a class="sidebar-link {{ $request->routeIs('portal.setup.type_query') ? 'active' : '' }}" href="{{ route('portal.setup.type_query') }}" >
                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Type Query</span>
                </a>
            </li>
            @endif
            

            <li class="sidebar-header">
                UserManagement
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="charts-chartjs.html">
                    <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Charts</span>
                </a>
            </li>
        </ul>

        {{-- <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <strong class="d-inline-block mb-2">Upgrade to Pro</strong>
                <div class="mb-3 text-sm">
                    Are you looking for more components? Check out our premium version.
                </div>
                <div class="d-grid">
                    <a href="upgrade-to-pro.html" class="btn btn-primary">Upgrade to Pro</a>
                </div>
            </div>
        </div> --}}
    </div>
</nav>
