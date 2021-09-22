$(document).ready(function(){

    var history = localStorage.getItem('history') ? JSON.parse(localStorage.getItem('history')) : {};

    for (const key in history) {

        if (history.hasOwnProperty(key))

        var historyItem =  
            `<li class="head-history__item">
                <a>${history[key]}</a> 
            </li>`; 
        $(".js-head-history__list").append(historyItem); 
    }

    // when click history items
    $('.head-history__item a').click( function(){
        $('.js-head-search__text').val($(this).text());
        $( ".js-head-search__form" ).submit();
    });
    
});

$('.js-head-search__form').on('submit',function(){

    var t = $('.js-head-search__text').val().trim();

    var history = localStorage.getItem('history') ? JSON.parse(localStorage.getItem('history')) : {};

    history[t] = t;

    localStorage.setItem('history', JSON.stringify(history));
});

$('.js-head-history__header').click(function(){
    $(".head-history__item").remove();
    localStorage.clear();
});
