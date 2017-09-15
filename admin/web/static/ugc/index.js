$(function(){
    var ugc = {

        init: function(){

            this.getDom();
            this.initDate();
            this.displayBox();
            this.hideBox();
           
        },

        getDom: function(){

            this.startBtn = $('.date_start');
            this.endBtn = $('.date_end');
            this.pictureBtn = $('.btn_picture');
            this.markBtn = $('.btn_mark');
            this.sub = $('#sub');
            this.can = $('#can');
            this.showBox = $('.fix-box');
            this.showPictureBox = $('.fix-box-picture');
            this.description = $('#description');
            this.trainId = $('input[name=trainId]');
            this.form = $('form[name=mark]');

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

        displayBox: function(){
            var me = this;
    
            me.markBtn.unbind().bind('click', function(){

                me.showBox.fadeIn(200);
                var id = $(this).data('id');
                var mark = $(this).data('mark');
                me.trainId.val(id); 
                me.description.val(mark);
            });

            me.pictureBtn.unbind().bind('click',function(){
                
                me.showPictureBox.fadeIn(200);
                // $(window).load(function() {
                //      $('#full_feature').swipeslider();
                // }

            });

        },

        hideBox: function(){
            var me = this;

            me.can.unbind().bind('click',function(){

                me.description.val("");
                me.showBox.fadeOut(200);
                
            });
        },

        

    };

    ugc.init();
})