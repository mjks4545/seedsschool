var Home = function(){

    // -------------------------------------------------------------------------

    this.__construct = function(){

        console.log('Home created');
        //Template = new Template;
        event = new Events;
        remove_hover();
        add_montly_fee();
        admin_charts();

    };

    // -------------------------------------------------------------------------

    var remove_hover = function(){
        //console.log( $('#table-hover') );
        $('#table-hover').removeClass('table-hover');
    };

    // -------------------------------------------------------------------------

    var add_montly_fee = function(){
        var url = 'http://' + location.hostname + '/seeds/admin/add_auto_montly_fee';
        $.get( url,'',function(o){
        } );
    };

    // -------------------------------------------------------------------------

    var admin_charts = function(){


        setTimeout(function(){
            $('#tobeclicked').click();
            $('#tobeclicked1').click();
            $('#tobeclicked2').click();
            $('#yfrbtn').click();
        }, 300);
    };

    // -------------------------------------------------------------------------

    this.__construct();

};


