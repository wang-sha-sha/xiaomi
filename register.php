<?php
	header("Content-type:text/html;charset=utf-8");
	$userName = $_POST["userName"];
	$password = $_POST["password"];
	// echo $userName." ".$password;
	// 1. 创建连接对象
	$conn = mysql_connect("localhost:3306","root","root");
	if($conn){
		// 2.选择库
		mysql_select_db("2012");
	}
	//3.注册添加数据
	mysql_query("insert into account (user_name, password) values ('$userName','$password')",$conn);
	//4.关闭连接对象
	mysql_close($conn);
	
	// 跳转到登录页面
	header("Location:login.html");

?>
