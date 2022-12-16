<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data Perpus</title>


    <!-- import file "style.css" -->
    <link rel="stylesheet" href="<?php echo base_url("ext/style.css") ?>" />


</head>
<body>
    <!-- BUAT AREA MENU -->
    <nav class="area-menu">
        <button id="btn_tambah" class="btn-primary">Add Data</button>
        <button id="btn_refresh" class="btn-secondary">Refresh Data</button>
    </nav>

    <!-- buat area table -->
    <table>
        <thead>
            <tr>
                <!-- judul tabel -->
                <th style="width: 5%" ;>No.</th>
                <th style="width: 10%" ;>id</th>
                <th style="width: 20%" ;>Nama</th>
                <th style="width: 10%" ;>Jenis Kelamin</th>
                <th style="width: 10%" ;>Alamat</th>
                <th style="width: 20%" ;>No Hp</th>
                <th style="width: 10%" ;>Aksi</th>
            </tr>
        </thead>
            <!-- isi tabel -->
            <tbody>
                <tr>
                    <td class="text-center"> </td>
                    <td class="text-center"> </td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                </tr>
        </tbody>

</body>
</html>