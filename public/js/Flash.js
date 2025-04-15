$(document).ready(function() {
    setTimeout(function() {
        $(".flash-message").fadeOut("slow", function() {
            $(this).remove();
        });
    }, 5000);
});