$(document).ready(function() {
  $('#user').on('click', function(event) {
    event.preventDefault(); // Prevent the default form submission behavior

    Swal.fire({
      title: "Isi Form dibawah ini",
      html: '<input type="text" id="nim" class="swal2-input" placeholder="nomor peserta">' +
            '<input type="text" id="password" class="swal2-input" placeholder="kode">',
      showCancelButton: true,
      confirmButtonText: "Login",
      showLoaderOnConfirm: true,
      preConfirm: async () => {
        const nim = $('#nim').val();
        const password = $('#password').val();

        console.log('nim:', nim); 
        console.log('password:', password);

        try {
          const response = await $.ajax({
            url: '/peserta',
            method: 'POST',
            data: {
              nim: nim,
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
              window.location.href = '/soal/1';
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
