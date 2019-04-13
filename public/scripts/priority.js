$(document).ready(function(){
    $(".up").click(function(){
        var pdiv = $(this).parent('div');
        pdiv.insertBefore(pdiv.prev());
        return false
    });
    $(".down").click(function(){
        var pdiv = $(this).parent('div');
        pdiv.insertAfter(pdiv.next());
        return false
    });
});