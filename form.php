<?php
    // 'isset' checks whether a variable is null
    if(isset($_POST["submit"])){
        echo "Username: " . $_POST["username"] . "<br>";
        echo "Password: " . $_POST["password"] . "<br>";
    }

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP Form Demo</title>
    </head>

    <body>
        <!-- In real application, we may want to do form data handling and validation in a separate php file -->
        <form action="form.php" method="post">
            <input type="text" name="username" placeholder="Name"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="submit" name="submit"><br>
        </form>   
    </body>
</html>