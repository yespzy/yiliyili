// JavaScript Document
//弹出框启动
//表单验证
var nameObj;
var pswObj;

var namePD = false;
var pswPD = false;
var loginPD = false;

//获取控件
window.onload = function() {
	nameObj = document.getElementById("inputName");
	pswObj = document.getElementById("password");
}
function checkForm(){
	namePD = checkName();
	pswPD = checkPsw();
	var flag = namePD && pswPD;
	return flag;
}
//验证用户名
function checkName(){
	var value = nameObj.value;
	if (!value) {
			$(function () { $('.nameMsg_1').popover('show');});
			return false;
		}else {
			$(function () { $('.nameMsg_1').popover('hide');});
			return true;
		}
}
//验证密码
function checkPsw(){			
	var value = pswObj.value;
	if (!value) {
			$(function () { $('.pswMsg_1').popover('show');});
			return false;
		}else {
			$(function () { $('.pswMsg_1').popover('hide');});
			return true;
		}
}