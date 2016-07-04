<?php 
error_reporting(0);
include "atas.php";
?>

<h2>Menjalankan Service GAMMU</h2>
<p>Klik tombol di bawah ini untuk menjalankan GAMMU Service!</p>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<input type="submit" name="submit" value="JALANKAN SERVICE GAMMU"></td></tr>
</form>
<br>
<?php
if (isset($_POST['submit'])){
	echo "<b>Status :</b><br>";
   	echo "<pre>";
   	passthru("gammu-smsd -c smsdrc1 -n phone1 -s");   
   	echo "</pre>";
}
?>
<div class=lanjut>
	<a href="langkah4.php">Kembali</a><a href="index.php".php">Selesai</a>
</div>

<?php include "bawah.php";?> 
