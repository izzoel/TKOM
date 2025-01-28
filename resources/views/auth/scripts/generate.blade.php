<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content")
        }
    });

    function generateKode(id) {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

        for (var i = 0; i < 3; i++)
            text += possible.charAt(Math.floor(Math.random() * possible.length));

        var angka = "";
        var possibleAngka = "0123456789";

        for (var i = 0; i < 2; i++)
            angka += possibleAngka.charAt(Math.floor(Math.random() * possibleAngka.length));

        $("#genKode-" + id).html(text + angka);

        $.ajax({
            url: '/admin/ujian/kode/' + id,
            type: 'PUT', // Ubah menjadi PUT
            data: {
                'kode': text + angka,
                '_token': $("meta[name='csrf-token']").attr("content") // Tambahkan token CSRF di sini
            }
        });


    }

    function removeKode(id) {
        var text = "";

        $.ajax({
            url: '/admin/ujian/kode/' + id,
            type: 'PUT', // Ubah menjadi PUT
            data: {
                'kode': text,
                '_token': $("meta[name='csrf-token']").attr("content") // Tambahkan token CSRF di sini
            }
        });
        location.reload();
    }
</script>
