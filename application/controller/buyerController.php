<?php


require_once($_SERVER["DOCUMENT_ROOT"].'/simple-form-submission/application/model/buyerModel.php');


class BuyerInfo{
    public function buyers_info($data){
        //$salt = '$' . $data['email'] . '=$' . $data['amount'] . '$' . $data['city'];
        $salt = substr(md5(uniqid(rand(), TRUE)), 0, 3);
        $amount = $data['amount'];
        $buyer_name = $data['buyer_name'];
        $receipt_id = $data['receipt_id'];
        $item = implode("|",$data['item']);
        $email = $data['email'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $note = $data['note'];
        $city = $data['city'];
        $phn = "0".$data['phone'];
        $hash = hash('sha512', $salt.$data['receipt_id']);
        //$hash = crypt($data['receipt_id'], $salt);
        $date = date("Y-m-d");
        $entry_by = $data['enter_by'];


        $buyer_model = new BuyerModel();

        $insertId = $buyer_model->store($amount,$buyer_name,$receipt_id,$item,$email,$ip,$note,$city,$phn,$hash,$date,$entry_by);
        return $insertId;

    }

    public function allInfo(){
        $buyer_model = new BuyerModel();
        $getInfo = $buyer_model->getInfo();
        if(!empty($getInfo))
            return $getInfo;
        else
            return "No data Found";

    }
    public function searchByUserId($user_id){
        $buyer_model = new BuyerModel();
        $seachResult = $buyer_model->searchByUserId($user_id);

        $output = '<div class="form-group col-md-12" id="table-div">
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
                            <tbody>';
                            $i = 1;
                            foreach ($seachResult as $j=>$info){
        $output .=              " <tr>
                                    <th scope='row'> ".$i++."</th>
                                    <td> ".$info['amount']." tk</td>
                                    <td> ".$info['buyer_name']."</td>
                                    <td>". $info['receipt_id']."</td>
                                    <td>". $info['item']."</td>
                                    <td>". $info['email']."</td>
                                    <td>". $info['buyer_ip']."</td>
                                    <td>". $info['note']."</td>
                                    <td>". $info['phone']."</td>
                                    <td class='cell-breakAll'>". $info['hash_key']."</td>
                                    <td>". $info['entry_at']."</td>
                                    <td>". $info['enter_by']."</td>
                                </tr>";
                            }

        $output .=         '</tbody>
                         </table>
                    
                    </div>
                    
                    ';
        return $output;

       /* if(!empty($seachResult))
            return $seachResult;
        else
            return "No data Found";*/

    }

    public function allSearch($value){
        $buyer_model = new BuyerModel();
        $user_id = $value['user_id_search'];
        $from = $value['from_date'];
        $to = $value['end_date'];
        $allSearch = $buyer_model->allSearch($user_id,$from,$to);
        return $allSearch;
    }

}