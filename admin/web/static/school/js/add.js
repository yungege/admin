$(function(){

	var addSchool = {

		init: function(){

			this.getDom();
			this.postData();
			this.getCity();
			this.getDistrict();
		},

		getDom: function(){

			this.form = $('form[name=school]');
			this.sub = $('#sub');
			this.province = $('#province');
			this.city = $('#city');
			this.district = $('#district');
			this.schoolName = $('#schoolName')
		},

		checkParams: function(){

			var me = this;
			if(me.province.val() == "" || me.province.val() == -1){
				alert('请选择学校所在省分.');
				return false;
			}

			if(me.city.val() == "" || me.city.val() == -1){
				alert('请选择学校所在城市.');
				return false;
			}

			if(me.district.val() == "" || me.district.val() == -1){
				alert('请选择学校所在区');
				return false;
			}

			if(me.schoolName.val() == ""){
				alert('请正确输入学校名称');
				return false;
			}

		},

		getCity: function(){

			var me = this;
			me.province.unbind().bind('change',function(){

				var option = "<option value='" + "-1" + "'selected>请选择学校所在城市</option>";
				var data = 'provinceId=' + me.province.val();
				$.post(
					'/area/city',
					data,
					function(json){
						me.city.find("option").empty();
						$.each(json.data.cityList,function(key,value){
							option = option + "<option value=" + value._id + " >" + value.name + "</option>";
						});
						me.city[0].innerHTML = option;
					}
				);
			});
		},

		getDistrict: function(){

			var me = this;
			me.city.unbind().bind('change',function(){
				var option = "<option value=" + "-1" + "selected>请选择学校所在区</option>";
				var data = 'cityId=' + me.city.val();
				me.district.find("option").empty();

				$.post(
					'/area/district',
					data,
					function(json){
						$.each(json.data.districtList,function(key,value){
							option = option + "<option value=" + value._id + ">" + value.name + "</option>";
						});
						me.district[0].innerHTML = option;
					}
				);
			});
		},

		postData: function(){

			var me = this;
			me.sub.click(function(){
				if(me.checkParams() == false){
					return false;
				}
				var data = me.form.serialize();
				$.post(
					'/school/insert',
					data,
					function(json){
						if(json.errCode != 0){
							alert(json.errMessage ? json.errMessage : '提交失败！');
                            return false;
						}else{
							if(confirm('学校添加成功,立即查看？')){
                                window.location = '/user/school?schoolid=' + json.data.schoolId;
                            }
                            else{
                                window.location = '/school/add';
                            }
						}
					}
				);
			});
		}
	}

	addSchool.init();

})