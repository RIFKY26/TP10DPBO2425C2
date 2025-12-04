<?php
require_once 'views/template/header.php';
?>

<div class="container">
    <h2 class="mt-4">Daftar Buku</h2>
    <a href="index.php?entity=buku&action=add" class="btn btn-primary mb-3">Tambah Buku</a>
    
    <table class="w-full border table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($bukuList as $buku): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($buku['judul_buku']); ?></td>
                    <td><?php echo htmlspecialchars($buku['penulis']); ?></td>
                    <td><?php echo htmlspecialchars($buku['penerbit']); ?></td>
                    <td><?php echo htmlspecialchars($buku['tahun_terbit']); ?></td>
                    <td>
                        <a href="index.php?entity=buku&action=edit&id=<?php echo $buku['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="index.php?entity=buku&action=delete&id=<?php echo $buku['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus buku ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
require_once 'views/template/footer.php';
?>