$(document).ready(function(){
    $('#js-account-dropdown').click(function(){
        $('.sidebar-nav__account').slideToggle(300);
        $('.sidebar-nav__notifi').hide(300);
        $('#js-account-dropdown span').find(".dropdown").toggleClass("fa-caret-up fa-caret-down");
    });
    $('#js-notifi-dropdown').click(function(){
        $('.sidebar-nav__notifi').slideToggle(300);
        $('.sidebar-nav__account').hide(300);
        $('#js-notifi-dropdown span').find(".dropdown").toggleClass("fa-caret-up fa-caret-down");
    });
    $('.none-dropdown').click(function(){
        $('.sidebar-nav__account').hide(300);
        $('.sidebar-nav__notifi').hide(300);
    });

});
