$(document).ready(function(){

    $("#placesListTable").dynatable();
});

function changePlaceStatus(obj) {
    var visited = ($(obj).is(":checked")) ? 1 : 0;

    var place_id = $(obj).data('place-id');
    var token = $("#_token").val();
    $.ajax({
        method: 'post',
        url: '/places/visited/' + place_id,
        data:{
            visited: visited,
            _token: token
        }
    })
}
