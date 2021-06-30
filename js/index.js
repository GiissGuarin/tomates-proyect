$(document).ready(($event) => {
    $(".btn_more").click(($event) => {
        let current_qty = $(".input_quantity").val()
        console.log(current_qty)
        $(".input_quantity").val(parseInt(current_qty) + 1)
    });
    $(".btn_less").click(($event) => {
        let current_qty = parseInt($(".input_quantity").val())
        if (current_qty - 1 <= 0) {
            return 0
        } else {
            $(".input_quantity").val(current_qty - 1)

        }

    })



})

