$(function(){
    var contrist = {
        init: function(){
            this.getDom();
            this.getCity();
            this.getDistrict();
            this.getSchool();
            this.getGrade();
            this.getClass();
            this.getStudent();

            this.initDate();
            this.postData();
        },

        getDom: function(){
            // 空间维度
            this.provinceSel    = $('#province');
            this.doc            = $(document);
            this.kj             = $('#kj');

            // 时间维度
            this.startBtn       = $('.date_start');
            this.endBtn         = $('.date_end');

            this.subBtn         = $('#subbtn');
            this.downBtn        = $('#export');
            this.form           = $('form[name=form]');
        },

        getCity: function(){
            var me = this;
            me.provinceSel.on('change', function(){
                var provinceId = $(this).val(),
                    that = $(this);
                if(provinceId != -1){
                    $.post('/area/city', {'provinceId':provinceId}, function(json){
                        if(json.data.cityList){
                            me.createSel(json.data.cityList, 'city');
                        }
                        else{
                            that.nextAll().remove();
                        }
                    });
                }
                else{
                    that.nextAll().remove();
                }
            })

        },

        getDistrict: function(){
            var me = this;

            me.doc.on('change', '#city', function(){
                var cityId = $(this).val(),
                    that = $(this);
                
                if(cityId != -1){
                    $.post('/area/district', {'cityId':cityId}, function(json){
                        if(json.data.districtList.length != 0){
                            me.createSel(json.data.districtList, 'district');
                        }
                        else{
                            that.nextAll().remove();
                        }
                    });
                }
                else{
                    that.nextAll().remove();
                }
            });
        },

        getSchool: function(){
            var me = this;

            me.doc.on('change', '#district', function(){
                var districtId = $(this).val(),
                    that = $(this);
                
                if(districtId != -1){
                    $.post('/school/index?districtId='+districtId, function(json){
                        // console.log(json.data.schoolList);
                        if(json.data.schoolList.length != 0){
                            me.createSel(json.data.schoolList, 'school');
                        }
                        else{
                            that.nextAll().remove();
                        }
                    });
                }
                else{
                    that.nextAll().remove();
                }
            })
        },

        getGrade: function(){
            var me = this;

            me.doc.on('change', '#school', function(){
                var schoolId = $(this).val(),
                    that = $(this);
        
                if(schoolId != -1){
                    $.get('/class/index?type=grade&schoolId='+schoolId, function(json){
                        if(json.data.gradeList.length != 0){
                            me.createSel(json.data.gradeList, 'grade');
                        }
                        else{
                            that.nextAll().remove();
                        }
                    });
                }
                else{
                    that.nextAll().remove();
                }
            })
        },

        getClass: function(){
            var me = this;
            me.doc.on('change', '#grade', function(){
                var grade = $(this).val(),
                    that = $(this),
                    schoolId = $('#school').val();
                if(grade != -1){
                    $.get('/class/index?schoolId='+schoolId+'&grade='+grade, function(json){
                        if(json.data.classList.length != 0){
                            me.createSel(json.data.classList, 'class');
                        }
                        else{
                            that.nextAll().remove();
                        }
                    })
                }
                else{
                    that.nextAll().remove();
                }
            });
        },

        getStudent: function(){
            var me = this;
            me.doc.on('change', '#class' ,function(){
                var classId = $(this).val(),
                    that = $(this);
                if(classId != -1){
                    $.get('/user/index?classId='+classId, function(json){
                        if(json.data.userList.length != 0){
                            me.createSel(json.data.userList, 'user');
                        }
                        else{
                            that.nextAll().remove();
                        }
                    })
                }
                else{
                    that.nextAll().remove();
                }
            });
        },

        createSel: function(objArr, type){
            var me= this,
                html = [],
                obj = $('#'+type);

            obj.nextAll().remove();
            obj.remove();

            html.push('<select class="form-control" style="width:110px;float:left;margin-left:5px;" id="'+type+'" name="'+type+'"><option value="-1">全部</option>');
            $.each(objArr, function(i, item){
                var opt = "<option value=\""+item._id+"\">"+item.name+"</option>";
                html.push(opt);
            });
            html.push('</select>');

            me.kj.append(html.join(''));
        },

        initDate: function(){
            var me = this;

            me.startBtn.datetimepicker({
                language: 'zh-CN',
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                minView: 2,
                endDate: new Date(),
            });

            me.endBtn.datetimepicker({
                language: 'zh-CN',
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                minView: 2,
            });
        },

        postData: function(){
            var me = this,
                ax = null;
            me.subBtn.unbind().bind('click', function(){
                var data = me.form.serialize(),
                    startTime = Date.parse(new Date(me.startBtn.val()+' 00:00:00'))/1000,
                    endTime = Date.parse(new Date(me.endBtn.val()+' 00:00:00'))/1000;
                if(startTime > endTime){
                    alert('起始时间不能大于结束时间');
                }

                ax = $.ajax({
                    url:'/stat/contrist', 
                    data:data, 
                    type: 'POST',
                    dataType: 'json',
                    success: function(json){
                        console.log(json.data);
                    },
                    beforeSend: function () {
                        if(ax != null) {
                            ax.abort();
                        }
                    },
                });
            });
        },
    };

    contrist.init();
})