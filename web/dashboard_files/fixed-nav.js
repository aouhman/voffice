/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* FIXED NAVIGATION
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
(function($) {
    "use strict";
    // EXISTS ALSO IN SCRIPT.JS
    function UserSidebar() {
		var topbarHeight = $("#topbar").height(),
		 menuHeight = $("#navbar").height(),
		 sidebarTop = 0;
        if($("topbar").hasClass("topbar-closed")){
            sidebarTop = menuHeight + topbarHeight;
        }
        else{
            sidebarTop = menuHeight;
        }
	    $("#user-sidebar").css("padding-top",sidebarTop);
    }
    
    $(window).bind('scroll', function(){
        var scroll = $(window).scrollTop();
        var menu_is_horizontal = $('body').hasClass('menu-is-horizontal');

        var height = $('#main-header').height();
        if(menu_is_horizontal)
            height += $('#navigation').height();

        if (scroll > (height+50))  {
            $("#navbar").addClass('navigation-fixed animate-me animated slideInDown');
            if(menu_is_horizontal)
                $("#navigation").addClass('navigation-fixed animate-me animated slideInDown');
            $("body").addClass('has-navigation-fixed');
            $("#user-sidebar").addClass('onscroll');
            if($("#user-sidebar").length >0 ){UserSidebar();}
        }
        else{
            $("#navbar").removeClass('navigation-fixed animated slideInDown');
            if(menu_is_horizontal)
                $("#navigation").removeClass('navigation-fixed animated slideInDown');
            $("body").removeClass('has-navigation-fixed');
            $("#user-sidebar").removeClass('onscroll');
            if($("#user-sidebar").length >0 ){ UserSidebar(); }
        }
    });
})(jQuery);