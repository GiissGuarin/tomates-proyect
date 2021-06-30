let DataCart = []

$(document).ready(($event) => {
    $("form").on("submit", function (e) {
        e.preventDefault();
        let url = $(this).attr("action")
        payCart(url);
    })
})

function minus(id) {
    console.log(parseInt($(".input_quantity_" + id).val()))
    let current_qty = parseInt($(".input_quantity_" + id).val())
    if (current_qty - 1 <= 0) {
        return 0
    } else {
        $(".input_quantity_" + id).val(current_qty - 1)

    }
}
function more(id) {
    console.log(parseInt($(".input_quantity_" + id).val()))
    let current_qty = parseInt($(".input_quantity_" + id).val())

    $(".input_quantity_" + id).val(current_qty + 1)

}
function addToCart(name, id, price, uid_owner, my_id) {
    let data = {
        id,
        uid_owner

    }
    let result = $(".group_list_cart").find("#" + id);
    if (result.length > 0) {
        console.log(result)
        let pastQuant = parseInt($("#" + id + " p:nth-child(2)").text())
        $("#" + id + " p:nth-child(2)").text(pastQuant + parseInt($(".input_quantity_" + id).val()));
        data.cant = $("#" + id + " p:nth-child(2)").text()
        let busqueda = DataCart.filter(f => f.id == id)[0]
    } else {
        let quant = parseInt($(".input_quantity_" + id).val())
        let html = ` <li class="list-group-item " id="${id}" style="display:flex">                     
                        
                        <p class="m-auto">${name}</p>
                        <p class="m-auto" >${quant}</p>
                        <input style="display:none" class="m-auto" type="text" name="consult[]" value="VALUES(NULL, '${id}', '${quant}', '${my_id}', '${uid_owner}')" >
                        <input style="display:none" class="m-auto" type="text" name="id_prod_quant[]" value="${id},${quant}" >
                        
                    </li>`
        $(".group_list_cart").append(html)
        data.cant = quant
        DataCart.push(data)
    }
    let total = parseInt($(".total_price_cart").text())
    $(".total_price_cart").text(total + (price * parseInt($(".input_quantity_" + id).val())))
    $('#total').val($(".total_price_cart").text(total + (price * parseInt($(".input_quantity_" + id).val()))))

}

function payCart(url) {
    let dataForm = $('#dataForm').serialize();
    console.log(dataForm);
    let total = $(".total_price_cart").text()

    if (parseInt(total) <= 0) return 0


    $.ajax({
        type: 'POST',
        url: "index.php?controlador=usuarios&action=save",
        data: {
            dataForm: dataForm,
            total: total
        },
        success: function (data) {
            console.log("sucesssssss" + data)
            window.location.href = "index.php?controlador=iniciar&action=shopping"

        }, error: error => {
            $('#redirect').click();

        }
    })





}