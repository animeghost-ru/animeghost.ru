$(document).ready(function() {
    $("#authform").submit(function (event) {
        var login = $("#authlogin").val();
        var pass = $("#authpass").val();
        //$(".container").html('<div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div>');
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "/ajax/login.php",
            data: {login: login, pass: pass},
            success: function(json) {
                var data = jQuery.parseJSON(json);
                console.log(data);
                if (data.err == 'error'){
                    $("#alert").html('<div class="alert alert-danger" id="mes" role="alert">' + data.mes + '</div>');
                }
                if (data.err == 'ok'){
                    document.location.href = '/';
                }
            },
        });
    })
});