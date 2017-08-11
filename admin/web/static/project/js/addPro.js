$(function(){
    var domain = 'https://oi7ro6pyq.qnssl.com/';
    var water = '?imageView2/2/w/200';
    var addPro = {

        init: function(){
            this.getDom();
            this.initUploader();
            this.postData();
            this.addGrade();
            this.delGrade();
        },
        getDom: function(){
            this.subBtn = $('#sub');
            this.picBtn = $('#coverimg');
            this.picShow = $('#picshow');
            this.picVal = $('#coverimg-val');
            this.form = $('form[name=pro]');

            this.fixCont = $('.fix-cont');
            this.fixWrmp = $('.fix-per');

            this.addBtn = $('#t-r');
            this.delBtn = $('#t-l');
            this.gradeList = $('#grade_apply');
            this.gradeSelectList = $('#grade_apply_select');
        },
        initUploader: function(){
            var me = this;

            me.qiniuUploader('coverimg');
        },

        qiniuUploader: function(obj){
            var me = this;
            var uploader = Qiniu.uploader({
                runtimes: 'html5,flash,html4',
                browse_button: obj,
                max_file_size: '2mb',
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
                        { title : "Image files", extensions : "jpg,png,jpeg" }
                    ]
                },

                init: {
                    UploadProgress: function(up, file) {
                        me.fixCont.text(file.percent+'%');
                        me.fixWrmp.fadeIn(200);
                    },
                    FileUploaded: function(up, file, info) {
                        if(info.status == 200){
                            var url = domain + eval('('+info.response+')')['key'];
                            me.picVal.val(url);
                            url += water;
                            me.makeImgDom(url);
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
                                '<img src="'+img+'" />'+
                            '</div>';
            me.picShow.html(htmlCont);
        },
        hideFixDiv: function(){
            var me = this;
            me.fixWrmp.fadeOut(100);
        },
        postData: function(){
            var me = this;
            me.subBtn.click(function(){
                var data = me.form.serialize();
                var gids = me.getSelectedGrade();
                $.post(
                    '/project/addPro', data + '&gids=' + gids, 
                    function(json){
                        if(json.errCode != 0){
                            alert(json.errMessage ? json.errMessage : '提交失败！');
                            return false;
                        }
                        else{
                            if(confirm('创建方案成功,立即添加方案内容？')){
                                window.location = '/project/sku';
                            }
                            else{
                                window.location = '/sport/project';
                            }
                        }
                });
            });
        },

        getSelectedGrade: function(){
            var me = this,
                grades = me.gradeSelectList.children(),
                gids = [];

            if(grades.length != 0){
                grades.each(function(i){
                    gids.push($(this).val());
                }); 
            }

            return gids.join('|');
        },

        addGrade: function(){
            var me = this;
            me.addBtn.unbind().bind('click', function(){
                var opt = me.gradeList.find('option:selected');

                var optionHtml = [],
                    selectedGid = [];

                // 已选择的年级ID
                var selectedOption = me.gradeSelectList.children();
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

                // 追加年级信息
                if(optionHtml){
                    optionHtml = optionHtml.join('');
                    me.gradeSelectList.append(optionHtml);
                }
            });
        },
        delGrade: function(){
            var me = this;
            me.delBtn.unbind().bind('click', function(){
                var opt = me.gradeSelectList.find('option:selected');
                $.each(opt, function(i, item){
                    item.remove();
                })
            });
        },
    };

    addPro.init();
})