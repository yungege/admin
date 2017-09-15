$(function(){

    var addHomework = {

        init: function(){
            this.getDom();
            this.addClass();
            this.delClass();
            this.searchClass();
            this.postData();
            this.initDate();
        },

        getDom: function(){
            this.startBtn = $('.date_start');
            this.endBtn = $('.date_end');
            this.searchBtn = $('#search');
            this.form = $('form[name=class]');
            this.addBtn = $('#t-r');
            this.delBtn = $('#t-l');
            this.classList = $('#class-list');
            this.classSelectList = $('#class-list-select');
            this.subBtn = $('#addHomeworkBtn');
            this.start = $('#start');
            this.end = $('#end');
            this.homeworkType = $('#homework-type');
            this.homeworkName = $('#homework-name');
            this.homeworkDescribe = $('#homework-describe');
            this.homeworkRequire = $('#homework-require');
            this.weekDoneNo = $('#week-done-no');
            this.makeupLimit = $('#makeup-limit');
            this.makeupInterval = $('#makeup-interval');
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

        searchClass: function(){
            var me =this;
            me.searchBtn.unbind().bind('click', function(){
                var data = me.form.serialize();
                $.post('/user/classsearch', data, function(json){
                    if(json.data.list){
                        var option = '';
                        $.each(json.data.list, function(i, item){
                            option += "<optgroup label='"+ i +"'>";
                            $.each(item, function(ci, citem){
                                option += ("<option value='"+citem._id+"'>" + citem.name + "</option>");
                            });
                            option += "</optgroup>";
                        });
                        me.classList.html(option);
                    }
                    else{
                        me.classList.html('');
                    }
                });

            });
        },
      
        addClass: function(){
            var me = this;
            me.addBtn.unbind().bind('click', function(){
                var opt = me.classList.find('option:selected');
                var optionHtml = [];
                var selectedGid = [];

                // 已选择的年级ID
                var selectedOption = me.classSelectList.children();
                if(selectedOption.length != 0){
                    selectedOption.each(function(i){
                        selectedGid.push($(this).val());
                    }); 
                }

                // 验证年级是否已经加入
                $.each(opt, function(i, item){
                    var gid = item.value,
                        txt = item.text;

                    if($.inArray(gid, selectedGid) == -1){
                        var optionItem = '<option value="'+gid+'">'+txt+'</option>';
                        optionHtml.push(optionItem);
                    };
                })

                // 追加班级信息
                if(optionHtml){
                    optionHtml = optionHtml.join('');
                    me.classSelectList.append(optionHtml);
                }
            });
        },

        delClass: function(){
            var me = this;
            me.delBtn.unbind().bind('click', function(){
                var opt = me.classSelectList.find('option:selected');
                $.each(opt, function(i, item){
                    item.remove();
                })
            });
        },

        getSelectedClass: function(){
            var me = this;
                classes = me.classSelectList.children(),
                classIds = [];

            if(classes.length != 0){
                classes.each(function(i){
                    classIds.push($(this).val());
                }); 
            }

            return classIds.join('|');
        },

        postData: function(){
            var me = this;
            me.subBtn.click(function(){

                var data = me.form.serialize();
                var classIds = me.getSelectedClass();
                var startTime = me.start.val();
                var endTime = me.end.val();
                var homeworkType = me.homeworkType.val();
                var homeworkName = me.homeworkName.val();
                var homeworkDescribe = me.homeworkDescribe.val();
                var homeworkRequire = me.homeworkRequire.val();
                var weekDoneNo = me.weekDoneNo.val();
                var makeupLimit = me.makeupLimit.val();
                var makeupInterval = me.makeupInterval.val();

                $.post(
                    '/project/publishhomework', 
                    data + '&classIds=' + classIds + '&startTime=' + startTime + 
                    '&endTime=' + endTime + '&homeworkType=' + homeworkType + '&homeworkName=' + homeworkName + '&homeworkDescribe=' + homeworkDescribe + '&homeworkRequire=' + homeworkRequire + '&weekDoneNo=' + weekDoneNo + '&makeupLimit=' + makeupLimit + '&makeupInterval=' + makeupInterval, 
                    function(json){
                        if(json.errCode != 0){
                            alert(json.errMessage ? json.errMessage : '提交失败！');
                            return false;
                        }
                        else{
                            if(confirm('发布作业成功成功,立即查看作业？')){
                                window.location = '/sport/homework';
                            }
                            else{
                                window.location = '/sport/homework';
                            }
                        }
                });
            });
        },

    };

    addHomework.init();
})