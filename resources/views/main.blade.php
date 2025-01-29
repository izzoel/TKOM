<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    @include('auth.layout.header')
    @guest
        <style>
            body {
                background-image: url('https://bing.biturl.top/?resolution=1920&format=image&index=0&mkt=zh-CN');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                overflow: hidden;
            }

            #particles-js {
                position: absolute;
                width: 100%;
                height: 100%;
            }

            #calculator-frame {
                width: 100%;
                height: 100%;
                border: none;
            }

            html,
            body {
                height: 100%;
                margin: 0;
                overflow: hidden;
            }
        </style>
    @endguest
</head>

<body>
    @guest
        @yield('landing')
    @endguest


    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">

        <div class="layout-container">
            <!-- Menu -->

            @include('auth.layout.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                @include('auth.layout.navbar')

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">

                    {{-- @if (auth()->user()->nama != 'admin') --}}
                    {{-- @include('auth.layout.content') --}}
                    {{-- @if (auth()->user()->nama != 'admin')
                            @include('auth.layout.content')
                        @elseif (auth()->user()->nama == 'admin') --}}
                    {{-- @yield('admin') --}}
                    @yield(Route::currentRouteName() ? Str::replace('.', '-', Route::currentRouteName()) : 'content')
                    {{-- @endif --}}
                </div>

                <!-- / Content -->
                @include('auth.layout.kalkulator')
                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">developed by <a href="https://izzoel.github.io/" class="footer-link fw-bolder">zetware.id</a> @2025</div>
                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>
    <div id="spinner" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(84, 84, 84, 0.3); z-index: 9999; display: none;">
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
            <div class="spinner-border text-primary" role="status"></div>
            <p class="text-dark" style="animation: none; font-size: 1rem; display: inline-block; vertical-align: middle;">
                {{-- Lagi ngimport --}}
                <span style="animation: dot 1.5s infinite; display: inline-block;">Lagi</span>
                <span style="animation: dot 1.5s infinite .2s; display: inline-block;">ngimport </span>
                <span style="animation: dot 1.5s infinite .4s; display: inline-block;">.</span>
                <span style="animation: dot 1.5s infinite .6s; display: inline-block;">.</span>
                <span style="animation: dot 1.5s infinite .8s; display: inline-block;">.</span>


                <style>
                    @keyframes dot {
                        0% {
                            transform: translateX(0);
                        }

                        50% {
                            transform: translateX(5px);
                        }

                        100% {
                            transform: translateX(0);
                        }
                    }
                </style>
            </p>
        </div>
    </div>


    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
    {{-- @endauth --}}
    @include('auth.layout.footer')
</body>

</html>
