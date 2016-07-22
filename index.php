<?php

require 'config.php';
require 'functions.php';

// connect 
if($conn = connect($config)){
    echo "Connected";
}
else 
    die("Cannot connect to the database");

// select data
$registrants = get_registrants($conn);

$output = array();

foreach($registrants as $registrant){
    $output[$registrant['post_id']] = array();
    $record = get_record($conn, $registrant['post_id']);
    //echo "<pre>";
    //print_r($record);
    foreach($record as $r){
        $r['meta_value'] = trim($r['meta_value']);
        switch($r['meta_key']){
            case 'bef_fname':
                $output[$registrant['post_id']]['name'] = $r['meta_value'];
                break;
            case 'bef_lname':
                $output[$registrant['post_id']]['name'] .= ' ' . $r['meta_value'];
                break;
            case 'bef_email':
                $output[$registrant['post_id']]['email'] = $r['meta_value'];
                break;
            case 'bef_company':
                $output[$registrant['post_id']]['company'] = $r['meta_value'];
                break;
            case 'bef_business_phone':
                $output[$registrant['post_id']]['business_phone'] = $r['meta_value'];
                break;
            case 'bef_mobile_phone':
                $output[$registrant['post_id']]['mobile_phone'] = $r['meta_value'];
                break;
            case 'reg_date':
                $output[$registrant['post_id']]['registration_date'] = $r['meta_value'];
                break;
            case 'package_1_quantity':
                $output[$registrant['post_id']]['package_1_quantity'] = $r['meta_value'];
                break;
            case 'package_2_quantity':
                $output[$registrant['post_id']]['package_2_quantity'] = $r['meta_value'];
                break;
            case 'package_3_quantity':
                $output[$registrant['post_id']]['package_3_quantity'] = $r['meta_value'];
                break;
            case 'package_4_quantity':
                $output[$registrant['post_id']]['package_4_quantity'] = $r['meta_value'];
                break;
            case 'package_5_quantity':
                $output[$registrant['post_id']]['package_5_quantity'] = $r['meta_value'];
                break;
            case 'split_payment':
                $output[$registrant['post_id']]['split_payment'] = $r['meta_value'];
                break;
            case 'credit_card_last_four':
                $output[$registrant['post_id']]['credit_card_last_four'] = $r['meta_value'];
                break;
            case 'total_amount':
                $output[$registrant['post_id']]['total_amount'] = $r['meta_value'];
                break;
            case 'billing_address_1':
                $output[$registrant['post_id']]['address'] = $r['meta_value'];
                break;
            case 'billing_address_2':
                if(!empty($r['meta_value'])){
                    $output[$registrant['post_id']]['address'] .=  '' . trim($r['meta_value']);   
                }
                break;
            case 'billing_city':
                $output[$registrant['post_id']]['address'] .=  ',' . $r['meta_value'];
                break;
            case 'billing_zip':
                $output[$registrant['post_id']]['address'] .=  ',' . $r['meta_value'];
                break;
            case 'billing_state':
                $output[$registrant['post_id']]['address'] .=  ',' . $r['meta_value'];
                break;
            case 'payment_status':
                $output[$registrant['post_id']]['payment_status'] =  $r['meta_value'];
                break;
            case 'subscription_id':
                $output[$registrant['post_id']]['subscription_id'] =  $r['meta_value'];
                break;
            case 'transaction_id':
                $output[$registrant['post_id']]['transaction_id'] =  $r['meta_value'];
                break;
            case 'who_is_your_coach':
                $output[$registrant['post_id']]['who_is_your_coach'] =  $r['meta_value'];
                break;
            case 'package_1_names':
                if(!empty($r['meta_value'])){
                   $output[$registrant['post_id']]['package_1_names'] = explode("|", $r['meta_value']);
                }
                break;
            case 'package_2_names':
                if(!empty($r['meta_value'])){
                   $output[$registrant['post_id']]['package_2_names'] = explode("|", $r['meta_value']);
                }
                break;
            case 'package_3_names':
                if(!empty($r['meta_value'])){
                   $output[$registrant['post_id']]['package_3_names'] = explode("|", $r['meta_value']);
                }
                break;
            case 'package_4_names':
                if(!empty($r['meta_value'])){
                   $output[$registrant['post_id']]['package_4_names'] = explode("|", $r['meta_value']);
                }
                break;
            case 'package_5_names':
                if(!empty($r['meta_value'])){
                   $output[$registrant['post_id']]['package_5_names'] = explode("|", $r['meta_value']);
                }
                break;
                
            case 'package_1_diets':
                if(!empty($r['meta_value'])){
                   $output[$registrant['post_id']]['package_1_diets'] = explode("|", $r['meta_value']);
                }
                break;    
                
            case 'package_2_diets':
                if(!empty($r['meta_value'])){
                   $output[$registrant['post_id']]['package_2_diets'] = explode("|", $r['meta_value']);
                }
                break;  
                
            case 'package_3_diets':
                if(!empty($r['meta_value'])){
                   $output[$registrant['post_id']]['package_3_diets'] = explode("|", $r['meta_value']);
                }
                break;  
                
            case 'package_4_diets':
                if(!empty($r['meta_value'])){
                   $output[$registrant['post_id']]['package_4_diets'] = explode("|", $r['meta_value']);
                }
                break;
                
            case 'package_5_diets':
                if(!empty($r['meta_value'])){
                   $output[$registrant['post_id']]['package_5_diets'] = explode("|", $r['meta_value']);
                }
                break;  
                
            case 'package_1_shirt_sizes':
                if(!empty($r['meta_value'])){
                   $output[$registrant['post_id']]['package_1_shirt_sizes'] = explode("|", $r['meta_value']);
                }
                break;  
                
            case 'package_2_shirt_sizes':
                if(!empty($r['meta_value'])){
                   $output[$registrant['post_id']]['package_2_shirt_sizes'] = explode("|", $r['meta_value']);
                }
                break;  
                
            case 'package_3_shirt_sizes':
                if(!empty($r['meta_value'])){
                   $output[$registrant['post_id']]['package_3_shirt_sizes'] = explode("|", $r['meta_value']);
                }
                break;  
                
            case 'package_4_shirt_sizes':
                if(!empty($r['meta_value'])){
                   $output[$registrant['post_id']]['package_4_shirt_sizes'] = explode("|", $r['meta_value']);
                }
                break;  
                
            case 'package_5_shirt_sizes':
                if(!empty($r['meta_value'])){
                   $output[$registrant['post_id']]['package_5_shirt_sizes'] = explode("|", $r['meta_value']);
                }
                break;  
            default:
                break;
        }
    }
}
       
