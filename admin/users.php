<?php
include 'auth_admin.php';
include '../database/koneksi.php';

$pageTitle = "Users - Admin ZENVORA";

/** @var mysqli $conn */
$query = mysqli_query($conn, "SELECT * FROM users");

include 'adminHeader.php';
include 'adminNavbar.php';
?>

<section class="users-section">
    <div class="users-header">
        <h1>Daftar <span>User</span></h1>
    </div>

    <div class="users-table-wrapper">
        <table class="users-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php while($user = mysqli_fetch_assoc($query)): ?>
                <tr>
                    <td><?= $user['id']; ?></td>
                    <td><?= htmlspecialchars($user['username']); ?></td>
                    <td><?= htmlspecialchars($user['email']); ?></td>
                    <td>
                        <span class="role-badge <?= strtolower($user['role']); ?>">
                            <?= htmlspecialchars($user['role']); ?>
                        </span>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</section>

</body>
</html>