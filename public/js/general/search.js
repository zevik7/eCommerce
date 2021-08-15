$(document).ready(function(){

    var history = localStorage.getItem('history') ? JSON.parse(localStorage.getItem('history')) : {};

    for (const key in history) {

        if (history.hasOwnProperty(key))
            length++;

        var historyItem =  
            `<li class="head-history__item">
                <a>${history[key]}</a> 
            </li>`; 
        $(".head-history__list").append(historyItem); 
    }

    // when click history items
    $('.head-history__item a').click( function(){
        $('.head-search__text').val($(this).text());
        $( ".head-search__form" ).submit();
    });
});

$('.head-search__form').on('submit',function(){

    var t = $('.head-search__text').val().trim();

    var history = localStorage.getItem('history') ? JSON.parse(localStorage.getItem('history')) : {};

    history[t] = t;

    localStorage.setItem('history', JSON.stringify(history));

    console.log('memy');
});

$('.head-history__delete-btn').click(function(){
    $(".head-history__item").remove();
    localStorage.clear();
});

