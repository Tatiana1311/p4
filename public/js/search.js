// Demo 2) Getting HTML/A View as a result and just throwing it in to the response div
$('#search').click(function() {
    $.ajax({
        type: 'POST',
        url: '/meetup/search',
        success: function(response) { 
            $('#results').html(response);
        },
        data: {
            format: 'html',
            query: $('input[name=query]').val(),
            _token: $('input[name=_token]').val(),
        },
    }); 
});