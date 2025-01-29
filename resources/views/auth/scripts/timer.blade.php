 <script>
     $(window).on('beforeunload', function() {
         var scrollPosition = $('.menu-inner').scrollTop();
         localStorage.setItem('sidebarScrollPosition', scrollPosition);
     });

     $(document).ready(function() {
         var scrollPosition = localStorage.getItem('sidebarScrollPosition');
         if (scrollPosition !== null) {
             $('.menu-inner').scrollTop(scrollPosition);
         }
         $('.menu-inner').css('visibility', 'visible');
     });


     $('#submit').click(function() {
         $("#B_submit").modal('show');
     });

     //  $(".D_B_ujian").click(function() {
     //      //  let id = $(this).data("id").split('-').pop();

     //      //  $(".modalDelete").attr("id", "M_D_ujian-" + id);
     //      $("#M_D_ujian-" + id).modal('show');
     //      //  $("#D_route").attr('action', "/admin/ujian/destroy/" + id);
     //  })

     //  function timer() {
     // Tetapkan waktu durasi (menit)
     $.get("/durasi")
         .done(function(data) {
             var durasi = data.durasi;
             console.log(durasi);

             // Simpan durasi ke session storage atau local storage
             sessionStorage.setItem('durasi', durasi);

             // Hitung waktu hitung mundur
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
         })
         .fail(function(jqXHR, textStatus, errorThrown) {
             console.log("Request failed:", textStatus, errorThrown);
             // Tangani kesalahan
         });
     //  }

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
