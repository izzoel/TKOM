<nav id="layout-navbar" class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>
    <div class="navbar-nav-left d-flex align-items-center" id="navbar-collapse-left">
        {{-- @if (auth()->user()->nama != 'admin') --}}
        <ul class="navbar-nav flex-row align-items-center">
            <li class="nav-item me-3">
                <a href="" id="kalkulator" class="btn btn-sm btn-outline-info text-nowrap "><i class='bx bx-calculator'></i>
                    <span class="align-middle">Kalkulator</span>
                </a>
            </li>
            <li class="nav-item me-3">
                <button id="nilai" class="btn btn-sm btn-outline-secondary text-nowrap" disabled>
                    <i class='bx bx-file'></i>
                    <span class="align-middle">Nilai Baku</span>
                </button>
            </li>
        </ul>
    </div>
    <div class="navbar-nav-right d-flex align-items-center ms-auto" id="navbar-collapse-right">
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            {{-- <li class="nav-item me-3">
                <a href="{{ route('login') }}" class="btn btn-sm btn-outline-danger">Login</a>
            </li> --}}
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ asset(auth()->check() ? auth()->user()->foto : auth('mahasiswa')->user()->foto) }}" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset(auth()->check() ? auth()->user()->foto : auth('mahasiswa')->user()->foto) }}" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">{{ auth()->check() ? auth()->user()->name : auth('mahasiswa')->user()->nama }}</span>
                                    <small class="text-muted">{{ auth()->check() ? '' : auth('mahasiswa')->user()->nim }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    {{-- <li>
                        <div class="dropdown-divider"></div>
                    </li> --}}
                    {{-- <li>
                        <a class="U_B_profil dropdown-item" href="" data-id="">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">My Profile</span>
                        </a>
                    </li> --}}
                    {{-- <li>
                        <a class="dropdown-item" href="">
                            <i class="bx bx-credit-card me-2"></i>
                            <span class="align-middle">Riwayat</span>
                            @guest
                                <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">

                                </span>
                            @endguest
                        </a>
                    </li> --}}
                    {{-- <li>
                        <div class="dropdown-divider"></div>
                    </li> --}}
                    @if (auth()->check())
                        @if (auth()->user()->name == 'admin')
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="bx bx-power-off me-2"></i>
                                    <span class="align-middle">Log Out</span>
                                </a>
                            </li>
                        @endif
                    @endif

                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
