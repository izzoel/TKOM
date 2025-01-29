<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    @include('auth.layout.header')
</head>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">

        <div class="layout-container">
            <!-- Menu -->
            @include('auth.peserta.sidebar')
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                @include('auth.layout.navbar')
                <!-- / Navbar -->
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    @yield('soal')
                </div>
                {{-- @include('auth.peserta.soal') --}}
                {{-- @yield(Route::currentRouteName() ? Str::replace('.', '-', Route::currentRouteName()) : 'content') --}}

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

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    {{-- @endauth --}}
    @include('auth.layout.footer')
    @include('auth.scripts.timer')
</body>

</html>
