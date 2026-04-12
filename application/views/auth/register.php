<?php $this->load->view('templates/header'); ?>

<div class="container form-container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-5">
                    <!-- Header -->
                    <div class="text-center mb-4">
                        <h2 class="fw-bold mb-2">📚 Perpustakaan</h2>
                        <p class="text-muted">Daftar akun baru Anda</p>
                    </div>

                    <!-- Form -->
                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control form-control-lg" placeholder="Masukkan nama Anda" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Masukkan email Anda" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" class="form-control form-control-lg" placeholder="Masukkan password Anda" required>
                        </div>

                        <!-- Terms -->
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="terms" required>
                            <label class="form-check-label small" for="terms">
                                Saya setuju dengan <a href="#" class="text-decoration-none">syarat dan ketentuan</a>
                            </label>
                        </div>

                        <!-- Register Button -->
                        <button type="submit" class="btn btn-success btn-lg w-100 mb-3">
                            <i class="fas fa-user-plus"></i> Daftar
                        </button>
                    </form>

                    <hr>

                    <!-- Links -->
                    <div class="text-center">
                        <p>Sudah punya akun? 
                            <a href="<?= base_url('auth/login') ?>" class="text-decoration-none fw-semibold">Login di sini</a>
                        </p>
                    </div>
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
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
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

    .btn-success {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        border: none;
        padding: 12px 20px;
        font-weight: 600;
        transition: all 0.3s;
    }

    .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(245, 87, 108, 0.4);
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #e0e0e0;
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: #f5576c;
        box-shadow: 0 0 0 0.2rem rgba(245, 87, 108, 0.25);
    }

    a {
        color: #f5576c;
    }

    a:hover {
        color: #f093fb;
    }
</style>

<?php $this->load->view('templates/footer'); ?>
