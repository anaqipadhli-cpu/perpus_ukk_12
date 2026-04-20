<?php $this->load->view('templates/header'); ?>

<div class="container form-container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <!-- Header -->
                    <div class="text-center mb-4">
                        <h2 class="fw-bold mb-2">🔐 Reset Password</h2>
                        <p class="text-muted">Masukkan email dan password baru Anda</p>
                    </div>

                    <!-- Alert Messages -->
                    <?php if(isset($error)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle"></i> <?= $error ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php if(isset($success)): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle"></i> <?= $success ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        <div class="text-center">
                            <p class="mb-0"><a href="<?= base_url('login') ?>" class="btn btn-primary btn-lg w-100">
                                <i class="fas fa-sign-in-alt"></i> Kembali ke Login
                            </a></p>
                        </div>
                    <?php else: ?>
                        <!-- Form -->
                        <form method="post">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" name="email" class="form-control form-control-lg" placeholder="Masukkan email admin" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Password Baru</label>
                                <input type="password" name="password_baru" class="form-control form-control-lg" placeholder="Password baru minimal 6 karakter" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Konfirmasi Password</label>
                                <input type="password" name="password_confirm" class="form-control form-control-lg" placeholder="Konfirmasi password baru" required>
                            </div>

                            <!-- Reset Button -->
                            <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                                <i class="fas fa-key"></i> Reset Password
                            </button>
                        </form>

                        <hr>

                        <!-- Links -->
                        <div class="text-center">
                            <p class="mb-0">
                                <a href="<?= base_url('login') ?>" class="text-decoration-none text-muted small">Kembali ke Login</a>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Footer Info -->
            <div class="text-center mt-4">
                <p class="text-muted small">© 2024 Perpustakaan Digital. All rights reserved.</p>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
    }

    .form-container {
        margin-top: 100px !important;
    }

    .card {
        border-radius: 15px;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        padding: 12px 20px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #e0e0e0;
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }

    a {
        color: #667eea;
    }

    a:hover {
        color: #764ba2;
    }
</style>

<?php $this->load->view('templates/footer'); ?>
