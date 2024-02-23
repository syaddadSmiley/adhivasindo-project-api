<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        table {
            width: 50%;
            border-collapse: collapse;
        }

        th, td {
            width: max-content;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h1>User Dashboard</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Action</th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td>
                    <a href="<?php echo base_url('user/delete/' . $user['id']); ?>">Delete</a>
                    <a href="<?php echo base_url('user/update/' . $user['id']); ?>">Update</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
