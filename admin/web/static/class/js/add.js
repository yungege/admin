$(function(){

	var addSchool = {

		init: function(){

			this.getDom();
			this.postData();
		},

		getDom: function(){

			this.form = $('form[name=class]');
			this.start = $('#start');
			this.sub = $('#sub');
		},

		postData: function(){

			var me = this;
			me.sub.click(function(){
				var data = me.form.serialize();
				$.post(
					'/class/insert',
					data + '&startTime=' + me.start.val(),
					function(json){

						if(json.errCode != 0){
							alert(json.errMessage ? json.errMessage : '提交失败！');
                            return false;
						}else{
							if(confirm('学校添加成功,立即查看？')){
                                window.location = '/user/class?classid=' + json.data.classId;
                            }
                            else{
                                window.location = '/class/add';
                            }
						}
					}

				);

			});

		}

	}

	addSchool.init();

})