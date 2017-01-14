$("#wizard").steps({
    onFinished: function (event, currentIndex) {
        var coo = JSON.stringify(coords);
        var radius = $("#radius").slider('getValue');
        var categories = JSON.stringify($('#category-selector').val());
        $.ajax({
            type: "POST"
            , url: "process.php"
            , data: {
                'coordinates': coo
                , 'radius': radius
                , 'units': units
                , 'categories': categories
            }
            , dataType: "json"
            , success: function () {
                swal({
                    title: "Woohooo!"
                    , text: "Your results are on their way."
                    , type: "success"
                    , confirmButtonClass: "btn-success"
                    , confirmButtonText: "Nice!"
                 });
            }
            , error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    }
    , onStepChanging: function (event, currentIndex, newIndex) {
        if (newIndex == 2) {
            if ($('#category-selector').val() == null) {
                swal({
                    text: "Please select at least one place type."
                    , type: "warning"
                    , confirmButtonClass: "btn-warning"
                    , confirmButtonText: "Ok, take me back."
                , });
                return;
            }
        }
        return true;
    }
});