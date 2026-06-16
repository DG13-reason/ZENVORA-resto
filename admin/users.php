<?php
include 'auth_admin.php';
include '../database/koneksi.php';

$query = mysqli_query($conn, "SELECT * FROM users");
?>

<h1>Daftar User</h1>

<table border="1">
<tr>
    <th>ID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Role</th>
</tr>

<?php while($user = mysqli_fetch_assoc($query)): ?>
<tr>
    <td><?= $user['id']; ?></td>
    <td><?= $user['username']; ?></td>
    <td><?= $user['email']; ?></td>
    <td><?= $user['role']; ?></td>
</tr>
<?php endwhile; ?>
</table>