<?php 
error_reporting(0);
include "atas.php";
?>

<h2>Membuat Service GAMMU</h2>
<p>Klik tombol di bawah ini untuk membuat GAMMU Service!</p>

<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<input type="submit" name="submit" value="INSTALL SERVICE GAMMU"></td></tr>
</form>
<br>
<?php
  if ($_POST['submit']){
   echo "<b>Status :</b><br>";
   echo "<pre>";
   passthru("gammu-smsd -n phone1 -k", $hasil);   
   passthru("gammu-smsd -n phone1 -u", $hasil); 

   $handle = @fopen("smsdrc1", "r");
   while (!feof($handle)){
        $buffer = fgets($handle);
        if (substr_count($buffer, 'port = ') > 0){
		   $split = explode("port = ", $buffer);
		   $port1 = str_replace(":", " ", $split[1]);
		}
   }	
   
   if ($port1 != "\r\n") passthru("gammu-smsd -c smsdrc1 -n phone1 -i", $hasil);
   fclose($handle);

   $handle = @fopen("smsdrc2", "r");
   while (!feof($handle)){
        $buffer = fgets($handle);
        if (substr_count($buffer, 'port = ') > 0){
		   $split = explode("port = ", $buffer);
		   $port2 = str_replace(":", "", $split[1]);
		}
   }
   
   if ($port2 != "\r\n") passthru("gammu-smsd -c smsdrc2 -n phone2 -i", $hasil);
   fclose($handle);
   
   $handle = @fopen("smsdrc3", "r");
   while (!feof($handle)){
        $buffer = fgets($handle);
        if (substr_count($buffer, 'port = ') > 0){
		   $split = explode("port = ", $buffer);
		   $port3 = str_replace(":", "", $split[1]);
		}
   }
   	
   if ($port3 != "\r\n") passthru("gammu-smsd -c smsdrc3 -n phone3 -i", $hasil);
   fclose($handle);
   
   $handle = @fopen("smsdrc4", "r");
   while (!feof($handle)){
        $buffer = fgets($handle);
        if (substr_count($buffer, 'port = ') > 0){
		   $split = explode("port = ", $buffer);
		   $port4 = str_replace(":", "", $split[1]);
		}
   }
   	
   if ($port4 != "\r\n") passthru("gammu-smsd -c smsdrc4 -n phone4 -i", $hasil);
   fclose($handle);
   
   echo "</pre>";
  }
 echo"
<div class=lanjut>
	<a href='langkah4.php'>Kembali</a><a href='langkah6.php'>Lanjut</a>

</div> 
 ";
 
 include "bawah.php";
?> 
