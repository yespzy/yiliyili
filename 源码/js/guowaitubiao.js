$.ajax({
	type: "GET",
	url: "https://interface.sina.cn/news/wap/fymap2020_data.d.json",
	dataType: 'jsonp',
	crossDomain: true,
	success: function(data) {
		Aa(data);
		let gw = data.data.otherlist;
		zygj(gw);

	}
});

function zygj(gw) {
	let gj = [];
	let lj = [];
	let xc = [];
	let zy = [];
	let sw = [];
	let shuzhi = [61, 43, 57, 46, 31, 23, 56, 55, 59, 10];
	console.log(shuzhi);
	for (let i = 0; i < shuzhi.length; i++) {
		gj[i] = gw[shuzhi[i]].name;
		lj[i] = gw[shuzhi[i]].value;
		xc[i] = gw[shuzhi[i]].econNum;
		zy[i] = gw[shuzhi[i]].cureNum;
		sw[i] = gw[shuzhi[i]].deathNum;
	}

	zhuyao(gj, lj, xc, zy, sw);
}

function Aa(dataa) {
	var shuzu = [];
	var wrold = [];
	var weather = dataa;
	shuzu = weather.data.otherhistorylist; //国外历史数据
	wrold = weather.data.worldlist
	zhuanhuan(shuzu);
	zhuanhuanwrold(wrold);
}
//国外的字符串转数字
function zhuanhuan(shuzu) {
	//定义各个数组
	let certain = [];
	let die = [];
	let recure = [];
	let certain_inc = [];
	let die_inc = [];
	let recure_inc = [];
	let date = [];
	//定义字符串数组
	let listname1 = ["国外累计确诊", "国外累计死亡", "国外累计治愈"];
	let listname2 = ["每日增加确诊", "每日死亡人数", "每日治愈人数"];
	for (let i = 0; i < shuzu.length; i++) {
		certain[i] = parseInt(shuzu[i].certain); //国外累计确诊
		die[i] = parseInt(shuzu[i].die); //累计死亡
		recure[i] = parseInt(shuzu[i].recure); //累计治愈
		certain_inc[i] = parseInt(shuzu[i].certain_inc); //较昨日增加确诊
		die_inc[i] = parseInt(shuzu[i].die_inc); //较昨日死亡
		recure_inc[i] = parseInt(shuzu[i].recure_inc); //较昨日治愈
		date[i] = (shuzu[i].date); //日期
	}
	date.reverse();
	let listshuju1 = [certain.reverse(), die.reverse(), recure.reverse()];
	let listshuju2 = [certain_inc.reverse(), die_inc.reverse(), recure_inc.reverse()];
	haiwai_tu("国外累计", "wai1", listshuju1, listname1, date, 6000000);
	haiwai_tu("国外每日新增", "wai2", listshuju2, listname2, date, 250000);

	$("#tubiao_span2").click();
}

function zhuanhuanwrold(wrold) {

	let value = [];
	let deathNum = [];
	let cureNum = [];
	let name = [];
	let listshuju = []
	let listshuju_2 = []
	for (let i = 0; i < wrold.length; i++) {
		listshuju[i] = {}
		listshuju_2[i] = {}
		value[i] = parseInt(wrold[i].value);
		name[i] = wrold[i].name;
		deathNum[i] = parseInt(wrold[i].deathNum); //世界各国累计死亡
		cureNum[i] = parseInt(wrold[i].cureNum); //世界各国累计治愈	
		listshuju[i].name = wrold[i].name;
		listshuju[i].value = parseInt(wrold[i].value); //世界各国累计确诊
		listshuju_2[i].name = wrold[i].name;
		listshuju_2[i].value = parseInt(wrold[i].econNum); //世界各国累计确诊

	}
	value.reverse();
	deathNum.reverse();
	cureNum.reverse();
	name.reverse();

	worid_tu(listshuju);
	worid_tu_2(listshuju_2);
}

