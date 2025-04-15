$(document).ready(function() {
    setTimeout(function() {
        $(".flash-message").fadeOut("slow", function() {
            $(this).remove();
        });
    }, 1000);
});