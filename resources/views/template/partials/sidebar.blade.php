<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo " style="background-color: #06811A !important">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Brand Logo" style="width:70px;" class="img-fluid">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2"
                style="text-transform: uppercase !important; color: white;">AKSI
                <br>
                RSQ</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item mt-2 {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>


        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">All Menu</span></li>
        @if (Auth::user()->role == 'superadmin')
            {{-- indeks --}}
            <li
                class="menu-item {{ Route::currentRouteName() == 'dashboard.indeks.index' ||
                Route::currentRouteName() == 'dashboard.indeks.create' ||
                Route::currentRouteName() == 'dashboard.indeks.edit' ||
                Route::currentRouteName() == 'dashboard.indeks.show'
                    ? 'active'
                    : '' }}">
                <a href="{{ route('dashboard.indeks.index') }}" class="menu-link ">
                    <i class="menu-icon tf-icons bx bx-globe-alt"></i>
                    <div data-i18n="Basic">Indeks</div>
                </a>
            </li>
            <!-- / indeks -->

            <li
                class="menu-item {{ Route::currentRouteName() == 'dashboard.kuisioner.index' ||
                Route::currentRouteName() == 'dashboard.kuisioner.create' ||
                Route::currentRouteName() == 'dashboard.kuisioner.edit' ||
                Route::currentRouteName() == 'dashboard.kuisioner.show'
                    ? 'active'
                    : '' }}">
                <a href="{{ route('dashboard.kuisioner.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-shape-square "></i>
                    <div data-i18n="Basic">Kuesioner</div>
                </a>
            </li>
        @endif


        <li
            class="menu-item {{ Route::currentRouteName() == 'dashboard.responden.index' ||
            Route::currentRouteName() == 'dashboard.responden.create' ||
            Route::currentRouteName() == 'dashboard.responden.edit' ||
            Route::currentRouteName() == 'dashboard.responden.detail'
                ? 'active'
                : '' }}
        ">
            <a href="{{ route('dashboard.responden.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user "></i>
                <div data-i18n="Basic">Laporan Survei</div>
            </a>
        </li>

        <li
            class="menu-item {{ Route::currentRouteName() == 'dashboard.kritik-saran.index.admin' ||
            Route::currentRouteName() == 'dashboard.kritik-saran.index.master' ||
            Route::currentRouteName() == 'dashboard.kritik-saran.detail.master'
                ? 'active'
                : '' }}
        ">
            <a href="{{ Auth::user()->role == 'superadmin' ? route('dashboard.kritik-saran.index.master') : route('dashboard.kritik-saran.index.admin') }}"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-file "></i>
                <div data-i18n="Basic">Kritik & Saran</div>
            </a>
        </li>



    </ul>
</aside>
<!-- / Menu -->