function zhuyao(gj, lj, xc, zy, sw) {
	let myChart = echarts.init(document.getElementById("gw_ya"));
	option = {
		backgroundColor: "#fff",
		"title": {
			"text": "主要国家疫情",
			"subtext": "现存/治愈/死亡/累计",
			x: 'center',

			textStyle: {
				color: '#000',
			},
			subtextStyle: {
				color: '#90979c',
				fontSize: '16',

			},
		},
		"tooltip": {
			"trigger": "axis",
			"axisPointer": {
				"type": "shadow",
				textStyle: {
					color: "#fff"
				}

			},
		},
		"grid": {
			"borderWidth": 0,
			"top": 110,
			"bottom": 95,
			textStyle: {
				color: "#fff"
			}
		},
		"legend": {
			x: 'center',
			top: '8%',
			textStyle: {
				color: '#90979c',
			},
			"data": ['现存', '治愈', '死亡', '总数']
		},
		"calculable": true,
		"xAxis": [{
			"type": "category",
			"axisLine": {
				lineStyle: {
					color: '#90979c'
				}
			},
			"splitLine": {
				"show": false
			},
			"axisTick": {
				"show": false
			},
			"splitArea": {
				"show": false
			},
			"axisLabel": {
				"interval": 0,

			},
			"data": gj, //国家名
		}],
		"yAxis": [{
			"type": "value",
			"splitLine": {
				"show": false
			},
			"axisLine": {
				lineStyle: {
					color: '#90979c'
				}
			},
			"axisTick": {
				"show": false
			},
			"axisLabel": {
				"interval": 0,

			},
			"splitArea": {
				"show": false
			},

		}],

		"series": [{
				"name": "现存",
				"type": "bar",
				"stack": "总量",
				"barMaxWidth": 45,
				"barGap": "10%",
				"itemStyle": {
					"normal": {
						"color": "rgba(255,144,128,1)",
						"label": {
							"show": true,
							"textStyle": {
								"color": "#fff"
							},
							"position": "inside",
							formatter: function(p) {
								return p.value > 0 ? (p.value) : '';
							}
						}
					}
				},
				"data": xc,
			},

			{
				"name": "治愈",
				"type": "bar",
				"stack": "总量",
				"itemStyle": {
					"normal": {
						"color": "rgba(0,191,183,1)",
						"barBorderRadius": 0,
						"label": {
							"show": true,
							"position": "inside",
							formatter: function(p) {
								return p.value > 0 ? (p.value) : '';
							}
						}
					}
				},
				"data": zy
			},
			{
				"name": "死亡",
				"type": "bar",
				"stack": "总量",
				"itemStyle": {
					"normal": {
						"color": "red",
						"barBorderRadius": 0,
						"label": {
							"show": true,
							"position": "inside",
							formatter: function(p) {
								return p.value > 0 ? (p.value) : '';
							}
						}
					}
				},
				"data": sw
			},
			{
				"name": "总数",
				"type": "line",
				symbolSize: 5,
				symbol: 'circle',
				"itemStyle": {
					"normal": {
						"color": "blue",
						"barBorderRadius": 0,
						"label": {
							"show": true,
							"position": "top",
							formatter: function(p) {
								return p.value > 0 ? (p.value) : '';
							}
						}
					}
				},
				"data": lj
			},
		]
	}
	myChart.setOption(option);
}







