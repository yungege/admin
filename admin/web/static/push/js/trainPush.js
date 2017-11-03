$(function(){
    var domain = 'https://oi7ro6pyq.qnssl.com/';
    var water = '?imageView2/2/w/200';
    var addPro = {

        init: function(){
            this.getDom();
            this.postData();
            this.addGrade();
            this.delGrade();
            this.initUe();
            this.showBox();
        },

        getDom: function(){
            this.subBtn = $('#sub');
            this.form = $('form[name=push]');
            this.fixCont = $('.fix-cont');
            this.fixWrmp = $('.fix-per');
            this.addBtn = $('#t-r');
            this.delBtn = $('#t-l');
            this.gradeList = $('#grade_apply');
            this.gradeSelectList = $('#grade_apply_select');
            this.school = $('#schoolIds');
            this.theme = $('#theme');
            this.desc = $('#desc');
            this.type = $('#platform');
            this.platform = $('#type');
            this.schoolDiv = $('.school');
            this.gradeDiv = $('.grade');
            this.classDiv = $('.class');
            this.userDiv = $('.user');
            this.user = $('#userIds');
            this.class = $('#classIds');
        },

        initUe: function(){

            this.ue = UE.getEditor('editor',{
                initialFrameWidth:null,//设置编辑器宽度
                initialFrameHeight:300,//设置编辑器高度
            });
        },

        showBox: function(){

            var me = this;
            me.platform.bind("change",function(){
                var type = me.platform.val();

                if(type == 3){
                    me.schoolDiv.show();
                    me.gradeDiv.show();
                    me.userDiv.hide();
                    me.classDiv.hide();
                }else if(type == 2){
                    me.classDiv.show();
                    me.schoolDiv.hide();
                    me.gradeDiv.hide();
                    me.userDiv.hide();
                }else if(type == 1){
                    me.userDiv.show();
                    me.schoolDiv.hide();
                    me.gradeDiv.hide();
                    me.classDiv.hide();
                }else{
                    me.schoolDiv.hide();
                    me.gradeDiv.hide();
                    me.classDiv.hide();
                    me.userDiv.hide();
                }
            });
        },
       
        postData: function(){
            var me = this;
            me.subBtn.click(function(){

                if(me.checkParams() == false){
                    return false;
                };
                var data = me.form.serialize();
                var gids = me.getSelectedGrade();

                $.post(
                    '/push/ptrain', data + '&grade=' + gids, 
                    function(json){

                        alert(json);
                        return false;

                        if(json.errCode != 0){
                            alert(json.errMessage ? json.errMessage : '推送失败！');
                            return false;
                        }
                        else{
                            alert('推送成功.');
                            window.location = '/push/grade';
                        }
                });
            });
        },

        checkParams:function(){
            // return false;
            var me = this;
            if(me.platform.val() == ""){
                alert('请选择类型');
                return false;
            }

            if(me.school.val() == "" && me.platform.val() == 3){
                alert('请输入学校ID');
                return false;
            }

            if(me.getSelectedGrade() == "" && me.platform.val() == 3){
                alert('请选择年级');
                return false;
            }

            if(me.class.val() == "" && me.platform.val() == 2){
                alert('请输入班级ID');
                return false;
            }

            if(me.user.val() == "" && me.platform.val() == 1){
                alert('请输入用户ID');
                return false;
            }

            if(me.theme.val() == ""){
                alert('请输入推送主题');
                return false;
            }

            if(me.desc.val() == ""){
                alert('请输入推送内容');
                return false;
            } 

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