<?php
require_once 'views/template/header.php';
?>

<div class="container">
    <h2 class="mt-4">Daftar Petugas</h2>
    <a href="index.php?entity=petugas&action=add" class="btn btn-primary mb-3">Tambah Petugas</a>
    
    <table class="w-full border table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Petugas</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($petugasList as $petugas): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($petugas['nama_petugas']); ?></td>
                    <td><?php echo htmlspecialchars($petugas['jabatan']); ?></td>
                    <td>
                        <a href="index.php?entity=petugas&action=edit&id=<?php echo $petugas['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="index.php?entity=petugas&action=delete&id=<?php echo $petugas['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus petugas ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
require_once 'views/template/footer.php';
?>