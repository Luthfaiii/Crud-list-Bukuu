<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Book List</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #FFF8DC;
            border-radius: 10px;
            overflow: hidden;
        }

        table th, table td {
            padding: 15px;
            text-align: center;
            border: 1px solid #dee2e6;
            font-family: 'Courier New', Courier, monospace;
        }

        table th {
            background-color: #007bff;
            color: #007bff;
            font-family: 'Courier New', Courier, monospace;
        }

        header {
            background-color: #FF8C00;
            padding: 20px;
            color: #fff;
            border-radius: 10px 10px 0 0;
            margin-bottom: 20px;
            font-family: 'Courier New', Courier, monospace;
        }

        h1 {
            margin: 0;
        }

        .btn-add {
            margin-top: 10px;
        }

        .btn {
            margin-right: 5px;
        }

        .alert {
            margin-top: 20px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            padding: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="d-flex justify-content-between align-items-center">
            <h1>Book List</h1>
            <div>
                <a href="create.php" class="btn btn-primary btn-add">Add New Book</a>
            </div>
        </header>

        <?php
        session_start();

        function displayAlert($key) {
            if (isset($_SESSION[$key])) {
                echo '<div class="alert alert-success">' . $_SESSION[$key] . '</div>';
                unset($_SESSION[$key]);
            }
        }

        displayAlert("create");
        displayAlert("update");
        displayAlert("delete");
        ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            <?php
            include('connect.php');
            $sqlSelect = "SELECT * FROM books";
            $result = mysqli_query($conn, $sqlSelect);

            while ($data = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['title']; ?></td>
                    <td><?php echo $data['author']; ?></td>
                    <td><?php echo $data['type']; ?></td>
                    <td>
                        <a href="view.php?id=<?php echo $data['id']; ?>" class="btn btn-info">Read More</a>
                        <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>
