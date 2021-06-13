<?php require_once('application/controller/buyerController.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Simple Form Submission</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="view/css/style.css" type="text/css" rel="stylesheet" />
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    .cell-breakAll {
        word-break: break-all;
    }
</style>


</head>
<body>

<div class="container">

    <div class="row" id="btnAddAction">
        <div class="row">
        <div class="form-group col-md-10">
            <!--<form action="view/buyers/show_buyers.php" method="get">-->

                <div class="col-md-10">
                    <div class="col-md-3">
                        <label for="user_id_search">User ID:</label>
                        <input type="text" class="form-control" id="user_id_search" placeholder="Search Entry By" name="user_id_search">
                    </div>
                    <div class="col-md-3">
                        <label for="from_date">From Date:</label>
                        <input type="date" class="form-control" name="from_date" id="from_date" >
                    </div>
                    <div class="col-md-3">
                        <label for="end_date">End Date:</label>
                        <input type="date" class="form-control" name="end_date" id="end_date" >
                    </div>
                    <div class="col-md-1">
                        <label for=""></label>
                        <input type="submit" id="search" name="search" class="btn btn-primary" value="Search"/>
                    </div>
                </div>
            <!--</form>-->


        </div>
        <div class="form-group col-md-2">
            <a class="btn btn-success" href="view/buyers/buyer_create.php" style="margin-top: 18px">Add New Receipt</a>
        </div>
        </div>
        <?php
            $controllerInstance = new BuyerInfo();
            $allInfo = $controllerInstance->allInfo();

        ?>
        <div class="form-group col-md-12" id="table-div">
            <?php
            if($allInfo == "No data Found"){
            ?>
            <h2 style="text-align: center">No data Found</h2>
            <?php }
            else{?>
            <table class="table table-striped table-hover">
                <thead>
                <tr class="b-top">
                    <th scope="col">#</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Buyer Name</th>
                    <th scope="col">Receipt</th>
                    <th scope="col">Items</th>
                    <th scope="col">Email</th>
                    <th scope="col">IP Address</th>
                    <th scope="col">Note</th>
                    <th scope="col">Phone No.</th>
                    <th scope="col">Hash Key</th>
                    <th scope="col">Date</th>
                    <th scope="col">Entry By</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $i = 1;

                    if(!empty($allInfo) && $allInfo != "No data Found"){
                        foreach ($allInfo as $j=>$info){

                ?>
                <tr>
                    <th scope="row"><?php echo $i++; ?></th>
                    <td><?php echo $info['amount']; ?> tk</td>
                    <td><?php echo $info['buyer_name']; ?></td>
                    <td><?php echo $info['receipt_id']; ?></td>
                    <td><?php echo $info['item']; ?></td>
                    <td><?php echo $info['email']; ?></td>
                    <td><?php echo $info['buyer_ip']; ?></td>
                    <td><?php echo $info['note']; ?></td>
                    <td><?php echo $info['phone']; ?></td>
                    <td class="cell-breakAll"><?php echo $info['hash_key']; ?></td>
                    <td><?php echo $info['entry_at']; ?></td>
                    <td><?php echo $info['enter_by']; ?></td>
                </tr>

                <?php
                        }
                    }
                ?>
                </tbody>
            </table>
            <?php } ?>
        </div>
        <div id="search_by_user_id">

        </div>
        <div id="search_by_all"></div>

    </div>


</div>
<script src="https://code.jquery.com/jquery-3.5.0.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="view/js/validate_form.js"></script>

</body>
</html>
