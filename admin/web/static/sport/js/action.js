$(function(){
    var domain = 'https://oi7ro6pyq.qnssl.com/';
    var water = '?imageView2/2/w/200';

    var action = {
        init: function(){
            this.getDom();
            this.initUploader();
        },

        getDom: function(){
            this.imgBtn = $('#coverimg');
            this.videoBtn = $('#video');
            this.picShowDiv = $('#picshow');
            this.mp4ShowDiv = $('#mp4Show');
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
                    'UploadProgress': function(up, file) {
                        // todo
                    },
                    'FileUploaded': function(up, file, info) {
                        if(info.status == 200){
                            var input = $('#'+obj+'-val');
                            var url = domain + eval('('+info.response+')')['key'];
                            input.val(url);

                            if(type == 'mp4'){
                                var htmlCont = '<div style="margin-bottom:15px;width:200px;"><video style="width:100%;" controls autobuffer autoplay><source src= "'+url+'" type="video/mp4; codecs="avc1.42E01E, mp4a.40.2"></source></video></div>';
                                me.mp4ShowDiv.html(htmlCont);
                                console.log(url);
                            }
                            else{
                                var thumab = url + water;
                                var htmlCont = '<div style="margin-bottom:15px;"><img src="'+thumab+'" width="200" /></div>';
                                me.picShowDiv.html(htmlCont);
                            }
                            // 
                            // $('#coverimgurl').attr('src', thumab);
                            // 
                        }
                    },
                    'Error': function(up, err, errTip) {
                        alert(errTip);
                        return false;
                    }
                }
            });
        },

    };

    action.init();
    
    
})