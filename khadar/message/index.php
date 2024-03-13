<?php
require_once("../../connexiondb.php");
session_start();
if (!isset($_SESSION['data'])) {
    header("location:../../index.php");
} else {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $data = $_SESSION['data'];
        $sql1 = $db->prepare("SELECT * FROM message where id_user=? and id_M=?");
        $sql1->execute([$data['id'],$_GET['id']]);
        $messages1 = $sql1->fetchAll();
        $sql2 = $db->prepare("SELECT * FROM user where id=?");
        $sql2->execute([$_GET['id']]);
        $user = $sql2->fetch();
        if (isset($_POST['sb'])) {
            extract($_POST);
            $sql3 = $db->prepare("INSERT INTO message (envoyer,id_user,id_M)values(?,?,?)");
            $sql3->execute([$message, $data['id'],$_GET['id']]);
            $sql4 = $db->prepare("INSERT INTO message (recevoire,id_user,id_M)values(?,?,?)");
            $sql4->execute([$message, $_GET['id'],$data['id']]);
            header("location:index.php?id=" . $_GET['id'] . "");
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
                <li><a href="../search/index.php">البحث عن منتوج</a></li>
                <li><a href="../message/conversation.php" style="opacity:1;">الرسائل</a></li>
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
                <div class="conversation">
                    <div class="header">
                        <h1 class="nom"><?= $user['nom'] . " " . $user['prenom']  ?></h1>
                        <img src="../../img/ic_account_circle_grey.png" alt="" width="50px">
                    </div>
                    <div class="messages">
                        <?php if (empty($messages1)) { ?>
                            <h1 align='center'>مرحبا في محادتة جديدة</h1>
                            <?php } else {
                            foreach ($messages1 as $message1) { ?>
                                <div class="msg1" style=<?php if ($message1['recevoire'] == 1) {
                                                                echo 'display:none;';
                                                            } ?>>
                                    <p class="envoyer"><?= $message1['recevoire'] ?></p>
                                </div>
                                <div  class="msg2" style=<?php if ($message1['envoyer'] == 1) {
                                                                    echo 'display:none;';
                                                                } ?>>
                                    <p class="recevoire"><?= $message1['envoyer'] ?></p>
                                </div><br>
                            <?php }
                            ?>
                        <?php } ?>

                    </div>
                    <form action="#" method="post">
                        <input type="text" name="message" class="message">
                        <button type="submit" class="send" name="sb">ارسل</button>
                    </form>
                </div>
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