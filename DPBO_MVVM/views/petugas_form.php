<?php
require_once 'views/template/header.php';
?>

<div class="container">
    <h2 class="mt-4 mb-3"><?php echo isset($petugas) ? 'Edit Petugas' : 'Tambah Petugas'; ?></h2>
    
    <form action="index.php?entity=petugas&action=<?php echo isset($petugas) ? 'update&id=' . $petugas['id'] : 'save'; ?>" method="POST">
        <div class="mb-3">
            <label class="form-label">Nama Petugas:</label>
            <input type="text" name="nama_petugas" value="<?php echo isset($petugas) ? htmlspecialchars($petugas['nama_petugas']) : ''; ?>" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Jabatan:</label>
            <input type="text" name="jabatan" value="<?php echo isset($petugas) ? htmlspecialchars($petugas['jabatan']) : ''; ?>" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="index.php?entity=petugas" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php
require_once 'views/template/footer.php';
?>