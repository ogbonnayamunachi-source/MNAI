<?php
$conn = new mysqli("localhost", "root", "", "munachi_ai");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM bookings ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Bookings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #111;
            color: white;
            padding: 30px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #1e1e1e;
        }

        th, td {
            padding: 12px;
            border: 1px solid #333;
            text-align: left;
        }

        th {
            background: gold;
            color: black;
        }

        tr:hover {
            background: #2a2a2a;
        }

        .delete-btn {
            background: red;
            color: white;
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-home {
            display: inline-block;
            margin-top: 20px;
            color: gold;
            text-decoration: none;
        }
    </style>
</head>
<body>

<h1>📅 Client Bookings</h1>

<table>
    <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Date</th>
        <th>Message</th>
        <th>Booked At</th>
        <th>Action</th>
    </tr>

    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['fullname']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['phone']; ?></td>
        <td><?= $row['date']; ?></td>
        <td><?= $row['message']; ?></td>
        <td><?= $row['created_at']; ?></td>
        <td>
            <a class="delete-btn" href="delete-booking.php?id=<?= $row['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>

</table>

<a href="munachi-ai.html" class="back-home">← Back to Home</a>

</body>
</html>