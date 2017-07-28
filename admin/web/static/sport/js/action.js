$(function(){
    var domain = 'https://oi7ro6pyq.qnssl.com/';
    var water = '?imageView2/2/w/200';

    var action = {
        init: function(){
            this.getDom();
            this.initUploader();
            this.postData();

        },

        getDom: function(){
            this.imgBtn = $('#coverimg');
            this.videoBtn = $('#video');
            this.picShowDiv = $('#picshow');
            this.mp4ShowDiv = $('#mp4Show');
            this.mp4Size = $('#vfilesize-val');
            this.fixCont = $('.fix-cont');
            this.fixWrmp = $('.fix-per');
            this.subBtn = $('#sub');
            this.form = $('form[name=action]');
        },

        initUploader: function(){
            var me = this;

            me.qiniuUploader('coverimg');
            me.qiniuUploader('video', 'mp4', '40mb');
        },

        qiniuUploader: function(obj, type, size){
            var me = this;
            var uploader = Qiniu.uploader({
                runtimes: 'html5,flash,html4',
                browse_button: obj,
                max_file_size: (size ? size : '2mb'),
                flash_swf_url: '/static/qiniu/Moxie.swf',
                dragdrop: false,
                uptoken: $('#uptoken').val(),
                domain: domain,
                get_new_uptoken: false,
                unique_names: true,
                max_retries: 3,
                auto_start: true,
                multi_selection: false,
                filters: {
                    mime_types : [
                        { title : "Image files", extensions : (type ? type : "jpg,png,jpeg") }
                    ]
                },

                init: {
                    UploadProgress: function(up, file) {
                        // // console.log(up);
                        // console.log(file.percent);
                        me.fixCont.text(file.percent+'%');
                        me.fixWrmp.fadeIn(200);

                    },
                    FileUploaded: function(up, file, info) {
                        if(info.status == 200){
                            var input = $('#'+obj+'-val');
                            var url = domain + eval('('+info.response+')')['key'];
                            input.val(url);
                            if(type != 'mp4'){
                                url += water;
                                me.makeImgDom(url);
                            }
                            else{
                                me.makeMp4Dom(url);
                                me.mp4Size.val(file.size);
                            }
                        }
                        me.hideFixDiv();
                    },
                    Error: function(up, err, errTip) {
                        alert(errTip);
                        me.hideFixDiv();
                        return false;
                    }
                }
            });
        },

        makeImgDom: function(img){
            var me = this;

            var htmlCont = '<div style="margin-bottom:15px;">'+
                                '<img src="'+img+'" height="300" />'+
                            '</div>';
            me.picShowDiv.html(htmlCont);
        },

        makeMp4Dom: function(mp4){
            var me = this;

            var htmlCont = '<div style="margin-bottom:15px;width:300px;">'+
                                '<video style="width:100%;" controls autobuffer autoplay>'+
                                    '<source src= "'+mp4+'" type="video/mp4; codecs="avc1.42E01E, mp4a.40.2">'+
                                    '</source>'+
                                '</video>'+
                            '</div>';
            me.mp4ShowDiv.html(htmlCont);
        },

        hideFixDiv: function(){
            var me = this;
            me.fixWrmp.fadeOut(100);
        },

        checkParams: function(){
            return true;
            // var me = this;

            // var data = me.form.serialize().split('&');
            // return false;
        },

        postData: function(){
            var me = this;

            me.subBtn.unbind().bind('click', function(){
                if(false === me.checkParams()){
                    return false;
                }

                $.post(
                    '/action/insert', 
                    me.form.serialize(), 
                    function(json){
                        if(json.errCode != 0){
                            alert(json.errMessage ? json.errMessage : '提交失败！');
                            return false;
                        }
                        else{
                            window.location = '/sport/action';
                        }
                });
            });
            
        },

    };

    action.init();
})