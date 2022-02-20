$.ajax({
 	type: "GET",
 	url: "https://interface.sina.cn/news/wap/fymap2020_data.d.json",
 	dataType: 'jsonp',
 	crossDomain: true,
 	success: function(data) {
 		show_data(data.data);
		biao_data(data.data.list);
		waibiao_data(data.data.otherlist);
 	}
 });
 // 装载数据
 function show_data(data){
	 // 获取对象,并赋值
	 
  $("#jiezhitime").text(data.times);//截止日期
	// 国内的
  $("#guonei_biaobox div:nth-child(1) p:nth-child(2)").text(data.gntotal);//国内累计
  $("#guonei_biaobox div:nth-child(2) p:nth-child(2)").text(data.deathtotal);//累计死亡
  $("#guonei_biaobox div:nth-child(3) p:nth-child(2)").text(data.curetotal);//累计治愈
  $("#guonei_biaobox div:nth-child(4) p:nth-child(2)").text(data.econNum);//现有确诊
  $("#guonei_biaobox div:nth-child(5) p:nth-child(2)").text(data.heconNum);//现有重症
  $("#guonei_biaobox div:nth-child(6) p:nth-child(2)").text(data.jwsrNum);//境外输入性病例
  $("#guonei_biaobox div:nth-child(1) p:nth-child(3)").text(data.add_daily.addcon_new);//较昨日累计新增确诊
  $("#guonei_biaobox div:nth-child(2) p:nth-child(3)").text(data.add_daily.adddeath_new);//较昨日累计新增死亡
  $("#guonei_biaobox div:nth-child(3) p:nth-child(3)").text(data.add_daily.addcure_new);//较昨日累计新增治愈
  $("#guonei_biaobox div:nth-child(4) p:nth-child(3)").text(data.add_daily.addecon_new);//现有确诊较昨日。。
  $("#guonei_biaobox div:nth-child(5) p:nth-child(3)").text(data.add_daily.addhecon_new);//现有重症较昨日。。
  $("#guonei_biaobox div:nth-child(6) p:nth-child(3)").text(data.add_daily.addjwsr);//新增境外输入病例较昨日。。
	// 国外的
  $("#jingwai_biaobox div:nth-child(1) p:nth-child(2)").text(data.othertotal.certain);//国内累计
  $("#jingwai_biaobox div:nth-child(2) p:nth-child(2)").text(data.othertotal.die);//累计死亡
  $("#jingwai_biaobox div:nth-child(3) p:nth-child(2)").text(data.othertotal.recure);//累计治愈
  $("#jingwai_biaobox div:nth-child(1) p:nth-child(3)").text(data.othertotal.certain_inc);//较昨日累计新增确诊
  $("#jingwai_biaobox div:nth-child(2) p:nth-child(3)").text(data.othertotal.die_inc);//较昨日累计新增死亡
  $("#jingwai_biaobox div:nth-child(3) p:nth-child(3)").text(data.othertotal.recure_inc);//较昨日累计新增治愈
 }
 function biao_data(list){
	  var string;
	 for(let i=0;i<list.length;i++){
		 string = "";
		 for(let y=0 ;y<list[i].city.length;y++){//遍历地市级
				string += "<li>"+
				"<div>"+
					"<span>"+list[i].city[y].name+"</span>"+
					"<span>"+list[i].city[y].conadd+"</span>"+
					"<span>"+list[i].city[y].conNum+"</span>"+
					"<span>"+list[i].city[y].deathNum+"</span>"+
					"<span>"+list[i].city[y].cureNum+"</span>"+
					"<span>"+list[i].city[y].econNum+"</span>"+
				"</div>"+
			"</li>";
			}
		$("#guonei_biaoge_ul").append(
		"<li>"+
			"<div>"+
				"<span>"+list[i].name+"</span>"+
				"<span>"+list[i].conadd+"</span>"+
				"<span>"+list[i].value+"</span>"+
				"<span>"+list[i].deathNum+"</span>"+
				"<span>"+list[i].cureNum+"</span>"+
				"<span>"+list[i].econNum+"</span>"+
			"</div>"+
			"<ul>"+
				string+
			"</ul>"+
		"</li>"
		); 
		//监听与简单滑动
		$("#guonei_biaoge_ul>li:nth-child("+i+")").click(function(){
			$("#guonei_biaoge_ul>li:nth-child("+i+") ul").slideToggle(500);
			});
	 }
	 //给最后一个装监听
	 $("#guonei_biaoge_ul>li:last").click(function(){
	 	$("#guonei_biaoge_ul>li:last ul").slideToggle(500);
	 	});
	$("#guonei_biaoge_ul li ul").slideUp();
	$("#guonei_biaoge_ul>li:even").css("background-color","#eee");
	$("#guonei_biaoge_ul>li:odd").css("background-color","#e9f6ff");
 }
 function waibiao_data(list){
 	 for(let i=0;i<list.length;i++){
 		$("#guowai_biaoge_ul").append(
 		"<li>"+
 			"<div>"+
 				"<span>"+list[i].name+"</span>"+
 				"<span>"+list[i].conadd+"</span>"+
 				"<span>"+list[i].value+"</span>"+
 				"<span>"+list[i].deathadd+"</span>"+
 				"<span>"+list[i].deathNum+"</span>"+
 				"<span>"+list[i].cureNum+"</span>"+
 			"</div>"+
 			"<ul>"+
 			"</ul>"+
 		"</li>"
 		); 
 	 }
	 
	 $("#guowai_biaoge_op").click(function(){
		  $("#guowai_biaoge_ul").slideToggle(500,function(){
			if(/点击关闭/.test($("#guowai_biaoge_op span a").text())){
				$("#guowai_biaoge_op span a").text("点击打开");
			}
			});
	 });
	 $("#guowai_biaoge_ul").click(function(){
	 		  $("#guowai_biaoge_ul").slideToggle(500,function(){
			if(/点击关闭/.test($("#guowai_biaoge_op span").text())){
				$("guowai_biaoge_op span a").html("点击打开");
			}
			});
	 });
	 
 	$("#guowai_biaoge_ul>li:even").css("background-color","#eee");
 	$("#guowai_biaoge_ul>li:odd").css("background-color","#e9f6ff");
 }
 

