$(document).ready(function(){
    $('.place-visited-checkbox').change(function() {
        var visited = ($(this).is(":checked")) ? 1 : 0;
        var place_id = $(this).closest('tr').data('place-id');
        var token = $("#_token").val();
        $.ajax({
            method: 'post',
            url: '/places/visited/' + place_id,
            data:{
                visited: visited,
                _token: token
            }
        })
    });

    $("#placesListTable").dynatable();
});
