<?php
require_once 'views/template/header.php';
?>

<div class="container">
    <h2 class="mt-4">Daftar Anggota</h2>
    <a href="index.php?entity=anggota&action=add" class="btn btn-primary mb-3">Tambah Anggota</a>
    
    <table class="w-full border table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($anggotaList as $anggota): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($anggota['nama_anggota']); ?></td>
                    <td><?php echo htmlspecialchars($anggota['nomor_telepon']); ?></td>
                    <td><?php echo htmlspecialchars($anggota['alamat']); ?></td>
                    <td>
                        <a href="index.php?entity=anggota&action=edit&id=<?php echo $anggota['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="index.php?entity=anggota&action=delete&id=<?php echo $anggota['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus anggota ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
require_once 'views/template/footer.php';
?>