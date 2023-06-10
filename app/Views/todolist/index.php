<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    </script>
</head>

<body>

    <div class="container mt-3">
        <div class="jumbotron text-center">
            <h1>APLIKASI TO-DO-LIST</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <p>
                            <label for="kegiatan">Nama kegiatan:</label>
                            <input name="kegiatan" id="kegiatan" type="text">
                            <input name="button" type="submit" value="Tambahkan">
                        </p>
                    </form>
                </div>
            </div>
        </div>


        <?php
        //Connection server
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tododb";

        //creact connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        //check connection
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }

        //Insert data
        if (isset($_POST['button'])) {
            $kegiatan = $_POST['kegiatan'];

            $sql = "INSERT INTO todolist (kegiatan, status)
                VALUES ('$kegiatan', 'Aktif')";
            $query = mysqli_query($conn, $sql);
        }

        //Update finish
        if (isset($_GET['selesai'])) {
            $id = $_GET['selesai'];
            $sql = "UPDATE todolist SET status='Selesai' WHERE idkegiatan=$id";
            if ($conn->query($sql) === TRUE) {
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
        //Delete data
        if (isset($_GET['hapus'])) {
            $id = $_GET['hapus'];
            $sql = "DELETE FROM todolist WHERE idkegiatan=$id";
            if ($conn->query($sql) === TRUE) {
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }

        ?>
        <?php
        // Display list table
        $sql = "SELECT * FROM todolist";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='table'>
        <thead>
            <tr>
                <th>No</th>
                <th>Kegiatan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>";

            $counter = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
            <td>" . $counter . "</td>
            <td>" . $row['kegiatan'] . "</td>
            <td>" . $row['status'] . "</td>
            <td>
                <a href='" . $_SERVER['PHP_SELF'] . "?selesai=" . $row['idkegiatan'] . "' class='btn btn-success btn-sm'>Selesai</a>
                <a href='" . $_SERVER['PHP_SELF'] . "?hapus=" . $row['idkegiatan'] . "' class='btn btn-danger btn-sm'>Hapus</a>
            </td>
        </tr>";
                $counter++;
            }

            echo "</tbody>
    </table>";
        } else {
            echo "Tidak ada kegiatan yang tersimpan.";
            $sql = "ALTER TABLE todolist AUTO_INCREMENT = 1";
            $query = mysqli_query($conn, $sql);
        }
        $conn->close();
        ?>

</body>

</html>