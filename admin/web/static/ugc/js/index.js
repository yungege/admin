$(function(){
    var ugc = {

        init: function(){

            this.getDom();
            this.initDate();
            this.displayBox();
            this.hideBox();
            this.postData();
            this.pictureBox();
            this.directShare();
            this.pictureInit();
        },

        getDom: function(){

            this.startBtn = $('.date_start');
            this.endBtn = $('.date_end');
            this.pictureBtn = $('.btn_picture');
            this.markBtn = $('.btn_mark');
            this.returnBtn = $('#subReturn');
            this.shareBtn = $('.btn_share');
            this.sub = $('#sub');
            this.can = $('#can');
            this.showBox = $('.fix-box');
            this.showPictureBox = $('.fix-box-picture');
            this.description = $('#description');
            this.trainId = $('input[name=trainId]');
            this.toId = $('input[name=toId]');
            this.form = $('form[name=mark]');
            this.imgBoxInner = $('#imgBoxInner');
            this.carouselIndicators = $('.carousel-indicators');
            this.carouselInner = $('.carousel-inner');
        },

        pictureInit: function(){

            $(".start-slide").click(function(){
                $("#myCarousel").carousel('cycle');
            });
            $('#myCarousel').carousel({
                interval: 5000
            });
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
                var sendId = $(this).data('userid');
                me.trainId.val(id); 
                me.toId.val(sendId); 
                me.description.val(mark);
            });
        },

        hideBox: function(){
            var me = this;

            me.can.unbind().bind('click',function(){
                me.description.val("");
                me.showBox.fadeOut(200);
            });

            me.returnBtn.unbind().bind('click',function(){
                me.showPictureBox.fadeOut(200);
            });
        },

        pictureBox: function(){
            var me = this;
            
            me.pictureBtn.unbind().bind('click',function(){
                // me.imgBoxInner.remove();

                // me.pictureInit();

                var id = $(this).data('id');
                var htype = $(this).data('htype');
                var data = 'trainingId=' + id + '&htype=' + htype;

                $.post('/ugc/picture', data, function(json){

                    if(json.errCode != 0){
                        return false;

                    }else{
           
                        var img = "";
                        var no = "";
                        var pictures = json.data.exciseimg;
                        $.each(pictures,function(index,value){

                            // img = img + '<div><img src="' + value +'" width=' + '"100px"></div>';
                            if(index == 0){
                                img = img + '<div class="item active"><img src="' + value + '" width="500" height="150"></div>';
                                no = no + '<li data-target="#myCarousel" data-slide-to="' + index + '" class="active"></li>';
                            }else{
                                img = img + '<div class="item"><img src="' + value + '" width="500"></div>';
                                no = no + '<li data-target="#myCarousel" data-slide-to="' + index + '"></li>';
                            }
                        
                        });

                        me.carouselInner[0].innerHTML = img;
                        me.carouselIndicators[0].innerHTML = no;
                        me.showPictureBox.fadeIn(300);        
                    }
                }); 
            });

        },

        directShare: function(){
            var me = this;
            
            me.shareBtn.unbind().bind('click',function(){
                var id = $(this).data('id');
                var userId = $(this).data('userid');

                window.location = '/ugc/share?userId=' + userId + '&trainingId=' + id;
            });
        },

        postData: function(){
            var me = this;

            me.sub.unbind().bind('click',function(){

                if(me.description.val() == ""){
                    alert('请填入点评内容。');
                    return false;
                }

                var data = me.form.serialize();

                $.post('/ugc/mark', data, function(json){

                    if(json.errCode != 0){
                        alert(json.errMessage ? json.errMessage : '点评失败！');
                        return false;
                    }else{
                        alert('点评成功.');
                        window.location = '/sport/ugc';
                        
                    }
                })
            });
        }
    };

    ugc.init();
})