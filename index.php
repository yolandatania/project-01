<?php
$judul = "";
$status = "";
$ext = "";
    if(isset($_POST['submit']))
    {
        $namafile = $_FILES['file']['name'];
        $error = $_FILES['file']['error'];
        $temp = $_FILES['file']['tmp_name'];
        $ukuran = $_FILES['file']['size'] / 1024;
        $x = explode('.', $namafile);
        $ext = strtolower(end($x));
        $target = 'images/logo_perusahaan.'.$ext;

        if($ukuran > 0 || $error == 0 || $ext == 'jpg' || $ext == 'png' || $ext == 'jpeg')
        {
            $move = move_uploaded_file($temp,$target);
            if($move)
            {
                $judul = "logo_perusahaan.".$ext;
                $status = "file uploaded";
            }
            else
            {
                echo '<script language="javascript">';
                echo 'alert("file upload gagal")';
                echo '</script>';
            }
        }
        else
        {
            echo '<script language="javascript">';
            echo 'alert("file upload gagal")';
            echo '</script>';
        }
    }
?>
<html>
    <style type="text/css">
    * {margin:0; padding:0;}
    .container {
            margin: 30px auto;
            width: 900px;
            border-radius: 30px;
            padding: 20px;
            background-color:rgba(255,255,255,0.83);
        }
    html { 
        background: url(background5.jpg) no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    </style>
    <head>
        <title>LOKERNAKER FORM</title>
        <link rel="shortcut icon"href="disnaker_logo.png">
    </head>
    <body>
        <div class="container">
            <table border = "1" width = "100%" height = "650px" style="margin-right:100px">
                <tr height = "40px">
                    <td colspan = "4">
                        <b><font style = "font-size:20px"><center>FORM LOKER<center></font></b>
                    </td>
                </tr>
                <tr>
                    <td colspan ="4" align = "center">
                    <div style="margin-bottom:20px; margin-top:20px">
                    <table>
                    <tr>
                    <td>
                        <form action="" method ="POST" enctype = "multipart/form-data">
                        <label for="file"><b>LOGO PERUSAHAAN</b> (optional, square image)</label><br><br>
                        <input type = "file" name="file" id="file"><br><br>
                        <input type = "submit" name = "submit" value = "upload" style = "width:150px; height:25px"><?php echo $status?>
                        </form>
                    </td>
                    </tr>
                    </table>
                    </div>
                    </td>
                </tr>
                <form action = "template.php" method = "POST" autocomplete="off">
                <input type = "hidden" name = "img_logo" value = <?php echo $judul; ?>>
                <input type = "hidden" name = "ext" value = <?php echo $ext; ?>>
                <tr height = "400px">
                <td width = 50% valign = "top" colspan = "2">
                <div style="margin-left:10px; margin-top:20px">
                    <table border = 0 width = "100%">
                    <tr height>
                        <td>
                            <b>Nama Perusahaan</b>
                            <tr><td style ="height:50px" ><input type="text" name="namaperusahaan" required style ="width:300px; height:30px"></td></tr>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Alamat</b>
                            <tr><td style ="height:50px"><input type="text" name="alamat" required style ="width:300px; height:30px" maxlength="100"></td></tr>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Posisi</b>
                            <tr><td style ="height:50px"><input type="text" name="posisi" required style ="width:300px; height:30px"></td></tr>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Jenis Kelamin</b><br>
                            <tr><td style ="height:50px">
                                <select name="gender" style ="width:300px; height:30px">
                                <option value="Wanita & Pria">Wanita & Pria</option>
                                <option value="Wanita">Wanita</option>
                                <option value="Pria">Pria</option>
                                <option value="Lainnya">Lainnya</option>
                                </select>
                            </td></tr>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Pendidikan</b>
                            <tr><td style ="height:50px"><input type="text" name="pendidikan" required style ="width:300px; height:30px"></td></tr>
                        </td>
                    </tr>
                </table>
                </div>
                 </td>
                <td width = 50% valign="top" colspan = "2">
                        <div style="margin-left:10px; margin-top:20px">
                        <table border = 0 width = "100%" height = "50%">
                        <tr>
                            <td>
                                <b>Usia (Maks/Min)</b>
                                <tr><td style="height:50px"><input type="text" name="usia" required style ="width:300px; height:30px"></td></tr>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Penempatan di</b>
                                <tr><td style="height:50px"><input type="text" name="penempatan" required style ="width:300px; height:30px"></td></tr>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Syarat lain</b>
                                <tr><td style="height:50px"><input type="text" name="syaratlain" required style ="width:300px; height:30px" maxlength="170"></td></tr>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Kirim lamaran ke</b>
                                <tr><td style="height:50px"><input type="text" name="kirim" required style ="width:300px; height:30px" maxlength="100"></td></tr>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Paling lambat</b>
                                <tr><td style="height:50px"><input type="text" name="palinglambat" required style ="width:300px; height:30px"></td></tr>
                            </td>
                        </tr>
                    </table>
                    </td>
                </tr>
                <tr height = "90px">
                    <td width = "25%">
                    <div style="margin-left:10px;">
                        <table border = 0 height = "90px">
                            <tr height = "50%">
                                <td>
                                    <b>Instagram</b><br>
                                </td>
                            </tr>
                            <tr height = "50%">
                                <td>
                                <input type="text" name="instagram" style = "height:30px; width:180px">
                                </td>
                            </tr>
                        </table>
                    </div>
                    </td>
                    <td width = "25%">
                    <div style="margin-left:10px;">
                        <table border = 0 height = "90px">
                            <tr height = "50%">
                                <td>
                                    <b>Twitter</b><br>
                                </td>
                            </tr>
                            <tr height = "50%">
                                <td>
                                <input type="text" name="twitter" style = "height:30px; width:180px">
                                </td>
                            </tr>
                        </table>
                    </div>
                    </td>
                    <td width = "25%">
                    <div style="margin-left:10px;">
                        <table border = 0 height = "90px">
                            <tr height = "50%">
                                <td>
                                    <b>Facebook</b><br>
                                </td>
                            </tr>
                            <tr height = "50%">
                                <td>
                                <input type="text" name="facebook" style = "height:30px; width:180px">
                                </td>
                            </tr>
                        </table>
                    </div>
                    </td>
                    <td width = "25%">
                    <div style="margin-left:10px;">
                        <table border = 0 height = "90px">
                            <tr height = "50%">
                                <td>
                                    <b>Whatsapp</b><br>
                                </td>
                            </tr>
                            <tr height = "50%">
                                <td>
                                <input type="text" name="whatsapp" style = "height:30px; width:180px">
                                </td>
                            </tr>
                        </table>
                    </div>
                    </td>
                </tr>
                <tr height = "60px">
                    <td colspan = "4" align = "center">
                        <input type="submit" name="input" value = "Input" style = "height:35px; width:300px;">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
