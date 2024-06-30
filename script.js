$(document).ready(function() {
    $(".fav").on("click", function() {
        const img = $(this);
        $.post("changeFav.php", { idPiwa: img.data("piwo") }, function(data) {
            if (data == "sukces") {
                const newSrc = (img.attr("src") == "heart_filled.png") ? "heart_empty.jpg" : "heart_filled.png";
                img.attr("src", newSrc);
            }
        });
    });
});