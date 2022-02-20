$.ajax({
 	type: "GET",
 	url: "https://interface.sina.cn/news/wap/fymap2020_data.d.json",
 	dataType: 'jsonp',
 	crossDomain: true,
 	success: function(data) {
 		map_hua(data.data.list);
		map_xian(data.data.list);
		// haiwei_meigui(data.data.worldlist,data.data.times)
		//haiwaiyiqin();
	}
 });

 function map_hua(shuju){
	 
	 //初始化echarts实例
	     let myChart = echarts.init(document.getElementById('map_zg_ya'));
	     // 指定图表的配置项和数据
	     option = {
	       title: {
	         text: '累计确诊',
	         left: 'center'
	       },
	       tooltip: {
	         trigger: 'item'
	       },
	       legend: {
	         orient: 'vertical',
	         left: 'left',
	         data: ['累计确诊']
	       },
	       visualMap: {
	         type: 'piecewise',
	         pieces: [
	           { min: 10000, max: 1000000, label: '≥10000人', color: '#660208' },
	           { min: 1000, max: 9999, label: '1000-9999人', color: '#8c0d0d' },
	           { min: 500, max: 999, label: '100-999人', color: '#cc2929' },
	           { min: 100, max: 499, label: '10-99人', color: '#ff7b69' },
	           { min: 1, max: 99, label: '1-9人', color: '#ffaa85' },
			   
	         ],
	         color: ['#660208', '#8c0d0d', '#cc2929','#ff7b69','#ffaa85']
	       },
	       toolbox: {
	         show: true,
	         orient: 'vertical',
	         left: 'right',
	         top: 'center',
	         feature: {
	           mark: { show: true },
	           dataView: { show: true, readOnly: false },
	           restore: { show: true },
	           saveAsImage: { show: true }
	         }
	       },
	       roamController: {
	         show: true,
	         left: 'right',
	         mapTypeControl: {
	           'china': true
	         }
	       },
	       series: [
	         {
	           name: '确诊数',
	           type: 'map',
	           mapType: 'china',
	           roam: false,
	           label: {
	             show: true,
	             color: 'rgb(0,0,0)'
	           },
	           data: shuju
	         }
	       ]
	     };
	 
	     //使用指定的配置项和数据显示图表
	     myChart.setOption(option);
		 
		 $("#map_a").click();
 }
 
 function map_xian(shuju){
 	 
	for(let i = 0; i<shuju.length;i++){
			 shuju[i].value = shuju[i].econNum;
	}
	 console.log(shuju);
	 
 	 //初始化echarts实例
 	     let myChart = echarts.init(document.getElementById('map_zg_xiancun'));
 	     // 指定图表的配置项和数据
 	     option = {
 	       title: {
 	         text: '现存确诊',
 	         left: 'center'
 	       },
 	       tooltip: {
 	         trigger: 'item'
 	       },
 	       legend: {
 	         orient: 'vertical',
 	         left: 'left',
 	         data: ['现存确诊']
 	       },
 	       visualMap: {
 	         type: 'piecewise',
 	         pieces: [
 	           
 	           { min: 1000, max: 9999, label: '1000-9999人', color: '#8c0d0d' },
 	           { min: 500, max: 999, label: '100-999人', color: '#cc2929' },
 	           { min: 100, max: 499, label: '10-99人', color: '#cc2929' },
 	           { min: 1, max: 99, label: '1-9人', color: '#ffaa85' },
			   { min: 0, max: 0, label: '0人', color: '#fff' },
 	         ],
 	         color: ['#8c0d0d', '#cc2929','#ff7b69','#ffaa85','#fff']
 	       },
 	       toolbox: {
 	         show: true,
 	         orient: 'vertical',
 	         left: 'right',
 	         top: 'center',
 	         feature: {
 	           mark: { show: true },
 	           dataView: { show: true, readOnly: false },
 	           restore: { show: true },
 	           saveAsImage: { show: true }
 	         }
 	       },
 	       roamController: {
 	         show: true,
 	         left: 'right',
 	         mapTypeControl: {
 	           'china': true
 	         }
 	       },
 	       series: [
 	         {
 	           name: '确诊数',
 	           type: 'map',
 	           mapType: 'china',
 	           roam: false,
 	           label: {
 	             show: true,
 	             color: 'rgb(0,0,0)'
 	           },
 	           data: shuju
 	         }
 	       ]
 	     };
 	 
 	     //使用指定的配置项和数据显示图表
 	     myChart.setOption(option);
 }
 
 
 
 
 // function haiwei_meigui(shuju,times){
	//  var legenddata= [];//图例
	//  let listname = [];//名称
	//   //显示的吧，也不知道是干什么的
	//    let listdou = [];
	// 	listdou[0] = ['Country','Confirmed','SQRT','Dead'];
	// 	let xunhuan_x = 1;
	// 	let xunhuan_Y = 0;
	//    for(let i=1;i<shuju.length;i++){
	// 	 if(parseInt(shuju[i].value)>5000)//大于5000确诊
	// 	 {	//图例赋值
	// 		 legenddata[xunhuan_Y] = new Object();//数据1
	// 		 legenddata[xunhuan_Y].name = shuju[i].name;
	// 		 legenddata[xunhuan_Y].Confirmed = parseInt(shuju[i].value);
	// 		 legenddata[xunhuan_Y].Dead = parseInt(shuju[i].deathNum);
	// 		 listname[xunhuan_Y] = shuju[i].name;//数据2国家名称
	// 		  xunhuan_Y++;
			
	// 		 listdou[xunhuan_x] = [//给数组赋值从第二个开始//数据3
	// 			 shuju[i].name,
	// 			 parseInt(shuju[i].value),
	// 			 parseInt(shuju[i].value)*0.1 ,//大小。
	// 			 parseInt(shuju[i].deathNum),
	// 		 ];
	// 		 xunhuan_x++;
	// 	 }
	//    }
	//    listdou.sort(function(a,b){
 //          return b[1]-a[1]});
	// 	 let myChart = echarts.init(document.getElementById('guowai_meigui'));
	// 	var option = {
	// 	dataset: {
	// 	 source: listdou
	// 	 },
	// 	 tooltip: {
	// 			 trigger: 'item',
	// 			 formatter: '{b} <br/>({d}%)'
	// 		 },
	// 	toolbox: {
	// 	 show: true,//false则不显示工具栏
	// 	 feature: {
	// 		 saveAsImage: {show: true,type:'jpeg'}
	// 	 }
	// 	},
	// 	title: {
	// 	 text: '海外疫情确诊超5000例玫瑰图',
	// 	 subtext:times ,
	// 	 x: '60%',
	// 	 y: '150',
	// 	 textStyle:
	// 	 {fontSize:27,
	// 	 fontWeight:'bold',
	// 	 fontFamily:'Microsoft YaHei',
	// 	 color:'#000'
	// 	 },
	// 	 subtextStyle:
	// 	 {
	// 		 fontStyle:'italic',
	// 		fontSize:14
	// 	 }
	// 	},
	// 	legend: {
	// 	 x: '45%',//水平位置，【left\center\right\数字】
	// 	 y: '350',//垂直位置，【top\center\bottom\数字】
	// 	 align:'left',//字在图例的左边或右边【left/right】
	// 	 orient:'vertical',//图例方向【horizontal/vertical】
	// 	 icon: "circle",   //图例形状【circle\rect\roundRect\triangle\diamond\pin\arrow\none】
	// 	 textStyle://图例文字
	// 	 {
	// 		 fontFamily:'微软雅黑',
	// 		 color:'#000',
			 
	// 	 },
	// 	 data:listname,
	// 	 formatter: function(params)  {
			
	// 		 for (var i=0;i<legenddata.length;i++){
	// 			   if (legenddata[i].name== params){
	// 				   return params+"\t确诊:"+legenddata[i].Confirmed+"\t死亡:"+legenddata[i].Dead;
	// 				  }
	// 		   }
	// 	 } 

	// 	},

	// 	calculable: true,
	// 	series: [
	// 	 {
	// 		 name: '半径模式',
	// 		 type: 'pie',
	// 		 clockWise: false ,
	// 		 radius: [10, 400],
	// 		 center: ['35%', '80%'],
	// 		 roseType: 'area',
	// 		encode: {
	// 		 itemName: 'Country',
	// 		 value: 'SQRT'
	// 				},
	// 		 itemStyle: {
	// 			 normal: {
	// 			color: function(params) {
	// 					var colorList = [
	// 		 "#a71a4f","#bc1540","#c71b1b","#d93824","#ce4018","#d15122","#e7741b","#e58b3d","#e59524","#dc9e31","#da9c2d","#d2b130","#bbd337","#8cc13f","#67b52d","#53b440","#48af54","#479c7f","#48a698","#57868c"
	// 					 ];
	// 					 return colorList[params.dataIndex]
	// 				 },
	// 				 label: {
	// 					 position: 'inside',
	// 					textStyle:
	// 					 {   
	// 						 fontWeight:'bold',
	// 						 fontFamily:'Microsoft YaHei',
	// 						 color:'#FAFAFA',
	// 						fontSize:10
	// 					 },
	// 					 //formatter:'{b} \n{@Confirmed}例 \n死亡{@Dead}',//注意这里大小写敏感哦
	// 					formatter : function(params) 
	// 					{  
	// 						 if(params.data[1]>20000)
	// 						{return params.data[0]+'\n'+params.data[1]+"例"+'\n'+"死亡"+params.data[3]+"例";}
	// 						else{return "";}
	// 								 },

	// 				 },
	// 			 },
	// 	},

	// 	 },
	// 	 {
	// 		 name:'透明圆圈',
	// 		 type:'pie',
	// 		 radius: [10,27],
	// 		 center: ['35%', '80%'],
	// 		 itemStyle: {
	// 				 color: 'rgba(250, 250, 250, 0.3)',
	// 	},
	// 		 data:[
	// 			 {value:10,name:''}
	// 		 ]
	// 	 },
	// 	 {
	// 		 name:'透明圆圈',
	// 		 type:'pie',
	// 		 radius: [10,35],
	// 		 center: ['35%', '80%'],
	// 		 itemStyle: {
	// 				 color: 'rgba(250, 250, 250, 0.3)',
	// 	},
	// 		 data:[
	// 			 {value:10,name:''}
	// 		 ]
	// 	 }
	// 		 ] 
		
	// 	};
		
		
		
	// 	 myChart.setOption(option);
	// 	 //$("#guowai_meigui>div").css({"width":"200%","height":"200%","overflow":"auto"});
	// 	  //$("#guowai_meigui>div canvas").css({"width":"100%","height":"100%","overflow":"auto"});
	// 	 }

 // function haiwaiyiqin(){
	//  let myChart =echarts.init(document.getElementById('guowai_zong'));
	//  //声明jsonp函数
	//  function jsonp(url, callback, callbackname){ //给系统中创建一个全局变量，叫做callbackname，指向callback函数名
	//  	//定义一个处理Jsonp返回数据的回调函数
	//  	window[callbackname] = callback;
	//  	//创建一个script节点
	//  	var script = document.createElement("script");
	//  	    script.src = url;
	//  	    script.type = "text/javascript";			
	//  	document.getElementsByTagName("body")[0].appendChild(script); //将创建的新节点添加到BOM树上  
	//  	setTimeout(function(){
	//  		document.body.removeChild(script); //为了不污染页面，把script拿掉
	//  	}, 500);
	//  }
	 
	//  var jsonpURL ='https://m.look.360.cn/events/feiyan?sv=&version=&market=&device=2&net=4&stype=&scene=&sub_scene=&refer_scene=&refer_subscene=&f=jsonp&location=true&_=1583145636129&callback=jsonp2';
	//  //调用jsonp函数发送jsonp请求的callback
	//  jsonp(jsonpURL, function(data){
	//  	console.log(data.country);
	//  		var chartsJSON = data.country; // 发送请求成功后开始执行，data是请求成功后，返回的数据
	//  		var provinceName = [], //国家  
	//          	diagnosed = [],    //确诊
	//          	diffDiagnosed = [],//新增确诊
	//  		    cured = [],        //治愈
	//          	died = []; 	       //死亡
	 		
	//  		// 取出每一条数据value,作为显示数据
	//  		chartsJSON.forEach(function(items, index) { 
	//  		    provinceName.push(items.provinceName);
	//  		    diagnosed.push(items.diagnosed);
	//  		    diffDiagnosed.push(items.diffDiagnosed);
	//  		    cured.push(items.cured);
	//  		    died.push(items.died);
	//  		});  
	//  		//数组求和
	//  		var sumDiagnosed = eval(diagnosed.join("+")),
	//  		    sumDiffDiagnosed = eval(diffDiagnosed.join("+")),
	//  			sumCured = eval(cured.join("+")),
	//  			sumDied = eval(died.join("+"));
	 			
	 			    
	//  	    const mydate = new Date();
	//          var jsonMonth = mydate.getMonth()+1,
	//  	        subDay = mydate.getDate();
	//  	    	subDay < 10 ? subDay = "0"+subDay : subDay = subDay;
	//  	    var subDate = mydate.getFullYear() + "年"+ jsonMonth +"月"+ subDay +"日";
	//  	    //console.log(subDate)
	//  	    var subFunc = [
	//  	   		'截止: '+subDate+'\n'+
	//  	   		'累计确诊: {a| '+sumDiagnosed+'}','新增确诊: {b| '+sumDiffDiagnosed+'}','累计治愈: {c| '+sumCured+'}','累计死亡: {d| '+sumDied+'}'
	//  	   		].join('\xa0\xa0');
	     
	//      //基于准备好的dom，初始化echarts实例
	//      option = {
	//          backgroundColor: '#f8f8f8', //背景色
	//          title: {
	//              text: '海外疫情病例趋势图',
	//              textStyle: {
	//                  color: '#000',
	//                  fontSize: 18
	//              },
	//              itemGap: 5,
	//              subtext: subFunc, 
	//      		subtextStyle: {
	//      			color: '#333',
	//                  fontSize: 14,
	//                  rich: {
	//      		        a: {
	//      		            color: '#b61e33',
	//                  		fontSize: 15
	//      		        },
	//      		        b: {
	//      		            color: '#ff6600',
	//                  		fontSize: 15
	//      		        },
	//      		        c: {
	//      		            color: 'rgb(17, 191, 199)',
	//                  		fontSize: 15
	//      		        },
	//      		        d: {
	//      		            color: 'gray',
	//                  		fontSize: 15
	//      		        }
	//      		    }
	//      		},
	//      		x: 'center'
	//          },
	//          tooltip: {
	//              trigger: 'axis', //axis , item
	//              axisPointer: {
	//                  type: 'line', //'line' | 'cross' | 'shadow' | 'none
	//                  lineStyle: {
	//                      color: '#c9caca',
	//                      width: 1,
	//                      type: 'dotted'
	//                  }
	//              },
	//              x: 'left',
	//              textStyle: {
	//                  fontSize: 14
	//              }
	//          },
	//          grid: {
	//              top: '12%',
	//              right: '2%',
	//              bottom: '10%',
	//              left: '7%'
	//          },
	//          legend: {
	//              data: ['确诊','新增确诊','治愈','死亡'],
	//              x: 'right'
	//          },
	//          xAxis: {
	//              type: 'category',
	//              axisLabel: {
	//                  rotate: 45,
	//                  interval: 0, //类目间隔 设置为 1，表示(隔一个标签显示一个标签)
	//                  textStyle: {
	//                      color: '#333',
	//                      fontSize: 12
	//                  },
	//                  formatter: '{value}'
	//              },
	//              axisLine: {
	//                  lineStyle: {
	//                      color: '#ccc',
	//                       width: 1
	//                  }
	//              },
	//              splitLine: {
	//                  show: true,
	//                  lineStyle: {
	//                      color: 'rgba(102,102,102,.1)', //纵向网格线颜色
	//                      width: 1,
	//                      type: 'dashed'
	//                  }
	//              },
	//              axisTick: {
	//                  show: true //坐标轴小标记
	//              },
	//              data: provinceName //载入横坐标数据
	//          },
	//          yAxis: {
	//              type: 'value',
	//              axisLabel: {
	//                  show: true,
	//                  textStyle: {
	//                      color: '#333',
	//                      fontSize: 12
	//                  },
	//                  formatter: '{value}'
	//              },
	//              splitNumber: 4, //y轴刻度设置(值越大刻度越小)
	//              axisLine: {
	//                  lineStyle: {
	//                      color: '#ccc',
	//                      width: 1
	//                  }
	//              },
	//              splitLine: {
	//                  show: true,
	//                  lineStyle: {
	//                      color: 'rgba(102,102,102,.1)', //横向网格线颜色
	//                      width: 1,
	//                      type: 'dashed'
	//                  }
	//              }
	//          },
	//          color: ['#b61e33', 'rgb(255, 160, 25)', 'rgb(17, 191, 199)', 'rgba(77, 80, 84, 0.7)'],
	//          series: [
	//      	    {
	//      	        name: '确诊',
	//      	        type: 'line', //line		
	//      	        symbol: 'pin', //曲线点样式 'emptyCircle', circle', 'rect', 'roundRect', 'triangle', 'diamond', 'pin', 'arrow', 'none'
	//      	        symbolSize: 12, //曲线点大小
	//      	        label: {
	//                      normal: {
	//                          show: true,
	//                          position: 'top'
	//                      }
	//                  },
	//      	        lineStyle: {
	//      	            normal: {
	//      	                width: 2
	//      	            }
	//      	        },
	//      	        smooth: true, 
	//      	        data: diagnosed //载入数据
	//      	    },
	//      	    {
	//      	        name: '新增确诊',
	//      	        type: 'line', //line
	//      	        symbol: 'pin', //曲线点样式 'emptyCircle', circle', 'rect', 'roundRect', 'triangle', 'diamond', 'pin', 'arrow', 'none'
	//      	        symbolSize: 12, //曲线点大小
	//      	        label: {
	//                      normal: {
	//                          show: true,
	//                          position: 'top'
	//                      }
	//                  },
	//      	        lineStyle: {
	//      	            normal: {
	//      	                width: 2
	//      	            }
	//      	        },
	//      	        smooth: true, 
	//      	        data: diffDiagnosed //载入数据
	//      	    },
	//      	    {
	//      	        name: '治愈',
	//      	        type: 'line', //line
	//      	        symbol: 'pin', //曲线点样式 'emptyCircle', circle', 'rect', 'roundRect', 'triangle', 'diamond', 'pin', 'arrow', 'none'
	//      	        symbolSize: 12, //曲线点大小
	//      	        label: {
	//                      normal: {
	//                          show: true,
	//                          position: 'top'
	//                      }
	//                  },
	//      	        lineStyle: {
	//      	            normal: {
	//      	                width: 2
	//      	            }
	//      	        },
	//      	        smooth: true, 
	//      	        data: cured //载入数据
	//      	    },
	//      	    {
	//      	        name: '死亡',
	//      	        type: 'line', //line
	//      	        symbol: 'pin', //曲线点样式 'emptyCircle', circle', 'rect', 'roundRect', 'triangle', 'diamond', 'pin', 'arrow', 'none'
	//      	        symbolSize: 12, //曲线点大小
	//      	        label: {
	//                      normal: {
	//                          show: true,
	//                          position: 'top'
	//                      }
	//                  },
	//      	        lineStyle: {
	//      	            normal: {
	//      	                width: 2
	//      	            }
	//      	        },
	//      	        smooth: true, 
	//      	        data: died //载入数据
	//      	    }
	//          ]
	//      };
	     
	//      //使用刚指定的配置项和数据显示图表。
	//      myChart.setOption(option);
	 
	//  	var app = {
	//          currentIndex: -1,
	//      };
	//      setInterval(function () {
	//          var dataLen = option.series[0].data.length;
	 
	//          // 取消之前高亮的图形
	//          myChart.dispatchAction({
	//            type: 'downplay',
	//            seriesIndex: 0,
	//            dataIndex: app.currentIndex
	//          });
	 
	//          app.currentIndex = (app.currentIndex + 1) % dataLen;
	 
	//          // 高亮当前图形
	//          myChart.dispatchAction({
	//            type: 'highlight',
	//            seriesIndex: 0,
	//            dataIndex: app.currentIndex,
	//          });
	         
	//          // 显示 tooltip
	//          myChart.dispatchAction({
	//            type: 'showTip',
	//            seriesIndex: 0,
	//            dataIndex: app.currentIndex
	//          });
	 
	//      }, 3000);
	 	
	//  },"jsonp2");
	 
 // }
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 