function haiwai_tu(name, id, listshuju, listname, time, int) {
	let myChart = echarts.init(document.getElementById(id));
	var option = {
		backgroundColor: '#fff',
		tooltip: {
			trigger: 'axis',
			axisPointer: { // 坐标轴指示器，坐标轴触发有效
				type: 'shadow' // 默认为直线，可选为：'line' | 'shadow'
			}
		},
		title: {
			text: name,
			textStyle: {
				fontWeight: 'normal',
				color: '#000'
			},
			left: '5%'
		},
		grid: {
			left: '2%',
			right: '4%',
			bottom: '14%',
			top: '16%',
			containLabel: true
		},
		legend: {
			data: listname,
			right: 10,
			top: 12,
			textStyle: {
				color: "#000"
			},
			itemWidth: 12,
			itemHeight: 10,
			// itemGap: 35
		},
		xAxis: {
			type: 'category',
			data: time,
			axisLine: {
				lineStyle: {
					color: 'brack'

				}
			},
			axisLabel: {
				// interval: 0,
				// rotate: 40,
				textStyle: {
					fontFamily: 'Microsoft YaHei'
				}
			},
		},

		yAxis: {
			type: 'value',
			max: int,
			axisLine: {
				show: false,
				lineStyle: {
					color: 'brack'
				}
			},
			splitLine: {
				show: true,
				lineStyle: {
					color: 'rgba(0,0,0,0.3)'
				}
			},
			axisLabel: {}
		},
		"dataZoom": [{
			"show": true,
			"height": 12,
			"xAxisIndex": [
				0
			],
			bottom: '8%',
			"start": 10,
			"end": 90,
			handleIcon: 'path://M306.1,413c0,2.2-1.8,4-4,4h-59.8c-2.2,0-4-1.8-4-4V200.8c0-2.2,1.8-4,4-4h59.8c2.2,0,4,1.8,4,4V413z',
			handleSize: '110%',
			handleStyle: {
				color: "orangered;",

			},
			textStyle: {
				color: "#000"
			},
			borderColor: "000"
		}, {
			"type": "inside",
			"show": true,
			"height": 15,
			"start": 1,
			"end": 35
		}],
		series: [{
				name: listname[0],
				type: 'bar',
				barWidth: '15%',
				itemStyle: {
					normal: {
						color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
							offset: 0,
							color: '#fccb05'
						}, {
							offset: 1,
							color: '#f5804d'
						}]),
						barBorderRadius: 12,
					},
				},
				data: listshuju[0]
			},
			{
				name: listname[1],
				type: 'bar',
				barWidth: '15%',
				itemStyle: {
					normal: {
						color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
							offset: 0,
							color: '#8bd46e'
						}, {
							offset: 1,
							color: '#09bcb7'
						}]),
						barBorderRadius: 11,
					}

				},
				data: listshuju[1]
			},
			{
				name: listname[2],
				type: 'bar',
				barWidth: '15%',
				itemStyle: {
					normal: {
						color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
							offset: 0,
							color: '#248ff7'
						}, {
							offset: 1,
							color: '#6851f1'
						}]),
						barBorderRadius: 11,
					}
				},
				data: listshuju[2]
			}
		]
	};

	var app = {
		currentIndex: -1,
	};
	setInterval(function() {
		var dataLen = option.series[0].data.length;

		// 取消之前高亮的图形
		myChart.dispatchAction({
			type: 'downplay',
			seriesIndex: 0,
			dataIndex: app.currentIndex
		});
		app.currentIndex = (app.currentIndex + 1) % dataLen;
		//console.log(app.currentIndex);
		// 高亮当前图形
		myChart.dispatchAction({
			type: 'highlight',
			seriesIndex: 0,
			dataIndex: app.currentIndex,
		});
		// 显示 tooltip
		myChart.dispatchAction({
			type: 'showTip',
			seriesIndex: 0,
			dataIndex: app.currentIndex
		});
	}, 1000);
	myChart.setOption(option);
}

