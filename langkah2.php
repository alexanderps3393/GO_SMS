<?php 
error_reporting(0);
include "atas.php";
?>
<br>
<h2>INSTAL GAMMU</h2>
<p>Klik tombol di bawah ini untuk cek koneksi !</p>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<input type="submit" name="submit" value="CEK KONEKSI"></td></tr>
</form>

<?php
if ($_POST['submit']){
   echo "<b>Status :</b><br>";
   echo "<hr>Modem 1<br>";
   echo "<pre>";
  
   passthru("gammu -s 0 -c gammurc identify", $hasil);
   echo "</pre>";   
}
?>
	<br>
	<div class=lanjut>
		<a href="instal.php">Kembali</a> <a href="langkah3.php">Lanjut</a>
	</div>

<?
include "bawah.php";
?>
 
