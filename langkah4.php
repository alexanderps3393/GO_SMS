<?php 
error_reporting(0);
include "atas.php";

$handle = @fopen("smsdrc1", "r");
$baris = array();
if ($handle) {
	while (!feof($handle)) {
    	$buffer = fgets($handle);
        if (substr_count($buffer, 'port = ') > 0){
		   $split = explode("port = ", $buffer);
		   $port1 = str_replace(":", "", $split[1]);
		}
		
		if (substr_count($buffer, 'connection = ') > 0){
		   $split = explode("connection = ", $buffer);
		   $connection1 = $split[1];
		}

		if (substr_count($buffer, 'phoneid = ') > 0){
		   $split = explode("phoneid = ", $buffer);
		   $id1 = $split[1];
		}		

		if (substr_count($buffer, 'user = ') > 0){
		   $split = explode("user = ", $buffer);
		   $user = $split[1];
		}

		if (substr_count($buffer, 'password = ') > 0){
		   $split = explode("password = ", $buffer);
		   $pass = $split[1];
		}

		if (substr_count($buffer, 'database = ') > 0){
		   $split = explode("database = ", $buffer);
		   $db = $split[1];
		}
		$baris[] = $buffer; 
    }
    fclose($handle);
}


if ($_GET['op'] == "simpan"){
	$port1 = $_POST['port1'];
  	$connection1 = $_POST['connection1'];
  	$id1 = $_POST['id1'];  
  	
	$port2 = $_POST['port2'];
  	$connection2 = $_POST['connection2'];
  	$id2 = $_POST['id2'];
  	
	$port3 = $_POST['port3'];
  	$connection3 = $_POST['connection3'];
 	$id3 = $_POST['id3'];
  
  	$port4 = $_POST['port4'];
  	$connection4 = $_POST['connection4'];
  	$id4 = $_POST['id4'];
  
  	$user = $_POST['user'];
  	$pass = $_POST['pass'];
  
  	$db = $_POST['db'];  
  
  	$handle = @fopen("smsdrc1", "w");
  	$text = "[gammu]
	
	# isikan no port di bawah ini
	port = ".$port1.":
	# isikan jenis connection di bawah ini
	connection = ".$connection1."

	[smsd]
	service = mysql
	logfile = smsdlog
	debuglevel = 0
	phoneid = ".$id1."
	commtimeout = 30
	sendtimeout = 30
	PIN = 1234

	# -----------------------------
	# Konfigurasi koneksi ke MySQL
	# -----------------------------
	pc = localhost

	# isikan user untuk akses ke MySQL
	user = ".$user."
	# isikan password user untuk akses ke MySQL
	password = ".$pass."
	# isikan nama database untuk Gammu
	database = ".$db."\n";

  	fwrite($handle, $text);
  	fclose($handle);

  
	echo "<p>Konfigurasi SMSDRC sudah disimpan</p>"; 
}
?> 
<h2>Setting Konfigurasi SMSDRC</h2>
<p>Masukkan konfigurasi SMSDRC berikut ini!</p>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>?op=simpan">
<table>
	<tr><td>USERNAME (MySQL)</td><td>:</td><td>
 	<input type="text" name="user" value="<?php echo $user;?>"></td></tr>
 	<tr><td>PASSWORD (MySQL)</td><td>:</td><td>
 	<input type="text" name="pass" value="<?php echo $pass;?>"></td></tr>
 	<tr><td>DATABASE NAME GAMMU YANG TELAH DIBUAT SEBELUMNYA (LANGKAH 3)</td><td>:</td><td>
 	<input type="text" name="db" value="<?php echo $db;?>"></td></tr>
</table>

<p><b>Modem/HP 1</b></p>

<table>
 	<tr><td>ID PHONE</td><td>:</td><td>
	<input type="text" name="id1" value="<?php echo $id1;?>"></td></tr>
 	<tr><td>PORT</td><td>:</td><td>
	<input type="text" name="port1" value="<?php echo $port1;?>"></td></tr>
 	<tr><td>CONNECTION</td><td>:</td><td>
	<input type="text" name="connection1" value="<?php echo $connection1;?>"></td></tr>
</table>

<input type="submit" name="submit" value="Simpan">
</form>
<br>
<div class=lanjut>
	<a href="langkah3.php">Kembali</a><a href="langkah5.php">Lanjut</a>

</div>

<? include "bawah.php";?>
