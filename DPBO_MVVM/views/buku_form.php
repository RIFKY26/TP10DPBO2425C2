<?php
require_once 'views/template/header.php';
?>

<div class="container">
    <h2 class="mt-4 mb-3"><?php echo isset($buku) ? 'Edit Buku' : 'Tambah Buku'; ?></h2>
    
    <form action="index.php?entity=buku&action=<?php echo isset($buku) ? 'update&id=' . $buku['id'] : 'save'; ?>" method="POST">
        <div class="mb-3">
            <label class="form-label">Judul Buku:</label>
            <input type="text" name="judul_buku" value="<?php echo isset($buku) ? htmlspecialchars($buku['judul_buku']) : ''; ?>" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Penulis:</label>
            <input type="text" name="penulis" value="<?php echo isset($buku) ? htmlspecialchars($buku['penulis']) : ''; ?>" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Penerbit:</label>
            <input type="text" name="penerbit" value="<?php echo isset($buku) ? htmlspecialchars($buku['penerbit']) : ''; ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tahun Terbit:</label>
            <input type="number" name="tahun_terbit" value="<?php echo isset($buku) ? htmlspecialchars($buku['tahun_terbit']) : ''; ?>" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="index.php?entity=buku" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php
require_once 'views/template/footer.php';
?>