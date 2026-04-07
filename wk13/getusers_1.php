<?php
$conn = new mysqli("localhost", "webuser", "webpass123", "cybersec_db");

if ($conn->connect_error) {
    die("Connection failed");
}

$firstname = $_GET['firstname'];

$sql = "SELECT * FROM users WHERE firstname = '$firstname' AND active = 1";
$result = $conn->query($sql);
?>

<form method="GET">
    <input type="text" name="firstname">
    <button type="submit">Search</button>
</form>

<table border="1">
<tr>
    <th>ID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Active</th>
</tr>

<?php
if ($result) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['username']}</td>
            <td>{$row['email']}</td>
            <td>{$row['firstname']}</td>
            <td>{$row['lastname']}</td>
            <td>{$row['active']}</td>
        </tr>";
    }
}
?>

</table>
