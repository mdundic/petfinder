$(function () {
    $('#date-from').datetimepicker({
        locale: 'sr',
        showClear: true,
        showClose: true,
        format: 'L'
    });

    $('#date-to').datetimepicker({
        locale: 'sr',
        showClear: true,
        showClose: true,
        useCurrent: false, //Important! See issue #1075
        format: 'L'
    });

    $("#date-from").on("dp.change", function (e) {
        $('#date-to').data("DateTimePicker").minDate(e.date);
    });

    $("#date-to").on("dp.change", function (e) {
        $('#date-from').data("DateTimePicker").maxDate(e.date);
    });

    $(document).on('change', ':file', function() {
        var input = $(this),
            filename = input.val().replace(/\\/g, '/').replace(/.*\//, '');

        input.trigger('fileselect', [filename, input]);
    });

    $(':file').on('fileselect', function(event, filename, input) {
        $('#' + input.attr('id') + '-filename').html(filename);
    });

    $('select.audit-search-select, select.company').multiselect({
        buttonText: function(options, select) {
            if (options.length === 0) {
                return Translate.global.please_select;
            } else {
                var labels = [];

                options.each(function() {
                    if ($(this).attr('label') !== undefined) {
                        labels.push($(this).attr('label'));
                    } else {
                        labels.push($(this).html());
                    }
                });

                return labels.join(', ') + '';
            }
        }
    });
});

$(".alert").fadeTo(2000, 500).slideUp(400, function(){
    $(".alert").slideUp(400);
});

$( ".btn-delete" ).click(function(e) {
    var href = e.target.getAttribute('href');

    e.preventDefault();

    bootbox.confirm({
        message: Translate.global.are_you_sure,
        buttons: {
            confirm: {
                label: Translate.global.yes,
                className: 'btn-success'
            },
            cancel: {
                label: Translate.global.no,
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if (result) {
                window.location = href;
            } else {
                return;
            }
        }
    });
});

// slide up alert div and remove it after
function alertSlideUpAndRemove(alert) {
    $(alert).fadeTo(2000, 500).slideUp(400, function(){
        $(alert).slideUp();

        $(alert).remove();
    });
}

// add param=value in query string on the current url
function updateBrowserUrlWithParam(param, value) {
    window.history.pushState({}, null, window.location.href + '?' + param + '=' + value);
}

// reset the current url and remove the query string
function resetBrowserUrl() {
    window.history.pushState({}, null, window.location.href.split('?')[0]);
}
