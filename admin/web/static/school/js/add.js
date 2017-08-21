$(function(){

	var addSchool = {

		init: function(){

			this.getDom();
			this.postData();
		},

		getDom: function(){

			this.form = $('form[name=school]');
			this.sub = $('#sub');
		},

		postData: function(){

			var me = this;
			me.sub.click(function(){
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