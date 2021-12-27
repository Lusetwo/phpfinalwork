<?php
$servername = "127.0.0.1";
$username = "root";
$password = "123456";
$dbname = "week15php";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
$sql2 = "insert into user (username,password) values ('苹果','123456')";
$sql = "SELECT * FROM user";

$result = $conn->query($sql);
$res = $conn->query($sql2);
if($res){
    echo "插入成功";
}else{
    echo mysqli_error($conn);
}

if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        echo "username: " . $row["username"]. " - Password: " . $row["password"]. "";
    }
} else {
    echo "0 结果";
}
$conn->close();
?>