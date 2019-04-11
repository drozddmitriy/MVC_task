$(document).ready(function () {
    $('input[name=datemas]').on('change',function () {
        var url = "setdate/" + this.id;
        var date = this.value;
        $.ajax({
            url: url,
            method: 'post',
            data: {
                id: this.id,
                date: date
            },
            success: function (result) {
                alert(result);
            },
            error: function (result) {
                alert(result.responseText);
            }
        });
    });
});