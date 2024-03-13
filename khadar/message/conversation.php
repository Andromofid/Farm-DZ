<?php
require_once("../../connexiondb.php");
session_start();
if (!isset($_SESSION['data'])) {
    header("location:../../index.php");
} else {
    $data = $_SESSION['data'];
    $sql = $db->prepare("SELECT  U.*,M.* from message M join user U on U.id=M.id_M where M.id_user=? GROUP BY M.id_M");
    $sql->execute([$data['id']]);
    $users = $sql->fetchAll();
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

<body>
<div class="loder">
        <div></div>
    </div>
    <div class="div">
    <nav>
        <div class="logo">
            <img src="../../img/app_icon.png" alt="logo">
        </div>
        <ul id="list">
            <li><a href="../home/index.php">الرئيسية</a></li>
            <li><a href=" ../search/index.php">البحث عن منتوج</a></li>
            <li><a href="" style="opacity:1;">الرسائل</a></li>
            <li><a href="../../logout.php">تسجيل الخروج</a></li>
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
        <div class="arts">
            <?php foreach($users as $user ) {?>
            <a href="index.php?id=<?=$user['id']?>" class="art" style="color: black;">
                <h1 class="nom"><?= $user['nom'] . " " . $user['prenom'] ?></h1>
                <img src="../../img/ic_account_circle_grey.png" alt="" width="50px">
            </a><?php }?>
        </div>
        <div class="welcome">
            <table>
                <tr>
                    <td colspan="2" style="font-size:30px;">مرحبا بك <?= $data['nom']; ?> في فضاء الخضار إبدء بشراء المنتوجات </td>
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