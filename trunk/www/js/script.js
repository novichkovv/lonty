/**
 * Created by novichkov on 18.12.14.
 */
$ = jQuery.noConflict();
$(document).ready(function()
{
    /////////////////////////////////////////////
    /////////////// On Leave page ///////////////
    /////////////////////////////////////////////



    ///////////////////////////////////////////////////
    //////////////////////  popup /////////////////////
    ///////////////////////////////////////////////////

    $(function()
    {
        if(getRandomInt(1, 2) == 1)
        {
            setTimeout(function()
            {
                $("#pop_up").modal('show');
            }, 3000);
        }
    });
});

function Unloader(){

    var o = this;

    this.unload = function(evt)
    {
        var message = "Are You Sure You Don't Want to Reboot Your Health?";
        if (typeof evt == "undefined") {
            evt = window.event;
        }
        if (evt) {
            evt.returnValue = message;
            $(window).off('beforeunload', o.unload);
            $("body").mouseover(function(){location.href = 'pages.php?page=3'});
        }
        return message;
    };

    this.resetUnload = function()
    {
        $(window).off('beforeunload', o.unload);

        setTimeout(function(){
            $(window).on('beforeunload', o.unload);
        }, 1000);
    };

    this.init = function()
    {
        $(window).on('beforeunload', o.unload);
        $('a').on('click', o.resetUnload);
        $(document).on('submit', 'form', o.resetUnload);
        $(document).on('keydown', function(event)
        {
            if((event.ctrlKey && event.keyCode == 116) || event.keyCode == 116){
                o.resetUnload();
            }
        });
    };
    this.init();
}


function getRandomInt(min, max)
{
    return Math.floor(Math.random() * (max - min + 1)) + min;
}