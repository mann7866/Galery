<!DOCTYPE html>
<html lang="id">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <h1>Data Nama</h1>

    <!-- Form Tambah Data -->
    <form id="dataForm">
        <input type="text" name="nama" id="nama" placeholder="Masukkan nama" required>
        <button type="submit">Kirim</button>
    </form>

    <!-- Tampilan Data -->
    <h2>Daftar Nama:</h2>
    <ul id="dataList">
        @foreach ($data as $item)
            <li>{{ $item->nama }}</li>
        @endforeach
    </ul>

    <script>
        $(document).ready(function() {
            // Fungsi untuk mengambil data dan menampilkannya
            function loadData() {
                $.ajax({
                    url: "/ambil-data",
                    type: "GET",
                    success: function(response) {
                        let list = "";
                        response.forEach(function(item) {
                            list += "<li>" + item.nama + "</li>";
                        });
                        $("#dataList").html(list);
                    }
                });
            }

            // Fungsi submit data tanpa reload
            $("#dataForm").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "/simpan-data",
                    type: "POST",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr("content"),
                        nama: $("#nama").val(),
                    },
                    success: function(response) {
                        $("#nama").val(""); // Reset input
                        loadData(); // Refresh data tanpa reload
                    },
                    error: function(xhr) {
                        alert("Terjadi kesalahan: " + xhr.responseText);
                    }
                });
            });
        });
    </script>

</body>

</html>
