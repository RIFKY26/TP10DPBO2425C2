<?php
require_once 'views/template/header.php';
?>

<div class="container">
    <h2 class="mt-4 mb-3"><?php echo isset($anggota) ? 'Edit Anggota' : 'Tambah Anggota'; ?></h2>
    
    <form action="index.php?entity=anggota&action=<?php echo isset($anggota) ? 'update&id=' . $anggota['id'] : 'save'; ?>" method="POST">
        <div class="mb-3">
            <label class="form-label">Nama Anggota:</label>
            <input type="text" name="nama_anggota" value="<?php echo isset($anggota) ? htmlspecialchars($anggota['nama_anggota']) : ''; ?>" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Nomor Telepon:</label>
            <input type="text" name="nomor_telepon" value="<?php echo isset($anggota) ? htmlspecialchars($anggota['nomor_telepon']) : ''; ?>" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Alamat:</label>
            <textarea name="alamat" class="form-control" required><?php echo isset($anggota) ? htmlspecialchars($anggota['alamat']) : ''; ?></textarea>
        </div>
        
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="index.php?entity=anggota" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php
require_once 'views/template/footer.php';
?>