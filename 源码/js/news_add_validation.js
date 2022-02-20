// JavaScript Document
//弹出框启动
//表单验证
var titleObj;
var contentObj;

var titlePD = false;
var contentPD = false;
//获取控件
window.onload = function() {
	titleObj = document.getElementById("news_title");
	contentObj = document.getElementById("news_content");
}
function checkForm(){
	titlePD = checkTitle();
	contentPD = checkContent();
	var flag = titlePD && contentPD;
	checkRadio();
	return flag;
}
//验证标题
function checkTitle(){
	var value = titleObj.value;
	if (!value) {
			$(function () { $('.titleMsg').popover('show');});
			console.log('新闻标题验证');
			return false;
		}else {
			$(function () { $('.titleMsg').popover('hide');});
			return true;
		}
}
//验证内容
function checkContent(){			
	var value = contentObj.value;
	if (!value) {
			$(function () { $('.contentMsg').popover('show');});
			console.log('新闻内容验证');
			return false;
		}else {
			$(function () { $('.contentMsg').popover('hide');});
			return true;
		}
}
//设置单选框默认选项
//获取单选框的值
function checkRadio(){
	var btn= $(".btn:checked").val();
	console.log('输出信息:');
	console.log(btn);
}