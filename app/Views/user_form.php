<!DOCTYPE html>
<html>

<head>
    <title>User Form</title>
</head>

<body>
    <h1>User Form</h1>
    <form method="post" action="<?php echo site_url('user/save'); ?>">
    <?php
        //Connection server
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mydatabase";
    
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>