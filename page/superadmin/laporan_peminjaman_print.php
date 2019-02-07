<?php session_start();
include('../../database/config.php');
date_default_timezone_set('Asia/Jakarta');
if ($_SESSION && $_SESSION['hak_akses'] == '0') {
    ?>
<?php
    $query = mysqli_query($con, "SELECT *,riwayat_rental.status AS status_pembayaran FROM riwayat_rental inner join
    tbl_user on riwayat_rental.id_user=tbl_user.id_user inner join
    tbl_mobil on riwayat_rental.no_polisi=tbl_mobil.no_polisi inner join
    tbl_minimarket on riwayat_rental.id_minimarket = tbl_minimarket.id_minimarket "); ?>

<!-- WARNING START CONTENT ----------------------------------------------------------- -->

		<h1>
			<center>LAPORAN PEMINJAMAN</center><hr>
		</h1>
    <pre>
DICETAK TANGGAL           : <?php echo date('d-M-Y H:i:s') ?>
    </pre>
    <hr><br>
		<table style="text-align: center;" border="3" cellpadding="4" width="100%" height="auto">
			<tr>
				<th>NAMA</th>
				<th>NO POLISI</th>
				<th>MOBIL</th>
				<th>TANGGAL RENTAL</th>
        <th>TANGGAL KEMBALI</th>
        <th>MINIMARKET</th>
        <th>KODE PEMBAYARAN</th>
        <th>TOTAL HARGA</th>
        <th>STATUS</th>
			</tr>
			<?php
while ($data = mysqli_fetch_assoc($query)) {
        ?>
			<tr>
				<td>
					<?php echo $data['nama']; ?>
				</td>
				<td>
					<?php echo $data['no_polisi']; ?>
				</td>
        <td width="20%">
					MERK 	: <?php echo $data['merk']; ?><br>
					JENIS	: <?php echo $data['jenis']; ?>
				</td>
        <td>
					<?php echo $data['tgl_rental']; ?>
				</td>
        <td>
					<?php echo $data['tgl_kembali']; ?>
				</td>
        <td>
          <?php echo $data['minimarket'] ?>
        </td>
        <td>
          <?php echo $data['kode_pembayaran']; ?>
        </td>
        <td>
          <?php echo $data['ttl_harga']; ?>
        </td>
        <td>
          <?php if ($data['status_pembayaran'] == '0') {
            ?>
            <div style="color: red;"><b>Pemesanan Gagal<b></div>
          <?php
        } elseif ($data['status_pembayaran'] == '1') {
            ?>
            <div style="color: green;"><b>Pemesanan Selesai<b></div>
          <?php
        } ?>
				</td>
			</tr>
			<?php
    } ?>
		</table>

<script language="javascript">
window.print();
</script>

<!-- WARNING END CONTENT ----------------------------------------------------------- -->
<?php
} else {
        ?>
<script language="javascript">
	document.location = '../../index.php'
</script>
<?php
    } ?>
