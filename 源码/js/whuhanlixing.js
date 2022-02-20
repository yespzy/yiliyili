$.ajax({
	type: "GET",
	url: "http://huiyan.baidu.com/migration/historycurve.jsonp?dt=city&id=420100&type=move_in",
	dataType: 'jsonp',
	crossDomain: true,
	success: function(data) {
		var date = [];
		var dateshu = [];
		const date1 = new Array();
		const dateshu1 = new Array();
		var a = data.data
		let x = 0;
		for (var i in data.data.list) {
			date[x] = i;
			dateshu[x] = data.data.list[i]
			x++;
		}

		for (let i = 91, y = 0; i < dateshu.length; i++, y++) {
			date1[y] = (date[i].substr(4, 2) + "/" + date[i].substr(6, 2)), toString()
			dateshu1[y] = dateshu[i]
		}
		jie(date1, dateshu1);
	}
});

function jie(date1, dateshu1) {

	let myChart = echarts.init(document.getElementById("wuhanzhi"));
	option = {
		title: {
			text: '最美逆行者——武汉迁徒指数',
			subtext: '',
			left: 'center',
			textStyle: {
				color: '#000'
			}
		},
		tooltip: {
			trigger: 'axis'
		},
		legend: {
			color: ["#F58080"],
			data: ['最美逆行者——武汉迁徒指数'],
			left: 'center',
			bottom: 'bottom'
		},
		grid: {
			top: 'middle',
			left: '3%',
			right: '4%',
			bottom: '3%',
			height: '80%',
			containLabel: true
		},
		xAxis: {
			type: 'category',
			data: date1,
			axisLine: {
				lineStyle: {
					color: "#999"
				}
			}
		},
		yAxis: {
			type: 'value',

			splitLine: {
				lineStyle: {
					type: 'dashed',
					color: '#DDD'
				}
			},
			axisLine: {
				show: false,
				lineStyle: {
					color: "#333"
				},
			},
			nameTextStyle: {
				color: "#999"
			},
			splitArea: {
				show: false
			}
		},
		series: [{
				name: '最美逆行者——武汉迁徒指数',
				type: 'line',
				data: dateshu1,

				color: "#F58080",
				lineStyle: {
					normal: {
						width: 5,
						color: {
							type: 'linear',

							colorStops: [{
								offset: 0,
								color: '#FFCAD4' // 0% 处的颜色
							}, {
								offset: 0.4,
								color: '#F58080' // 100% 处的颜色
							}, {
								offset: 1,
								color: '#F58080' // 100% 处的颜色
							}],
							globalCoord: false // 缺省为 false
						},
						shadowColor: 'rgba(245,128,128, 0.5)',
						shadowBlur: 10,
						shadowOffsetY: 7
					}
				},
				itemStyle: {
					normal: {
						color: '#F58080',

						shadowColor: 'rgba(72,216,191, 0.3)',
						shadowBlur: 100,
						// borderColor: "#F58080"
					}
				},
				smooth: true
			},

		]
	};

	myChart.setOption(option);
}
