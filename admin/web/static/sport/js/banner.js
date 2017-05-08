function edit(el) {
    var json = $(el).data('row');
    var inputObj = $('form[name=banner] input');
    var descArea = $('textarea[name=h5content]');
    $.each(inputObj, function(i, item){
        var name = item.name;
        if(name == 'title') item.value = $.trim(json.title);
        else if(name == 'starttime') item.value = $.trim(json.starttime);
        else if(name == 'endtime') item.value = $.trim(json.endtime);
        else if(name == 'h5url') item.value = $.trim(json.h5url);
    })
    descArea.val($.trim(json.h5content));
    $('#coverimgurl').attr('src', json.coverimgurl);
    $('input[name=coverimgurl]').val(json.coverimgurl);
    $('#sub-btn').attr('data-id', json._id);
}

function reset(el){
    $('form[name=banner]')[0].reset();
}

function del(el){
    if(!confirm('确定要删除该Banner？')){
        return false;
    }

    var data = $(el).parent().parent().data();
    if(!data.id){
        alert('删除失败.');
        return false;
    }

    $.post('/sport/delBanner',{'id':data.id}, function(json){
        if(json.errCode != 0){
            alert('删除失败.');
            return false;
        }
        else{
            window.location.reload();
        }
    });
}

function getUnixTime(date) {
    var d = date.split('-', 3);
    return (new Date(
        parseInt(d[0], 10) || null,
        (parseInt(d[1], 10) || 1) - 1,
        parseInt(d[2], 10) || null
        )).getTime() / 1000;
};

function commit(el){
    if(!confirm('您确定要修改该Banner?')){
        return false;
    }

    var id = $(el).data('id');

    var title = $.trim($('#b-title').val());
    var desc = $.trim($('#b-desc').val());
    var stime = $('#b-stime').val();
    var etime = $('#b-etime').val();
    var url = $.trim($('#b-url').val());
    var img = $('input[name=coverimgurl]').val();

    if(!title || !desc || !stime || !etime || !img){
        alert('数据不完整.');
        return false;
    }

    var stimeUnix = getUnixTime(stime);
    var etimeUnix = getUnixTime(etime);
    var now = Date.parse(new Date())/1000; 
    if(stimeUnix >= etimeUnix){
        alert('开始时间不应大于结束时间.');
        return false;
    }

    if(now >= etimeUnix){
        alert('无效的结束时间.');
        return false;
    }

    var postData = $('form[name=banner]').serialize();
    $.post('/sport/editBanner?_id=' + id, postData, function(json){
        if(json.errCode != 0){
            alert('修改失败.');
            return false;
        }
        else{
            window.location.reload();
        }
    });
}

$(function() {
    // 日期控件
    $('.date_start').datetimepicker({
        language: 'zh-CN',
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        minView: 2,
        forceParse: 0,
        pickerPosition: "bottom-left",
        startDate: "2017-01-01 00:00:00",
    });

    $('.date_end').datetimepicker({
        language: 'zh-CN',
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        minView: 2,
        forceParse: 0,
        pickerPosition: "bottom-left",
        startDate: "2017-01-01 00:00:00",
    });

    var domain = 'https://oi7ro6pyq.qnssl.com/';
    var water = '?imageView2/2/h/100';

    // 七牛文件上传 基于Puploader
    var uploader = Qiniu.uploader({
        runtimes: 'html5,flash,html4',
        browse_button: 'pickfiles',
        max_file_size: '1mb',
        flash_swf_url: '/static/qiniu/Moxie.swf',
        dragdrop: false,
        uptoken: $('#uptoken').val(),
        domain: domain,
        get_new_uptoken: false,
        unique_names: true,
        max_retries: 3,
        auto_start: true,

        init: {
            'UploadProgress': function(up, file) {
                // todo
            },
            'FileUploaded': function(up, file, info) {
                if(info.status == 200){
                    var url = domain + eval('('+info.response+')')['key'];
                    var thumab = url + water;
                    $('#coverimgurl').attr('src', thumab);
                    $('input[name=coverimgurl]').val(url);
                }
            },
            'Error': function(up, err, errTip) {
                alert('文件上传失败！');
                return false;
            }
        }
    });

});