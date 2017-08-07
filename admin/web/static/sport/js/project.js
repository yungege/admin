$(function(){

    var project = {
        init: function(){
            this.getDom();
            this.searchAction();
        },

        getDom: function(){
            this.searchBtn = $('#search');
            this.form = $('form[name=action]');
            this.actionList = $('#action-list');
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
                                option += ("<option value='"+item.list[ci]._id+"'>" + item.list[ci].name + "</option>");
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
        
    };

    project.init();
})