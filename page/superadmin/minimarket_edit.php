<?php session_start();
if($_SESSION && $_SESSION['hak_akses'] == '0'){ ?>
<?php require_once('header.php'); ?>
<!-- WARNING START CONTENT ----------------------------------------------------------- -->
<?php
$id_minimarket = $_GET['id_minimarket'];
$query = mysqli_query($con, "SELECT * FROM tbl_minimarket where id_minimarket='$id_minimarket' ");
$data = mysqli_fetch_assoc($query);
?>


<div class="content">
	<div class="font">

		<h1>EDIT USER</h1>
		<form action="action/minimarket_edit.php" method="post" enctype="multipart/form-data">
			<pre>
ID MINIMARKET 		: <input type="text" value="<?php echo $data['id_minimarket']; ?>" disabled><br>
USERNAME 		: <input type="text" name="username" value="<?php echo $data['username']; ?>" required><br>
PASSWORD 		: <input type="text" name="password" value="<?php echo $data['password']; ?>" required><br>
NAMA  			: <input type="text" name="minimarket" value="<?php echo $data['minimarket']; ?>" required><br>
KODE  			: <input type="text" name="kode_minimarket" value="<?php echo $data['kode_minimarket']; ?>" required><br>
HARGA 			: <input type="number" name="harga" value="<?php echo $data['harga']; ?>" required><br>
			</pre>
			<input type="hidden" name="id_minimarket" value="<?php echo $data['id_minimarket']; ?>">
			<button class="button button1" type="submit">SIMPAN</button>
			<button class="button button-info" type="reset">RESET</button>
		</form>
	</div>
</div>

<!-- WARNING END CONTENT ----------------------------------------------------------- -->
<?php require_once('footer.php'); ?>
<?php }else{ ?>
<script language="javascript">
	document.location = '../../index.php'
</script>
<?php } ?>
