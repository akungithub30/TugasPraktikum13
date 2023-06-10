<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap 5 Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1 solid #dddddd;
            text-align: left;
            padding: 5px;

        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <div class="container-fluid p-5 bg-primary text-white">
        <h3>PENDAFTARAN ASISTEN PRAKTIKUM</h3>
        <p>Asisten Praktikum mempunyai peran yang sangat penting dalam kegiatan Praktikum di kelas.
            Keberadaannya sangat dibutuhkan oleh dosen pengampu untuk membantu dosen dalam mendampingi
            peserta praktikum dalam melaksanakan percobaan-percobaan yang telah disiapkan oleh dosen
            pengampu. Mahasiswa-mahasiswa sangat didorong untuk dapat menjadi seorang asisten praktikum.
            Selain memberikan pengalaman bekerja bersama dosen, menjadi Asisten Praktikum dapat mengasah
            kepedulian terhadap orang lain yang membutuhan. Jika anda terpanggil untuk menjadi Asisten
            Praktikum, silahkan daftarkan diri anda pada form di bawah ini...</p>
    </div>
    <div class="container mt-3">

        <table>
            <tr>
                <th>NAMA</th>
                <th>NIM</th>
                <th>Kelas Praktikum</th>
                <th>IPK</th>

            </tr>
            <tbody>
                <?php $no = 1;
                foreach ($asisten as $asis) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $asis['NIM']; ?></td>
                        <td><?= $asis['NAMA']; ?></td>
                        <td><?= $asis['PRAKTIKUM']; ?></td>
                        <td><?= $asis['IPK']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="mt-3">
            <a href="<?= site_url('asisten/simpan') ?>" class="btn btn-success ms-2">Simpan</a>
            <a href="<?= site_url('asisten/update') ?>" class="btn btn-primary ms-2">Update</a>
            <a href="<?= site_url('asisten/delete') ?>" class="btn btn-danger ms-2">Delete</a>
            <a href="<?= site_url('asisten/logout') ?>" class="btn btn-secondary ms-2">Logout</a>
        </div>


    </div>

</body>

</html>