$(function(){
    var ugc = {

        init: function(){
            this.getDom();
            this.initDate();
        },

        getDom: function(){
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
    };

    ugc.init();
})