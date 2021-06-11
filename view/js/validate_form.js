$(document).ready(function() {
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    var x = 1; //initlal text box count
    $(add_button).click(function(e){
        e.preventDefault();
        x++; //text box increment

        $(wrapper).append('<div class="form-group col-md-10">\n' +
            '                                    <label class="control-label" for="item">Item<span class="m-l-5 text-danger"> *.'+x+'.</span></label>\n' +
            '                                    <input\n' +
            '                                           class="form-control "\n'+
            '                                            type="text"\n' +
            '                                            placeholder="Enter Item"\n' +
            '                                            id="item"\n' +
            '                                            name="item[]"\n' +
            '                                            value=""\n' +
            '                                    />\n' +
            '                                </div>'); //add input box

    });
});

function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}



function validate() {
    var valid = true;
    var amount = $("#amount").val();
    if(!amount) {
        $("#amount-info").html("<br/>(Amount Required)");
        $("#amount-info").css('color','#FF0000');
        $("#amount").css('background-color','#FFFFDF');
        valid = false;
    }
    if(! $.isNumeric(amount)){
        $("#amount-info").html("<br/>(Please Enter a valid number)");
        $("#amount-info").css('color','#FF0000');
        $("#amount").css('background-color','#FFFFDF');
        valid = false;
    }
    if(!amount && ! $.isNumeric(amount)){
        $("#amount-info").html("<br/>(Amount required and please Enter a valid number)");
        $("#amount-info").css('color','#FF0000');
        $("#amount").css('background-color','#FFFFDF');
        valid = false;
    }
    var buyer = $("#buyer_name").val();
    if(!buyer) {
        $("#buyer-info").html("<br/>(Buyer Name required)");
        $("#buyer-info").css('color','#FF0000');
        $("#buyer_name").css('background-color','#FFFFDF');
        valid = false;
    }
    if(buyer.length > 20){
        $("#buyer-info").html("<br/>(Buyer Name should be at most 20 chars.)");
        $("#buyer-info").css('color','#FF0000');
        $("#buyer_name").css('background-color','#FFFFDF');
        valid = false;
    }

    var receipt = $("#receipt_id").val();
    if(!receipt) {
        $("#receipt-info").html("<br/>(Receipt ID required)");
        $("#receipt-info").css('color','#FF0000');
        $("#receipt_id").css('background-color','#FFFFDF');
        valid = false;
    }

    var buyer_email = $("#email").val();

    if(!isEmail(buyer_email)) {
        $("#buyer-email-info").html("<br/>(please Enter a valid email)");
        $("#buyer-email-info").css('color','#FF0000');
        $("#email").css('background-color','#FFFFDF');
        valid = false;
    }

    var note = $("#note").val();
    if(!note) {
        $("#note-info").html("<br/>(required)");
        $("#note-info").css('color','#FF0000');
        $("#note").css('background-color','#FFFFDF');
        valid = false;
    }
    if(note.length > 30){
        $("#note-info").html("<br/>(Note can not be longer then 30 chars.)");
        $("#note-info").css('color','#FF0000');
        $("#note").css('background-color','#FFFFDF');
        valid = false;
    }

    var items = $("#item").val();
    if(!items) {
        $("#items-info").html("<br/>(required)");
        $("#items-info").css('color','#FF0000');
        $("#item").css('background-color','#FFFFDF');
        valid = false;
    }

    var city = $("#city").val();
    if(!city) {
        $("#city-info").html("<br/>(City required)");
        $("#city-info").css('color','#FF0000');
        $("#city").css('background-color','#FFFFDF');
        valid = false;
    }

    var phone = $("#phone").val();
    console.log(phone.charAt(0));
    if(!phone) {
        $("#phone-info").html("<br/>(Phone Number required)");
        $("#phone-info").css('color','#FF0000');
        $("#phone").css('background-color','#FFFFDF');
        valid = false;
    }
    if(! $.isNumeric(phone)){
        $("#phone-info").html("<br/>(Phone Number should be just Numeric)");
        $("#phone-info").css('color','#FF0000');
        $("#phone").css('background-color','#FFFFDF');
        valid = false;
    }

    if(phone.charAt(0) != 1 || phone.length != 10){
        $("#phone-info").html("<br/>(Phone Number should be start with 1 & 10 digit)");
        $("#phone-info").css('color','#FF0000');
        $("#phone").css('background-color','#FFFFDF');
        valid = false;
    }

    var entry_by = $("#enter_by").val();
    if(! $.isNumeric(entry_by)){
        $("#entry-by-info").html("<br/>(please input a valid number)");
        $("#entry-by-info").css('color','#FF0000');
        $("#enter_by").css('background-color','#FFFFDF');
        valid = false;
    }
    return valid;
}



$("form").submit(function (event) {
    event.preventDefault();
    var valid = validate();
    console.log(valid);

    if(valid){
        $.ajax({
            type: 'post',
            url: '../../route.php',
            data: $('#simple_form').serialize(),
            success: function (response) {
                var res = JSON.parse(response);
               // console.log(res.resp_code);
                if(res.resp_code == 1){
                    $("#validity-message").html(res.message);
                    $("#validity-message").css('color', '#FF0000');
                }else{
                    $("#validity-message").html(res.message);
                    $("#validity-message").css('color', '#008000',);
                    $('#simple_form').trigger("reset");
                }
            }
        });
    }

});

$('.save-data').on("click",function(){
    $(window).scrollTop(0);
});