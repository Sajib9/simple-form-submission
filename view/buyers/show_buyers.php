<?php
require_once(__DIR__.'/../../application/controller/buyerController.php');
if(isset($_GET['search'])){
    if(!empty($_GET['user_id_search']) && !empty($_GET['from_date']) && !empty($_GET['end_date'])){
        $obj = new BuyerInfo();
        $allSearch = $obj->allSearch($_GET);
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Combine Search Result</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="/../simple-form-submission/view/css/style.css" type="text/css" rel="stylesheet" />
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
        <div class="row col-md-12">
            <div class="col-md-2">
                <button onclick="location.href='../../index.php'" type="button" class="btn btn-success" style="margin-top: 23px;">Go Back</button>
            </div>
            <div class="col-md-10">
                <h2 style="text-align: center;">Combine Search Result</h2>
            </div>
        </div>

        <div class="form-group col-md-12" id="table-div">
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
                    if(empty($allSearch)){
                        echo "<h2 style='text-align: center;color: red;'>No Result Found</h2>";
                    }else{
                        foreach ($allSearch as $j=>$info){

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

        </div>
    </div>

</div>
</body>
<?php

    }
}
?>
<script src="https://code.jquery.com/jquery-3.5.0.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
