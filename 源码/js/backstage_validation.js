// JavaScript Document
//弹出框启动
//表单验证
var seachObj;

var seachseachPD = false;
//获取控件
window.onload = function() {
	seachObj = document.getElementById("seach");
}

function checkForm() {
	seachPD = checkSeach();
	var flag = seachPD;
	return flag;
}
//验证搜索栏
function checkSeach() {
	var value = seachObj.value;
	if (!value) {
		$(function() {
			$('.seachMsg').popover('show');
		});
		console.log('搜索栏验证');
		return false;
	} else {
		$(function() {
			$('.seachMsg').popover('hide');
		});
		return true;
	}
}
