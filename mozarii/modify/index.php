<?php
require_once("../../connexiondb.php");
session_start();
if (!isset($_SESSION['data'])) {
    header("location:../../index.php");
} else {
    $data = $_SESSION['data'];
    $id = $_GET['id_produit'];
    $sql = $db->prepare("SELECT * FROM produits WHERE id_produit=?");
    $sql->execute([$id]);
    $pro = $sql->fetch();
    if(isset($_POST['sb'])){
        extract($_POST);
        if(!isset($_FILES)){
            $image = $pro['image'];
            $typeimg = $pro['type_image'];
            $nameimg = $pro['name_img'];    
        }
        else{
            $image = file_get_contents($_FILES['image']['tmp_name']);
            $typeimg = $_FILES['image']['type'];
            $nameimg = $_FILES['image']['name'];
            }
        $sql =null;
        $sql = $db ->prepare("UPDATE produits set nomProduit=? , quatite=? , prix=?
        , image=? , type_image=? , name_img=? , dateProduction=? WHERE id_produit=?");
        $sql->execute([$nom,$quatite,$prix,$image,$typeimg,$nameimg,$date,$id]);
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
            <li><a href="../add/index.php" style="opacity:1;">إضافة منتوج</a></li>
            <li><a href="">منتوجاتي</a></li>
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
                <?php
                $image = "data:" . $pro['type_image'] . ";base64," . base64_encode($pro['image']);
                ?>
                <h1 style="text-align: center;">إضافة منتوج</h1>
                <img src="<?=$image?>" alt="" width="200px" style="align-self: center;">
                <input type="text" name="nom" placeholder="ادخل اسم الخضر او الفاكهة" value="<?= $pro['nomProduit'] ?>" required><br>
                <input type="number" name="quatite" placeholder="الكمية الكلوغرام" value="<?= $pro['quatite'] ?>" required><br>
                <input type="number" name="prix" placeholder="الثمن" value="<?= $pro['prix'] ?>" required><br>
                <label for="img">صورة للمنتوج:</label>
                <input type="file" accept="image/*" name="image" id="img" value="test.jpg" ><br>
                <label for="date">:تاريخ الانتاج</label>
                <input type="date" name="date" id="date" placeholder="تاريخ الانتاج" value="<?= $pro['dateProduction'] ?>" required><br>
                <button type="submit" name="sb">إضافة</button>
                </fieldset>
            </form>
        </div>
        <div class="welcome">
            <h2><span style="text-align: center;"><?= $data['nom']; ?></span> مرحبا</h2>
            <p>مرحبا بك في موقعك <br>إبدء بنشر منتوجك و قم ببيعه</p>
            <p><span><?= $data['prenom']; ?></span>: الاسم</p>
            <p><span><?= $data['nom']; ?></span>: النسب</p>
            <p><span><?= $data['tel']; ?></span>: رقم الهاتف</p>
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