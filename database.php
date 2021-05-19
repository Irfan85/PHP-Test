<?php

$connection = mysqli_connect("localhost", "root", "", "php_tutorial");
if (!$connection) {
    die("Couldn't connect to database");
}

// Create
if (isset($_POST["submit"])) {
    $userName = $_POST["username"];
    $password = $_POST["password"];

    if ($userName && $password) {
        $query = "INSERT INTO users(name, password) ";
        $query .= "VALUES('$userName', '$password')";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($connection));
        }
    } else {
        echo "Username and Password is required <br>";
    }
}

// Read
function readDatabase(){
    global $connection;

    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Loading database failed: " . mysqli_error($connection));
    }

    return $result;
}


// Update
if (isset($_POST["update"])) {
    $id = $_POST["id"];
    $userName = $_POST["username"];
    $password = $_POST["password"];

    if ($id && $userName && $password) {
        $query = "UPDATE users SET ";
        $query .= "name='$userName', ";
        $query .= "password='$password' ";
        $query .= "WHERE id=$id"; // No quotes since id is integer

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($connection));
        }
    } else {
        echo "ID, Username and Password is required <br>";
    }
}

// Delete
if (isset($_POST["delete"])) {
    $id = $_POST["id"];

    if ($id) {
        $query = "DELETE FROM users ";
        $query .= "WHERE id=$id"; // No quotes since id is integer

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($connection));
        }
    } else {
        echo "ID is required <br>";
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>PHP Database Demo</title>
</head>

<body>
    <div class="container p-3">
        <h3 style="width: fit-content; margin-left: auto; margin-right: auto;">Create Entry</h3>

        <!-- Create Section -->
        <div class="row">
            <div class="col-sm-6">
                <form action="database.php" method="post">
                    <div>
                        <label for="input-username" class="form-label">Username:</label>
                        <input type="text" name="username" id="input-username" class="form-control" placeholder="Name"><br>
                    </div>

                    <div>
                        <label for="input-password" class="form-label">Password:</label>
                        <input type="password" name="password" id="input-password" class="form-control" placeholder="Password"><br>
                    </div>

                    <input type="submit" name="submit" class="btn btn-primary"><br>
                </form>
            </div>
        </div>

        <!-- Read Section -->
        <div class="row py-3">
            <h3 style="width: fit-content; margin-left: auto; margin-right: auto;">Database Entries</h3>
            <hr>

            <?php
            $result = readDatabase();
            // 'mysql_fetch_row' will return a regular array instad of associative one
            while ($row = mysqli_fetch_assoc($result)) {
                print_r($row);
                echo "<br>";
            }
            ?>

            <hr>
        </div>

        <!-- Update Section -->
        <h3 style="width: fit-content; margin-left: auto; margin-right: auto;">Update Entry</h3>

        <div class="row">
            <div class="col-sm-6">
                <form action="database.php" method="post">
                    <div>
                        <label for="update-username" class="form-label">Username:</label>
                        <input type="text" name="username" id="update-username" class="form-control" placeholder="Name"><br>
                    </div>

                    <div>
                        <label for="update-password" class="form-label">Password:</label>
                        <input type="password" name="password" id="update-password" class="form-control" placeholder="Password"><br>
                    </div>

                    <select name="id" class="form-select mb-3">
                        <option selected>ID</option>

                        <?php
                        // We need to query again because the previously quered record doesn't work
                        $result = readDatabase();
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row["id"];
                            echo "<option value='$id'>$id</option>";
                        }
                        ?>
                    </select>

                    <input type="submit" name="update" value="Update" class="btn btn-primary"><br>
                </form>
            </div>

            <hr>
        </div>

        <!-- Delete Section -->
        <h3 style="width: fit-content; margin-left: auto; margin-right: auto;">Delete Entry</h3>

        <div class="row">
            <div class="col-sm-6">
                <form action="database.php" method="post">
                    <select name="id" class="form-select mb-3">
                        <option selected>ID</option>

                        <?php
                        // We need to query again because the previously quered record doesn't work
                        $result = readDatabase();
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row["id"];
                            echo "<option value='$id'>$id</option>";
                        }
                        ?>
                    </select>

                    <input type="submit" name="delete" value="Delete" class="btn btn-danger"><br>
                </form>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>