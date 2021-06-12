<!DOCTYPE html>
<html lang="en">
<head>
    <title>Simple Form Submission</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="../css/style.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="../../build/css/intlTelInput.css">




</head>
<body>

<div class="container">
    <div class="row col-md-10">
        <div class="col-md-3">
            <button onclick="location.href='../../index.php'" type="button" class="btn btn-success" style="margin-top: 23px;">Go Home</button>
        </div>
        <div class="col-md-7">
            <h2 style="text-align: center">Buyer Receipt</h2>
        </div>

        <div class="col-md-10" id="validity-message">

        </div>

    </div>


    <form id="simple_form">
        <div class="col-md-10">
            <div class="form-group col-md-10">
                <label for="amount">Amount:</label>
                <span id="amount-info" class="info"></span><br />
                <input type="text" class="form-control" id="amount" placeholder="Enter Amount" name="amount">
            </div>
            <div class="form-group col-md-10">
                <label for="buyer_name">Buyer Name:</label>
                <span id="buyer-info" class="info"></span><br />
                <input type="text" class="form-control" id="buyer_name" placeholder="Enter Name" name="buyer_name">
            </div>
            <div class="form-group col-md-10">
                <label for="receipt_id">Receipt Id:</label>
                <span id="receipt-info" class="info"></span><br />
                <input type="text" class="form-control" id="receipt_id" placeholder="Enter Receipt ID" name="receipt_id">
            </div>
            <div class="input_fields_wrap">
                <div class="form-group col-md-10">
                    <label for="item">Item:</label>
                    <span id="items-info" class="info"></span><br />
                    <input type="text" class="form-control" id="item" placeholder="Enter item" name="item[]">

                </div>

            </div>
            <div class="col-md-10">
                <button class="btn btn-primary add_field_button">AddMore Item</button>
            </div>
            <div class="form-group col-md-10">
                <label for="email">Buyer Email:</label>
                <span id="buyer-email-info" class="info"></span><br />
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="form-group col-md-10">
                <label for="note">Note:</label>
                <span id="note-info" class="info"></span><br />
                <input type="text" class="form-control" id="note" placeholder="Enter Note" name="note">
            </div>
            <div class="form-group col-md-10">
                <label for="city">City:</label>
                <span id="city-info" class="info"></span><br />
                <input type="text" class="form-control" id="city" placeholder="Enter City" name="city">
            </div>
            <div class="form-group col-md-10" id="input-wrapper">
                <label for="phone">Phone:</label>
                <span id="phone-info" class="info"></span><br />
                <input type="text" class="form-control" id="phone" placeholder="Ex-1935294900" name="phone">
            </div>
            <div class="form-group col-md-10">
                <label for="enter_by">Enter By:</label>
                <span id="entry-by-info" class="info"></span><br />
                <input type="text" class="form-control" id="enter_by" placeholder="Enter BY" name="enter_by">
            </div>
            <div class="col-md-10">
                <button type="submit" class="btn btn-success save-data">Process Receipt</button>
                <button type="reset" class="btn btn-danger" id="resetButton">Re-set</button>
            </div>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.0.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="../js/validate_form.js"></script>
<script src="../../build/js/intlTelInput.min.js"></script>
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script src="../../build/js/intlTelInput-jquery.min.js"></script>

</body>
<script>
    // Vanilla Javascript
    var input = document.querySelector("#phone");
    window.intlTelInput(input,({
        // options here
        allowDropdown: false,
        initialCountry:"bd",
        separateDialCode:true,


    }));

</script>
</html>
