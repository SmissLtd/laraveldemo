$(function() {
    // Setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    // Cart
    $(".item_add").click(function() {
        $.ajax({
            url: "/addToCart",
            method: "post",
            data: { id : $(this).data("id") },
            success: function (response) {
                $(".simpleCart_total").html('$' + parseFloat(response).toFixed(2));
            }
        });
    });
    $(".simpleCart_empty").click(function() {
        $.ajax({
            url: "/emptyCart",
            method: "post",
            async: false,
            success: function() {
                $(".simpleCart_total").html('$0.00');
            }
        });
    });
    
    // Subscribe to newsletter
    $("#form-newsletter").submit(function() {
        $.ajax({
            url: "/newsletter",
            method: "post",
            data: { email: $(this).find("input[type='email']").val() },
            dataType: "json",
            success: function (response) {
                if (response.success)
                    $("#form-newsletter").html("Thank you for you subscription!");
                else
                    alert(response.message);
            }
        });
        return false;
    });
});