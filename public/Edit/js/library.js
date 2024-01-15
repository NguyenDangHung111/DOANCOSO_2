(function ($) {
    "use strict";
    var HT = {};

    HT.getLocation = () => {
        $(document).on("change", ".location", function () {
            let _this = $(this);
            let option = {
                data: {
                    'location_id' : _this.val(),
                },
                'target': _this.attr('data-target'),
            };
            HT.sendDataTogetLocation(option)
        });
    };

    HT.sendDataTogetLocation = (option) => {
        $.ajax({
            url: "/DOANCOSO_2/public/ajax/getLocation",
            type: "GET",
            data: option,
            dataType: "json",
            success: function (response) {
                $('.'+option.target).html(response.html);
            },
            error: function (_jqXHR, textStatus, errorThrown) {
                console.log("Lỗi:" + textStatus + " - " + errorThrown);
            },
        });
    };

    $(document).ready(function () {
        HT.getLocation();
    });
})(jQuery);
