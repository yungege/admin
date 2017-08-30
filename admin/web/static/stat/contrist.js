$(function(){
    var contrist = {
        init: function(){
            this.getDom();
            this.getCity();
        },

        getDom: function(){
            this.provinceSel = $('#province');
        },

        getCity: function(){
            var me = this;
            me.provinceSel.unbind().bind('change', function(){
                var provinceId = $(this).val();
                if(provinceId != -1){
                    $.post('/area/city', {'provinceId':provinceId}, function(json){
                        if(json.data.cityList){
                            me.createSel(json.data.cityList, '#city');
                        }
                    });
                }
                else{

                }
            })

        },

        createSel: function(objArr, type){
            var me= this,
                html = [];

            if($(type)[0] !== undefined){
                return;
            }

            html.push('<select class="form-control" style="width:110px;float:left;margin-left:5px;" id="city" name="city">');
            $.each(objArr, function(i, item){
                var opt = "<option value=\""+item._id+"\">"+item.name+"</option>";
                html.push(opt);
            });
            html.push('</select>');

            me.provinceSel.after(html.join(''));
        },
    };

    contrist.init()
})