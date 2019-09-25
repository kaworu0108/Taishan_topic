<?php
// $pdo = new PDO("mysql:host=localhost;dbname=s1080217;charset=utf8", "root", "");
include("sql.php");

switch ($_GET['do']) {
  case 'del':
    $sqldel = "DELETE FROM `showlist` WHERE id=" . $_POST['id'];
    $result = $db->query($sqldel);
    if ($result) echo 'delete finished';
    break;
  case 'select':
    $sqlsel = "SELECT * FROM `showlist`";
    $rows = $db->query($sql)->fetchAll();
    break;
  case 'login':
    $acc = $_POST['acc'];
    $pwd = $_POST['pwd'];
    $admin = "SELECT * FROM `userlist` WHERE `acc`='$acc' and `pwd`='$pwd'";
    $re = $db->query($admin)->fetchAll();

    if (!$re) {
      echo '對不起，您輸入的帳號或密碼錯誤';
    } else {
      session_start();
      $_SESSION['acc'] = $acc;
      echo '<script>alert("歡迎 ' . $_POST['acc'] . ' 登入")</script>';
      echo '<script>document.location.href="admin.php"</script>';
    };
    break;
  case 'logout':
    session_start();
    unset($_SESSION['acc']);
    // header("location:index.html");
    break;
  case 'update':
    // print_r($_GET['id']); 
    // print_r($_POST['content']);

    $sqlupdate = "UPDATE `showlist` SET `id`=" . $_GET['id'] . ",name='" . $_POST['name'] . "',date_front='" . $_POST['date_front'] . "',date_back='" . $_POST['date_back'] . "',place='" . $_POST['place'] . "',content='" . $_POST['content'] . "',link='" . $_POST['link'] . "',img='" . $_POST['img'] . "',showyear='" . $_POST['showyear'] . "' WHERE id=" . $_GET['id'];

    $rowupdate = $db->query($sqlupdate);

    header("location:admin_show.php");
    break;
};
// 上傳圖片
// $pic = $_FILES['img'];
// session_start();
// $_SESSION['img'] = $pic;
// if (!empty($_FILES)) {
//     $pic = $_FILES['img']['name'];
//     copy($_FILES['img']['tmp_name'], "upload/".$pic);
// };


?>