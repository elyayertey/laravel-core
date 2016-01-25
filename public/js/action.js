$.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});

$(function(){
    $('.action').click(function(e) {
        e.preventDefault();
        var id = $(this).attr('id');
        var urls = $(this).attr('href');
        var action = $(this).attr('data-action');
        var data = 'id=' + id + '&action=' + action;
        if (id !== '' || urls !== '' || action !== '') {
        if (confirm('Are you sure?')) {
            $.ajax({
                url: urls,
                type: "POST",
                cache: false,
                data: data,
                success: function (res) {
                    $('.row_'+id).slideUp('fase').hide();
                },
                error: function (err) {
                    alert('Something went wrong. Please try again.');
                        }

            });
        }
    }
    });

});
