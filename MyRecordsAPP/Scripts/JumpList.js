$(document).on("pagecreate", function () {
    $('ul.jump li').click(function (e) {
            var top,
			letter = $(this).text(),
			divider = $("#sortedList").find("li.ui-li-divider:contains(" + letter + ")");
            alert($(this).text());
        if (divider.length > 0) {
            top = divider.offset().top;
            $.mobile.silentScroll(top);
        } else {
            return false;
        }
    });
});