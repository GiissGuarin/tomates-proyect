$(document).ready(($event) => {
    $('.btn_update_product').click(($event) => {
        let validateData = {
            product: $(".product_select").val(),
            product_cant: $(".product_cant").val(),
            product_lot: $(".product_lot_num").val(),
            product_expiration: $(".product_expiration").val(),
            product_price: $(".product_price").val()
        }
        validateForm(validateData)

    });
})
function validateForm(data) {
    console.log(data)
    let validate = true;
    for (var attr in data) {
        if (data[attr] == "" || data[attr] == undefined || data[attr] == 0) {
            validate = false;
            break
        }
    }
    if (validate) {
        updateProduct(data)
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please enter all data correctly!',
        })
    }

}
function updateProduct(data) {
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Product Update',
    });
}