//echo "<pre>";
//print_r($output);
?>

<table border="1">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Company</th>
        <th>Business Phone</th>
        <th>Mobile Phone</th>
        <th>Package 1</th>
        <th>Package 2</th>
        <th>Package 3</th>
        <th>Package 4</th>
        <th>Package 5</th>
        <th>Total Amount</th>
        <th>Split payment</th>
        <th>Payment status</th>
        <th>Trans id</th>
        <th>Subscr id</th>
        <th>Address</th>
        <th>Who is your coach?</th>
        <th>Reg Date</th>
    </tr>
<?php
foreach($output as $key => $value){
    echo "<tr>";
        echo "<td>{$value['name']}</td>";
        echo "<td>{$value['email']}</td>";
        echo "<td>{$value['company']}</td>";
        echo "<td>{$value['business_phone']}</td>";
        echo "<td>{$value['mobile_phone']}</td>";
        $package_1_names = isset($value['package_1_names']) ? implode("<br>", $value['package_1_names']) : '';
        $package_1_shirt_sizes = isset($value['package_1_shirt_sizes']) ? implode("<br>", $value['package_1_shirt_sizes']) : '';
        $package_1_diets = isset($value['package_1_diets']) ? implode("<br>", $value['package_1_diets']) : '';
        $package_2_names = isset($value['package_2_names']) ? implode("<br>", $value['package_2_names']) : '';
        $package_2_shirt_sizes = isset($value['package_2_shirt_sizes']) ? implode("<br>", $value['package_2_shirt_sizes']) : '';
        $package_2_diets = isset($value['package_2_diets']) ? implode("<br>", $value['package_2_diets']) : '';
        $package_3_names = isset($value['package_3_names']) ? implode("<br>", $value['package_3_names']) : '';
        $package_3_shirt_sizes = isset($value['package_3_shirt_sizes']) ? implode("<br>", $value['package_3_shirt_sizes']) : '';
        $package_3_diets = isset($value['package_3_diets']) ? implode("<br>", $value['package_3_diets']) : '';
        $package_4_names = isset($value['package_4_names']) ? implode("<br>", $value['package_4_names']) : '';
        $package_4_shirt_sizes = isset($value['package_4_shirt_sizes']) ? implode("<br>", $value['package_4_shirt_sizes']) : '';
        $package_4_diets = isset($value['package_4_diets']) ? implode("<br>", $value['package_4_diets']) : '';
        $package_5_names = isset($value['package_5_names']) ? implode("<br>", $value['package_5_names']) : '';
        $package_5_shirt_sizes = isset($value['package_5_shirt_sizes']) ? implode("<br>", $value['package_5_shirt_sizes']) : '';
        $package_5_diets = isset($value['package_5_diets']) ? implode("<br>", $value['package_5_diets']) : '';
        
        echo "<td>
            <table border=1>
                <tr>
                    <th>Qty</th>
                    <th>Attendees</th>
                    <th>Shirt Sizes</th>
                    <th>Diet</th>
                </tr>
                <tr>
                    <td>{$value['package_1_quantity']}</td>
                    <td>{$package_1_names}</td>
                    <td>{$package_1_shirt_sizes}</td>
                    <td>{$package_1_diets}</td>
                </tr>
            </table>
        </td>";
        
         echo "<td>
            <table border=1>
                <tr>
                    <th>Qty</th>
                    <th>Attendees</th>
                    <th>Shirt Sizes</th>
                    <th>Diet</th>
                </tr>
                <tr>
                    <td>{$value['package_2_quantity']}</td>
                    <td>{$package_2_names}</td>
                    <td>{$package_2_shirt_sizes}</td>
                    <td>{$package_2_diets}</td>
                </tr>
            </table>
        </td>";
                    
         echo "<td>
            <table border=1>
                <tr>
                    <th>Qty</th>
                    <th>Attendees</th>
                    <th>Shirt Sizes</th>
                    <th>Diet</th>
                </tr>
                <tr>
                    <td>{$value['package_3_quantity']}</td>
                    <td>{$package_3_names}</td>
                    <td>{$package_3_shirt_sizes}</td>
                    <td>{$package_3_diets}</td>
                </tr>
            </table>
        </td>";
                    
                    
         echo "<td>
            <table border=1>
                <tr>
                    <th>Qty</th>
                    <th>Attendees</th>
                    <th>Shirt Sizes</th>
                    <th>Diet</th>
                </tr>
                <tr>
                    <td>{$value['package_4_quantity']}</td>
                    <td>{$package_4_names}</td>
                    <td>{$package_4_shirt_sizes}</td>
                    <td>{$package_4_diets}</td>
                </tr>
            </table>
        </td>";
                    
        echo "<td>
            <table border=1>
                <tr>
                    <th>Qty</th>
                    <th>Attendees</th>
                    <th>Shirt Sizes</th>
                    <th>Diet</th>
                </tr>
                <tr>
                    <td>{$value['package_5_quantity']}</td>
                    <td>{$package_5_names}</td>
                    <td>{$package_5_shirt_sizes}</td>
                    <td>{$package_5_diets}</td>
                </tr>
            </table>
        </td>";
    
        echo "<td>{$value['total_amount']}</td>";
        echo "<td>{$value['split_payment']}</td>";
        echo "<td>{$value['payment_status']}</td>";
        echo "<td>{$value['transaction_id']}</td>";
        echo "<td>{$value['subscription_id']}</td>";
        echo "<td>{$value['address']}</td>";
        echo "<td>{$value['who_is_your_coach']}</td>";
        echo "<td>{$value['registration_date']}</td>";
    echo "</tr>";
}
// put the data into excel
?>
</table>