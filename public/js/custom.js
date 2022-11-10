$(document).on('click', '.category', function () {
    let id = $(this).attr('data-id');
    if(id) {
        $.ajax({
            url: `${APP_URL}/get-sub-category/${id}`,
            type: 'GET',
            success: function success(res) {
                if(res.success) {
                    $('.sub-category-ul').html(res.html);
                }
            },
            error: function error() {
            }
        });
    }
        
})

$(document).on("click", '.add-product', function() {
    $('#addProduct').modal('show')
})

$(document).on("click", '.add-variant', function() {
    $('#addVariant').modal('show')
    $("#addProduct").addClass('opacity-25')
})

$(document).on("click", "#submit_variant", function() {
    let vname = $("#vname").val();
    let vprice = $("#vprice").val();
    let voprice = $("#voprice").val();

    $('.variant-section').removeClass("d-none");
    $("#new_var_name").html(vname)
    $("#new_var_price").html(vprice)
    $("#new_var_oprice").html(voprice)

    $("#var_name").val(vname)
    $("#var_price").val(vprice)
    $("#var_oprice").val(voprice)

    $('#addVariant').modal('hide')
    $("#addProduct").removeClass('opacity-25')
})