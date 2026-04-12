<?php $this->load->view('templates/header'); ?>

<div style="max-width: 400px; margin: 30px auto;">
    <h3>Reset Password</h3>
    
    <?php if(isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    
    <?php if(isset($success)): ?>
        <div class="alert alert-success"><?= $success ?></div>
        <p><a href="<?= base_url('login') ?>" class="btn btn-primary">Kembali ke Login</a></p>
    <?php else: ?>
        <form method="post">
            <div class="form-group mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email admin" required>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">Password Baru</label>
                <input type="password" name="password_baru" class="form-control" placeholder="Password baru" required>
            </div>

            <div class="form-group mb-3">
                <label class="form-label">Konfirmasi Password</label>
                <input type="password" name="password_confirm" class="form-control" placeholder="Konfirmasi password" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Reset Password</button>
        </form>

        <p class="mt-3 text-center">
            <a href="<?= base_url('login') ?>">Kembali ke Login</a>
        </p>
    <?php endif; ?>
</div>

<?php $this->load->view('templates/footer'); ?>
