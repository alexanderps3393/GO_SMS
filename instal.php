<?php
	include "atas.php";
?>
<?php
$handle = @fopen("gammurc", "r");//membuka file gammurc
$baris = array();
$i = 1;
$j = 1;

if ($handle) {
    while (!feof($handle)) {//feof di gunakan untuk menampilkan isi file atau lebih sering di gunakan untuk mendeteksi akhir dari file
        $buffer = fgets($handle);
        if (substr_count($buffer, 'port = ') > 0){
		   if ($i == 1){
		      $split = explode("port = ", $buffer);
		      $port1 = str_replace(":", "", $split[1]);
		   }
		   
		   if ($i == 2){
		      $split = explode("port = ", $buffer);
		      $port2 = str_replace(":", "", $split[1]);
		   }
		   
		   if ($i == 3){
		      $split = explode("port = ", $buffer);
		      $port3 = str_replace(":", "", $split[1]);
		   }
		   
		   if ($i == 4){
		      $split = explode("port = ", $buffer);
		      $port4 = str_replace(":", "", $split[1]);
		   }
		   
		   $i++;
		}
		
		if (substr_count($buffer, 'connection = ') > 0){
		   if ($j == 1){
 		      $split = explode("connection = ", $buffer);
		      $connection1 = $split[1];
		   }
		   
		   if ($j == 2){
 		      $split = explode("connection = ", $buffer);
		      $connection2 = $split[1];
		   }
		   
		   if ($j == 3){
 		      $split = explode("connection = ", $buffer);
		      $connection3 = $split[1];
		   }
		   
		   if ($j == 4){
 		      $split = explode("connection = ", $buffer);
		      $connection4 = $split[1];
		   }
		   
		   $j++;
		}
		$baris[] = $buffer; 
    }
    fclose($handle);
}

if (isset($_GET['op']) == "simpan"){
	$port1 = $_POST['port1'];
  	$connection1 = $_POST['connection1'];
  
	//$port2 = $_POST['port2'];
	//$connection2 = $_POST['connection2'];
	
	//$port3 = $_POST['port3'];
	//$connection3 = $_POST['connection3'];
	
	//$port4 = $_POST['port4'];
	//$connection4 = $_POST['connection4'];  
	  
	$handle = @fopen("gammurc", "w");
	
	$text = "[gammu]\nport = ".
			$port1.":\nconnection = ".$connection1."\n[gammu1]\nport = ".
			$port2.":\nconnection = ".$connection2."\n[gammu2]\nport = ".
			$port3.":\nconnection = ".$connection3."\n[gammu3]\nport = ".
			$port4.":\nconnection = ".$connection4;
	  
	fwrite($handle, $text);
	fclose($handle); 
	echo "<p>Konfigurasi GAMMURC sudah disimpan</p>";  
}
?> 


<div class=tabel1>
	<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>?op=simpan">
		<center><h3>INSTALASI GAMMU</h3></center>
		<table>
			<tr>
				<th colspan=3>Setting PORT</th>
			</tr>
			<tr>
				<td style="width:130;">PORT</td>
				<td style="width:10;">:</td>
				<td style="width:190;"><input type="text" name="port1" value="<?php echo $port1;?>" size="25px"></td>
			</tr>
			<tr>
				<td>CONNECTION</td>
				<td>:</td>
				<td><input type="text" name="connection1" value="<?php echo $connection1;?>" size="25px"></td>
			</tr>
			<tr>
				<td colspan=3 ><input type="submit" name="submit" value="Simpan" style="margin-left:250px;"></td>
			</tr>
		</table>
	</form>
	<br>
	<div class=lanjut>
		<a href="langkah3.php">Lanjut</a>
	</div>
</div>


<?php
	include "bawah.php";
?>
