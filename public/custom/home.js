var Home = function(){

    // -------------------------------------------------------------------------

    this.__construct = function(){

        console.log('Home created');
        //Template = new Template;
        event = new Events;
        remove_hover();
        add_montly_fee();
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

    this.__construct();

};


