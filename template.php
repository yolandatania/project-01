<?php
// TEMPLATE
$img = imagecreatefromjpeg('templatepalingfix.jpg');

// FONT COLOR
$hitam = imagecolorallocate($img, 0, 0, 0);
$biru = imagecolorallocate($img, 0, 57, 230);
// FONT
$font = 'C:\xampp\htdocs\loker\Fonts\KozukaMedium.otf'; 
$font2 = 'C:\xampp\htdocs\loker\Fonts\CalibriBold.ttf';
$font3 = 'C:\xampp\htdocs\loker\Fonts\CalibriBoldItalic.ttf';
$font4 = 'C:\xampp\htdocs\loker\Fonts\CalibriLight.ttf';
$font5 = 'C:\xampp\htdocs\loker\Fonts\Arial.ttf';
//DATA INPUT
$dicari = "LOWONGAN";
$gender = "Wanita & Pria";
$pendidikan = "Semua Jenjang Pendidikan";
$usia = "-";
$penempatan = "Semarang";
$m_syarat = "";
$m_kirim = "Alamat Perusahaan";
$plg_lambat = "-";
$instagram = " - ";
$twitter = " - ";
$facebook = " - ";
$whatsapp = " - ";
$m_logo = 'search2.png';
$nama_perusahaan="PT. JawaSurya Kencana Indah";
$x_alamat="Jl. Kawasan Industri Terboyo Semarang Blok N no.1 Terboyo Park";
//PROSES INPUT
//-----------------------------------
if(isset($_POST['input']))
{
    $dicari = $_POST['posisi'];
    $gender = $_POST['gender'];
    $pendidikan = $_POST['pendidikan'];
    $usia = $_POST['usia'];
    $penempatan = $_POST['penempatan'];
    $m_syarat = $_POST['syaratlain'];
    $m_kirim = $_POST['kirim'];
    $plg_lambat = $_POST['palinglambat'];
    $instagram = $_POST['instagram'];
    $twitter = $_POST['twitter'];
    $facebook = $_POST['facebook'];
    $whatsapp = $_POST['whatsapp'];
    $nama_perusahaan = $_POST['namaperusahaan'];
    $x_alamat = $_POST['alamat'];
    $m2_logo = $_POST['img_logo'];
    $ext = $_POST['ext'];

}
$alamat = wordwrap($x_alamat, 32, "\n");
$m2_syarat = "- ".$m_syarat;
$syarat_lain = wordwrap($m2_syarat,65,"\n");
$dikirim = wordwrap($m_kirim,32,"\n");

//LOGO POSITION
if($m2_logo != "")
{
    $m_logo = 'images/'.$m2_logo;
    if ($ext == 'jpg' || $ext == 'jpeg')
    {
        $logo = imagecreatefromjpeg($m_logo);
    }
    else if ($ext == 'png')
    {
        $logo = imagecreatefrompng($m_logo);
    }
}
else
{
    $logo = imagecreatefrompng($m_logo);
}
$logo_x = imagesx($logo);
$logo_y = imagesy($logo);
imagecopyresized($img, $logo, 70, 150, 0, 0,150,150, $logo_x, $logo_y);

//TEXT POSTION
//--LOWONGAN
$tb = imagettfbbox(22, 0, $font5, $dicari);
$axis = ceil((1150 - $tb[2]) / 2); // lower left X coordinate for text
imagettftext($img, 22, 0, $axis, 140, $biru, $font5, $dicari);
//-- NAMA PERUSAHAAN 
$tb2=imagettfbbox(16, 0, $font2, $nama_perusahaan);
//$axis2=ceil((390-$tb2[2])/2);
imagettftext($img, 16, 0, 70, 330, $hitam, $font2, $nama_perusahaan);
//-- ALAMAT
$tb3=imagettfbbox(13, 0, $font2, $alamat);
//$axis3=ceil((460-$tb3[2])/2);
imagettftext($img, 13, 0, 70, 360, $hitam, $font2, $alamat);
//--KUALIFIKASI
imagettftext($img, 14, 0, 610, 217, $hitam, $font, $gender);
imagettftext($img, 14, 0, 610, 244, $hitam, $font, $pendidikan);
imagettftext($img, 14, 0, 610, 269, $hitam, $font, $usia);
imagettftext($img, 14, 0, 610, 295, $hitam, $font, $penempatan);
imagettftext($img, 14, 0, 390, 375, $hitam, $font2, $syarat_lain);
imagettftext($img, 14, 0, 70, 475, $hitam, $font3, $dikirim);
imagettftext($img, 14, 0, 593, 475, $hitam, $font3, $plg_lambat);
//--SOSMED
imagettftext($img, 13, 0, 70, 550, $hitam, $font4, $instagram);
imagettftext($img, 13, 0, 275, 550, $hitam, $font4, $twitter);
imagettftext($img, 13, 0, 515, 550, $hitam, $font4, $facebook);
imagettftext($img, 13, 0, 745, 550, $hitam, $font4, $whatsapp);

// OUTPUT IMAGE
ob_start();
imagejpeg($img,NULL,100);
$im = ob_get_clean();
imagedestroy($img);

// OR SAVE TO A FILE
// THE LAST PARAMETER IS THE QUALITY FROM 0 to 100
// imagejpeg($img, "test.jpg", 100);
?>
<html>
<head>
    <title>LOKERNAKER</title>
    <link rel="shortcut icon"href="disnaker_logo.png">
    </head>
    <body>
        <?php echo "<img src='data:image/jpeg;base64," . base64_encode($im) . "' />";?>
    </body>
</html>