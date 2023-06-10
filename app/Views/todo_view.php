<!DOCTYPE html>
<html lang="en">

<head>
    <title>Todo List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="jumbotron text-center">
        <h1>APLIKASI TO-DO LIST</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <form action="<?php echo base_url('todo/add'); ?>" method="POST">
                    <p>
                        <label for="nama">Nama kegiatan:</label>
                        <input name="nama" id="nama" type="text" class="form-control">
                    </p>
                    <p>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </p>
                </form>
            </div>

            <div class="col-sm-8">
                <p>Daftar Kegiatan:</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kegiatan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($todos as $todo) : ?>
                            <tr>
                                <td><?php echo $todo['idkegiatan']; ?></td>
                                <td><?php echo $todo['kegiatan']; ?></td>
                                <td><?php echo $todo['status']; ?></td>
                                <td>
                                    <?php if ($todo['status'] == 'Aktif') : ?>
                                        <a href="<?php echo base_url('todo/complete/' . $todo['idkegiatan']); ?>" class="btn btn-success">Selesai</a>
                                    <?php endif; ?>
                                    <a href="<?php echo base_url('todo/delete/' . $todo['idkegiatan']); ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>