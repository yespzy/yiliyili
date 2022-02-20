
//医疗门诊省份接口请求
$.ajax({
  url: 'https://wechat.wecity.qq.com/api/THPneumoniaService/getHospitalProvince',
  type: 'POST',
  contentType: 'application/json;charset=utf-8',
  data: JSON.stringify({
    service: 'THPneumoniaOuterService',
    args: { req: {} },
    func: 'getHospitalProvince',
    context: { channel: 'AAEEviDRbllNrToqonqBmrER' }
  }),
  success: function(res) {
    if (res.args.rsp.result.code == 0) {
      let provincesList = res.args.rsp.provinces;
      hospitalProvinceData($('.div-hospital'), provincesList);
    }
  }
});
//医疗门诊城市接口请求
function request_City($cur, province) {
  $.ajax({
    url: 'https://wechat.wecity.qq.com/api/THPneumoniaService/getHospitalCityByProvince',
    type: 'POST',
    contentType: 'application/json;charset=utf-8',
    data: JSON.stringify({
      service: 'THPneumoniaOuterService',
      args: {
        req: {
          province: province
        }
      },
      func: 'getHospitalCityByProvince',
      context: { channel: 'AAEEviDRbllNrToqonqBmrER' }
    }),
    success: function(res) {
      if (res.args.rsp.result.code == 0) {
        mapHealthCity($cur, res.args.rsp.info.citys);
      }
    }
  });
}
//拼接医疗门诊省份
function hospitalProvinceData($el, list) {
  $el.empty();
  list.map(function(d) {
    var _html = '';
    var _html = $(`
      <div class="hotelItemWrap" province="${d.provinceName}">
        <div class="hotelProvince" data-province="${d.provinceName}" data-count="${d.cityCnt}">
          <div class="name">${d.provinceName}</div>
          <div class="count"></div>
        </div>
      </div>
    `);
    $el.append(_html);
    _html.find('.hotelProvince').click(function(e) {
      let province = e.currentTarget.dataset.province;
      let count = e.currentTarget.dataset.count;
      let cCount = $(this)
        .parent()
        .children('.hotelCity').length;
      if (cCount == 0 && count != 0) {
        request_City($(this), province);
      }
      $(this)
        .closest('.hotelItemWrap')
        .toggleClass('current');
    });
  });
  $el
    .children('.hotelItemWrap')
    .first()
    .children()
    .trigger('click');
}
//拼接医疗门诊城市
function mapHealthCity($el, list) {
  var _html = '';
  list.map(function(d) {
	if(d.cityName == '北京') {
		d.link.url = "hospital_example.html";
	}
    _html = $(`
        <div class="hotelCity">
          <div class="name">${d.cityName}</div>
          <div class="count">${d.count}家<span>进入查询</span></div>
          <a class="healthlink" href="${d.link.url}"/>
        </div>
    `);
    // console.log(_html)
    $el.parent().append(_html);
    // $el.parent().find('.hotelCity').click(function(){
    //   console.log('----跳转地址',d.link.url);
    //   window.location.href=d.link.url;
    // });
  });
}
