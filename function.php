<?php
include 'db.php';
if (isset($_POST['add'])) {

  

    $pack_packing_list_no = $_POST['pack_packing_list_no'];
    $pack_refereance = $_POST['pack_refereance'];
    $pack_pre_carriage_by = $_POST['pack_pre_carriage_by'];
    $pack_pre_carrier = $_POST['pack_pre_carrier'];
    $pack_vessel =   $_POST['pack_vessel'];
    $pack_loding = $_POST['pack_loding'];
    $pack_descharge = $_POST['pack_descharge'];
    $pack_destination = $_POST['pack_destination'];
    $pack_country_orgin_of_goods = $_POST['pack_country_orgin_of_goods'];
    $pack_contry_of_final_destination = $_POST['pack_contry_of_final_destination'];
    $pack_term_of_delievry = $_POST['pack_term_of_delievry'];
    $pack_term_of_Payment = $_POST['pack_term_of_Payment'];
    $pack_buyer_order_no = $_POST['pack_buyer_order_no'];
    $pack_BUYER = $_POST['pack_BUYER'];
    $pack_date = $_POST['pack_date'];
    $pack_po_date = $_POST['pack_po_date'];

    $exporter_name = $_POST['exporter_name'];
    $exporter_address = $_POST['exporter_address'];
    $exporter_district = $_POST['exporter_district'];
    $exporter_state = $_POST['exporter_state'];
    // $exporter_state = "sad";
    $exporter_country = $_POST['exporter_country'];
    $exporter_mobile = $_POST['exporter_mobile'];
    $exporter_email = $_POST['exporter_email'];

    $bill_name = $_POST['bill_name'];
    $bill_address = $_POST['bill_address'];
    $bill_district = $_POST['bill_district'];
    $bill_state = $_POST['bill_state'];
    $bill_country = $_POST['bill_country'];
    $bill_mobile = $_POST['bill_mobile'];
    $bill_fax = $_POST['bill_fax'];
    $pack_total_boxs = $_POST['pack_total_boxs'];


    $ship_name = $_POST['ship_name'];
    $ship_address = $_POST['ship_address'];
    $ship_district = $_POST['ship_district'];
    $ship_state = $_POST['ship_state'];
    $ship_country = $_POST['ship_country'];
    $ship_mobile = $_POST['ship_mobile'];
    $ship_email = $_POST['ship_email'];
    $pack_iec_code_no = $_POST['pack_iec_code_no'];
    $pack_gst_no = $_POST['pack_gst_no'];
    $pack_lut_no = $_POST['pack_lut_no'];
    

      $sql = "INSERT INTO `package` (`pack_packing_list_no`, `pack_refereance`, `pack_pre_carriage_by`, `pack_pre_carrier`, `pack_vessel`, `pack_loding`, 
    `pack_descharge`, `pack_destination`, `pack_country_orgin_of_goods`, `pack_contry_of_final_destination`, `pack_term_of_delievry`,`pack_term_of_Payment`,`pack_buyer_order_no`, 
    `pack_BUYER`,`pack_date`,`pack_po_date`,`pack_total_boxs`, `exporter_name`, `exporter_address`, `exporter_district`, `exporter_state`, `exporter_country`, `exporter_mobile`, `exporter_email`,
    `bill_name`, `bill_address`, `bill_district`, `bill_state`, `bill_country`, `bill_mobile`, `bill_fax`, `ship_name`, `ship_address`, `ship_district`
    , `ship_state`, `ship_country`, `ship_mobile`, `ship_email`,`pack_iec_code_no`,`pack_gst_no`,`pack_lut_no`) 
    VALUES ('$pack_packing_list_no','$pack_refereance','$pack_pre_carriage_by','$pack_pre_carrier','$pack_vessel','$pack_loding','$pack_descharge','$pack_destination',
    '$pack_country_orgin_of_goods','$pack_contry_of_final_destination','$pack_term_of_delievry','$pack_term_of_Payment','$pack_buyer_order_no',
    '$pack_BUYER','$pack_date','$pack_po_date','$pack_total_boxs','$exporter_name','$exporter_address','$exporter_district','$exporter_state','$exporter_country','$exporter_mobile','$exporter_email',
    '$bill_name','$bill_address','$bill_district','$bill_state','$bill_country','$bill_mobile','$bill_fax',
    '$ship_name','$ship_address','$ship_district','$ship_state','$ship_country','$ship_mobile','$ship_email','$pack_iec_code_no','$pack_gst_no','$pack_lut_no')";

    if ($conn->query($sql) === TRUE) {
        $pack_id = $conn->insert_id;
        $count = 1;

        while (isset($_POST['box_dimention' . $count])) {
            
            $box_dimention = $_POST['box_dimention' . $count];
            $box_parts_count = $_POST['box_parts_count' . $count];
            $box_grossweight = $_POST['box_grossweight' . $count];
            if (isset($_POST['box_parts_count'.$count])) {

             $box_col = $_POST['box_parts_count'.$count];
            } else {
                $box_col = 0;
            }
            // die();
           $sql1 = "INSERT INTO `boxes`( `box_dimention`, `box_parts_count`, `pack_id`,`box_grossweight`,`box_coll`) VALUES ('$box_dimention','$box_parts_count ','$pack_id','$box_grossweight','$box_col')";



            if ($conn->query($sql1) === TRUE) {
           
                $part_boxid = $conn->insert_id;
                for ($b = 1; $b <= $_POST['box_parts_count' . $count]; $b++) {
                    $part_gid = $_POST['part_gid' . $count . $b];
                    $part_description = $_POST['part_description' . $count . $b];
                    $part_quantity = $_POST['part_quantity' . $count . $b];
                    $part_netweight = $_POST['part_netweight' . $count . $b];
                 
                    $part_hsn = $_POST['part_hsn' . $count . $b];
                    $part_packid = $pack_id;

                $sql2 = "INSERT INTO `parts`( `part_gid`, `part_hsn`,`part_description`, `part_quantity`, `part_netweight`,  `part_packid`, `part_boxid`) 
                          VALUES ('$part_gid','$part_hsn','$part_description','$part_quantity','$part_netweight','$part_packid','$part_boxid')";
            $conn->query($sql2); 
            }
            }
            // die();

         
            $count++;
        }
        header("Location: index.php?view=Packageslip&id=".$pack_id); 

    }
}

