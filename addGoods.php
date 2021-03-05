<?php
	header("Content-type:text/html;charset=utf-8");
	$order_id = $_POST["order_id"];
	$user_id = $_POST["user_id"];
	$goods_id = $_POST["goods_id"];
	$goods_title = $_POST["goods_title"];
	$goods_color = $_POST["goods_color"];
	$goods_version = $_POST["goods_version"];
	$goods_price = $_POST["goods_price"];
	$goods_count = $_POST["goods_count"];
	
	// 1. 创建连接对象
	$conn = mysql_connect("127.0.0.1:3306","root","root");
	if($conn){
		// 2.选择库
		mysql_select_db("2012");
	}
	// 3. 增加数据
	mysql_query("insert into t_order values ($order_id,$user_id,$goods_id,'$goods_title','$goods_color','$goods_version',$goods_price, $goods_count)",$conn);
	
	//4.关闭连接对象
	mysql_close($conn);
?>