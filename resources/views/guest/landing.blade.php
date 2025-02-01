<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
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
    @include('auth.layout.header')

</head>

<body>
    <button type="button" name="" id="admin" class="btn  btn-lg top-0 start-0"> </button>
    <div id="particles-js"></div>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card" style="width: 30rem; background-color: rgba(255, 255, 255, 0.95);">
                    <div class="card-body">
                        <div class="app-brand justify-content-center">
                            <a href="" class="app-brand-link gap-2">
                                <span class="app-brand-text demo text-body fw-bolder">SIMULASI</span>
                            </a>
                        </div>
                        <h4 class="mt-4 mb-2">Try Out Ujian Kompetensi</h4>
                        <p class="mb-4">Selamat datang peserta! 👋</p>
                        <a id="user" class="btn btn-primary align-items-center" href="" role="button">
                            Masuk
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Layout wrapper -->
    {{-- @endauth --}}
    @include('auth.layout.footer')
</body>

</html>
