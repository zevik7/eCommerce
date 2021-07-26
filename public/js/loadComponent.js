//Import list of location
import * as localtionObj from './libs/location-list.js';
import Selects from './libs/components.js';
// const Selects = require("classes");
$(function () {
    //-----------------Select price-------------------
    let selectPrice = new Selects($('.select[name="fs-select-order-price"]'), 'Giá');
    selectPrice.selects.each(function () {
        selectPrice.lists.on('click', 'li', function(){
            selectPrice.pushLabelToList();
        })
    })
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
    
});