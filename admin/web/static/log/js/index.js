$(function(){
    var log = {

        init: function(){

            this.getDom();
            this.initDate();
            this.postData();
        },

        getDom: function(){

            this.startBtn = $('.date_start');
            this.submitBtn = $('#submit');
            this.startTime = $('#start');
            this.logList = $('#log-list');
            
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
        },

        postData: function(){
            var me = this;

            me.submitBtn.unbind().bind('click',function(){

                var start = me.startTime.val();
                var data = 'startTime=' + start;

                $.post('/log/read', data, function(json){

                    if(json.errCode != 0){
                        alert(123);
                        alert(json.errMessage ? json.errMessage : '获取失败！');
                        return false;
                    }else{

                        me.logList.children().remove();
                        var logDiv = "";
                        $.each(json.data.content,function(index,value){

                            logDiv = logDiv + "<tr><td>" + value + "</td></tr>";

                        });

                        me.logList.append(logDiv);
                        
                    }
                })
            });
        }
        
    };

    log.init();
})