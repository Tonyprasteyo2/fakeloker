<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="letter-pesan" content="kebenaran-lowongan kerja"/>
</head>
<body style="background-color: #F0FFFF;">
    <div style="background-color: white;width:50%;margin:auto;border-radius:10px;box-shadow: 2px 0px 5px -1px rgba(0,0,0,0.75);
    -webkit-box-shadow: 2px 0px 5px -1px rgba(0,0,0,0.75);
    -moz-box-shadow: 2px 0px 5px -1px rgba(0,0,0,0.75);">
        <header style="text-align:center;">
            <a href="/">
                <img src="https://i.ytimg.com/vi/QgwVyYoeQlM/maxresdefault.jpg" style="width: 150px;"/>
            </a>
        </header>
        <hr style="background-color:#dedede;border:none;height:3px;margin-top:9px;">
        <div style="padding: 5px 5px 8px 9px;margin-top:1px;">
            <h2 style="font:normal 20px/23px Arial,Helvetica,sans-serif;margin:0;padding:0 0 18px;color:black;">Penggantian Akun Member</h2>
            <p>Akun member berhasil di ganti pada tanggal <?php echo date('d-M-Y');?></p>
            <p>Mohon jaga kerahasiaan akun anda.</p>
            <ul>
                <li>Email    : {{ $dataEmail['email'] }}</li>
                <li>Password : {{ $dataEmail['password'] }}</li>
            </ul>
            <a href="login" target="_blank" style="text-decoration: none;background-color:springgreen;padding:5px;border:none;border-radius:5px;color:black;font:normal 20px/23px Arial,Helvetica,sans-serif;margin-top:10px;">Login</a>
        </div>
        <footer style="background-color:aqua;padding:2px;margin-top:9px;">
            <h3 style="text-align: center;font:normal 20px/23px Arial,Helvetica,sans-serif">&copy;Kebenaran</h3>
        </footer>
    </div>    
</body>
</html>