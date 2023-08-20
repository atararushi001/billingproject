<?php 
if(isset($_GET['id'])){
$sql = "SELECT * FROM `parts` join invoice on parts.invoice_id = invoice.inc_id  WHERE invoice.inc_id  = " . $_GET['id'];

  $result = $conn->query($sql);
  $row1 = $result->fetch_array();
  // print_r($row1);
  $box_id= 0;
  $notused = 0;
}
?>
<div style="width: 90%; text-align:center; margin: auto; color:#3d909b;">
<h1>Add Invoice list</h1>
</div>  
<div class="" style="width: 90%; margin: auto;">
 
            <form action="function.php" name="basicdata" method="post" enctype="multipart/form-data">
              <fieldset>
                <legend>EXPORTER</legend>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="exporter_name">name</label>
                    <input type="text" class="form-control" id="exporter_name" placeholder="exporter name" value="<?php echo isset($row1['exporter_name']) ? $row1['exporter_name'] : null;   ?>" name="exporter_name" required>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exporter_address">Address</label>
                    <input type="text" class="form-control" id="exporter_address" placeholder="exporter address" name="exporter_address" value="<?php echo isset($row1['exporter_address']) ? $row1['exporter_address'] : null;   ?>" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exporter district">District</label>
                    <input type="text" class="form-control" id="exporter district" placeholder="EXPORTER" name="exporter_district" value="<?php echo isset($row1['exporter_address']) ? $row1['exporter_address'] : null;   ?>" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exporter_state">State</label>
                    <input type="text" class="form-control" id="exporter_state" placeholder="EXPORTER State" name="exporter_State" value="<?php echo isset($row1['exporter_State']) ? $row1['exporter_State'] : null;   ?>" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exporter country">Country </label>
                    <input type="text" class="form-control" id="exporter country" placeholder="EXPORTER" name="exporter_country" value="<?php echo isset($row1['exporter_State']) ? $row1['exporter_State'] : null;   ?>" required>
                  </div>
                  <!-- <div class="form-group col-md-4">
                    <label for="inputEmail4">Cont</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="EXPORTER" name="exporter_Cont">
                  </div> -->
                  <div class="form-group col-md-4">
                    <label for="exporter mobile">Mobile</label>
                    <input min="0" type="number" class="form-control" id="exporter mobile" placeholder="exporter mobile" name="exporter_mobile" value="<?php echo isset($row1['exporter_State']) ? $row1['exporter_State'] : null;   ?>" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exporter email">Email</label>
                    <input type="email" class="form-control" id="exporter email" placeholder="exporter_email" name="exporter_email" value="<?php echo isset($row1['exporter_email']) ? $row1['exporter_email'] : null;   ?>" required>
                  </div>

                </div>
              </fieldset>
              <fieldset>
                <legend>Bill To</legend>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="billname">name</label>
                    <input type="text" class="form-control" id="bill name" placeholder="bill name" name="bill_name" value="<?php echo isset($row1['bill_name']) ? $row1['bill_name'] : null;   ?>" required>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="bill address">Address</label>
                    <input type="text" class="form-control" id="bill address" placeholder="bill address" name="bill_address" value="<?php echo isset($row1['bill_address']) ? $row1['bill_address'] : null;   ?>" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="bill_district">District</label>
                    <input type="text" class="form-control" id="bill_district" placeholder="bill district" name="bill_district" value="<?php echo isset($row1['bill_district']) ? $row1['bill_district'] : null;   ?>" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="bill_state">State</label>
                    <input type="text" class="form-control" id="bill_state" placeholder="bill state" name="bill_state" value="<?php echo isset($row1['bill_state']) ? $row1['bill_state'] : null;   ?>" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="bill country">Country </label>
                    <input type="text" class="form-control" id="bill country" placeholder="bill country" name="bill_country" value="<?php echo isset($row1['bill_country']) ? $row1['bill_country'] : null;   ?>" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="bill_mobile">Mobile</label>
                    <input type="number" min="0" class="form-control" id="bill_mobile" placeholder="bill mobile" name="bill_mobile" value="<?php echo isset($row1['bill_mobile']) ? $row1['bill_mobile'] : null;   ?>" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="bill fax">Fax</label>
                    <input  min="0" type="number" class="form-control" id="bill fax" placeholder="EXPORTER" name="bill_fax" value="<?php echo isset($row1['bill_fax']) ? $row1['bill_fax'] : null;   ?>" required>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>Ship To</legend>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="ship_name">name</label>
                    <input type="text" class="form-control" id="ship_name" placeholder="ship name" name="ship_name" value="<?php echo isset($row1['ship_name']) ? $row1['ship_name'] : null;   ?>" required>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="ship_address">Address</label>
                    <input type="text" class="form-control" id="ship_address" placeholder="ship district" name="ship_address" value="<?php echo isset($row1['ship_address']) ? $row1['ship_address'] : null;   ?>" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="ship_district">District</label>
                    <input type="text" class="form-control" id="ship_district" placeholder="ship district" name="ship_district" value="<?php echo isset($row1['ship_district']) ? $row1['ship_district'] : null;   ?>" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="ship_state">State</label>
                    <input type="text" class="form-control" id="ship_state" placeholder="ship state" name="ship_state" value="<?php echo isset($row1['ship_state']) ? $row1['ship_state'] : null;   ?>" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="ship_country">Country </label>
                    <input type="text" class="form-control" id="ship_country" placeholder="ship country" name="ship_country" value="<?php echo isset($row1['ship_country']) ? $row1['ship_country'] : null;   ?>" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="ship_mobile">Mobile</label>
                    <input type="number" min="0" class="form-control" id="ship_mobile" placeholder="ship mobile" name="ship_mobile" value="<?php echo isset($row1['ship_mobile']) ? $row1['ship_mobile'] : null;   ?>" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="ship_email">email</label>
                    <input type="text" class="form-control" id="ship_email" placeholder="ship email" name="ship_email" value="<?php echo isset($row1['ship_email']) ? $row1['ship_email'] : null;   ?>" required>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>other Informastion</legend>
                <div class="form-row">

                  <div class="form-group col-md-6">
                    <label for="inc_invoice_nu">Packing List no.</label>
                    <input type="text" class="form-control" id="inc_invoice_nu" placeholder="InvoiceList no." name="inc_invoice_nu" value="<?php echo isset($row1['inc_invoice_nu']) ? $row1['inc_invoice_nu'] : null;   ?>" required>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="inc_buyer_order_no">pack buyer order no</label>
                    <input type="text" class="form-control" id="inc_buyer_order_no" placeholder="pack buyer order no." name="inc_buyer_order_no" value="<?php echo isset($row1['inc_buyer_order_no']) ? $row1['inc_buyer_order_no'] : null;   ?>" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inc_refereance">Other Refereance</label>
                    <input type="text" class="form-control" id="inc_refereance" placeholder="Other Refereance" name="inc_refereance" value="<?php echo isset($row1['inc_refereance']) ? $row1['inc_refereance'] : null;   ?>" required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_BUYER">Notify Party</label>
                    <input type="text" class="form-control" id="inc_BUYER" placeholder="Notify Party" name="inc_BUYER" value="<?php echo isset($row1['inc_BUYER']) ? $row1['inc_BUYER'] : null;   ?>" required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_BUYER">Pre -Carriage by</label>
                    <input type="text" class="form-control" id="inc_BUYER" placeholder="Pre -Carriage by" name="inc_pre_carriage_by" value="<?php echo isset($row1['inc_pre_carriage_by']) ? $row1['inc_pre_carriage_by'] : null;   ?>" required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_pre_carrier">Place of Receipt of Pre-Carrier</label>
                    <input type="text" class="form-control" id="inc_pre_carrier" placeholder="Place of Receipt of Pre-Carrier" name="inc_pre_carrier" value="<?php echo isset($row1['inc_pre_carrier']) ? $row1['inc_pre_carrier'] : null;   ?>" required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_loding">Port of Loading</label>
                    <input type="text" class="form-control" id="inc_loding" placeholder="Port of Loading" name="inc_loding" value="<?php echo isset($row1['inc_loding']) ? $row1['inc_loding'] : null;   ?>" required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_vessel">Ship via / Mode of transport.</label>
                    <input type="text" class="form-control" id="inc_vessel" placeholder="Ship via / Mode of transport" name="inc_vessel" value="<?php echo isset($row1['inc_vessel']) ? $row1['inc_vessel'] : null;   ?>" required> 
                  </div>
                  
                  <div class="form-group  col-md-6">
                    <label for="inc_descharge">Port of Descharge</label>
                    <input type="text" class="form-control" id="inc_descharge" placeholder="Port of Descharge" name="inc_descharge" value="<?php echo isset($row1['inc_descharge']) ? $row1['inc_descharge'] : null;   ?>" required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_destination">Final Destination</label>
                    <input type="text" class="form-control" id="inc_destination" placeholder="Final Destination" name="inc_destination" value="<?php echo isset($row1['inc_destination']) ? $row1['inc_destination'] : null;   ?>" required> 
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_country_orgin_of_goods">Country Orgin of Goods</label>
                    <input type="text" class="form-control" id="inc_country_orgin_of_goods" placeholder="Country Orgin of Goods" name="inc_country_orgin_of_goods" value="<?php echo isset($row1['inc_country_orgin_of_goods']) ? $row1['inc_country_orgin_of_goods'] : null;   ?>" required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_contry_of_final_destination">Contry of Final destination</label>
                    <input type="text" class="form-control" id="inc_contry_of_final_destination" placeholder="Contry of Final destination" name="inc_contry_of_final_destination" value="<?php echo isset($row1['inc_contry_of_final_destination']) ? $row1['inc_contry_of_final_destination'] : null;   ?>" required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_term_of_delievry">Term of Delievry (Delievry)</label>
                    <input type="text" class="form-control" id="inc_term_of_delievry" placeholder="Delievry" name="inc_term_of_delievry" value="<?php echo isset($row1['inc_term_of_delievry']) ? $row1['inc_term_of_delievry'] : null;   ?>" required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="pack_term_of_Payment">Term of Payment</label>
                    <input type="text" class="form-control" id="pack_term_of_Payment" placeholder="term of Payment" name="pack_term_of_Payment" value="<?php echo isset($row1['pack_term_of_Payment']) ? $row1['pack_term_of_Payment'] : null;   ?>" required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_total_boxs">Nos. & Kind of Pack</label>
                    <input type="text" class="form-control" id="inc_total_boxs" placeholder="pack total boxes" name="inc_total_boxs"  value="<?php echo isset($row1['exporter_name']) ? $row1['exporter_name'] : null;   ?>" required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_currency">Currency</label>
                    <input type="text" class="form-control" id="inc_currency" placeholder="Currency" value="<?php echo isset($row1['inc_currency']) ? $row1['inc_currency'] : null;   ?>" name="inc_currency"   required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_date">Package date</label>
                    <input type="date" class="form-control" id="inc_date" placeholder="date" value="<?php echo isset($row1['inc_date']) ? $row1['inc_date'] : null;   ?>" name="inc_date"  required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_po_date">PO Date</label>
                    <input type="date" class="form-control" id="inc_po_date" placeholder="pack total boxes" value="<?php echo isset($row1['inc_po_date']) ? $row1['inc_po_date'] : null;   ?>" name="inc_po_date"   required>
                  </div>

               
                
                </div>
              </fieldset>
              <fieldset>
                <legend>Payment and Tax</legend>
                <div class="form-row">
                 <div class="form-group  col-md-6">
                    <label for="inc_other_charges">Packing and Forwarding charges</label>
                    <input type="text" class="form-control" id="inc_other_charges" placeholder="Packing and Forwarding charges" name="inc_other_charges" value="<?php echo isset($row1['inc_other_charges']) ? $row1['inc_other_charges'] : null;   ?>" required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_Discount">Discount</label>
                    <input type="text" class="form-control" id="inc_Discount" placeholder="Packing Discount" name="inc_Discount" value="<?php echo isset($row1['inc_Discount']) ? $row1['inc_Discount'] : null;   ?>" required>
                  </div>
                <div class="form-group  col-md-6">
                    <label for="inc_cgst">CGST </label>
                    <select  class="form-control" name="inc_cgst" id="inc_cgst" >
                    <option value="0">0.00</option>
                      <option value="2.50">2.50</option>
                      <option value="6.00"> 6</option>
                      <option value="9.00"> 9.00</option>
                      <option value="14.00">14.00</option>
                    </select>
                   </div>
                  <div class="form-group col-md-6">
                    <label for="inc_sgst">SGST </label>
                    <select  class="form-control" name="inc_sgst" id="inc_sgst">
                    <option value="0">0.00</option>
                      <option value="2.50">2.50</option>
                      <option value="6.00"> 6</option>
                      <option value="9.00"> 9.00</option>
                      <option value="14.00">14.00</option>
                    </select>
                      </div>
                      <div class="form-group col-md-6">
                    <label for="inc_igst">IGST </label>
                    <select  class="form-control" name="inc_igst" id="inc_igst">
                      <option value="0">0.00</option>
                      <option value="5.00">5.00</option>
                      <option value="12.00">12.00</option>
                      <option value="18.00">18.00</option>
                      <option value="28.00">28.00</option>
                    </select>
                      </div>  
                      </div> 
              </fieldset>
              <fieldset>
                <legend>Footer Informastion</legend>
                <div class="form-row">

                  <div class="form-group col-md-6">
                    <label for="inc_iec_code_no">IEC Code No.</label>
                    <input type="text" class="form-control" id="inc_iec_code_no" placeholder="Packing List no." name="inc_iec_code_no" value="<?php echo isset($row1['inc_iec_code_no']) ? $row1['inc_iec_code_no'] : null;   ?>" required>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="inc_gst_no">GST NO :</label>
                    <input type="text" class="form-control" id="inc_gst_no" placeholder="pack buyer order no." name="inc_gst_no" value="<?php echo isset($row1['inc_gst_no']) ? $row1['inc_gst_no'] : null;   ?>" required>
                  </div>
                  
                  <div class="form-group col-md-6">
                    <label for="inc_lut_no">LUT(ARN) No:</label>
                    <input type="text" class="form-control" id="inc_lut_no" placeholder="Other Refereance" name="inc_lut_no" value="<?php echo isset($row1['inc_lut_no']) ? $row1['inc_lut_no'] : null;   ?>" required>
                  </div>
                
                 

                </div>
              </fieldset>

              <fieldset>
                <legend>Bank Informastion</legend>
                <div class="form-row">

                  <div class="form-group col-md-6">
                    <label for="bank">BANK :</label>
                    <input type="text" class="form-control" id="bank" placeholder="Packing List no." name="bank" value="<?php echo isset($row1['bank']) ? $row1['bank'] : null;   ?>" required>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="bank_branch">BRANCH :</label>
                    <input type="text" class="form-control" id="bank_branch" placeholder="pack buyer order no." name="bank_branch" value="<?php echo isset($row1['bank_branch']) ? $row1['bank_branch'] : null;   ?>" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="bank_address">ADDRESS :</label>
                    <input type="text" class="form-control" id="bank_address" placeholder="Other Refereance" name="bank_address" value="<?php echo isset($row1['bank_address']) ? $row1['bank_address'] : null;   ?>" required>
                  </div>
                
                  <div class="form-group col-md-6">
                    <label for="bank_account_no">ACCOUNT NO. :</label>
                    <input type="text" class="form-control" id="bank_account_no" placeholder="Other Refereance" name="bank_account_no" value="<?php echo isset($row1['bank_account_no']) ? $row1['bank_account_no'] : null;   ?>" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="bank_sort_code">Sort Code or BSB Code :</label>
                    <input type="text" class="form-control" id="bank_sort_code" placeholder="Other Refereance" name="bank_sort_code" value="<?php echo isset($row1['bank_sort_code']) ? $row1['bank_sort_code'] : null;   ?>" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="bank_ifs_code">BANK IFS Code :</label>
                    <input type="text" class="form-control" id="bank_ifs_code" placeholder="Other Refereance" name="bank_ifs_code" value="<?php echo isset($row1['bank_ifs_code']) ? $row1['bank_ifs_code'] : null;   ?>" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="bank_swift_code">IBAN Number/SWIFT CODE :</label>
                    <input type="text" class="form-control" id="bank_swift_code" placeholder="Other Refereance" name="bank_swift_code" value="<?php echo isset($row1['bank_swift_code']) ? $row1['bank_swift_code'] : null;   ?>" required>
                  </div>
                 

                </div>
              </fieldset>
              <div id="addboxdiv">
              <?php 
                $count = 0;
                 $result2 = $conn->query($sql);
                while($row2 = $result2->fetch_array()){  $count++; ?>
              <div class="addproduct1">
              
                  <fieldset> 
                      <legend>product <?php echo $count; ?></legend> 
                      <div class="form-row"> <div class="form-group col-md-6"> 
                        <label for="inputAddress2">Part No.</label> 
                        <input type="text" class="form-control" id="addpacking" name="Part No." placeholder="Part No" value="<?php echo isset($row2['part_gid']) ? $row2['part_gid'] : null;   ?>" required>
                       </div> <div class="form-group col-md-6"> 
                        <label for="inputCity">Description of Goods </label> 
                        <input type="text" class="form-control" id="inputCity" name="part_description1" placeholder="Description of Goods" value="<?php echo isset($row2['part_description']) ? $row2['part_description'] : null;   ?>" required> 
                       </div>   
                       <div class="form-group  col-md-6">
                        <label for="inputZip">QUANTITY NOS</label> 
                        <input type="text" class="form-control" id="inputZip" name="part_quantity1" placeholder="QUANTITY NOS" value="<?php echo isset($row2['part_quantity']) ? $row2['part_quantity'] : null;   ?>" required>
                      </div>  
                        <div class="form-group  col-md-6">
                          <label for="inputZip">Net Weight</label>
                          <input type="text" class="form-control" id="inputZip"name="part_netweight1" placeholder="Net Weight" value="<?php echo isset($row2['part_netweight']) ? $row2['part_netweight'] : null;   ?>" required> 
                        </div>  
                        <div class="form-group  col-md-6"><label for="part_hsn1">Hsn</label>
                        <input type="text" class="form-control" id="part_hsn1" name="part_hsn1" placeholder="Hsn" value="<?php echo isset($row2['part_hsn']) ? $row2['part_hsn'] : null;   ?>" required>
                       </div>
                      </div> 
                      </fieldset>
                      
                  </div>
                  <?php } ?>

              </div>

              <button type="button" class="btn btn-warning mb-5" id="addproductbtn">add Product </button>
              <button type="button" class="btn btn-danger mb-5" id="removeproduct">remove Product </button>
              <button type="submit" class="btn  btn-dark mb-5" id="addinvoce"  name="addinvoce"value="1" > Save and preview </button>
            </form>

          </div>
        