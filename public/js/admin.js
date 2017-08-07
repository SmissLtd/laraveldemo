$(function() {
    // Setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    // Delete entities
    $(".delete").click(function() {
        if (confirm('Are you sure you want to delete this?'))
        {
            $.ajax({
                url: "/admin/" + $(this).data("model") + "/delete",
                method: "post",
                data: {id: $(this).closest("tr").data("id") },
                success: function() {
                    window.location.reload();
                }
            });
        }
        return false;
    });
});