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
                        console.log(json.data.cityList);
                    });
                }
                else{

                }
            })

        }
    };

    contrist.init()
})