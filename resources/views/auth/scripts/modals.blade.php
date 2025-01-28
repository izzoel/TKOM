  <script>
      $(document).on('click', '.U_B_ujian', function() {
          let id = $(this).data("id").split('-').pop();

          $(".modalUpdate").attr("id", "M_U_ujian-" + id);
          $("#M_U_ujian-" + id).modal('show');
          $("#U_route").attr('action', "/admin/ujian/update/" + id);

          $.get("/admin/ujian/show/" + id, function(data) {
              $("#U_nama").val(data.nama);
              $("#U_tanggal").val(data.tanggal);
              $("#U_durasi").val(data.durasi);
              $("#U_kode").val(data.kode);
          });

      });

      $(".D_B_ujian").click(function() {
          let id = $(this).data("id").split('-').pop();

          $(".modalDelete").attr("id", "M_D_ujian-" + id);
          $("#M_D_ujian-" + id).modal('show');
          $("#D_route").attr('action', "/admin/ujian/destroy/" + id);
      })


      $(document).on('click', '.U_B_sesi', function() {
          let id = $(this).data("id").split('-').pop();

          $(".modalUpdate").attr("id", "M_U_sesi-" + id);
          $("#M_U_sesi-" + id).modal('show');
          $("#U_route").attr('action', "/admin/sesi/update/" + id);

          $.get("/admin/sesi/show/" + id, function(data) {
              $("#U_ujian").val(data.id_ujian + '-' + data.kode);
              $("#U_sesi").val(data.sesi);
              $("#U_peserta").val(data.peserta);
          });

      });

      $(".D_B_sesi").click(function() {
          let id = $(this).data("id").split('-').pop();

          $(".modalDelete").attr("id", "M_D_sesi-" + id);
          $("#M_D_sesi-" + id).modal('show');
          $("#D_route").attr('action', "/admin/sesi/destroy/" + id);
      })


      $(document).on('click', '.U_B_peserta', function() {
          let id = $(this).data("id").split('-').pop();

          $(".modalPeserta").attr("id", "M_U_peserta-" + id);
          $("#M_U_peserta-" + id).modal('show');
          //   $("#U_route").attr('action', "/admin/peserta/update/" + id);

          $.get("/admin/sesi/peserta/" + id, function(data) {
              $("#P_ujian").val(data.ujian);
              $("#P_sesi").val(data.sesi);
              $("#P_kode").val(data.kode);
              $("#P_id_sesi").val(id);
          });

      });
  </script>
