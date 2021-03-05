<?php
	header("Content-type:text/html;charset=utf-8");
	$userName = $_POST["userName"];
	$password = $_POST["password"];
	// 1. 创建连接对象
	$conn = mysql_connect("127.0.0.1:3306","root","root");
	if($conn){
		// 2.选择库
		mysql_select_db("2012");
	}
	//3.登录查询数据
	$result = mysql_query("select * from t_account where user_name = '$userName' and password ='$password'",$conn);
	// echo mysql_num_rows($result);

	
	if(mysql_num_rows($result)==1){
		echo $userName;
	}else{
		echo "失败";
	}

	//4.关闭连接对象
	mysql_close($conn);
?>