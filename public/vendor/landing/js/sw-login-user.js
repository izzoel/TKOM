$(document).ready(function() {
  $('#user').on('click', function(event) {
    event.preventDefault(); // Prevent the default form submission behavior

    Swal.fire({
      title: "Isi Form dibawah ini",
      html: '<input type="text" id="username" class="swal2-input" placeholder="nomor peserta">' +
            '<input type="password" id="password" class="swal2-input" placeholder="kode">',
      showCancelButton: true,
      confirmButtonText: "Login",
      showLoaderOnConfirm: true,
      preConfirm: async () => {
        const nim = $('#username').val();
        const keperluan = $('input[name="keperluan"]:checked').val();
        const password = $('#password').val();

        console.log('nim:', nim); // Log the nim to the console
        console.log('Keperluan:', keperluan); // Log the keperluan to the console
        console.log('Password:', password); // Log the password to the console
        console.log('CSRF Token:', $('meta[name="csrf-token"]').attr('content')); // Log the CSRF token to the console

        try {
          const response = await $.ajax({
            url: '/logbook', // Replace with your login URL
            method: 'POST',
            data: {
              nim: nim,
              keperluan: keperluan,
              password: password,
              _token: $('meta[name="csrf-token"]').attr('content') // Include CSRF token
            },
            dataType: 'json'
          });

          if (response.success) {
            Swal.fire({
              title: 'Berhasil!',
              icon: 'success'
            }).then(() => {
              window.location.href = '/depo'; // Redirect to the dashboard or another page
            });
          } else {
            Swal.showValidationMessage(`Username atau Password Salah!`);
          }
        } catch (error) {
          Swal.showValidationMessage(`Request failed: ${error}`);
        }
      },
      allowOutsideClick: () => !Swal.isLoading()
    });
  });
});
