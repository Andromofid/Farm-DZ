<?php
require("../connexiondb.php");
if (isset($_GET['error'])) {
    if ($_GET['error'] == 1) {
        $error = 1;
    }
}
if (isset($_POST['sb'])) {
    extract($_POST);
    if (empty($tel) || empty($pass)) {
        header("location:index.php?error=1");
    } else {
        $sql = $db->prepare("SELECT * FROM user where tel=? AND pass=? and genre='K'");
        $sql->execute([$tel, $pass]);
        $data = $sql->fetch();
        if (empty($data)) {
            header("location:index.php?error=1");
        } else {
            session_start();
            $_SESSION['data'] = $data;
            header("location:home/index.php:?".$data['IdUser']);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm DZ</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="loder">
        <div></div>
    </div>

    <div class="left">
        <div class="nav">
            <a href="../index.php"> <img src="../img/ic_navigate_before_grey.png" alt="">
                تغير نوع المستخدم</a>
            <img src="../img/app_icon.png" alt="logo" class="logo1">

        </div>
        <div class="image">
            <img src="../img/app_icon.png" alt="logo" class="logo">

        </div>
    </div>
    <form action="#" method="post" class="form">
        <h1>تسجيل الدخول</h1>
        <h4 style="text-align: center; color:red;">
            <?php if (isset($error)) {
                echo " رقم الهاتف او كلمة السر غير موجود";
            } ?>
        </h4>
        <input type="tel" name="tel" id="tel" placeholder="ادخل رقم الهاتف" required>
        <img src="../img/ic_phone_iphone_grey.png" alt="phne"><br>
        <input type="password" name="pass" id="pass" placeholder="ادخل كلمة السر" required>
        <img src="../img/ic_https_grey.png" alt=""><br>
        <input type="checkbox" name="" id="checkbox">
        <label for="check">إظهار كلمة السر</label><br>
        <button type="submit" id="sb" name="sb">تسجيل الدخول</button>
        <p> حساب لديك حساب?<a href="singin.php">انشء حساب</a>
        </p>
    </form>
</body>
<script>
    var loder = document.querySelector('.loder');
    var form = document.querySelector('.form');
    var div = document.querySelector('.left');
    var body = document.body;
    window.onload = () => {
        loder.style.display = 'none';
        div.style.display = 'block';
        form.style.display = 'block';
        body.style.backdropFilter='blur(0px)';

    }

    var checkbox = document.querySelector("#checkbox");
    var pass = document.querySelector("#pass");
    var tel = document.querySelector("#tel");
    var sb = document.querySelector("#sb");
    checkbox.addEventListener("click", () => {
        if (pass.type == "text") {
            pass.type = "password";
        } else {
            pass.type = "text";
        }
    });
</script>

</html>