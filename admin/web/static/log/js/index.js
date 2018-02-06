$(function(){
    var log = {

        init: function(){

            this.getDom();
            this.initDate();
            this.postData();
        },

        getDom: function(){

            this.startBtn = $('.date_start');
            this.endBtn = $('.date_end');
            this.submitBtn = $('#submit');
            
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

        postData: function(){
            var me = this;

            me.submitBtn.unbind().bind('click',function(){

                // alert(1234);
                var startTime = me.startBtn.val();

                // var data = 'start=' + me.startBtn.val();

alert(startTime);
return false;


//                 $.post('/ugc/mark', data, function(json){

//                     if(json.errCode != 0){
//                         alert(json.errMessage ? json.errMessage : '点评失败！');
//                         return false;
//                     }else{
//                         alert('点评成功.');
//                         window.location = '/sport/ugc';
                        
//                     }
//                 })
            });
        }
        
    };

    log.init();
})