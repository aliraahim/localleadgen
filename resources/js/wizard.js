$("#wizard").steps({
    onFinished: function (event, currentIndex) {
        
        var coo = JSON.stringify(coords);
        var radius = $("#radius").slider('getValue');
        var categories = JSON.stringify($('#category-selector').val());
        // var user;
        var name = $('#name').val();
        var email = $('#email').val();
        var company = $('#company').val();
        if (email == "") {
            swal({
                text: "Please enter your email."
                , type: "warning"
                , confirmButtonClass: "btn-warning"
                , confirmButtonText: "Ok, take me back."
            , });
            return;
        }
        var user = {'name': $('#name').val(), 'email': $('#email').val(), 'company': $('#company').val()};
        userData = JSON.stringify(user);
        var wantEmails = $('#want-emails').prop('checked');
        $.ajax({
            type: "POST"
            , url: "process.php"
            , data: {
                'user': userData
                , 'coordinates': coo
                , 'radius': radius
                , 'units': units
                , 'categories': categories
                , 'wantEmails': wantEmails
            }
            , dataType: "json"
            , success: function (data) {
                if (data.hasOwnProperty('results')){
                    swal({
                    title: "Woohooo!"
                    , text: "Your results are right here!"
                    , type: "success"
                    , confirmButtonClass: "btn-success"
                    , confirmButtonText: "Show me!"
                 });
                } else {
                    swal({
                    title: "Woohooo!"
                    , text: "Your results are on their way. You will receive an email very soon!"
                    , type: "success"
                    , confirmButtonClass: "btn-success"
                    , confirmButtonText: "Nice!"
                 }).then(function() {
                    // Redirect the user
                    // window.location.href = "/";
                    $("#wizard").remove();
        $(".success-screen").removeClass("hidden");
        $(".app").addClass("full-height");
                    });
                }
                
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
                });
                return;
            }
            if ($('#category-selector').val().length > 5) {
                swal({
                    text: "You can only select a maximum of 5 categories."
                    , type: "warning"
                    , confirmButtonClass: "btn-warning"
                    , confirmButtonText: "Ok, I'll de-select some."
                , });
                return;
            }
            $(".content").css("min-height","22em");
        }
        if (newIndex != 2) {
            $(".content").css("min-height","35em");
        }
        return true;
    }
});