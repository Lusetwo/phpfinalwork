<?php

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
    $sql2 = "insert into user (username,password) values ('{$username}','{$password}')";

    $res = $conn->query($sql2);
    if($res){
        echo "插入成功";
    }else{
        echo mysqli_error($conn);
    }

//    if ($result->num_rows > 0) {
//        // 输出数据
//        while($row = $result->fetch_assoc()) {
//            echo "username: " . $row["username"]. " - Password: " . $row["password"]. "";
//        }
//    } else {
//        echo "0 结果";
//    }
    $conn->close();
    Header("Location: login.php");
    die;
}
?>
<script type="text/javascript">
    function check(){
        if(document.register.username.value==""){
            alert("请输入用户名");
            document.register.username.focus();
            return false;}
        if(document.register.password.value==""){
            alert("请输入密码");
            document.register.password.focus();
            return false;
        }if(document.register.password.value.length<6){
            alert("密码不能少于6位");
            document.register.password.focus();
            return false;
        }
        if(document.register.password_confirm.value==""){
            alert("请输入确认密码");
            document.register.password_confirm.focus();
            return false;
        }
        if(document.register.password.value!=document.register.password_confirm.value){
            alert("两次输入密码不一致");
            document.register.password_confirm.focus();
            return false;
        }

        alert("注册成功")
    }
</script>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>注册</title>
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
            <h4 class="modal-title text-center" id="myModalLabel">注册</h4>
        </div>
        <div class="modal-body" id = "model-body">
            <form name="register" action="?" method="post" onSubmit="return check();">
                <div class="form-group">
                    <input type="text" class="form-control"placeholder="用户名" autocomplete="off" name="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="密码" autocomplete="off" name="password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="确定密码" autocomplete="off" name="password_confirm">
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">注册</button>
                    </div>
                </div>
            </form>
            <div class="alert alert-success" role="alert"><a href="login.php">已注册？请登录</a></div>
        </div>
    </div>
</body>
