<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Hapus</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            padding: 10px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"],
        a.logout-btn {
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
            text-align: center;
            text-decoration: none;
            margin-top: 10px;
        }

        input[type="submit"]:hover,
        .logout-btn {
            padding: 10px 20px;
            background-color: blue;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        .logout-btn:hover {
            background-color: #3366ff;
        }

        a.logout-btn {
            padding: 10px 20px;
            background-color: blue;
        }
    </style>
</head>

<body>
    <h1>Hapus Asisten</h1>
    <form action="/asisten/delete" method="post">
        <?= csrf_field() ?>
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required>

        <input type="submit" value="delete">
        <a href="<?= site_url('asisten/login') ?>" class="logout-btn">Logout</a>
    </form>
</body>

</html>