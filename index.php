<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Shop</title>
</head>
<body>
    <div class="container my-5">
        <h2>List of clients</h2>
        <a href="/shop/create.php" class="btn btn-primary" role="button">New Client</a>
        <br>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Create At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php  
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "myshop";

                    // create connection
                    $connection = new mysqli($servername, $username, $password, $database);

                    // check connection 
                    if ($connection->connect_error) {
                        die("Connection failed: " . $connection->connect_error);
                    }

                    // read all rows from the database table
                    $sql = "SELECT id, name, email, phone, address, create_at FROM clients";
                    $result = $connection->query($sql);

                    if (!$result) {
                        die("Invalid query: " . $connection->error);
                    }

                    // read data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>$row[id]</td>
                            <td>$row[name]</td>
                            <td>$row[email]</td>
                            <td>$row[phone]</td>
                            <td>$row[address]</td>
                            <td>$row[create_at]</td>
                            <td>
                                <a href='/shop/edit.php?id=$row[id]' class='btn btn-primary btn-sm'>Edit</a> 
                                <a href='/shop/delete.php?id=$row[id]' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
