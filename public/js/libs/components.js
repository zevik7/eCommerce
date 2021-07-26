//---------------Select component----------------------
export default class Selects{
    constructor(selects, label){
        this.selects = selects;
        this.label = label;
        this.actives = selects.children('.select__active');
        this.lists = selects.children('.select__list');
        this.actives.text(this.label);
    }
    insertTop(id, text){
        this.lists.prepend('<li id="'+id+'">'+text+'</li>');
    }
    insert(id, text){
        this.lists.append('<li id="'+id+'">'+text+'</li>');
    }
    reset(){
        this.actives.text(this.label);
        this.lists.html('');
    }
    pushLabelToList(){
        let firstChildList = this.lists.children('li:first-child'); 
        if (this.actives.text() == this.label)
        {
            if (firstChildList.text() == this.label)
                firstChildList.remove();
        }
        else {
            if (firstChildList.text() != this.label)
                this.insertTop(-1, this.label);
        }
    }
}
$(function () {
    // Select hide when click
    $('.select .select__list').on('click', 'li', function(){
        $(this).parent().removeClass('select__list--show');
        let newText = $(this).text();
        let activeElement =  $(this).closest('.select').children(".select__active");
        activeElement.text(newText);
    })
    // Select show
    $('.select').on('mouseover', function(){
        $(this).children('.select__list').addClass('select__list--show')
    })
    // Select hide
    $('.select').on('mouseout', function(){
        $(this).children('.select__list').removeClass('select__list--show');
    })
});