function worid_tu(data) {
	var nameMap = {
		'Afghanistan': '阿富汗',
		'Albania': '阿尔巴尼亚',
		'Algeria': '阿尔及利亚',
		'Andorra': '安道尔',
		'Angola': '安哥拉',
		'Antarctica': '南极洲',
		'Antigua and Barbuda': '安提瓜和巴布达',
		'Argentina': '阿根廷',
		'Armenia': '亚美尼亚',
		'Australia': '澳大利亚',
		'Austria': '奥地利',
		'Azerbaijan': '阿塞拜疆',
		'The Bahamas': '巴哈马',
		'Bahrain': '巴林',
		'Bangladesh': '孟加拉国',
		'Barbados': '巴巴多斯',
		'Belarus': '白俄罗斯',
		'Belgium': '比利时',
		'Belize': '伯利兹',
		'Benin': '贝宁',
		'Bermuda': '百慕大',
		'Bhutan': '不丹',
		'Bolivia': '玻利维亚',
		'Bosnia and Herzegovina': '波斯尼亚和黑塞哥维那',
		'Botswana': '博茨瓦纳',
		'Brazil': '巴西',
		'Brunei': '文莱',
		'Bulgaria': '保加利亚',
		'Burkina Faso': '布基纳法索',
		'Burundi': '布隆迪',
		'Cambodia': '柬埔寨',
		'Cameroon': '喀麦隆',
		'Canada': '加拿大',
		'Cape Verde': '佛得角',
		'Central African Republic': '中非共和国',
		'Chad': '乍得',
		'Chile': '智利',
		'China': '中国',
		'Colombia': '哥伦比亚',
		'Comoros': '科摩罗',
		'Republic of the Congo': '刚果共和国',
		'Costa Rica': '哥斯达黎加',
		'Croatia': '克罗地亚',
		'Cuba': '古巴',
		'Cyprus': '塞浦路斯',
		'Czech Republic': '捷克共和国',
		'Denmark': '丹麦',
		'Djibouti': '吉布提',
		'Dominica': '多米尼加',
		'Dominican Republic': '多明尼加共和国',
		'Ecuador': '厄瓜多尔',
		'Egypt': '埃及',
		'El Salvador': '萨尔瓦多',
		'Equatorial Guinea': '赤道几内亚',
		'Eritrea': '厄立特里亚',
		'Estonia': '爱沙尼亚',
		'Ethiopia': '埃塞俄比亚',
		'Falkland Islands': '福克兰群岛',
		'Faroe Islands': '法罗群岛',
		'Fiji': '斐济',
		'Finland': '芬兰',
		'France': '法国',
		'French Guiana': '法属圭亚那',
		'French Southern and Antarctic Lands': '法属南半球和南极领地',
		'Gabon': '加蓬',
		'Gambia': '冈比亚',
		'Gaza Strip': '加沙',
		'Georgia': '格鲁吉亚',
		'Germany': '德国',
		'Ghana': '加纳',
		'Greece': '希腊',
		'Greenland': '格陵兰',
		'Grenada': '格林纳达',
		'Guadeloupe': '瓜德罗普',
		'Guatemala': '危地马拉',
		'Guinea': '几内亚',
		'Guinea Bissau': '几内亚比绍',
		'Guyana': '圭亚那',
		'Haiti': '海地',
		'Honduras': '洪都拉斯',
		'Hong Kong': '香港',
		'Hungary': '匈牙利',
		'Iceland': '冰岛',
		'India': '印度',
		'Indonesia': '印尼',
		'Iran': '伊朗',
		'Iraq': '伊拉克',
		'Iraq-Saudi Arabia Neutral Zone': '伊拉克阿拉伯中立区',
		'Ireland': '爱尔兰',
		'Isle of Man': '马恩岛',
		'Israel': '以色列',
		'Italy': '意大利',
		'Ivory Coast': '科特迪瓦',
		'Jamaica': '牙买加',
		'Jan Mayen': '扬马延岛',
		'Japan': '日本',
		'Jordan': '约旦',
		'Kazakhstan': '哈萨克斯坦',
		'Kenya': '肯尼亚',
		'Kerguelen': '凯尔盖朗群岛',
		'Kiribati': '基里巴斯',
		'North Korea': '北朝鲜',
		'South Korea': '韩国',
		'Kuwait': '科威特',
		'Kyrgyzstan': '吉尔吉斯斯坦',
		'Laos': '老挝',
		'Latvia': '拉脱维亚',
		'Lebanon': '黎巴嫩',
		'Lesotho': '莱索托',
		'Liberia': '利比里亚',
		'Libya': '利比亚',
		'Liechtenstein': '列支敦士登',
		'Lithuania': '立陶宛',
		'Luxembourg': '卢森堡',
		'Macau': '澳门',
		'Macedonia': '马其顿',
		'Madagascar': '马达加斯加',
		'Malawi': '马拉维',
		'Malaysia': '马来西亚',
		'Maldives': '马尔代夫',
		'Mali': '马里',
		'Malta': '马耳他',
		'Martinique': '马提尼克',
		'Mauritania': '毛里塔尼亚',
		'Mauritius': '毛里求斯',
		'Mexico': '墨西哥',
		'Moldova': '摩尔多瓦',
		'Monaco': '摩纳哥',
		'Mongolia': '蒙古',
		'Morocco': '摩洛哥',
		'Mozambique': '莫桑比克',
		'Myanmar': '缅甸',
		'Namibia': '纳米比亚',
		'Nepal': '尼泊尔',
		'Netherlands': '荷兰',
		'New Caledonia': '新喀里多尼亚',
		'New Zealand': '新西兰',
		'Nicaragua': '尼加拉瓜',
		'Niger': '尼日尔',
		'Nigeria': '尼日利亚',
		'Northern Mariana Islands': '北马里亚纳群岛',
		'Norway': '挪威',
		'Oman': '阿曼',
		'Pakistan': '巴基斯坦',
		'Panama': '巴拿马',
		'Papua New Guinea': '巴布亚新几内亚',
		'Paraguay': '巴拉圭',
		'Peru': '秘鲁',
		'Philippines': '菲律宾',
		'Poland': '波兰',
		'Portugal': '葡萄牙',
		'Puerto Rico': '波多黎各',
		'Qatar': '卡塔尔',
		'Reunion': '留尼旺岛',
		'Romania': '罗马尼亚',
		'Russia': '俄罗斯',
		'Rwanda': '卢旺达',
		'San Marino': '圣马力诺',
		'Sao Tome and Principe': '圣多美和普林西比',
		'Saudi Arabia': '沙特阿拉伯',
		'Senegal': '塞内加尔',
		'Seychelles': '塞舌尔',
		'Sierra Leone': '塞拉利昂',
		'Singapore': '新加坡',
		'Slovakia': '斯洛伐克',
		'Slovenia': '斯洛文尼亚',
		'Solomon Islands': '所罗门群岛',
		'Somalia': '索马里',
		'South Africa': '南非',
		'Spain': '西班牙',
		'Sri Lanka': '斯里兰卡',
		'St. Christopher-Nevis': '圣',
		'St. Lucia': '圣露西亚',
		'St. Vincent and the Grenadines': '圣文森特和格林纳丁斯',
		'Sudan': '苏丹',
		'Suriname': '苏里南',
		'Svalbard': '斯瓦尔巴特群岛',
		'Swaziland': '斯威士兰',
		'Sweden': '瑞典',
		'Switzerland': '瑞士',
		'Syria': '叙利亚',
		'Taiwan': '台湾',
		'Tajikistan': '塔吉克斯坦',
		'United Republic of Tanzania': '坦桑尼亚',
		'Thailand': '泰国',
		'Togo': '多哥',
		'Tonga': '汤加',
		'Trinidad and Tobago': '特里尼达和多巴哥',
		'Tunisia': '突尼斯',
		'Turkey': '土耳其',
		'Turkmenistan': '土库曼斯坦',
		'Turks and Caicos Islands': '特克斯和凯科斯群岛',
		'Uganda': '乌干达',
		'Ukraine': '乌克兰',
		'United Arab Emirates': '阿联酋',
		'United Kingdom': '英国',
		'United States of America': '美国',
		'Uruguay': '乌拉圭',
		'Uzbekistan': '乌兹别克斯坦',
		'Vanuatu': '瓦努阿图',
		'Venezuela': '委内瑞拉',
		'Vietnam': '越南',
		'Western Sahara': '西撒哈拉',
		'Western Samoa': '西萨摩亚',
		'Yemen': '也门',
		'Yugoslavia': '南斯拉夫',
		'Democratic Republic of the Congo': '刚果民主共和国',
		'Zambia': '赞比亚',
		'Zimbabwe': '津巴布韦',
		'South Sudan': '南苏丹',
		'Somaliland': '索马里兰',
		'Montenegro': '黑山',
		'Kosovo': '科索沃',
		'Republic of Serbia': '塞尔维亚',

	};
	let myChart = echarts.init(document.getElementById("guowai_wroid"));

	option = {
		timeline: {
			axisType: 'category',
			orient: 'vertical',
			autoPlay: true,
			inverse: true,
			playInterval: 5000,
			left: null,
			right: -105,
			top: 20,
			bottom: 20,
			width: 46,
		},
		baseOption: {
			visualMap: {
				type: 'piecewise', //分段型。
				splitNumber: 6,
				inverse: true,
				pieces: [{
					min: 0,
					max: 1000,
					color: '#ffaa85'
				}, {
					min: 1000,
					max: 10000,
					color: '#ff7b69'
				}, {
					min: 10000,
					max: 50000,
					color: '#ff254a'
				}, {
					min: 50000,
					max: 100000,
					color: '#cc2929'
				}, {
					min: 100000,
					max: 200000,
					color: '#8c0d0d'
				}, {
					min: 200000,
					//max: 1000,
					color: '#660208'
				}],
				left: 'left',
				top: 'bottom',
				textStyle: {
					color: '#000'
				},
				//min: 0,
				//max: 60000,
				//text:['High','Low'],
				//realtime: true,
				//calculable: true,
				//color: ['red','orange','lightgreen']
			},
			series: [{
				type: 'map',
				map: 'world',
				roam: true,
				itemStyle: {
					emphasis: {
						label: {
							show: false
						}
					}
				},
				nameMap: nameMap

			}]
		},

		options: [{
			title: {
				text: '世界各国确诊病例',
				subtext: '',
				//sublink: 'http://esa.un.org/wpp/Excel-Data/population.htm',
				left: 'center',
				top: 'top'
			},
			tooltip: {
				trigger: 'item',
				formatter: function(params) {
					var value = (params.value);
					//value = value.toFixed(5);toFixed(3)控制小数位数      
					value = value;
					if (!value) {
						return;
					}
					//var abc=(params.abc);
					return params.name + ' : ' + value + '例';
				}
			},
			series: {
				data: data

			}
		}, ]
	};
	myChart.setOption(option);


}

