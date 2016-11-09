<?php
$user = array
	(
		array("username" => "小艺", "password" => "101", "verify" => "123"),
		array("username" => "啊艺", "password" => "102", "verify" => "123")
		
	);

//判断如果是get请求，则进行搜索；如果是POST请求，则进行新建
//$_SERVER是一个超全局变量，在一个脚本的全部作用域中都可用，不用使用global关键字
//$_SERVER["REQUEST_METHOD"]返回访问页面使用的请求方法

	//isset检测变量是否设置；empty判断值为否为空
	//超全局变量 $_GET 和 $_POST 用于收集表单数据
	if (!isset($_POST["username"])&&!isset($_POST["password"]) &&!isset($_POST["verify"])) {
		echo "参数错误哈";
		return;
	}
	//函数之外声明的变量拥有 Global 作用域，只能在函数以外进行访问。
	//global 关键词用于访问函数内的全局变量
	global $user;
	//获取number参数
	$username = $_POST["username"];
	$password = $_POST["password"];
	$verify = $_POST["verify"];
	$result = "用户名或密码错误";
	$autoFlag = $_POST['autoflag'];
	//遍历$staff多维数组，查找key值为number的员工是否存在，如果存在，则修改返回结果
	foreach ($user as $value) {
		if (($value["username"] == $username)&&($value["password"]=$password)&&($value["verify"]=$verify)) {
			$result = "登录成功！";
			if($autoFlag){
				setcookie("username",$value["username"],time()+7*24*3600);
				setcookie("password",$value["username"],time()+7*24*3600);
			}
			break;
		}
	}
    echo $result;

?>