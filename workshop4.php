<?php include "errordb.php"?>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form>
        <input type="text" name="name">
        <input type="submit" value="ค้นหา">
    </form>
    <?php
        $stmt = $pdo->prepare("SELECT * FROM member where name like ?");
        if(!empty($_GET))
        {
            $value = '%'.$_GET["name"].'%';
        }
        $stmt->bindParam(1,$value);
        $stmt->execute();
        while ($row = $stmt->fetch()): ?>
        ชื่อสมาชิก : <?=$row ["name"]?><br>
        ที่อยู่ : <?=$row ["address"]?><br>
        อีเมล์ :<?=$row ["email"]?><br>
        <div>
            <img src="member_photo/<?=$row ["username"]?>.jpg">
        </div>
        <hr><br>
        <?php endwhile;?>
</body>
</html>