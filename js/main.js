$(document).ready(function() {

    $("#authform").submit(function (event) {
        var login = $("#authlogin").val();
        var pass = $("#authpass").val();
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "/ajax/login.php",
            data: {login: login, pass: pass},
            success: function(json) {
                var data = jQuery.parseJSON(json);
                if (data.err === 'error'){
                    $("#alert").html('<div class="alert alert-danger" id="mes" role="alert">' + data.mes + '</div>');
                }
                if (data.err === 'ok'){
                    document.location.href = '/';
                }
            },
        });
    });
    $("#rulang").click(function () {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "/ajax/rulang.php",
            success: function() {
                location.reload();
            },
        });
    });
    $("#enlang").click(function () {
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: "/ajax/enlang.php",
            success: function() {
                location.reload();
            },
        });
    });

    $("#youranimes").click(function () {
        $(".nav-link").removeClass("active");
        $("#youranimes").addClass("active");
        $(".main-card-body").hide();
        $(".useranimes").show();
    })
    $("#yoursettings").click(function () {
        $(".nav-link").removeClass("active");
        $("#yoursettings").addClass("active");
        $(".main-card-body").hide();
        $(".usersettings").show();
    })
    $("#yourprofile").click(function (){
        $(".nav-link").removeClass("active");
        $("#yourprofile").addClass("active");
        $(".main-card-body").hide();
        $(".yourprofile").show();
    })
});