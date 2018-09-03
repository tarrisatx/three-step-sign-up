//Rules object: Return validation rules for a specified element.
//Handles, credit card, check box, password, quantity, email
//Required: form.validate
var form = $("#my-form");
form.validate({
    rules: {
        "ccard": {
            required: true,
            creditcard: true
        },
        "cbgroup": {
            required: true
        },
        "quantity": {
            range: [1, 50],
            maxlength: 2
        },
        "email": {
            required: true,
            email: true
        },
        password: "required",
        passconfirm: {
            equalTo: "#form_password"
        }
    },
    errorPlacement: function (error, element) {
        "use strict";
        error.insertBefore(element);
    }
});
//Jquery wizard appearance. All types are of string.
form.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    //Update button text
    labels: {
        finish: "Process Order"
    },
    onStepChanged: function (event, currentIndex) {
        "use strict";
        //Check if step at position 1 and submit data to json object
        if (currentIndex === 1) {
            $("form.ajax").click("#next", function (e) {
                $.ajax({
                    type: "POST",
                    url: "process.php",
                    dataType: "JSON",
                    data: $("#my-form").serialize(),
                    success: function (data) {
                        $("#results").html(
                            "<strong>Name:</strong> " + data.firstname +
                            " " + data.lastname + "<br />" +
                            "<strong>Email:</strong> " + data.useremail +
                            "<br />" + "<strong>Address:</strong> " +
                            data.address + " " + data.city + " " +
                            data.state + ", " + data.zip + "<br /> <br />" +
                            "<strong>Total Mailboxes:</strong> " +
                            " " + data.totalamount
                        );
                    }
                });
                e.preventDefault();
            });
            //Adjust content height on second step
            $(".wizard .content").css({"min-height": "57em"});
        }
        if (currentIndex === 2) {
            //Adjust content height on third step
            $(".wizard .content").css({"min-height": "36em"});
        }
    },
    onFinished: function (event, currentIndex) {
        "use strict";
//if form shows processed results show thank you message
        if (currentIndex === 2) {
            $("#my-form").html("<div id='message'></div>");
            $("#message").html("<h2>Thank you for your order!</h2>");
            console.log("On finished");
        }
    }
});
$(document).ready(function () {
    "use strict";
    //Calculate values of quantity boxes
    $("input").change(function () {
        var mysum = 0;
        $("input[name=quantity]").each(function () {
            var amountTotal = $(this).val();
            if ($.isNumeric(amountTotal)) {
                mysum += parseFloat(amountTotal);
            }
        });
        // Get total mailboxes in output field
        $("#totalQuantity").text(mysum);
        // Get total mailboxes in hidden field
        $("#mailboxes").val(mysum);
    });
    //Clear values inside hidden input boxes on
    //step one if checkbox is unchecked
    $("#checkbox_one").click(function () {
        if ($(this).is(":not(:checked)")) {
            $("#hidden_one").val("");
        }
    });
    $("#checkbox_two").click(function () {
        if ($(this).is(":not(:checked)")) {
            $("#hidden_two").val("");
        }
    });
    $("#checkbox_three").click(function () {
        if ($(this).is(":not(:checked)")) {
            $("#hidden_three").val("");
        }
    });
    //Hide or show quantity boxes if checked or unchecked
    $(".hidden").hide();
    $(".trigger").change(function () {
        var hiddenId = $(this).attr("data-trigger");
        if ($(this).is(":checked")) {
            $("#" + hiddenId).show();
        } else {
            $("#" + hiddenId).hide();
        }
    });
});