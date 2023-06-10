<!DOCTYPE html>
<html>

<head>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            padding: 5px;
            width: 200px;
        }

        input[type="submit"] {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        h1 {
            margin-top: 20px;
        }

        p {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <form action="/asisten/search" method="post">
        <?= csrf_field() ?>
        <label for="search">Search:</label>
        <input type="text" name="key" id="search">
        <input type="submit" name="submit" value="Search">
    </form>
    <?php
    if (!empty($hasil)) {
        echo "<h1>HASIL PENCARIAN</h1>";
        echo "<p>Nama: " . $hasil['NAMA'] . "</p>";
        echo "<p>Praktikum: " . $hasil['PRAKTIKUM'] . "</p>";
        echo "<p>IPK: " . $hasil['IPK'] . "</p>";
    }
    ?>
</body>

</html>