$(function(){
    var domain = 'https://oi7ro6pyq.qnssl.com/';
    var water = '?imageView2/2/w/200';
    var addSku = {

        init: function(){
            this.getDom();
            this.searchAction();
            this.selectAction();
            this.delAction();
            this.posAction();
            this.editActionNum();
            this.doEditActionNum();
            this.cancerAdd();
            this.addSkuInfo();
            this.initUploader();
        },
        getDom: function(){
            this.searchBtn  = $('#search');
            this.form       = $('form[name=action]');
            this.actionList = $('#action-list');

            this.picBtn = $('#coverimg');
            this.picShow = $('#picshow');
            this.picVal = $('#coverimg-val');

            this.fixCont = $('.fix-cont');
            this.fixWrmp = $('.fix-per');

            this.actionListSelect   = $('#action-list-select');
            this.actionListRest     = $('#action-list-rest');
            this.addBtn             = $('#addBtn');
            this.delBtn             = $('#delBtn');
            this.upBtn              = $('#upBtn');
            this.downBtn            = $('#downBtn');
            this.addBtnRest         = $('#rest-add-btn');
            this.formSubmitBtn      = $('#addSkuBtn');
            this.skuForm            = $('form[name=sku]');

            this.addNumBtn          = $('#subNo');
            this.delNumBtn          = $('#canNo');
            this.numInt             = $('#actionNo');
            this.fixIntWrmp         = $('.fix-int-wrmp');
            this.actionNameSpan     = $('#actionNameSpan');

            this.descArea           = $('#desc');

            this.dialogDom          = {};
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

        searchAction: function(){
            var me =this;

            me.searchBtn.unbind().bind('click', function(){
                var data = me.form.serialize();
                $.post('/action/search', data, function(json){
                    if(json.data.list){
                        var option = '';
                        $.each(json.data.list, function(i, item){
                            option += "<optgroup label='"+item.name+"'>";
                            $.each(item.list, function(ci, citem){
                                option += ("<option value='"+item.list[ci]._id+"' type-no='"+item.list[ci].typeno+"'>" + item.list[ci].name + "</option>");
                            });
                            option += "</optgroup>";
                        });
                        me.actionList.html(option);
                    }
                    else{
                        me.actionList.html('');
                    }
                });

            });
        },
        selectAction: function(){
            var me = this;
            me.addAction(me.addBtn, me.actionList, me.actionListSelect, 0);
            me.addAction(me.addBtnRest, me.actionListRest, me.actionListSelect, 1);
        },
        // actionType 1-记时 2-记组 3-节拍 4-休息
        addAction: function(obj, fromSet, toSet, actionType){
            var me = this;
            obj.unbind().bind('click', function(){
                var opt = fromSet.find('option:selected');

                var optionHtml = [],
                    selectedAid = [];

                // 已选择的动作ID
                var selectedOption = toSet.children();
                if(selectedOption.length != 0){
                    selectedOption.each(function(i){
                        selectedAid.push($(this).val());
                    }); 
                }

                // 验证年级是否已经加入
                $.each(opt, function(i, item){
                    var aid = $(this).val(),
                        txt = $(this).text(),
                        type = $(this).attr('type-no');

                    var num = type == 4 ? 1 : 0;
                    var unit = '';
                    if(type == 1){
                        unit = '计时| ';
                    }
                    else if(type == 2){
                        unit = '计组| ';
                    }
                    else if(type == 3){
                        unit = '节拍| ';
                    }

                    // if($.inArray(aid, selectedAid) == -1){
                        var optionItem = '<option value="'+aid+'" groupNo="'+num+'" actionType="'+type+'">'+unit+txt+' ['+num+']</option>';
                        optionHtml.push(optionItem);
                    // };
                })

                // 追加年级信息
                if(optionHtml){
                    optionHtml = optionHtml.join('');
                    toSet.append(optionHtml);
                }
            });
        },
        delAction: function(){
            var me = this;
            me.delBtn.unbind().bind('click', function(){
                var opt = me.actionListSelect.find('option:selected');
                $.each(opt, function(i, item){
                    item.remove();
                })
            });
        },
        posAction: function(){
            var me = this;
            me.changePosAction(me.upBtn, 'up');
            me.changePosAction(me.downBtn, 'down');
        },
        changePosAction: function(obj, type){
            var me = this;

            obj.unbind().bind('click', function(){
                var selectedOption = me.actionListSelect.find('option:selected');
                if(selectedOption.length == 1){
                    selectedOption.each(function(i){
                        if(type == 'up'){
                            var preItem = $(this).prev();
                            if(preItem){
                                // 交换位置
                                var preItemHtml = preItem[0];
                                preItem.remove();
                                $(this).after(preItemHtml);
                            }
                        }
                        else{
                            var nextItem = $(this).next();
                            if(nextItem){
                                // 交换位置
                                var nextItemHtml = nextItem[0];
                                nextItem.remove();
                                $(this).before(nextItemHtml);
                            }
                        }
                    }); 
                }
                else{
                    me.alertMsg('【前移】或者【后移】操作只能选择一个动作！', 'dialog');
                }
            });
        },
        editActionNum: function(){
            var me = this;
            me.actionListSelect.unbind().bind('dblclick', function(){
                var selectedOpt = $(this).find('option:selected')[0].attributes;

                var aId     = selectedOpt.value.value,
                    aType   = selectedOpt.actionType.value,
                    aNum    = selectedOpt.groupNo.value,
                    name    = $(this).find('option:selected')[0].text;
                if(aType == 4) return false;

                me.actionNameSpan.text(name.replace(/\[\d+\]/,''));
                me.fixIntWrmp.fadeIn(200);
                me.addNumBtn.attr('data-aid', aId);
                me.numInt.focus();
            });
        },
        cancerAdd: function(){
            var me = this;
            me.delNumBtn.click(function(){
                me.fixIntWrmp.fadeOut(200);
                me.numInt.val('');
                me.addNumBtn.attr('data-aid', '');
            });
        },
        doEditActionNum: function(){
            var me = this;
            me.addNumBtn.click(function(){
                var num = $.trim(me.numInt.val()),
                    aId = $(this).attr('data-aid');
                if(/^[1-9]\d*$/.test(num) === false){
                    me.alertMsg('动作循环次数必须为正整数,真调皮.','dialog2');
                }
                else{

                    var option = me.actionListSelect.find('option:selected');
                    option.attr('groupNo', num);
                    option.text(option.text().replace(/\d+/, num));
                    me.fixIntWrmp.fadeOut(200);
                    me.numInt.val('');
                    me.addNumBtn.attr('data-aid', '');
                }
            });
        },
        addSkuInfo: function(){
            var me = this;
            me.formSubmitBtn.unbind().bind('click', function(){
                var data = me.skuForm.serialize(),
                    actionList = me.actionListSelect.children(),
                    selectedActions = [],
                    actionItem = {};
                if(actionList.length == 0){
                    me.alertMsg('请先添加动作.', 'dialog3');
                    return false;
                }

                actionList.each(function(i){
                    var actionId = $(this).val(),
                        actionType = $(this).attr('actiontype'),
                        actionCount = $(this).attr('groupno');
                    if(actionType != 4 && actionCount == 0 && actionType != 6){
                        return true;
                    }
                    else{
                        actionItem = {
                            'id':actionId,
                            'type':actionType,
                            'count':actionCount,
                        };
                        selectedActions.push(actionItem);
                    }
                });

                if(selectedActions.length != actionList.length){
                    me.alertMsg('请检查动作循环次数是否正确.', 'dialog4');
                    return false;
                }

                var descInfo = $.trim(me.descArea.val());
                if(!descInfo){
                    me.alertMsg('请输入方案简介.', 'dialog6');
                    return false;
                }

                var difficulty = $('select[name=difficulty]').val(),
                    projectId = $('input[name=project_id]').val();

                if(difficulty == -2){
                    me.alertMsg('请选择难度级别.', 'dialog5');
                    return false;
                }

                var course_type = $('textarea[name=course_type]').val();

                var users = $('textarea[name=users]').val();

                var taboo_crowd = $('textarea[name=taboo_crowd]').val();

                var prepare = $('textarea[name=prepare]').val();

                var physical_reaction = $('textarea[name=physical_reaction]').val();

                var course_advice = $('textarea[name=course_advice]').val();

                var coverimg = $('#coverimg-val').val();

                $.post('/project/addsku', {
                    'actionList' : selectedActions,
                    'project_id' : projectId,
                    'difficulty' : difficulty,
                    'project_desc': descInfo,
                    'course_type': course_type,
                    'users': users,
                    'taboo_crowd': taboo_crowd,
                    'prepare': prepare,
                    'physical_reaction': physical_reaction,
                    'course_advice': course_advice,
                    'coverimg': coverimg,
                }, function(json){
                    if(json.errCode == 0){
                        window.location = '/sport/p/'+projectId+'.html';
                    }
                    else{
                        me.alertMsg(json.errMessage);
                        return false;
                    }
                });
                
            });
        },

        alertMsg: function(text, name){
            var me = this;
            // if(me.dialogDom.name){
            //     return me.dialogDom.name.show();
            // }

            me.dialogDom.name = jqueryAlert({
                'title'   : '',
                'content' : text,
                'modal'   : true,
                'buttons' : {
                    '明白了' : function(){
                        me.dialogDom.name.destroy();
                    },
                }
            });

            return false;
        },
    };

    addSku.init();
})