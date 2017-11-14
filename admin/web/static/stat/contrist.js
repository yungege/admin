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
            this.download();
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

            this.charts         = $('#charts');
            this.table          = $('#charts-table');

            this.source         = $('input[name=source]');

            // chartsDom声明
            this.trainCount     = $('#trainCount');
            this.trainTime      = $('#trainTime');
            this.trainCal       = $('#trainCal');
            this.doneRate       = $('#doneRate');

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
                    $.get('/school/index?districtId='+districtId, function(json){
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
                    endTime = Date.parse(new Date(me.endBtn.val()+' 00:00:00'))/1000,
                    source = $('input[type=\'radio\']:checked').val();

                if(source == 1){
                    me.trainCount.css('display','block');
                    me.trainTime.css('display','block');    
                    me.trainCal.css('display','block');
                    me.doneRate.css('display','block');
                }

                if(source == 2 || source == 3){
                    me.trainCount.css('display','none');
                    me.trainTime.css('display','none');    
                    me.trainCal.css('display','none');
                     me.doneRate.css('display','none');
                }

                if(startTime > endTime){
                    alert('起始时间不能大于结束时间');
                }

                ax = $.ajax({
                    url:'/stat/contrist', 
                    data:data, 
                    type: 'GET',
                    // dataType: 'json',
                    success: function(json){

// alert(json);
// return false;

                        if(source== 1){
                            me.makeCharts(json.data);
                            $.each(json.data.unit,function(index,value){
                                me.makeMixCharts(value);
                            });
                        }
                        else if(source == 2 || source == 3){
                            me.makeMixCharts(json.data);
                        }
                        
                    },
                    beforeSend: function () {
                        if(ax != null) {
                            ax.abort();
                        }
                    },
                });
            });
        },

        makeCharts: function(data){
            var me = this;
            var option = {
                color: ['#3398DB'],
                tooltip : {
                    trigger: 'axis',
                    axisPointer : {            // 坐标轴指示器，坐标轴触发有效
                        type : 'shadow'        // 默认为直线，可选为：'line' | 'shadow'
                    },
                },
                xAxis : [
                    {
                        type : 'category',
                        data : data.xkeys,
                        axisTick: {
                            alignWithLabel: true
                        }
                    }
                ],
                yAxis : [
                    {
                        type : 'value',
                    }
                ],
                series : [
                    {
                        name:'',
                        type:'bar',
                        barWidth: '60%',
                        data:data.yvals
                    }
                ],
                label:{ 
                    normal:{ 
                        show: true, 
                        position: 'top'
                    } 
                },
                color: [
                    '#5bc0de', '#f98b24', '#1fc659', '#1689ce', '#e2346e', '#d52f30',
                    '#5d6dbe', '#1a9ce2', '#25e47b', '#fda639', '#f44c86', '#eb393a',
                    '#5f77b1', '#34b6f3', '#6cf090', '#fdad2a', '#f06997', '#ec5454',
                    '#7a88c9', '#59c7ef', '#6feeaf', '#feb657', '#f290b1', '#e27375',
                    '#9fa9d8', '#84d5f8', '#bbf5cb', '#fecc86', '#f6bbd0', '#ed9a9b'
                ],
            };
            var chartArea = document.getElementById('charts');
            var myChart = echarts.init(chartArea);
            myChart.clear();
            myChart.setOption(option);
            window.onresize = function (){
                myChart.resize();
            }
            
            me.makeTable(data);
            me.table.nextAll().remove();
        },

        makeTable: function(data){
            var me = this,
                tableHtml = '<caption>数据表</caption><tr>';
            $.each(data.xkeys, function(i, val){
                tableHtml += '<td>'+val+'</td>';
            })
            tableHtml += '</tr><tr>';

            $.each(data.yvals, function(i, val){
                tableHtml += '<td>'+val+'</td>';
            })
            tableHtml += '</tr>';

            me.table.html(tableHtml);
        },

        download: function(){
            var me = this,
                sourceName = [
                    '总体数据',
                    '分项数据',
                    '体测与锻炼数据',
                ];
                    
            me.downBtn.unbind().bind('click', function(){
                var file = [],
                    plat = me.provinceSel.val(),
                    city = $('#city').find('option:selected').text(),
                    district = $('#district').find('option:selected').text(),
                    school = $('#school').find('option:selected').text(),
                    grade = $('#grade').find('option:selected').text(),
                    className = $('#class').find('option:selected').text(),
                    user = $('#user').find('option:selected').text(),
                    startTime = me.startBtn.val(),
                    endTime = me.endBtn.val(),
                    source = $('input[type=\'radio\']:checked').val() - 1;
                source = sourceName[source];

                if(plat == -1){
                    file.push('全平台');
                }
                else{
                    file.push(me.provinceSel.find('option:selected').text());
                }
                
                file.push(city,district,school,grade,className,user);
                file = file.filter(function(v){
                    return (v != '' && v != '全部');
                });

                startTime = startTime.replace(/(-)/g, '/');
                endTime = endTime.replace(/(-)/g, '/');
                file.push(startTime, endTime);
                file.push(source);
                file = file.join('-');
                window.location = '/stat/contrist?down='+encodeURI(file)+'&'+me.form.serialize();
            })
        },

        makeMixCharts: function(data){
            var me = this;
            var option = {
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'cross',
                        crossStyle: {
                            color: '#999'
                        }
                    }
                },
                toolbox: {
                    feature: {
                        dataView: {show: true, readOnly: false},
                        magicType: {show: true, type: ['line', 'bar']},
                        restore: {show: true},
                        saveAsImage: {show: true}
                    }
                },
                legend: {
                    data:data.legend,
                },
                xAxis: [
                    {
                        type: 'category',
                        data: data.xkeys,
                        axisPointer: {
                            type: 'shadow'
                        }
                    }
                ],
                yAxis: data.yAxis,
                series: data.yvals,
                color: [
                    '#5bc0de', 'red', '#1fc659', '#f98b24', '#e2346e', '#d52f30',
                    '#5d6dbe', '#1a9ce2', '#25e47b', '#fda639', '#f44c86', '#eb393a',
                    '#5f77b1', '#34b6f3', '#6cf090', '#fdad2a', '#f06997', '#ec5454',
                    '#7a88c9', '#59c7ef', '#6feeaf', '#feb657', '#f290b1', '#e27375',
                    '#9fa9d8', '#84d5f8', '#bbf5cb', '#fecc86', '#f6bbd0', '#ed9a9b'
                ],
            };

            var chartArea = document.getElementById(data.chartsDom);
            var myChart = echarts.init(chartArea);
            myChart.clear();
            myChart.setOption(option);
            window.onresize = function (){
                myChart.resize();
            }

            me.makeMixTable(data);
        },

        makeMixTable: function(data){
            var me = this;

            me.table.html(data.tableDataHtml);
            me.table.nextAll().remove();
            me.table.after(data.warmHtml);
        },
    };

    contrist.init();
    $('#subbtn').trigger('click');
})