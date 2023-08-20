<?php 
if(isset($_GET['editid'])){
  $sql = "SELECT * FROM `parts` join boxes on parts.part_boxid =  boxes.box_id join package on parts.part_packid = package.pack_id WHERE package.pack_id = " . $_GET['editid'];

  $result = $conn->query($sql);
  $row1 = $result->fetch_array();
  $box_id= 0;
  $notused = 0;
}
?>
<div class="" style="width: 90%; margin: auto;">
            <form action="function.php" name="basicdata" method="post" enctype="multipart/form-data">
              <fieldset>
                <legend>EXPORTER</legend>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="exporter_name">name</label>
                    <input type="text" class="form-control" id="exporter_name" placeholder="exporter name" name="exporter_name" required>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="exporter_address">Address</label>
                    <input type="text" class="form-control" id="exporter_address" placeholder="exporter address" name="exporter_address" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exporter district">District</label>
                    <input type="text" class="form-control" id="exporter district" placeholder="EXPORTER" name="exporter_district" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exporter State">State</label>
                    <input type="text" class="form-control" id="exporter State" placeholder="EXPORTER" name="exporter_State" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exporter country">Country </label>
                    <input type="text" class="form-control" id="exporter country" placeholder="EXPORTER" name="exporter_country" required>
                  </div>
                  <!-- <div class="form-group col-md-4">
                    <label for="inputEmail4">Cont</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="EXPORTER" name="exporter_Cont">
                  </div> -->
                  <div class="form-group col-md-4">
                    <label for="exporter mobile">Mobile</label>
                    <input min="0" type="number" class="form-control" id="exporter mobile" placeholder="exporter mobile" name="exporter_mobile" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="exporter email">Email</label>
                    <input type="email" class="form-control" id="exporter email" placeholder="exporter_email" name="exporter_email" required>
                  </div>

                </div>
              </fieldset>
              <fieldset>
                <legend>Bill To</legend>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="billname">name</label>
                    <input type="text" class="form-control" id="bill name" placeholder="bill name" name="bill_name" required>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="bill address">Address</label>
                    <input type="text" class="form-control" id="bill address" placeholder="bill address" name="bill_address" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="bill_district">District</label>
                    <input type="text" class="form-control" id="bill_district" placeholder="bill district" name="bill_district" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="bill_state">State</label>
                    <input type="text" class="form-control" id="bill_state" placeholder="bill state" name="bill_state" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="bill country">Country </label>
                    <input type="text" class="form-control" id="bill country" placeholder="bill country" name="bill_country" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="bill_mobile">Mobile</label>
                    <input type="number" min="0" class="form-control" id="bill_mobile" placeholder="bill mobile" name="bill_mobile" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="bill fax">Fax</label>
                    <input  min="0" type="number" class="form-control" id="bill fax" placeholder="EXPORTER" name="bill_fax" required>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>Ship To</legend>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="ship_name">name</label>
                    <input type="text" class="form-control" id="ship_name" placeholder="ship name" name="ship_name" required>
                  </div>

                  <div class="form-group col-md-4">
                    <label for="ship_address">Address</label>
                    <input type="text" class="form-control" id="ship_address" placeholder="ship district" name="ship_address" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="ship_district">District</label>
                    <input type="text" class="form-control" id="ship_district" placeholder="ship district" name="ship_district" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="ship_state">State</label>
                    <input type="text" class="form-control" id="ship_state" placeholder="ship state" name="ship_state" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="ship_country">Country </label>
                    <input type="text" class="form-control" id="ship_country" placeholder="ship country" name="ship_country" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="ship_mobile">Mobile</label>
                    <input type="number" min="0" class="form-control" id="ship_mobile" placeholder="ship mobile" name="ship_mobile" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="ship_email">email</label>
                    <input type="text" class="form-control" id="ship_email" placeholder="ship email" name="ship_email" required>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>other Informastion</legend>
                <div class="form-row">

                  <div class="form-group col-md-6">
                    <label for="inc_invoice_nu">Packing List no.</label>
                    <input type="text" class="form-control" id="inc_invoice_nu" placeholder="InvoiceList no." name="inc_invoice_nu" required>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="inc_buyer_order_no">pack buyer order no</label>
                    <input type="text" class="form-control" id="inc_buyer_order_no" placeholder="pack buyer order no." name="inc_buyer_order_no" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inc_refereance">Other Refereance</label>
                    <input type="text" class="form-control" id="inc_refereance" placeholder="Other Refereance" name="inc_refereance" required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_BUYER">BUYER'S (IF OTHER THAN CONSIGNEE )</label>
                    <input type="text" class="form-control" id="inc_BUYER" placeholder="Delievry" name="inc_BUYER" required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_BUYER">Pre -Carriage by</label>
                    <input type="text" class="form-control" id="inc_BUYER" placeholder="Pre -Carriage by" name="inc_pre_carriage_by" required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_pre_carrier">Place of Receipt of Pre-Carrier</label>
                    <input type="text" class="form-control" id="inc_pre_carrier" placeholder="Place of Receipt of Pre-Carrier" name="inc_pre_carrier" required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_loding">Port of Loading</label>
                    <input type="text" class="form-control" id="inc_loding" placeholder="Port of Loading" name="inc_loding" required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_vessel">Vessel/Flieht NO.</label>
                    <input type="text" class="form-control" id="inc_vessel" placeholder="Port of Vessel" name="inc_vessel" required> 
                  </div>
                  
                  <div class="form-group  col-md-6">
                    <label for="inc_descharge">Port of Descharge</label>
                    <input type="text" class="form-control" id="inc_descharge" placeholder="Port of Descharge" name="inc_descharge" required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_destination">Final Destination</label>
                    <input type="text" class="form-control" id="inc_destination" placeholder="Final Destination" name="inc_destination" required> 
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_country_orgin_of_goods">Country Orgin of Goods</label>
                    <input type="text" class="form-control" id="inc_country_orgin_of_goods" placeholder="Country Orgin of Goods" name="inc_country_orgin_of_goods" required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_contry_of_final_destination">Contry of Final destination</label>
                    <input type="text" class="form-control" id="inc_contry_of_final_destination" placeholder="Contry of Final destination" name="inc_contry_of_final_destination" required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_term_of_delievry">Term of Delievry (Delievry)</label>
                    <input type="text" class="form-control" id="inc_term_of_delievry" placeholder="Delievry" name="inc_term_of_delievry" required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_other_charges">Other Charges</label>
                    <input type="text" class="form-control" id="inc_other_charges" placeholder="other Charges" name="inc_other_charges" required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_total_boxs">Nos. & Kind of Pack</label>
                    <input type="text" class="form-control" id="inc_total_boxs" placeholder="pack total boxes" value="<?php echo isset($row1['inc_total_boxs']) ? $row1['inc_total_boxs'] : null;   ?>" name="inc_total_boxs"  required>
                  </div>

                  <div class="form-group  col-md-6">
                    <label for="inc_date">Package date</label>
                    <input type="date" class="form-control" id="inc_date" placeholder="date" value="<?php echo isset($row1['inc_date']) ? $row1['inc_date'] : null;   ?>" name="inc_date"  required>
                  </div>
                  <div class="form-group  col-md-6">
                    <label for="inc_po_date">PO Date</label>
                    <input type="date" class="form-control" id="inc_po_date" placeholder="pack total boxes" value="<?php echo isset($row1['inc_po_date']) ? $row1['inc_po_date'] : null;   ?>" name="inc_po_date"  required>
                  </div>

                  <div class="form-group  col-md-6">
                    <label for="inc_cgst">CGST </label>
                    <select  class="form-control" name="inc_cgst" id="inc_cgst">
                      <option value="0">0.00</option>
                      <option value="5">5.00</option>
                      <option value="12">12.00</option>
                      <option value="18">18.00</option>
                      <option value="28">28.00</option>
                    </select>
                   </div>
                  <div class="form-group col-md-6">
                    <label for="inc_sgst">CGST </label>
                    <select  class="form-control" name="inc_sgst" id="inc_sgst">
                    <option value="0">0.00</option>
                    <option value="5">5.00</option>
                      <option value="12">12.00</option>
                      <option value="18">18.00</option>
                      <option value="28">28.00</option>
                    </select>
                      </div>
                      <div class="form-group col-md-6">
                    <label for="inc_igst">IGST </label>
                    <select  class="form-control" name="inc_igst" id="inc_igst">
                    <option value="0">0.00</option>
                      <option value="5">5.00</option>
                      <option value="12">12.00</option>
                      <option value="18">18.00</option>
                      <option value="28">28.00</option>
                    </select>
                      </div>
                
                </div>
              </fieldset>
              <fieldset>
                <legend>Footer Informastion</legend>
                <div class="form-row">

                  <div class="form-group col-md-6">
                    <label for="inc_iec_code_no">IEC Code No.</label>
                    <input type="text" class="form-control" id="inc_iec_code_no" placeholder="Packing List no." name="inc_iec_code_no" required>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="inc_gst_no">GST NO :</label>
                    <input type="text" class="form-control" id="inc_gst_no" placeholder="pack buyer order no." name="inc_gst_no" required>
                  </div>
                  
                  <div class="form-group col-md-6">
                    <label for="inc_lut_no">LUT(ARN) No:</label>
                    <input type="text" class="form-control" id="inc_lut_no" placeholder="Other Refereance" name="inc_lut_no" required>
                  </div>
                
                 

                </div>
              </fieldset>

              <fieldset>
                <legend>Bank Informastion</legend>
                <div class="form-row">

                  <div class="form-group col-md-6">
                    <label for="bank">BANK :</label>
                    <input type="text" class="form-control" id="bank" placeholder="Packing List no." name="bank" required>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="bank_branch">BRANCH :</label>
                    <input type="text" class="form-control" id="bank_branch" placeholder="pack buyer order no." name="bank_branch" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="bank_address">ADDRESS :</label>
                    <input type="text" class="form-control" id="bank_address" placeholder="Other Refereance" name="bank_address" required>
                  </div>
                
                  <div class="form-group col-md-6">
                    <label for="bank_account_no">ACCOUNT NO. :</label>
                    <input type="text" class="form-control" id="bank_account_no" placeholder="Other Refereance" name="bank_account_no" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="bank_sort_code">Sort Code or BSB Code :</label>
                    <input type="text" class="form-control" id="bank_sort_code" placeholder="Other Refereance" name="bank_sort_code" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="bank_ifs_code">BANK IFS Code :</label>
                    <input type="text" class="form-control" id="bank_ifs_code" placeholder="Other Refereance" name="bank_ifs_code" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="bank_swift_code">IBAN Number/SWIFT CODE :</label>
                    <input type="text" class="form-control" id="bank_swift_code" placeholder="Other Refereance" name="bank_swift_code" required>
                  </div>
                 

                </div>
              </fieldset>
              <div id="addboxdiv">
              <div class="addproduct1">
                  <fieldset> 
                      <legend>product 1</legend> 
                      <div class="form-row"> <div class="form-group col-md-6"> 
                        <label for="inputAddress2">Part No.</label> 
                        <input type="text" class="form-control" id="addpacking" name="Part No." placeholder="Part No" required>
                       </div> <div class="form-group col-md-6"> 
                        <label for="inputCity">Description of Goods </label> 
                        <input type="text" class="form-control" id="inputCity" name="part_description1" placeholder="Description of Goods" required> 
                       </div>   
                       <div class="form-group  col-md-6">
                        <label for="inputZip">QUANTITY NOS</label> 
                        <input type="text" class="form-control" id="inputZip" name="part_quantity1" placeholder="QUANTITY NOS" required>
                      </div>  
                        <div class="form-group  col-md-6">
                          <label for="inputZip">Net Weight</label>
                          <input type="text" class="form-control" id="inputZip"name="part_netweight1" placeholder="Net Weight" required> 
                        </div>  
                        <div class="form-group  col-md-6"><label for="part_hsn1">Hsn</label>
                        <input type="text" class="form-control" id="part_hsn1" name="part_hsn1" placeholder="Hsn" required>
                       </div>
                      </div> 
                      </fieldset>
                  </div>


              </div>

              <button type="button" class="btn btn-warning mb-5" id="addproductbtn">add Product </button>
              <button type="button" class="btn btn-danger mb-5" id="removeproduct">remove Product </button>
              <button type="submit" class="btn  btn-dark mb-5" id="addinvoce"  name="addinvoce"value="1" >  add </button>
            </form>

          </div>
        