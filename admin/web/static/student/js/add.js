$(function(){

	var addSchool = {

		init: function(){

			this.getDom();
			this.postData();
			this.getCity();
			this.getDistrict();
			this.getSchool();
			this.getClass();
			this.initDate();
		},

		getDom: function(){

			this.form = $('form[name=school]');
			this.sub = $('#sub');
			this.province = $('#province');
			this.city = $('#city');
			this.district = $('#district');
			this.school = $('#school');
			this.grade = $('#grade');
			this.class = $('#class');
			this.username = $('#username');
			this.birthday = $('#start');
			this.sex = $('#sex');
			this.startBtn = $('.date_start');
            this.endBtn = $('.date_end');
		},

		initDate: function(){
            var me = this;

            me.startBtn.datetimepicker({
                language: 'zh-CN',
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                minView: 2,
                forceParse: 0,
                pickerPosition: "bottom-left",
            });

            me.endBtn.datetimepicker({
                language: 'zh-CN',
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                minView: 2,
                forceParse: 0,
                pickerPosition: "bottom-left",
            });
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

			if(me.school.val() == "" || me.school.val() == -1){
				alert('请正确输入学校');
				return false;
			}

			if(me.grade.val() == "" || me.grade.val() == -1){
				alert('请输入年级');
				return false;
			}

			if(me.class.val() == "" || me.class.val() == -1){
				alert('请输入班级');
				return false;
			}

			if(me.sex.val() == "" || me.sex.val() == -1){
				alert('请输入性别');
				return false;
			}

			if(me.username.val() == ""){
				alert('请输入名字');
				return false;
			}

			if(me.birthday.val() == ""){
				alert('请输入学生生日');
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

		getSchool: function(){

			var me = this;
			me.district.unbind().bind('change',function(){
				var option = "<option value=" + "-1" + "selected>请选择学校</option>";
				var data = 'districtId=' + me.district.val();
				me.school.find("option").empty();

				$.post(
					'/school/list',
					data,
					function(json){
						$.each(json.data.schoolList,function(key,value){
							option = option + "<option value=" + value._id + ">" + value.name + "</option>";
						});
						me.school[0].innerHTML = option;
					}
				);
			});
		},

		getClass: function(){

			var me = this;
			me.school.unbind().bind('change',function(){
				var option = "<option value=" + "-1" + ">请选择学校所班级</option>";
				var data = 'schoolId=' + me.school.val() + '&gradeNo=' + me.grade.val();
				me.class.find("option").empty();

				$.post(
					'/class/list',
					data,
					function(json){
						$.each(json.data.classList,function(key,value){
							option = option + "<option value=" + value._id + ">" + value.name + "</option>";
						});
						me.class[0].innerHTML = option;
					}
				);
			});

			me.grade.unbind().bind('change',function(){
				var option = "<option value=" + "-1" + ">请选择学校所班级</option>";
				var data = 'schoolId=' + me.school.val() + '&gradeNo=' + me.grade.val();
				me.class.find("option").empty();

				$.post(
					'/class/list',
					data,
					function(json){
						$.each(json.data.classList,function(key,value){
							option = option + "<option value=" + value._id + ">" + value.name + "</option>";
						});
						me.class[0].innerHTML = option;
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
					'/student/insert',
					data,
					function(json){

						if(json.errCode != 0){
							alert(json.errMessage ? json.errMessage : '提交失败！');
                            return false;
						}else{
							if(confirm('学生添加成功,立即查看？')){
                                window.location = '/user/student?uid=' + json.data.userId;
                            }
                            else{
                                window.location = '/user/add';
                            }
						}
					}
				);
			});
		}
	}

	addSchool.init();

})