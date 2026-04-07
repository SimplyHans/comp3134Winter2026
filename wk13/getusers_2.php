<?php
$conn = new mysqli("localhost", "root", "password", "cybersec_db");

if ($conn->connect_error) {
    die("Connection failed");
}

$firstname = $_GET['firstname'];

$stmt = $conn->prepare("SELECT * FROM users WHERE firstname = ? AND active = 1");
$stmt->bind_param("s", $firstname);
$stmt->execute();

$result = $stmt->get_result();
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
?>

</table>
