<?php
function urlMsg($msg,$url)
{
    echo "<script language='javascript'>alert('".$msg."');location.href='$url';</script>";
}

function goBakMsg($msg)
{
    echo "<script language='javascript'>alert('".$msg."');history.go(-1);</script>";
}
if ($_POST){
    $servername = "127.0.0.1";
    $userName = "root";
    $passWord = "123456";
    $dbname = "week15php";

    $username = $_POST["username"];
    $password = $_POST["password"];

    // 创建连接
    $conn = new mysqli($servername, $userName, $passWord, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }
    $sql1 = "SELECT * FROM user";

    $result = $conn->query($sql1);

    if ($result->num_rows > 0) {
        // 输出数据
        while($row = $result->fetch_assoc()) {
            if ($row["username"]!=$username){
                goBakMsg("修改失败,没有此用户");
                return false;
            }else{
                if ($row["password"]!=$password){
                    $sql = "UPDATE user SET password='{$password}' WHERE username='{$username}'";
                    $result = $conn->query($sql);
                    urlMsg("修改密码成功","personalMsg.php");
                }else{
                    goBakMsg("修改失败,密码重复");
                    return false;
                }
            }
        }
    } else {
        echo "0 结果";
    }
    $conn->close();
    die();
}
?>
<script type="text/javascript">
    function check(){
        if(document.login.username.value==""){
            alert("请输入用户名");
            document.login.username.focus();
            return false;}
        if(document.login.password.value==""){
            alert("请输入密码");
            document.login.password.focus();
            return false;
        }
    }
</script>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>修改密码</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <link href="favicon.ico" rel="shortcut icon" />
</head>
<body style=" background: url(http://global.bing.com/az/hprichbg/rb/RavenWolf_EN-US4433795745_1920x1080.jpg) no-repeat center center fixed; background-size: 100%;">
<div class="modal-dialog" style="margin-top: 10%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-center" id="myModalLabel">修改密码</h4>
        </div>
        <div class="modal-body" id = "model-body">
            <form name="login" action="?" method="post" onSubmit="return check();">
                <div class="form-group">
                    <input type="text" class="form-control"placeholder="用户名" autocomplete="off" name="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="密码" autocomplete="off" name="password">
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">登录</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
