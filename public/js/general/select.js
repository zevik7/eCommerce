//Import list of location
import * as localtionObj from './location-list.js';
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
//---------------General event select---------------------
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

// //-----------------Select price-------------------
// let selectPrice = new Selects($('.select[name="fs-select-order-price"]'), 'Giá');
// selectPrice.selects.each(function () {
//     selectPrice.lists.on('click', 'li', function(){
//         selectPrice.pushLabelToList();
//     })
// })
//-----------------Select adress-------------------
let selectProvinces = new Selects($('.select[name="fs-select-shipping-provinces"]'), 'Tỉnh, thành phố');
let selectDistricts = new Selects($('.select[name="fs-select-shipping-districts"]'), 'Quận, huyện')
selectProvinces.selects.each(function() {
    let provinceList = localtionObj.provinces;
    //Load province
    provinceList.forEach(function(province, index) {
        selectProvinces.insert(index, province);
    })
    // When clicked province
    selectProvinces.lists.on('click', 'li', function(){
        selectDistricts.reset();
        //Load district
        let idProvinceClicked = $(this).attr("id");
        let districtList = localtionObj.districts[idProvinceClicked];
        if (districtList)
        {
            districtList.forEach((district,index) => {
                selectDistricts.insert(index, district);
            });
        }
        selectProvinces.pushLabelToList();
    })
})