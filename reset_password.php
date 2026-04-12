<?php
/**
 * SCRIPT RESET PASSWORD ADMIN
 * Akses: http://localhost/perpus_ukk_12/reset_password.php
 * 
 * 1. Isi email dan password baru di bawah
 * 2. Jalankan script ini
 * 3. Copy hash yang muncul
 * 4. Update password di database users table
 * 5. Hapus file ini
 */

$email = 'admin@admin.com';      // GANTI DENGAN EMAIL ADMIN
$password_baru = 'admin123';     // GANTI DENGAN PASSWORD BARU

$hash = password_hash($password_baru, PASSWORD_DEFAULT);

echo "======= PASSWORD RESET GENERATOR =======\n\n";
echo "Email: " . $email . "\n";
echo "Password Baru: " . $password_baru . "\n";
echo "\nHash Password:\n";
echo $hash . "\n\n";
echo "========================================\n";
echo "UPDATE users SET password = '" . $hash . "' WHERE email = '" . $email . "';\n";
echo "========================================\n";
echo "\n⚠️  LANGKAH SELANJUTNYA:\n";
echo "1. Buka phpMyAdmin dan jalankan query di atas\n";
echo "2. Atau gunakan script di bawah\n";
echo "3. Lalu hapus file reset_password.php ini\n\n";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password Admin</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .box { border: 1px solid #ccc; padding: 15px; border-radius: 5px; background: #f9f9f9; }
        input { padding: 8px; margin: 5px 0; width: 300px; }
        button { padding: 10px 20px; background: #4CAF50; color: white; border: none; cursor: pointer; border-radius: 3px; }
        .result { margin-top: 20px; background: #e8f5e9; padding: 10px; border-left: 4px solid #4CAF50; }
        code { background: #f0f0f0; padding: 2px 5px; border-radius: 3px; }
    </style>
</head>
<body>
    <div class="box">
        <h2>🔑 Reset Password Admin</h2>
        <form method="post">
            <label>Email:</label><br>
            <input type="email" name="email" value="admin@admin.com" required><br><br>
            
            <label>Password Baru:</label><br>
            <input type="text" name="password" value="admin123" required><br><br>
            
            <button type="submit">Generate Hash</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = htmlspecialchars($_POST['email']);
            $password = $_POST['password'];
            $hash = password_hash($password, PASSWORD_DEFAULT);
            
            echo "<div class='result'>";
            echo "<strong>✅ Hash Password Berhasil Dibuat:</strong><br><br>";
            echo "<code>" . $hash . "</code><br><br>";
            echo "<strong>Query untuk Database:</strong><br>";
            echo "<code>UPDATE users SET password = '" . $hash . "' WHERE email = '" . $email . "';</code><br><br>";
            echo "<strong>Langkah selanjutnya:</strong><br>";
            echo "1. Jalankan query di atas di phpMyAdmin<br>";
            echo "2. Login dengan email: <strong>" . $email . "</strong><br>";
            echo "3. Login dengan password: <strong>" . $password . "</strong><br>";
            echo "4. Hapus file reset_password.php<br>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
