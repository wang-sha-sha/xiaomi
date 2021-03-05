<?php
	header("Content-type:text/html;charset=utf-8");
	$id = $_GET["goodsId"];
	// 定义数组，用于存储数据库的返回值
	$arr = [];
	
	// 1. 创建连接对象
	$conn = mysql_connect("127.0.0.1:3306","root","root");
	if($conn){
		// 2.选择库
		mysql_select_db("2012");
	}
	//3.从数据库获取物品详情信息
	$result = mysql_query("select * from t_goods_detail where goods_id='$id'",$conn);

	while($obj = mysql_fetch_assoc($result)){
		// echo $obj["id"]." ".$obj["name"]." ".$obj["price"];
		$arr = ["goods_img"=>$obj["goods_img"],"goods_title"=>$obj["goods_title"],"goods_adv"=>$obj["goods_adv"],"goods_descr"=>$obj["goods_descr"],"goods_shop"=>$obj["goods_shop"],"goods_price"=>$obj["goods_price"],"goods_price_counted"=>$obj["goods_price_counted"],"goods_address_1"=>$obj["goods_address_1"],"goods_address_2"=>$obj["goods_address_2"],"goods_address_3"=>$obj["goods_address_3"],"goods_colorArr"=>$obj["goods_colorArr"],"goods_versionArr"=>$obj["goods_versionArr"]];
		echo json_encode($arr);	
	}
	
	//4.关闭连接对象
	mysql_close($conn);
	
?>