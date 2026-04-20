<?php $this->load->view('templates/header'); ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0"><i class="fas fa-history"></i> Riwayat Peminjaman</h3>
    <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary btn-sm">
        <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
    </a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Buku</th>
                    <th style="width: 12%">Status</th>
                    <th style="width: 12%">Denda</th>
                    <th style="width: 12%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($riwayat) && count($riwayat) > 0): ?>
                    <?php $no = 1; foreach($riwayat as $r): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= date('d/m/Y', strtotime($r->tanggal_pinjam)) ?></td>
                        <td><?= date('d/m/Y', strtotime($r->tanggal_kembali)) ?></td>
                        <td><strong><?= isset($r->buku_judul) ? $r->buku_judul : '-' ?></strong></td>
                        <td>
                            <?php 
                                if($r->status == 'dipinjam') {
                                    echo '<span class="badge bg-warning text-dark">Dipinjam</span>';
                                } elseif($r->status == 'dikembalikan') {
                                    echo '<span class="badge bg-success">Dikembalikan</span>';
                                } elseif($r->status == 'menunggu_konfirmasi') {
                                    echo '<span class="badge bg-info">Menunggu Konfirmasi</span>';
                                } else {
                                    echo '<span class="badge bg-secondary">'.htmlspecialchars($r->status).'</span>';
                                }
                            ?>
                        </td>
                        <td>
                            <?php if(isset($r->denda) && $r->denda > 0): ?>
                                <span class="badge bg-danger">Rp <?= number_format($r->denda, 0, ',', '.') ?></span>
                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($r->status == 'dipinjam'): ?>
                                <a href="<?= base_url('pengembalian/kembalikan/'.$r->id) ?>" class="btn btn-warning btn-sm" onclick="return confirm('Apakah Anda yakin ingin mengembalikan buku ini?')">
                                    <i class="fas fa-undo"></i> Kembalikan
                                </a>
                            <?php elseif($r->status == 'menunggu_konfirmasi'): ?>
                                <span class="text-info small"><i class="fas fa-clock"></i> Menunggu...</span>
                            <?php elseif($r->status == 'dikembalikan'): ?>
                                <span class="text-success small"><i class="fas fa-check"></i> Selesai</span>
                            <?php else: ?>
                                <span class="text-muted small">-</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            <i class="fas fa-inbox" style="font-size: 2rem; color: #cbd5e0;"></i>
                            <p class="text-muted mt-2">Belum ada riwayat peminjaman</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>
<form method="post">
    <input type="text" name="cari" placeholder="Cari judul buku"
        value="<?= isset($cari) ? $cari : '' ?>">

    <select name="status">
        <option value="">-- Semua Status --</option>
        <option value="dipinjam" <?= (isset($status) && $status=='dipinjam')?'selected':'' ?>>Dipinjam</option>
        <option value="kembali" <?= (isset($status) && $status=='kembali')?'selected':'' ?>>Kembali</option>
    </select>

    <input type="date" name="tanggal"
        value="<?= isset($tanggal) ? $tanggal : '' ?>">

    <button type="submit">Filter</button>
</form>