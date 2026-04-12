<div class="mb-3">
    <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary btn-sm">Dashboard</a>

    <?php if($this->session->userdata('role') == 'user'): ?>
        <a href="<?= base_url('user/buku') ?>" class="btn btn-primary btn-sm">Buku</a>
        <a href="<?= base_url('user/peminjaman') ?>" class="btn btn-success btn-sm">Peminjaman</a>
        <a href="<?= base_url('user/pengembalian') ?>" class="btn btn-warning btn-sm">Pengembalian</a>
        <a href="<?= base_url('user/denda') ?>" class="btn btn-danger btn-sm">Denda</a>
    <?php endif; ?>

    <?php if($this->session->userdata('role') == 'admin'): ?>
        <a href="<?= base_url('buku') ?>" class="btn btn-primary btn-sm">Buku</a>
        <a href="<?= base_url('anggota') ?>" class="btn btn-success btn-sm">Anggota</a>
        <a href="<?= base_url('peminjaman') ?>" class="btn btn-warning btn-sm">Peminjaman</a>
        <a href="<?= base_url('denda') ?>" class="btn btn-danger btn-sm">Denda</a>
    <?php endif; ?>

    <a href="<?= base_url('auth/logout') ?>" class="btn btn-dark btn-sm">Logout</a>
</div>
<hr>