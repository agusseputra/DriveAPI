/**
 * Created by PUSKOM on 7/3/2017.
 */

$(function() {
    // Setup Headroom.js
    // ------------------------------

    // Initialize top by default
    headroomTop();

    // Top navbar
    function headroomTop() {
        $(".navbar-fixed-top").headroom({
            classes: {
                pinned: "headroom-top-pinned",
                unpinned: "headroom-top-unpinned"
            },
            offset: $('.navbar').outerHeight(),
            onUnpin : function() {
                $('.navbar .dropdown-menu').parent().removeClass('open');
            }
        });
    }

});

function menu_aktif(newURL) {
    var str = newURL;
    var item  = $('ul li a[href="' + str  + '"]');
    if(item.length){
        item.parent().addClass("active");
        var dropdown = item.parent().parent().parent();
        if(dropdown.hasClass("dropdown")){
            dropdown.addClass("active");
        }

    }
};