function worid_tu_2(data) {
	var nameMap = {
		'Afghanistan': '阿富汗',
		'Albania': '阿尔巴尼亚',
		'Algeria': '阿尔及利亚',
		'Andorra': '安道尔',
		'Angola': '安哥拉',
		'Antarctica': '南极洲',
		'Antigua and Barbuda': '安提瓜和巴布达',
		'Argentina': '阿根廷',
		'Armenia': '亚美尼亚',
		'Australia': '澳大利亚',
		'Austria': '奥地利',
		'Azerbaijan': '阿塞拜疆',
		'The Bahamas': '巴哈马',
		'Bahrain': '巴林',
		'Bangladesh': '孟加拉国',
		'Barbados': '巴巴多斯',
		'Belarus': '白俄罗斯',
		'Belgium': '比利时',
		'Belize': '伯利兹',
		'Benin': '贝宁',
		'Bermuda': '百慕大',
		'Bhutan': '不丹',
		'Bolivia': '玻利维亚',
		'Bosnia and Herzegovina': '波斯尼亚和黑塞哥维那',
		'Botswana': '博茨瓦纳',
		'Brazil': '巴西',
		'Brunei': '文莱',
		'Bulgaria': '保加利亚',
		'Burkina Faso': '布基纳法索',
		'Burundi': '布隆迪',
		'Cambodia': '柬埔寨',
		'Cameroon': '喀麦隆',
		'Canada': '加拿大',
		'Cape Verde': '佛得角',
		'Central African Republic': '中非共和国',
		'Chad': '乍得',
		'Chile': '智利',
		'China': '中国',
		'Colombia': '哥伦比亚',
		'Comoros': '科摩罗',
		'Republic of the Congo': '刚果共和国',
		'Costa Rica': '哥斯达黎加',
		'Croatia': '克罗地亚',
		'Cuba': '古巴',
		'Cyprus': '塞浦路斯',
		'Czech Republic': '捷克共和国',
		'Denmark': '丹麦',
		'Djibouti': '吉布提',
		'Dominica': '多米尼加',
		'Dominican Republic': '多明尼加共和国',
		'Ecuador': '厄瓜多尔',
		'Egypt': '埃及',
		'El Salvador': '萨尔瓦多',
		'Equatorial Guinea': '赤道几内亚',
		'Eritrea': '厄立特里亚',
		'Estonia': '爱沙尼亚',
		'Ethiopia': '埃塞俄比亚',
		'Falkland Islands': '福克兰群岛',
		'Faroe Islands': '法罗群岛',
		'Fiji': '斐济',
		'Finland': '芬兰',
		'France': '法国',
		'French Guiana': '法属圭亚那',
		'French Southern and Antarctic Lands': '法属南半球和南极领地',
		'Gabon': '加蓬',
		'Gambia': '冈比亚',
		'Gaza Strip': '加沙',
		'Georgia': '格鲁吉亚',
		'Germany': '德国',
		'Ghana': '加纳',
		'Greece': '希腊',
		'Greenland': '格陵兰',
		'Grenada': '格林纳达',
		'Guadeloupe': '瓜德罗普',
		'Guatemala': '危地马拉',
		'Guinea': '几内亚',
		'Guinea Bissau': '几内亚比绍',
		'Guyana': '圭亚那',
		'Haiti': '海地',
		'Honduras': '洪都拉斯',
		'Hong Kong': '香港',
		'Hungary': '匈牙利',
		'Iceland': '冰岛',
		'India': '印度',
		'Indonesia': '印尼',
		'Iran': '伊朗',
		'Iraq': '伊拉克',
		'Iraq-Saudi Arabia Neutral Zone': '伊拉克阿拉伯中立区',
		'Ireland': '爱尔兰',
		'Isle of Man': '马恩岛',
		'Israel': '以色列',
		'Italy': '意大利',
		'Ivory Coast': '科特迪瓦',
		'Jamaica': '牙买加',
		'Jan Mayen': '扬马延岛',
		'Japan': '日本',
		'Jordan': '约旦',
		'Kazakhstan': '哈萨克斯坦',
		'Kenya': '肯尼亚',
		'Kerguelen': '凯尔盖朗群岛',
		'Kiribati': '基里巴斯',
		'North Korea': '北朝鲜',
		'South Korea': '韩国',
		'Kuwait': '科威特',
		'Kyrgyzstan': '吉尔吉斯斯坦',
		'Laos': '老挝',
		'Latvia': '拉脱维亚',
		'Lebanon': '黎巴嫩',
		'Lesotho': '莱索托',
		'Liberia': '利比里亚',
		'Libya': '利比亚',
		'Liechtenstein': '列支敦士登',
		'Lithuania': '立陶宛',
		'Luxembourg': '卢森堡',
		'Macau': '澳门',
		'Macedonia': '马其顿',
		'Madagascar': '马达加斯加',
		'Malawi': '马拉维',
		'Malaysia': '马来西亚',
		'Maldives': '马尔代夫',
		'Mali': '马里',
		'Malta': '马耳他',
		'Martinique': '马提尼克',
		'Mauritania': '毛里塔尼亚',
		'Mauritius': '毛里求斯',
		'Mexico': '墨西哥',
		'Moldova': '摩尔多瓦',
		'Monaco': '摩纳哥',
		'Mongolia': '蒙古',
		'Morocco': '摩洛哥',
		'Mozambique': '莫桑比克',
		'Myanmar': '缅甸',
		'Namibia': '纳米比亚',
		'Nepal': '尼泊尔',
		'Netherlands': '荷兰',
		'New Caledonia': '新喀里多尼亚',
		'New Zealand': '新西兰',
		'Nicaragua': '尼加拉瓜',
		'Niger': '尼日尔',
		'Nigeria': '尼日利亚',
		'Northern Mariana Islands': '北马里亚纳群岛',
		'Norway': '挪威',
		'Oman': '阿曼',
		'Pakistan': '巴基斯坦',
		'Panama': '巴拿马',
		'Papua New Guinea': '巴布亚新几内亚',
		'Paraguay': '巴拉圭',
		'Peru': '秘鲁',
		'Philippines': '菲律宾',
		'Poland': '波兰',
		'Portugal': '葡萄牙',
		'Puerto Rico': '波多黎各',
		'Qatar': '卡塔尔',
		'Reunion': '留尼旺岛',
		'Romania': '罗马尼亚',
		'Russia': '俄罗斯',
		'Rwanda': '卢旺达',
		'San Marino': '圣马力诺',
		'Sao Tome and Principe': '圣多美和普林西比',
		'Saudi Arabia': '沙特阿拉伯',
		'Senegal': '塞内加尔',
		'Seychelles': '塞舌尔',
		'Sierra Leone': '塞拉利昂',
		'Singapore': '新加坡',
		'Slovakia': '斯洛伐克',
		'Slovenia': '斯洛文尼亚',
		'Solomon Islands': '所罗门群岛',
		'Somalia': '索马里',
		'South Africa': '南非',
		'Spain': '西班牙',
		'Sri Lanka': '斯里兰卡',
		'St. Christopher-Nevis': '圣',
		'St. Lucia': '圣露西亚',
		'St. Vincent and the Grenadines': '圣文森特和格林纳丁斯',
		'Sudan': '苏丹',
		'Suriname': '苏里南',
		'Svalbard': '斯瓦尔巴特群岛',
		'Swaziland': '斯威士兰',
		'Sweden': '瑞典',
		'Switzerland': '瑞士',
		'Syria': '叙利亚',
		'Taiwan': '台湾',
		'Tajikistan': '塔吉克斯坦',
		'United Republic of Tanzania': '坦桑尼亚',
		'Thailand': '泰国',
		'Togo': '多哥',
		'Tonga': '汤加',
		'Trinidad and Tobago': '特里尼达和多巴哥',
		'Tunisia': '突尼斯',
		'Turkey': '土耳其',
		'Turkmenistan': '土库曼斯坦',
		'Turks and Caicos Islands': '特克斯和凯科斯群岛',
		'Uganda': '乌干达',
		'Ukraine': '乌克兰',
		'United Arab Emirates': '阿联酋',
		'United Kingdom': '英国',
		'United States of America': '美国',
		'Uruguay': '乌拉圭',
		'Uzbekistan': '乌兹别克斯坦',
		'Vanuatu': '瓦努阿图',
		'Venezuela': '委内瑞拉',
		'Vietnam': '越南',
		'Western Sahara': '西撒哈拉',
		'Western Samoa': '西萨摩亚',
		'Yemen': '也门',
		'Yugoslavia': '南斯拉夫',
		'Democratic Republic of the Congo': '刚果民主共和国',
		'Zambia': '赞比亚',
		'Zimbabwe': '津巴布韦',
		'South Sudan': '南苏丹',
		'Somaliland': '索马里兰',
		'Montenegro': '黑山',
		'Kosovo': '科索沃',
		'Republic of Serbia': '塞尔维亚',

	};
	let myChart = echarts.init(document.getElementById("guowai_wroid_2"));

	option = {
		timeline: {
			axisType: 'category',
			orient: 'vertical',
			autoPlay: true,
			inverse: true,
			playInterval: 5000,
			left: null,
			right: -105,
			top: 20,
			bottom: 20,
			width: 46,
		},
		baseOption: {
			visualMap: {
				type: 'piecewise', //分段型。
				splitNumber: 6,
				inverse: true,
				pieces: [{
					min: 0,
					max: 1000,
					color: '#ffaa85'
				}, {
					min: 1000,
					max: 10000,
					color: '#ff7b69'
				}, {
					min: 10000,
					max: 50000,
					color: '#ef254a'
				}, {
					min: 50000,
					max: 100000,
					color: '#cc2929'
				}, {
					min: 100000,
					max: 200000,
					color: '#8c0d0d'
				}, {
					min: 200000,
					//max: 1000,
					color: '#660208'
				}],
				left: 'left',
				top: 'bottom',
				textStyle: {
					color: '#000'
				},
				//min: 0,
				//max: 60000,
				//text:['High','Low'],
				//realtime: true,
				//calculable: true,
				//color: ['red','orange','lightgreen']
			},
			series: [{
				type: 'map',
				map: 'world',
				roam: true,
				itemStyle: {
					emphasis: {
						label: {
							show: false
						}
					}
				},
				nameMap: nameMap

			}]
		},

		options: [{
			title: {
				text: '世界各国确诊病例',
				subtext: '',
				//sublink: 'http://esa.un.org/wpp/Excel-Data/population.htm',
				left: 'center',
				top: 'top'
			},
			tooltip: {
				trigger: 'item',
				formatter: function(params) {
					var value = (params.value);
					//value = value.toFixed(5);toFixed(3)控制小数位数      
					value = value;
					if (!value) {
						return;
					}
					//var abc=(params.abc);
					return params.name + ' : ' + value + '例';
				}
			},
			series: {
				data: data

			}
		}, ]
	};
	myChart.setOption(option);


	$("#map_a_2").click();
}
