$.ajax({
	type: "GET",
	url: "https://interface.sina.cn/news/wap/fymap2020_data.d.json",
	dataType: 'jsonp',
	crossDomain: true,
	success: function(data) {
		//调用函数
		init(data);
		var dataList = [];
		for(let i=0;i<data.data.list[2].city.length;i++){
			dataList[i] = {}
			dataList[i].name = data.data.list[2].city[i].name+"市";
			dataList[i].value = parseInt(data.data.list[2].city[i].conNum);
			}
			console.log(dataList);
			guangdong(dataList);
		
	}
});
function init(cn_data){
	//获取国内历史记录
	cn_arr = cn_data.data.historylist;
	
	let	listtime = [];//时间数组
	let cn_econNum =[];//国内现存确诊人数
	let cn_conNum =[];//国内累计确诊人数
	let cn_cureNum =[];//国内累计治愈人数
	let cn_deathNum =[];//国内累计死亡人数
	let cn_susNum =[];//国内疑是病例人数
	let cn_heconNum = []//现存重症人数
	let cn_deathRate =[];//国内病死率
	let cn_cureRate =[];//国内治愈率
	let wuhan_conNum =[];//武汉累计确诊人数
	let wuhan_deathNum =[];//武汉累计死亡人数
	let wuhan_cureNum =[];//武汉累计治愈人数
	let cn_conadd =[]; //每日新增 
	let cn_jwsrNum =[];//境外输入
	let cn_addjwsrNum =[]; //每日新增境外输入
	//各名称数组
	let listname1 = ["累计确诊","累计治愈","累计死亡"];
	let listname2 = ["现存确诊","现存疑似","现存重症"];
	let listname3 = ["国内病死率","国内治愈率",""];
	let listname4 = ["武汉累计确诊","武汉累计死亡","武汉累计治愈"];
	let listname5 = ["国内新增确诊","境外输入","新增境外输入"];
	//转换数据类型 与各个数组赋值
	for (let i = 0; i < cn_arr.length; i++) {
		listtime[i] = cn_arr[i].date;
		cn_econNum[i] = parseInt(cn_arr[i].cn_econNum);
		cn_conNum[i]= parseInt(cn_arr[i].cn_conNum);
		cn_cureNum[i] = parseInt(cn_arr[i].cn_cureNum);
		cn_deathNum[i] = parseInt(cn_arr[i].cn_deathNum);
		cn_susNum[i] = parseInt(cn_arr[i].cn_susNum);
		cn_heconNum[i] = parseInt(cn_arr[i].cn_heconNum);
		cn_deathRate[i] = parseFloat(cn_arr[i].cn_deathRate);//国内病死率化成浮点
		cn_cureRate[i] = parseFloat(cn_arr[i].cn_cureRate);//国内治愈率
		wuhan_conNum[i] = parseInt(cn_arr[i].wuhan_conNum);
		wuhan_deathNum[i] = parseInt(cn_arr[i].wuhan_deathNum);
		wuhan_cureNum[i] = parseInt(cn_arr[i].wuhan_cureNum);
		cn_conadd[i] = parseInt(cn_arr[i].cn_conadd); //每日新增
		cn_jwsrNum[i] = parseInt(cn_arr[i].cn_jwsrNum);//境外输入
		cn_addjwsrNum[i] = parseInt(cn_arr[i].cn_addjwsrNum); //每日新增境外输入
	}
	//分配数组
	let listshuju1 = [cn_conNum.reverse(),cn_cureNum.reverse(),cn_deathNum.reverse()];
	let listshuju2 = [cn_econNum.reverse(),cn_susNum.reverse(),cn_heconNum.reverse()];
	let listshuju3 = [cn_deathRate.reverse(),cn_cureRate.reverse(),""];
	let listshuju4 = [wuhan_conNum.reverse(),wuhan_deathNum.reverse(),wuhan_cureNum.reverse()];
	let listshuju5 = [cn_conadd.reverse(),cn_jwsrNum.reverse(),cn_addjwsrNum.reverse()];
	listtime.reverse();
	//装载数据
	zhixian("国内累计趋势图","chart_0",listshuju1,listname1,listtime);
	zhixian("国内现存趋势图","chart_1",listshuju2,listname2,listtime);
	zhixian("治愈/死亡率趋势图","chart_2",listshuju3,listname3,listtime);
	zhixian("武汉累计趋势图","chart_3",listshuju4,listname4,listtime);
	zhixian("境外/国内新增趋势图","chart_4",listshuju5,listname5,listtime);
	
	
	$("#tubiao_span").click()
;
}

