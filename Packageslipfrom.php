<?php 

function getIndianCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
    $digits = array('', 'hundred','thousand','lakh', 'crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
  }
if(isset( $_SESSION['user_id'])){
if(isset($_GET['editid'])){
  $sql = "SELECT * FROM `package`  WHERE pack_id = ". $_GET['editid'];


  $result = $conn->query($sql);


  $row1 = $result->fetch_array();
  $boxsql = "SELECT * FROM `boxes`  WHERE pack_id = ". $_GET['editid'];
  $boxresult = $conn->query($boxsql);
  $boxrow = $boxresult->fetch_array();
echo $num_result =   $boxresult->num_rows;
  $box_id= 0;
  $notused = 0;
}
?>
<div style="width: 90%; text-align:center; margin: auto; color:#3d909b;">
<h1>Add Packing list</h1>
</div>
<div class="" style="width: 90%; margin: auto;">

<form action="function.php" name="basicdata" method="post" enctype="multipart/form-data">
              <fieldset>
                <legend>EXPORTER</legend>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="exporter_name">name</label>
                    <input type="text" class="form-control" id="exporter_name" placeholder="exporter name" name="exporter_name" value="<?php echo isset($row1['exporter_name']) ? $row1['exporter_name'] : null;   ?>"  required>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exporter_address">Address</label>
                    <input type="text" class="form-control" id="exporter_address" placeholder="exporter address" value="<?php echo isset($row1['exporter_address']) ? $row1['exporter_address'] : null;   ?>" name="exporter_address" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exporter_district">District</label>
                    <input type="text" class="form-control" id="exporter_district" placeholder="exporter district" value="<?php echo isset($row1['exporter_district']) ? $row1['exporter_district'] : null;   ?>" name="exporter_district" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exporter_State">State</label>
                    <input type="text" class="form-control" id="exporter_State" placeholder="exporter State" value="<?php echo isset($row1['exporter_State']) ? $row1['exporter_State'] : null;   ?>" name="exporter_State" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exporter_country">Country </label>
                    <input type="text" class="form-control" id="exporter_country" placeholder="exporter country" value="<?php echo isset($row1['exporter_country']) ? $row1['exporter_country'] : null;   ?>" name="exporter_country "  required>
                  </div>
                  <!-- <div class="form-group col-md-4">
                    <label for="inputEmail4">Cont</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="EXPORTER" value="<?php echo isset($row1['exporter_Cont']) ? $row1['exporter_Cont'] : null;   ?>" name="exporter_Cont">
                  </div> -->
                  <div class="form-group col-md-4">
                    <label for="exporter_mobile">Mobile</label>
                    <input  type="number" class="form-control" id="exporter_mobile" placeholder="exporter mobile" value="<?php echo isset($row1['exporter_mobile']) ? $row1['exporter_mobile'] : null;   ?>" name="exporter_mobile"  required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exporter_email">Email</label>
                    <input type="email" class="form-control" id="exporter_email" placeholder="exporter email" value="<?php echo isset($row1['exporter_email']) ? $row1['exporter_email'] : null;   ?>" name="exporter_email"  required>
                  </div>

                </div>
              </fieldset>
              <fieldset>
                <legend>Bill To</legend>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="bill_name">name</label>
                    <input type="text" class="form-control" id="bill_name" placeholder="bill name" value="<?php echo isset($row1['bill_name']) ? $row1['bill_name'] : null;   ?>" name="bill_name"  required>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="bill_address">Address</label>
                    <input type="text" class="form-control" id="bill_address" placeholder="bill address" value="<?php echo isset($row1['bill_address']) ? $row1['bill_address'] : null;   ?>" name="bill_address"  required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="bill_district">District</label>
                    <input type="text" class="form-control" id="bill_district" placeholder="bill district" value="<?php echo isset($row1['bill_district']) ? $row1['bill_district'] : null;   ?>" name="bill_district"  required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="bill_state">State</label>
                    <input type="text" class="form-control" id="bill_state" placeholder="bill state" value="<?php echo isset($row1['bill_state']) ? $row1['bill_state'] : null;   ?>" name="bill_state"  required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="bill_country">Country </label>
                    <input type="text" class="form-control" id="bill_country" placeholder="bill country" value="<?php echo isset($row1['bill_country']) ? $row1['bill_country'] : null;   ?>" name="bill_country"  required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="bill_mobile">Mobile</label>
                    <input  min="0" type="number" class="form-control" id="bill_mobile" placeholder="bill_ mobile" value="<?php echo isset($row1['bill_mobile']) ? $row1['bill_mobile'] : null;   ?>" name="bill_mobile"  required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="bill_fax">Fax</label>
                    <input type="text" class="form-control" id="bill_fax" placeholder="bill fax" value="<?php echo isset($row1['bill_fax']) ? $row1['bill_fax'] : null;   ?>" name="bill_fax"  required>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>Ship To</legend>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="ship_name">name</label>
                    <input type="text" class="form-control" id="ship_name" placeholder="ship name" value="<?php echo isset($row1['ship_name']) ? $row1['ship_name'] : null;   ?>" name="ship_name"  required>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="ship_address">Address</label>
                    <input type="text" class="form-control" id="ship_address" placeholder="ship address" value="<?php echo isset($row1['ship_address']) ? $row1['ship_address'] : null;   ?>" name="ship_address"  required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="ship_district">District</label>
                    <input type="text" class="form-control" id="ship_district" placeholder="ship district" value="<?php echo isset($row1['ship_district']) ? $row1['ship_district'] : null;   ?>" name="ship_district"  required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="ship_state">State</label>
                    <input type="text" class="form-control" id="ship_state" placeholder="ship state" value="<?php echo isset($row1['ship_state']) ? $row1['ship_state'] : null;   ?>" name="ship_state"  required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="ship_country">Country </label>
                    <input type="text" class="form-control" id="ship_country" placeholder="ship country" value="<?php echo isset($row1['ship_country']) ? $row1['ship_country'] : null;   ?>" name="ship_country"  required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="ship_mobile">Mobile</label>
                    <input  min="0" type="number" class="form-control" id="ship_mobile" placeholder="ship mobile" value="<?php echo isset($row1['ship_mobile']) ? $row1['ship_mobile'] : null;   ?>" name="ship_mobile"  required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="ship_email">email</label>
                    <input type="text" class="form-control" id="ship_email" placeholder="ship email" value="<?php echo isset($row1['ship_email']) ? $row1['ship_email'] : null;   ?>" name="ship_email"  required>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>other Informastion</legend>
                <div class="form-row">

                  <div class="form-group col-md-6">
                    <label for="inputAddress2">Packing List no.</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Packing List no." value="<?php echo isset($row1['pack_packing_list_no']) ? $row1['pack_packing_list_no'] : null;   ?>" name="pack_packing_list_no"  required>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="pack_buyer_order_no">pack buyer order no</label>
                    <input type="text" class="form-control" id="pack_buyer_order_no" placeholder="pack buyer order no." value="<?php echo isset($row1['pack_buyer_order_no']) ? $row1['pack_buyer_order_no'] : null;   ?>" name="pack_buyer_order_no"  required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputCity">Other Refereance</label>
                    <input type="text" class="form-control" id="inputCity" placeholder="Other Refereance" value="<?php echo isset($row1['pack_refereance']) ? $row1['pack_refereance'] : null;   ?>" name="pack_refereance"  required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inputZip">Notify Party</label>
                    <input type="text" class="form-control" id="inputZip" placeholder="Notify Party" value="<?php echo isset($row1['pack_BUYER']) ? $row1['pack_BUYER'] : null;   ?>" name="pack_BUYER"  required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inputZip">Pre -Carriage by</label>
                    <input type="text" class="form-control" id="inputZip" placeholder="Pre -Carriage by" value="<?php echo isset($row1['pack_pre_carriage_by']) ? $row1['pack_pre_carriage_by'] : null;   ?>" name="pack_pre_carriage_by"  required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inputZip">Place of Receipt of Pre-Carrier</label>
                    <input type="text" class="form-control" id="inputZip" placeholder="Place of Receipt of Pre-Carrier" value="<?php echo isset($row1['pack_pre_carrier']) ? $row1['pack_pre_carrier'] : null;   ?>" name="pack_pre_carrier"   required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inputZip">Port of Loading</label>
                    <input type="text" class="form-control" id="inputZip" placeholder="Port of Loading" value="<?php echo isset($row1['pack_loding']) ? $row1['pack_loding'] : null;   ?>" name="pack_loding"  required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="pack_vessel">Ship via / Mode of transport </label>
                    <input type="text" class="form-control" id="pack_vessel" placeholder="Port of Vessel" value="<?php echo isset($row1['pack_vessel']) ? $row1['pack_vessel'] : null;   ?>" name="pack_vessel"  required>
                  </div>
                  
                  <div class="form-group  col-md-6">
                    <label for="inputZip">Port of Descharge</label>
                    <input type="text" class="form-control" id="inputZip" placeholder="Port of Descharge" value="<?php echo isset($row1['pack_descharge']) ? $row1['pack_descharge'] : null;   ?>" name="pack_descharge"  required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inputZip">Final Destination</label>
                    <input type="text" class="form-control" id="inputZip" placeholder="Final Destination" value="<?php echo isset($row1['pack_destination']) ? $row1['pack_destination'] : null;   ?>" name="pack_destination"  required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inputZip">Country Orgin of Goods</label>
                    <input type="text" class="form-control" id="inputZip" placeholder="Country Orgin of Goods" value="<?php echo isset($row1['pack_country_orgin_of_goods']) ? $row1['pack_country_orgin_of_goods'] : null;   ?>" name="pack_country_orgin_of_goods"  required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inputZip">Contry of Final destination</label>
                    <input type="text" class="form-control" id="inputZip" placeholder="Contry of Final destination" value="<?php echo isset($row1['pack_contry_of_final_destination']) ? $row1['pack_contry_of_final_destination'] : null;   ?>" name="pack_contry_of_final_destination"  required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inputZip">Term of Delievry (Delievry)</label>
                    <input type="text" class="form-control" id="inputZip" placeholder="Delievry" value="<?php echo isset($row1['pack_term_of_delievry']) ? $row1['pack_term_of_delievry'] : null;   ?>" name="pack_term_of_delievry"  required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="pack_term_of_Payment">Term of Payment (Delievry)</label>
                    <input type="text" class="form-control" id="pack_term_of_Payment" placeholder="pack term of Payment" value="<?php echo isset($row1['pack_term_of_Payment']) ? $row1['pack_term_of_Payment'] : null;   ?>" name="pack_term_of_Payment"  required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="pack_total_boxs">Nos. & Kind of Pack</label>
                    <input type="text" class="form-control" id="pack_total_boxs" placeholder="pack total boxes" value="<?php echo isset($row1['pack_total_boxs']) ? $row1['pack_total_boxs'] : null;   ?>" name="pack_total_boxs"  required>
                  </div>

                  <div class="form-group  col-md-6">
                    <label for="pack_date">Package date</label>
                    <input type="date" class="form-control" id="pack_date" placeholder="date" value="<?php echo isset($row1['pack_date']) ? $row1['pack_date'] : null;   ?>" name="pack_date"  required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="pack_po_date">PO Date</label>
                    <input type="date" class="form-control" id="pack_po_date" placeholder="pack total boxes" value="<?php echo isset($row1['pack_po_date']) ? $row1['pack_po_date'] : null;   ?>" name="pack_po_date"  required>
                  </div>

                </div>
              </fieldset>
              <fieldset>
                <legend>Footer Informastion</legend>
                <div class="form-row">

                  <div class="form-group col-md-6">
                    <label for="pack_iec_code_no">IEC Code No.</label>
                    <input type="text" class="form-control" id="pack_iec_code_no" placeholder="Packing List no." value="<?php echo isset($row1['pack_iec_code_no']) ? $row1['pack_iec_code_no'] : null;   ?>" name="pack_iec_code_no"  required>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="pack_gst_no">GST NO :</label>
                    <input type="text" class="form-control" id="pack_gst_no" placeholder="pack buyer gst no" value="<?php echo isset($row1['pack_gst_no']) ? $row1['pack_gst_no'] : null;   ?>" name="pack_gst_no"  required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="pack_lut_no">LUT(ARN) No:</label>
                    <input type="text" class="form-control" id="pack_lut_no" placeholder="Other  lut no" value="<?php echo isset($row1['pack_lut_no']) ? $row1['pack_lut_no'] : null;   ?>" name="pack_lut_no"  required>
                  </div>
                
                 

                </div>
              </fieldset>
              <div id="addboxdiv">
                <?php  if(isset($boxrow['box_dimention'])){   $i = 1;  $boxresult = $conn->query($boxsql);  while ($boxrow = $boxresult->fetch_assoc()  ) { 
                 
                  
                  ?>
                <fieldset>
                  
                  <legend><?php echo $i; ?> BOXES</legend>
                  <div class="form-row">
                    <div class="form-group  col-md-6">
                      <label for="inputZip">DiMENTION OF BOXES</label>
                      <input type="text" class="form-control" id="inputZip" value="<?php echo isset($boxrow['box_dimention']) ? $boxrow['box_dimention'] : null;   ?>" name="box_dimention<?php echo $i; ?>" placeholder="Place of Receipt of Pre-Carrier"  required>
                
                    </div>

                    <div class="form-group  col-md-6">
                      <label for="numpart">Number of parts</label>
                      <input  min="0" type="number" class="form-control" class="box_parts_count<?php echo $i; ?>"  value="<?php echo isset($boxrow['box_parts_count']) ? $boxrow['box_parts_count'] : null;   ?>" name="box_parts_count1<?php echo $i; ?>" id="numpart<?php echo $i; ?>" placeholder="Number of parts"  required>
                      <input type="hidden" class="form-control" value="<?php echo isset($row1['exporter_name']) ? $row1['exporter_name'] : null;   ?>" name="box_count" value="test">
                    </div>
                    <div class="form-group  col-md-6"><label for="box_grossweight1">Gross Weight</label><input  min="0" type="number" class="form-control" id="box_grossweight1" value="<?php echo isset($boxrow['box_grossweight']) ? $boxrow['box_grossweight'] : null;   ?>" name="box_grossweight<?php echo $i; ?>" placeholder="Gross Weight"  required></div>

                  </div>
                  <div class="addproduct1">

                  </div>

                </fieldset>
                <?php $i++; } } ?>

              </div>

              <button type="button" class="btn btn-warning mb-5" id="addbox">add box </button>
              <button type="button" class="btn btn-danger mb-5" id="removebox">remove box </button>
              <button type="submit" class="btn  btn-dark mb-5" name="<?php echo isset($_GET['editid'])? "edit" : "add"  ?>"><?php echo isset($_GET['editid'])? "Edit" : "Save and preview"  ?></button>

              
</div>
            </form>

          </div>
        <?php } ?>