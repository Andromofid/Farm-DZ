<?php
require("../connexiondb.php");
if (isset($_POST['sb'])) {
    extract($_POST);
    if ($cpass != $pass) {
        $error = "(*)";
    } else {
        $image1 = file_get_contents($_FILES['img1']["tmp_name"]);
        $image2 = file_get_contents($_FILES['img2']["tmp_name"]);
        $genre = "M";
        $sql = $db->prepare("INSERT INTO user (prenom,nom,tel,loca,img1,img2,genre,pass) values(?,?,?,?,?,?,?,?)");
        $sql->execute([$prenom, $nom, $tel, $loca, $image1, $image2, $genre, $pass]);
        $good = "ثم التسجيل بنجاح";
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
    <form action="#" method="post" enctype="multipart/form-data" class="frm">
        <?php if (isset($good)) { ?><h1 style="color: green;text-align:center;"><?= $good; ?></h1><?php } ?>
        <h1>انشئ حساب</h1>
        <input type="text" name="prenom" placeholder="ادخل الاسم " required>
        <img src="../img/ic_account_circle_grey.png" alt="phne">
        <input type="text" name="nom" placeholder="ادخل النسب" required>
        <img src="../img/ic_account_circle_grey.png" alt="phne"><br>

        <input type="tel" id="tel" name="tel" placeholder="ادخل رقم الهاتف" required>
        <img src="../img/ic_phone_iphone_grey.png" alt="phne">
        <input type="text" name="loca" placeholder="ادخل عنوان المزرعة" required>
        <img src="../img/ic_account_circle_grey.png" alt="phne"><br>

        <input type="password" name="pass" id="pass" placeholder="ادخل كلمة السر" required style="<?php if (isset($error)) {
                                                                                                        echo "border-color:red;";
                                                                                                    } ?>">
        <img src="../img/ic_https_grey.png" alt="">
        <input type="password" name="cpass" id="cpass" placeholder="ادخل كلمة السر مجددا" required>
        <img src="../img/ic_https_grey.png" alt=""><br><br>

        <label for="file1">صورة ملكية المزرعة</label><br>
        <input type="file" name="img1" id="file1" required><br>

        <label for="file1">صورة الهوية</label><br>
        <input type="file" name="img2" id="file2" required><br>

        <input type="checkbox" name="" id="checkbox">
        <label for="check">إظهار كلمة السر</label><br>

        <button type="submit" id="sb" name="sb">تسجيل الدخول</button>

        <p> لديك حساب?<a href="index.php"> تسجيل الدخول</a>
        </p>
    </form>

</body>
<script>
    var checkbox = document.querySelector("#checkbox");
    var pass = document.querySelector("#pass");
    var cpass = document.querySelector("#cpass");
    var tel = document.querySelector("#tel");
    var sb = document.querySelector("#sb");
    var form = document.querySelector("form");
    checkbox.addEventListener("click", () => {
        if (pass.type == "text" && cpass.type == "text") {
            pass.type = "password";
            cpass.type = "password";
        } else {
            pass.type = "text";
            cpass.type = "text";

        }
    });
    var loder = document.querySelector('.loder');
    var form = document.querySelector('.frm');
    var div = document.querySelector('.left');
    var body = document.body;
    window.onload = () => {
        loder.style.display = 'none';
        div.style.display = 'block';
        form.style.display = 'block';
        body.style.backdropFilter = 'blur(0px)';

    }
</script>

</html>