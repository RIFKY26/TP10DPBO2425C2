<?php
require_once 'views/template/header.php';
?>

<div class="container">
    <h2 class="mt-4">Daftar Transaksi Peminjaman</h2>
    <a href="index.php?entity=peminjaman&action=add" class="btn btn-primary mb-3">Catat Peminjaman Baru</a>
    
    <table class="w-full border table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Pinjam</th>
                <th>Nama Anggota</th>
                <th>Judul Buku</th>
                <th>Dilayani Oleh</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($peminjamanList as $pinjam): ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($pinjam['tanggal_pinjam'])); ?></td>
                    <td><?php echo htmlspecialchars($pinjam['nama_anggota']); ?></td>
                    <td><?php echo htmlspecialchars($pinjam['judul_buku']); ?></td>
                    <td><?php echo htmlspecialchars($pinjam['nama_petugas']); ?></td>
                    <td>
                        <a href="index.php?entity=peminjaman&action=edit&id=<?php echo $pinjam['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="index.php?entity=peminjaman&action=delete&id=<?php echo $pinjam['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data peminjaman ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
require_once 'views/template/footer.php';
?>