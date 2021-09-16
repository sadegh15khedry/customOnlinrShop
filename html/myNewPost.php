<?php
require_once "../php/DataBaseClass.php";
session_start();
//if (isset($_SESSION['id']))
    //echo "<script type='text/javascript'>alert(".$_SESSION['id'].");</script>";
$database_obj = DataBase::getInstance();
if (isset($_POST['submit'])&&!$_POST['text']=='') {
    $id = $_SESSION['id'];
    $inserted_item_id = $database_obj->addNewItem($id,$_POST['phone'] ,$_POST['title'],$_POST['cat'],$_POST['text'],$_POST['text']);
    $pname = $inserted_item_id.'.jpeg';
    $upload_dir = '../uploads/'.$pname;
    echo "<script type='text/javascript'>alert(".$_FILES['img']['tmp_name'].");</script>";
    move_uploaded_file($_FILES['img']['tmp_name'], $upload_dir);
    header("Location: myHome.php");

    //$title = $_POST['title'];
    //echo "<script type='text/javascript'>alert(".$title.");</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>آگهی جدید</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="../js/src/jquery-3.2.1.min%20(1).js"></script>
    <link rel="stylesheet" href="../resourse/bootstrap-3.3.7-dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../resourse/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/css/myNewPost.css">
</head>
<body>

<div class="container-fluid">
    <!--------------------------------------------- header ------------------------------------------------------------------------------>
    <div id="headers" class="row">
        <div id="location" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#location" data-slide-to="0"></li>
                <li data-target="#location" data-slide-to="1"></li>
                <li data-target="#location" data-slide-to="2" class="active"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img class="img-responsive header-img" src="../imgs/3.jpg" width="100%">
                </div>
                <div class="item">
                    <img class="img-responsive header-img" src="../imgs/2.jpg" width="100%">
                </div>
                <div class="item">
                    <img class="img-responsive header-img" src="../imgs/1.jpg" width="100%">
                </div>
            </div>
            <a class="right carousel-control" href="#location" data-slide="prev">
                <span id="#gly_r" class="glyphicon glyphicon-chevron-right"></span>
            </a>
            <a class="left carousel-control" href="#location" data-slide="next">
                <span id="#gly_l" class="glyphicon glyphicon-chevron-left"></span>
            </a>
        </div>
    </div>
    <!--------------------------------------------------------- navbar ------------------------------------------------------------------>
    <div class="row" id="fist-row">
        <nav class="  navbar-inverse " role="navigation" id="hor-nav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle"
                        data-toggle="collapse" data-target="#collapse">
                    <span class="sr-only">toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="collapse">
                <?php
                if (isset($_SESSION['id']))
                    echo '<ul class="nav navbar-nav navbar-right">
                            <li><a class="active" href="myHome.php">فروشگاه</a></li>
                            <li><a href="myNewPost.php">ثبت آگهی</a></li>
                            <li><a  href="../php/logOut.php">خروج</a></li>
                        </ul>';
                else{
                    echo '<ul class="nav navbar-nav navbar-right">
                            <li><a class="active" href="myHome.php">فروشگاه</a></li>
                            <li><a href="myLogin.php">ورود</a></li>
                            <li><a href="mySignup.php">ثبت نام</a></li>
                            </ul>';
                }

                ?>
            </div>
        </nav>

    </div>


    <!---------------------------------------------------- sec ----------------------------------------------------------------------------->
    <div class="row bg-primary">
        <div class="col-sm-12" id="sec_rapper">
        <form name="input_post" method="POST"  enctype="multipart/form-data" id="#input_post_form" action="myNewPost.php">
            <div class="form-group">
                <label  for="input_title" >نام کالا</label>
                <input name="title" class="form-control" type="text" id="input_title">
            </div>
            <div class="form-group">
                <label for="input_genre">دسته</label>
                <select name="cat" class="form-control" id="input_genre">
                    <option value="1" >لبتاب</option>
                    <option value="3">موس</option>
                    <option value="4">کیبورد</option>
                    <option value="5">هدفون</option>
                    <option value="6">اسپیکر</option>
                    <option value="7">وبکم</option>
                    <option value="8">میکروفن</option>
                    <option value="9">مانیتور</option>
                </select>
            </div>
            <div class="form-group">
                <label for="input_phone">شماره تلفن</label>
                <input name="phone" class="form-control" type="text" id="input_phone">
            </div>
            <div class="form-group">
                <label for="input_des">توضیحات</label>
                <textarea name="text" class="form-control" rows="10" id="input_des"></textarea>
            </div>
            <div class="form-group">
                <label for="input_img">عکس</label>
                <input  type="file" id="input_img" name="img">
            </div>
            <input name="submit" id="item_submit" class="btn text-center" type="submit" value="ارسال">
            </form>
        </div>
    </div>
    <!---------------------------------------------------- footer ----------------------------------------------------------------------->
    <div id="footer">
        <p class="col-sm-12" id="ft_txt" >این سایت توسط صادق خدری با شماره دانشجویی 950212647 آماده شده است</p>
    </div>

</div>
<script src="../js/src/jquery-3.2.1.min%20(1).js"></script>
<script src="../js/jsFiles/scroll.js"></script>
<script src="../resourse/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>
</html>