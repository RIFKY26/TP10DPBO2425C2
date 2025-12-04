<?php
require_once 'views/template/header.php';
?>

<div class="container">
    <h2 class="mt-4 mb-3"><?php echo isset($peminjaman) ? 'Edit Peminjaman' : 'Catat Peminjaman Baru'; ?></h2>
    
    <form action="index.php?entity=peminjaman&action=<?php echo isset($peminjaman) ? 'update&id=' . $peminjaman['id'] : 'save'; ?>" method="POST">
        
        <div class="mb-3">
            <label class="form-label">Buku yang Dipinjam:</label>
            <select name="id_buku" class="form-control" required>
                <option value="">-- Pilih Buku --</option>
                <?php foreach ($bukuList as $buku): ?>
                    <option value="<?php echo $buku['id']; ?>" 
                        <?php echo (isset($peminjaman) && $peminjaman['id_buku'] == $buku['id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($buku['judul_buku']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Peminjam (Anggota):</label>
            <select name="id_anggota" class="form-control" required>
                <option value="">-- Pilih Anggota --</option>
                <?php foreach ($anggotaList as $anggota): ?>
                    <option value="<?php echo $anggota['id']; ?>" 
                        <?php echo (isset($peminjaman) && $peminjaman['id_anggota'] == $anggota['id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($anggota['nama_anggota']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Petugas Pencatat:</label>
            <select name="id_petugas" class="form-control" required>
                <option value="">-- Pilih Petugas --</option>
                <?php foreach ($petugasList as $petugas): ?>
                    <option value="<?php echo $petugas['id']; ?>" 
                        <?php echo (isset($peminjaman) && $peminjaman['id_petugas'] == $petugas['id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($petugas['nama_petugas']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Pinjam:</label>
            <input type="date" name="tanggal_pinjam" 
                   value="<?php echo isset($peminjaman) ? $peminjaman['tanggal_pinjam'] : date('Y-m-d'); ?>" 
                   class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-success">Simpan Transaksi</button>
        <a href="index.php?entity=peminjaman" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php
require_once 'views/template/footer.php';
?>