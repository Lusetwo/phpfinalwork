<?php
function urlMsg($msg,$url)
{
    echo "<script language='javascript'>alert('".$msg."');location.href='$url';</script>";
}

function goBakMsg($msg)
{
    echo "<script language='javascript'>alert('".$msg."');history.go(-1);</script>";
}
if ($_POST) {
    $servername = "127.0.0.1";
    $userName = "root";
    $passWord = "123456";
    $dbname = "week15php";


    $usrNo = $_POST["usrNo"];
    $username = $_POST["username"];
    $idCard = $_POST["idCard"];
    $class = $_POST["class"];
    $college = $_POST["college"];
    $loves = $_POST["choose"];
    if ($loves==1){
        $loves = "篮球";
    }elseif ($loves==2){
        $loves = "足球";
    }elseif ($loves==3){
        $loves = "羽毛球";
    }else{
        $loves = "跑步";
    }

    // 创建连接
    $conn = new mysqli($servername, $userName, $passWord, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }
    $sql = "insert into userInfo (username,idCard,class,college,lovers) values ('{$username}','{$idCard}','{$class}','{$college}','{$loves}')";
    $res = $conn->query($sql);
    if($res){
        echo "插入成功";
    }else{
        echo mysqli_error($conn);
    }
    $conn->close();
    Header("Location: login.php");
    die();
}
?>
<script type="text/javascript">
    function check(){
        if(document.personalMsg.usrNo.value==""){
            alert("请输入学号");
            document.personalMsg.usrNo.focus();
            return false;}
        if(document.personalMsg.username.value==""){
            alert("请输入姓名");
            document.personalMsg.username.focus();
            return false;
        }
        if(document.personalMsg.idCard.value==""){
            alert("请输入身份证");
            document.personalMsg.idCard.focus();
            return false;
        }
        if(document.personalMsg.class.value==""){
            alert("请输入班级");
            document.personalMsg.class.focus();
            return false;
        }
        function selectOne() {
            var names = document.getElementsByName("choose");
            var flag = false ;//标记判断是否选中一个
            for(var i=0;i<names.length;i++){
                if(names[i].checked){
                    flag = true ;
                    break ;
                }
            }
            if(!flag){
                alert("请最少选择一项！");
                return false ;
            }
        }
        function verificationPicFile(file) {
            var fileTypes = [".jpg", ".png",".jpeg",".gif",];
            var filePath = file.value;
            //当括号里面的值为0、空字符、false 、null 、undefined的时候就相当于false
            if(filePath){
                var isNext = false;
                var fileEnd = filePath.substring(filePath.indexOf("."));
                for (var i = 0; i < fileTypes.length; i++) {
                    if (fileTypes[i] == fileEnd) {
                        isNext = true;
                        break;
                    }
                }
                if (!isNext){
                    alert('不接受此文件类型');
                    file.value = "";
                    return false;
                }
            }else {
                return false;
            }
        }
        selectOne();
        verificationPicFile(file);
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
            <h4 class="modal-title text-center" id="myModalLabel">添加个人信息</h4>
        </div>
        <div class="modal-body" id = "model-body">
            <form name="personalMsg" action="?" method="post" onSubmit="return check();">
                <div class="form-group">
                    <input type="text" class="form-control"placeholder="学号" autocomplete="off" name="usrNo">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="姓名" autocomplete="off" name="username">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="身份证" autocomplete="off" name="idCard">
                </div>
                <div class="form-group">
                    <select class="form-control" name="college">
                        <option>大数据与计算机学院</option>
                        <option>电气与信息工程学院</option>
                        <option>外国语学院</option>
                        <option>建筑工程学院</option>
                        <option>机电工程学院</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="班级" autocomplete="off" name="class">
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary"><input ref="file" type="file" name="file"></button>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="choose" iconcolor="#ce53c1" value="1">
                    <label class="label-box">篮球</label>
                    <input type="checkbox" name="choose" iconcolor="#ce53c1" value="2">
                    <label class="label-box">足球</label>
                    <input type="checkbox" name="choose" iconcolor="#ce53c1" value="3">
                    <label class="label-box">羽毛球</label>
                    <input type="checkbox" name="choose" iconcolor="#ce53c1" value="4">
                    <label class="label-box">跑步</label>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary form-control">添加</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