function zhixian(name,id,listshuju,listname,time){
	 let myChart =echarts.init(document.getElementById(id));
	option = {
	    backgroundColor: '#fff',
	    title: {
	        
	        textStyle: {
	            fontWeight: 'normal',
	            fontSize: 16,
	            color: '#333'
	        },
	        left: '5%'
	    },
	    tooltip: {
	        trigger: 'axis',
	        axisPointer: {
	            lineStyle: {
	                color: '#57617B'
	            }
	        }
	    },
	    legend: {
	        icon: 'rect',
	        itemWidth: 14,
	        itemHeight: 5,
	        itemGap: 13,
	        data: listname,
	        right: '4%',
	        textStyle: {
	            fontSize: 15,
	            color: '#aaa'
	        }
	    },
	    grid: {
	        left: '3%',
	        right: '4%',
	        bottom: '3%',
	        containLabel: true
	    },
	    xAxis: [{
	        type: 'category',
	        boundaryGap: false,
	        axisLine: {
	            lineStyle: {
	                color: '#57617B'
	            }
	        },
	        data: time
	    }, {
	        axisPointer: {
	            show: false
	        },
	        axisLine: {
	            lineStyle: {
	                color: '#57617B'
	            }
	        },
	        axisTick: {
	            show: false
	        },
	
	        position: 'bottom',
	        offset: 20,
	        data: ['', '', '', '', '', '', '', '', '', '', {
	            value: '',
	            textStyle: {
	                align: 'left'
	            }
	        }, '日期']
	    }],
	    yAxis: [{
	        type: 'value',
	        name: name,
	        axisTick: {
	            show: false
	        },
	        axisLine: {
	            lineStyle: {
	                color: '#57617B'
	            }
	        },
	        axisLabel: {
	            margin: 10,
	            textStyle: {
	                fontSize: 14
	            }
	        },
	        splitLine: {
	            lineStyle: {
	                color: '#57617B'
	            }
	        }
	    }],
	    series: [{
	        name: listname[0],
	        type: 'line',
	        smooth: true,
	        symbol: 'circle',
	        symbolSize: 5,
	        showSymbol: false,
	        lineStyle: {
	            normal: {
	                width: 1
	            }
	        },
	        areaStyle: {
	            normal: {
	                color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
	                    offset: 0,
	                    color: 'rgba(137, 189, 27, 0.3)'
	                }, {
	                    offset: 0.8,
	                    color: 'rgba(137, 189, 27, 0)'
	                }], false),
	                shadowColor: 'rgba(0, 0, 0, 0.1)',
	                shadowBlur: 10
	            }
	        },
	        itemStyle: {
	            normal: {
	                color: 'rgb(137,189,27)',
	                borderColor: 'rgba(137,189,2,0.27)',
	                borderWidth: 12
	
	            }
	        },
	        data: listshuju[0]
	    }, {
	        name: listname[1],
	        type: 'line',
	        smooth: true,
	        symbol: 'circle',
	        symbolSize: 5,
	        showSymbol: false,
	        lineStyle: {
	            normal: {
	                width: 1
	            }
	        },
	        areaStyle: {
	            normal: {
	                color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
	                    offset: 0,
	                    color: 'rgba(0, 136, 212, 0.3)'
	                }, {
	                    offset: 0.8,
	                    color: 'rgba(0, 136, 212, 0)'
	                }], false),
	                shadowColor: 'rgba(0, 0, 0, 0.1)',
	                shadowBlur: 10
	            }
	        },
	        itemStyle: {
	            normal: {
	                color: 'rgb(0,136,212)',
	                borderColor: 'rgba(0,136,212,0.2)',
	                borderWidth: 12
	
	            }
	        },
	        data: listshuju[1]
	    }, {
	        name: listname[2],
	        type: 'line',
	        smooth: true,
	        symbol: 'circle',
	        symbolSize: 5,
	        showSymbol: false,
	        lineStyle: {
	            normal: {
	                width: 1
	            }
	        },
	        areaStyle: {
	            normal: {
	                color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
	                    offset: 0,
	                    color: 'rgba(219, 50, 51, 0.3)'
	                }, {
	                    offset: 0.8,
	                    color: 'rgba(219, 50, 51, 0)'
	                }], false),
	                shadowColor: 'rgba(0, 0, 0, 0.1)',
	                shadowBlur: 10
	            }
	        },
	        itemStyle: {
	            normal: {
	
	                color: 'rgb(219,50,51)',
	                borderColor: 'rgba(219,50,51,0.2)',
	                borderWidth: 12
	            }
	        },
	        data: listshuju[2]
	    }, ]
	};
	 myChart.setOption(option);
}

function guangdong(ppdata){
	let uploadedDataURL = "framework/data-1502779360900-HkKJuGe_W.json";
	
	
	var seriesdata = [{
	    name: '确诊',
	    type: 'map',
	    map: '广东',
	    itemStyle: {
	        normal: {
	            label: {
	                show: true
	            }
	        },
	        emphasis: {
	            label: {
	                show: true
	            }
	        }
	    },
	    data: ppdata
	}, ];
	let myChart =echarts.init(document.getElementById("guangdong"));
	
	
	function opt(max, min, vmp, unit, flag1) {
	    optn = {
	        title: {
	            text: '广东' + vmp+'分布',
	            // subtext: '数据来源网络（单位：' + unit + '）',
	            left: 'center',
	            textStyle: {
	                color: '#000'
	            }
	        },
	
	        legend: {
	            orient: 'vertical',
	            left: 'left',
	            data: ['人口'],
	            selectedMode: 'single',
	            selected: {
	                '人口': flag1,
	            }
	        },
	        visualMap: {
	            min: min,
	            max: max,
	            text: [vmp, '单位：' + unit],
	            realtime: false,
	            calculable: true,
	            inRange: {
	                color: ['yellow', 'red','red']
	            }
	        },
	        toolbox: {
	            show: true,
	            orient: 'vertical',
	            left: 'right',
	            top: 'center',
	            feature: {
	                dataView: {
	                    readOnly: false
	                },
	                restore: {},
	                saveAsImage: {}
	            }
	        },
	       
	        tooltip: {
	            formatter: function(params) {
	                return params.name + ": " + params.value + unit;
	            }
	        },
	        series: seriesdata
	    };
	    return optn;
	}
	
	$.get(uploadedDataURL, function(gdMap) {
	    echarts.registerMap('广东', gdMap);
	    myChart.setOption(opt(1000, 0, '确诊', '例', true));
	});
	
}