
<?php
session_start();
require_once "../php/DataBaseClass.php";
$db_answer = null;
$database_obj = DataBase::getInstance();

if (isset($_POST['submit'])&&!$_POST['email']=='') {

//echo "<script type='text/javascript'>alert('');</script>";
    $db_answer = $database_obj->signup($_POST['fname'], $_POST['lname'], $_POST['uname'], $_POST['email'], $_POST['password'], $_POST['repassword']);

    if ($db_answer == "pass") {
        $message = "پسورد به درستی وارد نشده است";
        echo "<script type='text/javascript'>alert('pass');</script>";

    } else if ($db_answer == "email") {
        $message = "ایمیل تکراری است";
        echo "<script type='text/javascript'>alert('email');</script>";
    } else if ($db_answer == "uname") {
        $message = "نام کاربری تکراری است";
        echo "<script type='text/javascript'>alert('uname');</script>";
    } else {
        //echo "<script type='text/javascript'>alert('" .$db_answer. "');</script>";
        $_SESSION["id"]=$db_answer;
        $_SESSION['email']=$_POST['email'];
        header("Location: myHome.php");
    }
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>ثبت نام</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="../js/src/jquery-3.2.1.min%20(1).js"></script>
    <link rel="stylesheet" href="../resourse/bootstrap-3.3.7-dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../resourse/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/css/mySignup.css">
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
            <div id="signup_rapper">
                <form name="signup_form" method="POST" id="#signup_form" action="mySignup.php">
                    <div class="form-group">
                        <label  for="fist_name_field" >نام</label>
                        <input name="fname" class="form-control" type="text" id="fist_name_field" value="">
                    </div>
                    <div class="form-group">
                        <label  for="last_name_field" >نام خانوادگی</label>
                        <input name="lname" class="form-control" type="text" id="last_name_field" value="">
                    </div>
                    <div class="form-group">
                        <label  for="username_field" >نام کاربری</label>
                        <input name="uname" class="form-control" type="text" id="username_field" value="">
                    </div>
                    <div class="form-group">
                        <label  for="email_field" >ایمیل</label>
                        <input name="email" class="form-control" type="text" id="email_field" value="">
                        <div id="email_err"></div>
                    </div>
                    <div class="form-group">
                        <label for="pass_field">پسورد</label>
                        <input name="password" class="form-control" type="password" id="pass_field">
                    </div>
                    <div class="form-group">
                        <label for="re_pass_field">تکرار پسورد</label>
                        <input name="repassword" class="form-control" type="password" id="re_pass_field">
                    </div>
                    <div id="signup_err">
                    </div>
                    <input name="submit" id="signup_submit" class="btn text-center" type="submit" value="ثبت نام">
                </form>
            </div>
        </div>

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