if (isset($_POST['addinvoce'])) {
    $inc_invoice_nu = $_POST['inc_invoice_nu'];
     $inc_refereance = $_POST['inc_refereance'];
     $inc_pre_carriage_by = $_POST['inc_pre_carriage_by'];
     $inc_pre_carrier = $_POST['inc_pre_carrier'];
     $inc_vessel =   $_POST['inc_vessel'];
     $inc_loding = $_POST['inc_loding'];
     $inc_descharge = $_POST['inc_descharge'];
     $inc_destination = $_POST['inc_destination'];
     $inc_country_orgin_of_goods = $_POST['inc_country_orgin_of_goods'];
     $inc_contry_of_final_destination = $_POST['inc_contry_of_final_destination'];
     $inc_term_of_delievry = $_POST['inc_term_of_delievry'];
     $inc_buyer_order_no = $_POST['inc_buyer_order_no'];
     $inc_BUYER = $_POST['inc_BUYER'];
     $inc_cgst = $_POST['inc_cgst'];
     $inc_sgst = $_POST['inc_sgst'];
     $inc_igst = $_POST['inc_igst'];
 
     $exporter_name = $_POST['exporter_name'];
     $exporter_address = $_POST['exporter_address'];
     $exporter_district = $_POST['exporter_district'];
     $exporter_state = $_POST['exporter_state'];
    //  $exporter_state = "sad";
     $exporter_country = $_POST['exporter_country'];
     $exporter_mobile = $_POST['exporter_mobile'];
     $exporter_email = $_POST['exporter_email'];
 
     $bill_name = $_POST['bill_name'];
     $bill_address = $_POST['bill_address'];
     $bill_district = $_POST['bill_district'];
     $bill_state = $_POST['bill_state'];
     $bill_country = $_POST['bill_country'];
     $bill_mobile = $_POST['bill_mobile'];
     $bill_fax = $_POST['bill_fax'];
 
 
     $ship_name = $_POST['ship_name'];
     $ship_address = $_POST['ship_address'];
     $ship_district = $_POST['ship_district'];
     $ship_state = $_POST['ship_state'];
     $ship_country = $_POST['ship_country'];
     $ship_mobile = $_POST['ship_mobile'];
     $ship_email = $_POST['ship_email'];
     $inc_iec_code_no = $_POST['inc_iec_code_no'];
     $inc_gst_no = $_POST['inc_gst_no'];
     $inc_lut_no = $_POST['inc_lut_no'];
     $inc_other_charges = $_POST['inc_other_charges'];
     $inc_Discount = $_POST['inc_Discount'];
   $num_product = $_POST['addinvoce'];



   $bank = $_POST['bank'];
   $bank_branch = $_POST['bank_branch'];
   $bank_address = $_POST['bank_address'];
   $bank_account_no = $_POST['bank_account_no'];
   $bank_sort_code = $_POST['bank_sort_code'];
   $bank_ifs_code = $_POST['bank_ifs_code'];
   $bank_swift_code = $_POST['bank_swift_code'];

// die();
     $sql = "INSERT INTO `invoice` (`inc_invoice_nu`, `inc_refereance`, `inc_pre_carriage_by`, `inc_pre_carrier`, `inc_vessel`, `inc_loding`, 
     `inc_descharge`, `inc_destination`, `inc_country_orgin_of_goods`, `inc_contry_of_final_destination`, `inc_term_of_delievry`, `inc_buyer_order_no`, 
     `inc_BUYER`,`inc_other_charges`,`inc_cgst`,`inc_sgst`,`inc_igst`, `exporter_name`, `exporter_address`, `exporter_district`, `exporter_state`, `exporter_country`, `exporter_mobile`, `exporter_email`,
     `bill_name`, `bill_address`, `bill_district`, `bill_state`, `bill_country`, `bill_mobile`, `bill_fax`, `ship_name`, `ship_address`, `ship_district`
     , `ship_state`, `ship_country`, `ship_mobile`, `ship_email`,`inc_iec_code_no`,`inc_gst_no`,`inc_lut_no`,`bank`,`bank_branch`,`bank_address`,`bank_account_no`,`bank_sort_code`,`bank_ifs_code`,`bank_swift_code`) 
     VALUES ('$inc_invoice_nu','$inc_refereance','$inc_pre_carriage_by','$inc_pre_carrier','$inc_vessel','$inc_loding','$inc_descharge','$inc_destination',
     '$inc_country_orgin_of_goods','$inc_contry_of_final_destination','$inc_term_of_delievry','$inc_buyer_order_no',
     '$inc_BUYER','$inc_other_charges','$inc_cgst','$inc_sgst','$inc_igst','$exporter_name','$exporter_address','$exporter_district','$exporter_state','$exporter_country','$exporter_mobile','$exporter_email',
     '$bill_name','$bill_address','$bill_district','$bill_state','$bill_country','$bill_mobile','$bill_fax',
     '$ship_name','$ship_address','$ship_district','$ship_state','$ship_country','$ship_mobile','$ship_email','$inc_iec_code_no','$inc_gst_no','$inc_lut_no','$bank','$bank_branch','$bank_address','$bank_account_no','$bank_sort_code','$bank_ifs_code','$bank_swift_code')";
    
     if ($conn->query($sql) === TRUE) {
       $inc_id = $conn->insert_id;
    //  die();
      
      
            
           
                 for ($b = 1; $b <= $num_product; $b++) {
                     $part_gid = $_POST['part_gid'.$b];
                     $part_description = $_POST['part_description'.$b];
                     $part_quantity = $_POST['part_quantity'.$b];
                     $part_netweight = $_POST['part_netweight'.$b];
                  
                     $part_hsn = $_POST['part_hsn'.$b];
                     $invoice_id = $inc_id;
 
                   $sql2 = "INSERT INTO `parts`( `part_gid`,`part_hsn`, `part_description`, `part_quantity`, `part_netweight`,  `invoice_id`) 
                           VALUES ('$part_gid ','$part_hsn','$part_description','$part_quantity','$part_netweight','$inc_id')";
            $conn->query($sql2);   
            }
             }
             header("Location:index.php?view=Invoiceslip&id=".$inc_id); 
          
         }
         if (isset($_POST['login'])) { 

           $email = $_POST['email'];
            $password = $_POST['password'];
           $loginsql = "SELECT * FROM `user` WHERE user_email = '".$email."' and user_password= '".$password."'";
           $resultlogin = $conn->query($loginsql);
        
          if($resultlogin->num_rows>=1){ 
            // header("Location: index.php");
          
            // header("Location : index.php?view=viewpackage");
            // echo "<script>location.href=index.php?view=viewpackage';</script>" ;
            session_start();
            $rowlogin =   $resultlogin->fetch_array();
            $_SESSION['user_id'] = $rowlogin['user_id'];
            header("Location: index.php");  
            //  echo "<script>location.href=index.php';</script>" ;

            //  header("Location : index.php");
          }
            
         }
