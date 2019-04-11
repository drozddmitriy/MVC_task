$(document).ready(function () {
    $('input[name=checkboxmas]').click(function () {
        var url = "setstatus/" + this.id;
        var status;
        if (this.value == 0) {
            status = this.value = 1;
        } else {
            status = this.value = 0;
        }
        $.ajax({
            url: url,
            method: 'post',
            data: {
                id: this.id,
                status: status
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