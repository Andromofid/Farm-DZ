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
    <a href="mozarii/index.php" class="link" id="link1">
        <img src="img/logo_1.png" alt="" class="img1">
        <p>
            <span>المزارع</span><br>
            قم يعرض منتجاتك على جميع تجار <br>الخضروات و الفواكه بسهولة
        </p>
        <img src="img/ic_navigate_before_grey.png" alt="" class="img2">
    </a>
    <a href="khadar/index.php" class="link" id="link2">
        <img src="img/logo_2.png" alt="" class="img1">
        <p>
            <span>خضار</span><br>
            تسوق آلاف المنتجات المعروضة من <br> المزارعين مباشرة
        </p>
        <img src="img/ic_navigate_before_grey.png" alt="" class="img2">
    </a>
</body>
<script>
    var loder = document.querySelector(".loder");
    var A = document.querySelectorAll(".link");
    var body = document.body;
    window.onload=()=>{
        loder.style.display='none';
        for(var a of A){
            a.style.display='flex';
        }
        body.style.backdropFilter='blur(0px)';
    }
</script>

</html>