/* Delete cart */
let cartBtns = 
    document.querySelectorAll('.head-cart__item .item-delete')

Array.from(cartBtns).forEach((cartBtn) => {
    cartBtn.onclick = function ()
    {
        let data = {
            id: this.dataset.id
        }
        // Post method here
        let addCartUrl = './ProductDetail/rmCart';
        let options = {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    }
        fetch(addCartUrl, options)
            .then((response) => {
                return response.text();
            })
            .then((data) => {
                console.log(data);
            })
            .catch((error) =>{
                console.log(error);
            })
    }
})