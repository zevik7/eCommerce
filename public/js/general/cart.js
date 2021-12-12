
/* 
    Delete cart 
*/
let delBtns = 
    document.querySelectorAll('.head-cart__item .item-delete')
let qtyNum =
    document.querySelector('.head-cart__quantity')

Array.from(delBtns).forEach((delBtn) => {

    // Get item element to delete
    let itemElement = delBtn.closest('.head-cart__item')

    delBtn.onclick = function ()
    {
        let data = {
            id: this.dataset.id
        }

        // Post method here
        let addCartUrl = './ProductDetail/rmCart'
        let options = {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    }
        fetch(addCartUrl, options)
            .then((response) => {
                return response.json()
            })
            .then((data) => {
                if (data.status == 'success')
                {
                    itemElement.remove()
                    qtyNum.value -= 1

                    alert('Thêm giỏ hàng thành công');
                }
                else if (data.status == "error")
                    alert(data.msg)
            })
            .catch((error) =>{
                alert(error)
            })
    }
})