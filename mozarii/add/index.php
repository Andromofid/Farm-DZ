<?php
session_start();
require("../../connexiondb.php");
if (!isset($_SESSION['data'])) {
    header("location:../../index.php");
} else {
    $data = $_SESSION['data'];
    if(isset($_POST['sb'])){
        extract($_POST);
        $id_user=$data['id'];
        $image = file_get_contents($_FILES['image']['tmp_name']);
        $typeimg = $_FILES['image']['type'];
        $nameimg = $_FILES['image']['name'];
        $sql = $db->prepare("INSERT INTO produits(id_user,nomProduit,quatite,prix,image,type_image,name_img,dateProduction)values(?,?,?,?,?,?,?,?)");
        $sql->execute([$id_user,$nom,$quatite,$prix,$image,$typeimg,$nameimg,$date]);
        header("location:../home/index.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm DZ</title>
    <link rel="stylesheet" href="../home/index.css">
</head>

<body style="height: 100vh;">
<div class="loder">
        <div></div>
    </div>
<div class="div">    <nav>
        <div class="logo">
            <img src="../../img/app_icon.png" alt="logo">
        </div>
        <ul id="list">
            <li><a href="../home/index.php">الرئيسية</a></li>
            <li><a href="../add/index.php" style="opacity:1;">إضافة منتوج</a></li>
            <li><a href="../message/conversation.php">الرسائل</a></li>
            <li><a href="../allpros/index.php">منتوجاتي</a></li>
            <li><a href="">تسجيل الخروج</a></li>
        </ul>
        <svg id="nav_btn" fill="currentColor" viewBox="0 0 44 44" width="1em" height="1em" class="x1lliihq x1k90msu x2h7rmj x1qfuztq x198g3q0 x1qx5ct2 xw4jnvo">
            <circle cx="7" cy="7" r="6"></circle>
            <circle cx="22" cy="7" r="6"></circle>
            <circle cx="37" cy="7" r="6"></circle>
            <circle cx="7" cy="22" r="6"></circle>
            <circle cx="22" cy="22" r="6"></circle>
            <circle cx="37" cy="22" r="6"></circle>
            <circle cx="7" cy="37" r="6"></circle>
            <circle cx="22" cy="37" r="6"></circle>
            <circle cx="37" cy="37" r="6"></circle>
        </svg>

    </nav>
    <div class="bd">
        <div class="form">
            <form action="#" method="post" enctype="multipart/form-data">
                <h1 style="text-align: center;">إضافة منتوج</h1>
                <input type="text" name="nom" placeholder="ادخل اسم الخضر او الفاكهة" required><br>
                <input type="number" name="quatite" placeholder="الكمية الكلوغرام" required><br>
                <input type="number" name="prix" placeholder="الثمن" required><br>
                <label for="img">صورة للمنتوج:</label>
                <input type="file" accept="image/*" name="image" id="img" required><br>
                <label for="date">:تاريخ الانتاج</label>
                <input type="date" name="date" id="date" placeholder="تاريخ الانتاج" required><br>
                <button type="submit" name="sb">إضافة</button>
                </fieldset>
            </form>
        </div>
        <div class="welcome">
        <table>
                <tr>
                    <td colspan="2" style="font-size:30px;">مرحبا بك <?= $data['nom']; ?> في موقعك إبدء بنشر منتوجك و قم ببيعه</td>
                </tr>
                <tr>
                    <td style="font-size:20px;">الاسم:</td>
                    <td style="font-size:20px;"><?= $data['prenom']; ?></td>
                </tr>
                <tr>
                    <td style="font-size:20px;"> النسب:</td>
                    <td style="font-size:20px;"><?= $data['nom']; ?></td>
                </tr>
                <tr>
                    <td style="font-size:20px;"> رقم الهاتف:</td>
                    <td style="font-size:20px;"><?= $data['tel']; ?></td>
                </tr>
            </table>
        </div>
    </div>
    </div>

</body>
<script>
    var btn = document.querySelector("#nav_btn");
    var list = document.querySelector("#list");
    btn.addEventListener("click", () => {
        if (list.style.display == "none") {
            list.style.display = "flex"
        } else {
            list.style.display = "none"
        }

    })
    var loder = document.querySelector('.loder');
    var div = document.querySelector('.div');
    var body = document.body;
    window.onload = () => {
        loder.style.display = 'none';
        div.style.display = 'block';
        body.style.backdropFilter = 'blur(0px)';

    }


</script>

</html>