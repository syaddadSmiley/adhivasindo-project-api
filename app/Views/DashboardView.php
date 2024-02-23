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

        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 8px 2px;
            cursor: pointer;
            border-radius: 12px;
        }

        .button a {
            color: white;
            text-decoration: none;
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
        <?php foreach ($data['users'] as $user) : ?>
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
        
    <button class="button"><a href="<?php echo base_url('user/create'); ?>">Create User</a></button>

    <!-- search bar -->
    <form action="<?php echo base_url('/search'); ?>" method="POST">
        <input type="text" name="search" id="search" placeholder="Search users">
        <input type="submit" value="Search">
    </form>

    <?php if (isset($data['result'])) : ?>
        <h2>Search Result</h2>
        <table>
            <tr>
                <th>Data Found</th>
            </tr>
            <?php foreach ($data['result'] as $user) : ?>
                <tr>
                    <td><?php echo $user?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

</body>
</html>
