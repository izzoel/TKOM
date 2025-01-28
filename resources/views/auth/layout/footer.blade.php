<!-- Core JS -->
<script src="{{ asset('vendor/sneat/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('vendor/sneat/libs/popper/popper.js') }}"></script>
<script src="{{ asset('vendor/sneat/js/bootstrap.js') }}"></script>
<script src="{{ asset('vendor/sneat/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('vendor/sneat/js/menu.js') }}"></script>

<!-- Vendors JS -->
<script src="{{ asset('vendor/sneat/libs/apex-charts/apexcharts.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('vendor/sneat/js/main.js') }}"></script>

<!-- Page JS -->
{{-- <script src="{{ asset('vendor/sneat/js/dashboards-analytics.js') }}"></script> --}}

<!-- Popover JS -->
<script src="{{ asset('vendor/sneat/js/ui-popover.js') }}"></script>


<!-- Toast JS -->
<script src="{{ asset('vendor/sneat/js/ui-toasts.js') }}"></script>

<!-- SweetAlert JS -->
<script src="{{ asset('vendor/sweetalert2/js/sweetalert2.js') }}"></script>


<!-- Kalkulator JS -->
<script src="{{ asset('calculator/script.js') }}"></script>

<script src="{{ asset('vendor/landing/js/sw-login-admin.js') }}"></script>
<script src="{{ asset('vendor/landing/js/sw-login-user.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.8/b-3.2.0/b-html5-3.2.0/r-3.0.3/datatables.min.js"></script>

<script src="{{ asset('vendor/particles/js/particles.min.js') }}"></script>

<script src="https://cdn.rawgit.com/hilios/jQuery.countdown/2.2.0/dist/jquery.countdown.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>



@auth
    @if (auth()->user()->nama != 'admin')
        <script>
            if (window.location.href.includes('soal')) {
                timer();
            }

            function timer() {
                $(document).ready(function() {
                    // Tetapkan waktu durasi (menit)

                    var durasi = @js(session('durasi') !== 'undefined') ? @js(session('durasi')) : 1;
                    var countDownTime = localStorage.getItem('countDownTime') || (new Date().getTime() + durasi * 60 * 1000);
                    localStorage.setItem('countDownTime', countDownTime);


                    $('#countdown').countdown(countDownTime, function(event) {
                        var totalHours = event.offset.totalDays * 24 + event.offset.hours;
                        var formattedTime = totalHours.toString().padStart(2, '0') + ':' +
                            event.offset.minutes.toString().padStart(2, '0') + ':' +
                            event.offset.seconds.toString().padStart(2, '0');
                        $(this).html(formattedTime);

                        if (event.offset.totalSeconds < 5 * 60 && event.offset.totalSeconds >= 0) {
                            $(this).css("color", "red");
                            $(this).fadeTo(500, 0).fadeTo(500, 1);
                        }

                        if (event.offset.totalSeconds <= 0) {
                            $(this).html("WAKTU HABIS");
                            localStorage.removeItem('countDownTime');

                            let timerInterval;
                            Swal.fire({
                                title: "Ujian Telah Selesai!",
                                html: "anda akan logout dalam <b></b> detik.",
                                icon: 'success',
                                timer: 5000,
                                timerProgressBar: true,
                                allowOutsideClick: false,
                                didOpen: () => {

                                    Swal.showLoading();
                                    const timer = Swal.getPopup().querySelector("b");
                                    timerInterval = setInterval(() => {
                                        timer.textContent = `${Math.ceil(Swal.getTimerLeft() / 1000)}`;
                                    }, 1000);
                                },
                                willClose: () => {
                                    clearInterval(timerInterval);
                                    window.location.href = "{{ route('logout') }}";
                                    window.onload = function() {
                                        window.location.reload();
                                    }
                                }
                            })
                        }
                    });
                });
            }
            // Muat posisi kalkulator dari localStorage
            var calcPos = JSON.parse(localStorage.getItem('calculatorPosition'));
            if (calcPos) {
                $("#calculator").css({
                    top: calcPos.top,
                    left: calcPos.left
                });
            }

            // Buat kalkulator bisa di-drag dan simpan posisinya ke localStorage
            $("#calculator").draggable({
                stop: function(event, ui) {
                    var position = ui.position;
                    localStorage.setItem('calculatorPosition', JSON.stringify(position));
                }
            });

            // Muat status tampilan kalkulator dari localStorage
            if (localStorage.getItem('calculatorVisible') === 'true') {
                $("#calculator").show();
            } else {
                $("#calculator").hide();
            }

            // Toggle tampilan kalkulator dan simpan status ke localStorage
            $("#kalkulator").on('click', function() {
                $("#calculator").toggle();
                localStorage.setItem('calculatorVisible', $("#calculator").is(':visible'));
            });
        </script>
    @endif
@endauth

{{-- @include('auth.scripts.statistics') --}}
@include('auth.scripts.datatables')
@include('auth.scripts.toasts')
@include('auth.scripts.modals')
@guest
    <script>
        particlesJS("particles-js", {

            "particles": {
                "number": {
                    "value": 76,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 5
                    },
                    "image": {
                        "src": "img/github.svg",
                        "width": 100,
                        "height": 100
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 6.3974410235905665,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "bounce",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "grab"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "repulse"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 400,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });
    </script>
@endguest
