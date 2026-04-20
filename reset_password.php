<?php
/**
 * SCRIPT SETUP ADMIN PASSWORD
 * Akses: http://localhost/perpus_ukk_12/reset_password.php
 * 
 * Script ini untuk memastikan password admin ter-hash dengan benar
 */

// Default admin credentials
$admin_email = 'admin@admin.com';
$admin_password = 'admin123';
$admin_name = 'Administrator';

// Generate password hash
$password_hash = password_hash($admin_password, PASSWORD_DEFAULT);

echo "======= PERPUSTAKAAN - ADMIN PASSWORD SETUP =======\n\n";
echo "Email Admin: " . $admin_email . "\n";
echo "Password: " . $admin_password . "\n";
echo "Nama: " . $admin_name . "\n";
echo "\nPassword Hash:\n";
echo $password_hash . "\n\n";
echo "=====================================================\n\n";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Setup Admin Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 20px;
        }
        .container {
            max-width: 600px;
        }
        .card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }
        .alert-success {
            border-radius: 10px;
        }
        code {
            background: #f5f5f5;
            padding: 2px 5px;
            border-radius: 3px;
        }
        .copy-btn {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body p-5">
                <h2 class="mb-4 text-center"><i class="fas fa-key"></i> Setup Admin Password</h2>
                
                <div class="alert alert-info">
                    <strong>Catatan:</strong> Script ini membantu Anda membuat password admin yang ter-hash dengan benar.
                </div>

                <div class="mb-4">
                    <h5>Informasi Admin Default:</h5>
                    <table class="table table-sm">
                        <tr>
                            <td><strong>Email:</strong></td>
                            <td><code><?= $admin_email ?></code></td>
                        </tr>
                        <tr>
                            <td><strong>Password:</strong></td>
                            <td><code><?= $admin_password ?></code></td>
                        </tr>
                        <tr>
                            <td><strong>Nama:</strong></td>
                            <td><code><?= $admin_name ?></code></td>
                        </tr>
                    </table>
                </div>

                <div class="mb-4">
                    <h5>Password Hash (untuk database):</h5>
                    <div class="card bg-light">
                        <div class="card-body">
                            <code id="hash-value" style="word-break: break-all; font-size: 12px;">
                                <?= $password_hash ?>
                            </code>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm copy-btn" onclick="copyHash()">
                        <i class="fas fa-copy"></i> Copy Hash
                    </button>
                </div>

                <div class="mb-4">
                    <h5>Langkah Setup:</h5>
                    <ol>
                        <li>Buka <strong>phpMyAdmin</strong></li>
                        <li>Pilih database <code>perpus_ukk_12</code></li>
                        <li>Pilih tabel <code>users</code></li>
                        <li>
                            Jalankan Query SQL berikut:
                            <div class="card bg-light mt-2">
                                <div class="card-body" style="font-size: 12px;">
                                    <code id="query-value">
INSERT INTO `users` (`nama`, `email`, `password`, `role`) VALUES ('<?= $admin_name ?>', '<?= $admin_email ?>', '<?= $password_hash ?>', 'admin');<br>
-- ATAU jika admin sudah ada, update saja:<br>
UPDATE `users` SET `password` = '<?= $password_hash ?>' WHERE `email` = '<?= $admin_email ?>';<br>
                                    </code>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-sm mt-2" onclick="copyQuery()">
                                <i class="fas fa-copy"></i> Copy Query
                            </button>
                        </li>
                        <li>Klik tombol <strong>Go</strong> atau <strong>Execute</strong></li>
                        <li>Refresh halaman dan coba login dengan credentials di atas</li>
                    </ol>
                </div>

                <div class="alert alert-warning">
                    <strong>⚠️ Penting:</strong> Setelah selesai setup, <strong>hapus file reset_password.php</strong> untuk keamanan!
                </div>

                <div class="text-center mt-4">
                    <a href="http://localhost/phpmyadmin" class="btn btn-success" target="_blank">
                        <i class="fas fa-database"></i> Buka phpMyAdmin
                    </a>
                    <a href="http://localhost/perpus_ukk_12/login" class="btn btn-primary" target="_blank">
                        <i class="fas fa-sign-in-alt"></i> Coba Login
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <p class="text-white"><small>© 2024 Perpustakaan Digital System</small></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function copyHash() {
            var hash = document.getElementById('hash-value').innerText;
            navigator.clipboard.writeText(hash).then(() => {
                alert('Password hash berhasil dicopy!');
            });
        }

        function copyQuery() {
            var query = document.getElementById('query-value').innerText;
            navigator.clipboard.writeText(query).then(() => {
                alert('Query SQL berhasil dicopy!');
            });
        }
    </script>
</body>
</html>

