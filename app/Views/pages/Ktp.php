<!DOCTYPE html>
<html>

<head>
    <title>Formulir KTP</title>
</head>

<body>
    <h1>Formulir KTP</h1>
    <?php echo validation_errors(); ?>
    <?php echo form_open('ktpcontroller/submit'); ?>
    <label for="nama">Nama:</label>
    <input type="text" name="nama" id="nama">
    <br><br>
    <label for="alamat">Alamat:</label>
    <input type="text" name="alamat" id="alamat">
    <br><br>
    <label for="nomor_ktp">Nomor KTP:</label>
    <input type="text" name="nomor_ktp" id="nomor_ktp">
    <br><br>
    <input type="submit" value="Submit">
    <?php echo form_close(); ?>
</body>

</html>