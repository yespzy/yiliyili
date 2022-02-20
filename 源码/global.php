<?php
header("Content-type:text/html;charset=utf-8");
$conn = mysqli_connect('localhost', 'root', 'root', 'yiliyili');
mysqli_query($conn, "SET NAMES 'UTF8'");

session_start();

//数据信息验证
function _ESC($value){
	if(!get_magic_quotes_gpc()){//判断系统是否有自动转义
		//适用于三维数组的情况
		if(is_array($value)){
			foreach($value as $key=>$val){
				$value[$key]=_ESC($val);
			}
		}
		$value = str_replace('_', '\_', $value);
		$value = str_replace('%', '\%', $value);
		$value = nl2br($value);
		$value=addslashes($value);
	}
	return $value;
}
?>