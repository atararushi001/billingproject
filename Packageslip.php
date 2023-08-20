<?php
include 'db.php';
if (isset($_GET['id'])) {
    $pack_id = $_GET['id'];
    $sql = "SELECT * FROM `parts` join boxes on parts.part_boxid =  boxes.box_id join package on parts.part_packid = package.pack_id WHERE package.pack_id = " . $_GET['id'];

    $result = $conn->query($sql);
    $row1 = $result->fetch_array();
    $box_id= 0;
    $notused = 0;
    $totalNetWeight = 0;
    $totalgrossweight= 0;
    $totalquantity = 0;
}
?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js">
    </script>
    <style>
            @media print
    {
        .footer {
        position: fixed;
        bottom: 0;
    }
  table { page-break-inside:auto }
  tr    { page-break-inside:auto;  }
  td    { page-break-inside: auto; }
  thead { display:table-header-group }
  tfoot { display:table-footer-group }
  .hamburger{
            display: none;
        }
    .btn
    {
        display: none;
    }

    }
    .footer-info{
    height: 270px;
    border: none;
    }
    table.report-container {

    page-break-after: always;

    }
    thead.report-header{

    display : table-header-group;
    }
    tfoot.report-footer {
    display: table-footer-group;
    }
        table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
          
        }

 
        th,
        td,th ,thead{
            border: 1px solid black !important;
            border-collapse: collapse;
            font-weight: normal;
        }
        .boldwork{
            font-weight: bold;
        }
        .descriprtion{
            min-width: 100px;
        }
     
    </style>


    <div class="main" >
    <div style="width:100%; margin:auto; text-align: center;">
        <input type="button" class="btn btn-danger" value="Print" onclick="convertHTMLtoPDF()">
        <a type="button" class="btn btn-primary" href="index.php?view=Packageslipfrom&editid=<?php echo $row1['pack_id']; ?>">edit</a>

    </div>
        <div>
            <div class="printpdf"  style="width: 90%;  margin: auto;" id="divID">
            <img src="assets/img/logo.png" alt="" style="height: 60px; margin:20px;" srcset="">
            <table class="report-container"  style="font-size:14px;">
                <thead >
                    <tr>
                        <th colspan="14" class="boldwork" style="text-align: center;">
                            <h3>PACKING LIST</h3>
                        </th>

                    </tr>
                </thead>
                <thead class="report-header">
                    <tr>
                        <th  colspan="6" style="width:500px;" class="boldwork">EXPORTER :</th>
                        <th class="boldwork"  colspan="1">PACKING LIST NO.</th>
                        <th colspan="5" ><?php echo $row1['pack_packing_list_no']; ?></th>
                        <th class="boldwork" colspan="1">Package date</th>
                        <th colspan="1"><?php echo $row1['pack_date']; ?></th>
                    </tr>


                    <tr>
                        <th colspan="6" rowspan="7">
                            <?php echo $row1['exporter_name']; ?>
                            <br />
                            <?php echo $row1['exporter_address']; ?>
                            <br />
                            <b class="boldwork"> 
                            Dist:
                            </b>
                            <?php echo $row1['exporter_district']; ?>
                            <b class="boldwork">State:</b>
                            <?php echo $row1['exporter_state']; ?>
                            <b class="boldwork">Country:</b>
                            <?php echo $row1['exporter_country']; ?>
                            <br />
                            <b class="boldwork"> M:</b>
                            <?php echo $row1['exporter_mobile']; ?>
                            <br />
                            <b class="boldwork"> Email:</b>
                            <?php echo $row1['exporter_email']; ?>
                        </th>
                        <th colspan="8">&nbsp;</th>

                    </tr>
                    <tr>
                        <th class="boldwork" colspan="1" style="width: 15%;">BUYER'S ORDER NO</th>
                        <th colspan="5" ><?php echo $row1['pack_buyer_order_no']; ?></th>
                        <th colspan="1" class="boldwork">Po Date</th>
                        <th  colspan="1"><?php echo $row1['pack_po_date']; ?></th>

                    </tr>
                    <tr>
                        <th colspan="8"> &nbsp;</th>

                    </tr>
                    <tr>
                        <th class="boldwork" colspan="5">OTHER REFEREANCE</th>
                        <th colspan="5">&nbsp;</th>


                    </tr>
                    <tr>
                        <th colspan="5" rowspan="3"> <?php echo $row1['pack_refereance']; ?></th>



                    </tr>
                    <tr></tr>
                    <tr></tr>



                    <tr>
                        <th colspan="6" class="boldwork" style="width:33%;">Bill To</th>
                        <th colspan="6" class="boldwork" style="width:33%;">Ship To</th>
                        <th colspan="2" class="boldwork" style="width:33%;">Notify Party</th>

                    </tr>


                    <tr>
                        <th colspan="6" rowspan="">
                            <?php echo $row1['bill_name']; ?>
                            <br />

                            <?php echo $row1['bill_address']; ?>
                            <br />
                            <b class="boldwork"> Dist:</b>
                            <?php echo $row1['bill_district']; ?>
                            <b class="boldwork"> State:</b>
                            <?php echo $row1['bill_state']; ?>
                            <b class="boldwork"> Country:</b>
                            <?php echo $row1['bill_country']; ?>
                            <br />
                            <b class="boldwork">Tel:</b>
                            <?php echo $row1['bill_mobile']; ?>
                            <br />
                            <b class="boldwork">Fax:</b>
                            <?php echo $row1['bill_fax']; ?>
                        </th>


                        <th colspan="6" rowspan=""> <?php echo $row1['ship_name']; ?>
                            <br />

                            <?php echo $row1['ship_address']; ?>
                            <br />
                            <b class="boldwork"> Dist:</b>
                            <?php echo $row1['ship_district']; ?>
                            <b class="boldwork"> State:</b>
                            <?php echo $row1['ship_state']; ?>
                            <b class="boldwork">Country:</b>
                            <?php echo $row1['ship_country']; ?>
                            <br />
                            <b class="boldwork"> Tel:</b>
                            <?php echo $row1['ship_mobile']; ?>
                            <br />
                            <b class="boldwork">Email:</b>
                            <?php echo $row1['ship_email']; ?>
                        </th>

                        <th colspan="2" rowspan=""> <?php echo $row1['pack_BUYER']; ?></th>



                    </tr>
                    <!-- <tr>
                        <th colspan="10" rowspan="">
                            &nbsp;
                        </th>
                        <th colspan="4" rowspan="">
                            &nbsp;
                        </th>
                    </tr> -->
                </thead>
                    <tr>
                        <td colspan="2" rowspan=""><p class="boldwork"> Place of Receipt of Pre -Carrier </p> </td>
                        <td colspan="8" ><p class="boldwork"> Carriage by </p></td>
                        <td colspan="3"><p class="boldwork">Country Orgin of Goods </p> </td>
                        <td colspan="2"><p class="boldwork">country of Final Destination </p></td>
                    </tr>
                    <tr>
                        <td colspan="2"><?php echo $row1['pack_pre_carrier']; ?></td>
                        <td colspan="8"  ><?php echo $row1['pack_pre_carriage_by']; ?> </td>
                        <td colspan="3"><?php echo $row1['pack_country_orgin_of_goods']; ?> </td>
                        <td colspan="2"><?php echo $row1['pack_contry_of_final_destination']; ?> </td>
                    </tr>
                    <tr>
                        <td colspan="2"><p class="boldwork"><p class="boldwork"> Ship via / Mode of Transport</p> </td>
                        <td colspan="8"><p class="boldwork"><p class="boldwork"> Port of Loading  </p></td>
                        <td colspan="4" rowspan="4"> <b class="boldwork"> Terms of Delievry : </b> <?php echo $row1['pack_term_of_delievry']; ?><br>
                        <b class="boldwork">  Terms of Payment :</b><?php echo $row1['pack_term_of_Payment']; ?></td>
                    </tr>
                    <tr>    
                        <td colspan="2"><?php echo $row1['pack_vessel']; ?></td>
                        <td colspan="8"> <?php echo $row1['pack_loding']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><p class="boldwork"> Port of Descharge </p> </td>
                        <td colspan="8"><p class="boldwork"> Final Destination </p> </td>
                       </tr>
                    <tr>
                        <td colspan="2"> <?php echo $row1['pack_descharge']; ?></td>
                        <td colspan="8"><?php echo $row1['pack_destination']; ?></td>
                    </tr>
                    <tr>
                        <td  colspan="14">
                        <table style="border:none; text-align: center;">
                    <tr>
                        <td  class="boldwork" colspan="2">S.r.No.</td>
                        <td class="boldwork"  colspan="2">Part No.</td>
                        <td class="boldwork"  colspan="2">HSN code</td>
                        <td class="boldwork" colspan="3" style=" width: 40%;">Description of Goods </td>
                        <td class="boldwork">Quantity NOs. </td>
                     
                        <td class="boldwork">Net Weight(kg)</td>
                        <td class="boldwork">Gross Weight(kg)</td>
                        <td class="boldwork" colspan="2"> Dimension OF Boxes (LXBXH)(Inch)</td>
                    </tr>
<?php
                    $result = $conn->query($sql);
                    $result1 = $conn->query($sql);
                    $row1 = $result1->fetch_assoc();
                    // print_r($result->num_rows);  
                    $count = 1;
                    $boxcount = 0;
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <tr>
                            <td colspan="2"><?php echo $count; ?></td>
                            <td colspan="2"><?php echo  $row['part_gid']; ?></td>
                            <td colspan="2"> <?php echo  $row['part_hsn']; ?></td>
                            <td colspan="3" style="text-align: left;" class="descriprtion"><?php echo  $row['part_description']; ?> </td>
                            <td><?php  echo $row['part_quantity'];  $totalquantity += $row['part_quantity']; ?> </td>
                            <td><?php  echo $row['part_netweight'];  $totalNetWeight += $row['part_netweight']; ?></td>
                            <?php 
                         if($box_id != $row['box_id']){   
                            $boxcount++;
                         ?>
                           <td rowspan="<?php echo  $row['box_coll'];  ?>"><?php  echo $row['box_grossweight']; $totalgrossweight +=  $row['box_grossweight']; ?>
                          </td> 
                         <?php    }    ?>
                            <?php
                           $numcall = $row['box_coll'];
                        if($box_id != $row['box_id']){            ?>
                          <td rowspan="<?php echo  $row['box_coll'];  ?>" colspan="2"  style="text-align: left;"><?php  echo $row['box_dimention']; ?>
                            </td> 
                           <?php }  $box_id = $row['box_id'];  
                           ?>
                        </tr>
                    <?php
                        $count++;
                     } ?>
                    <tr> 
                    <td colspan="8"  >&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td colspan="1" style="text-align: right;"  class="boldwork">Total&nbsp;&nbsp;&nbsp;</td>
                    <td colspan="1"><?php echo $totalquantity; ?></td>
                    <td><?php echo $totalNetWeight; ?></td>
                    <td colspan="1"><?php echo $totalgrossweight ; ?></td>
                    <td   >&nbsp;</td>
                    </tr>
                    <tr> 
                    <td colspan="9" style="text-align: left; ">
                    <b class="boldwork">IEC Code No. </b><?php echo $row1['pack_iec_code_no']; ?><br />
                    <b class="boldwork">GST NO :</b> <?php echo $row1['pack_gst_no']; ?><br />
                    <b class="boldwork">LUT(ARN) No:</b> <?php echo $row1['pack_lut_no']; ?>
                    </td>
                    <td colspan="10"  style="text-align: left; ">
                    <b class="boldwork">Net Weight:</b> <?php echo $totalNetWeight; ?> kg Approx<br />
                    <b class="boldwork">Gross Weight:</b><?php echo $totalgrossweight; ?>kg Approx<br />
                    <b class="boldwork">Nos. & Kind of Pack:</b> <?php echo $row1['pack_total_boxs']; ?><br /></td>
                        </tr>
                        <tr> 
                  
                        </table>
                        </td>
                        </tr>
                        <tr>
                        <td colspan="10" style="text-align: top;" class="boldwork">
                    Declaration: <br>
                    1) Payment should be made by cheque/drafts "Payee's A/c Only.<br>
                    2) Our responsibility ceases as soon as goods leave our premises.<br>
                    3) Goods once sold will not be taken back under any circumstances.<br>
                    4) Interest @ 24% p.a will be charged on payment received after the due date.<br>
                    We declare that this Invoice shows the actual price of the goods described and that particulars are ture and correct.
                </td>
                <td colspan="4" style="text-align: left; ">
                <b class="boldwork"  style="text-align: top;">for, Formura offshore Services Private Limited</b>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                
                <b class="boldwork"  style="text-align: top;"> Authorized Signatory </b>
                 </td>
                        </tr>
                  
                    <tr> 
                    <td colspan="14" style="text-align: center; ">Subject to Anand Jurisdiction</td>
                    </tr>
                </tbody>
                <tr class="footer"> 
                    
                    <td colspan="14" class="report-footer" style="border: none !important; color:#3d909b; font-size:18px; ">
                    
                    <i class="fa-solid fa-location-dot"></i>  Road No.A22 Plot No.1-10 & 11, V U Nagar,<br> &nbsp;  &nbsp; Dist. Anand, Gujarat-388121, india
            &nbsp; &nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    &nbsp; 
                    <i class="fa-solid fa-mobile"></i>&nbsp;&nbsp;+91 70165 70255    &nbsp;    &nbsp;     &nbsp; 
                    <i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;info@formura.co.in &nbsp;    &nbsp;     &nbsp; 
                    <i class="fa-solid fa-globe"></i>&nbsp;&nbsp;www.formura.co.in
                    </td>
                </tr>
            </table>
        </div>
        </div>
    </div> <!-- /container -->

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script type="text/javascript">
        function convertHTMLtoPDF(){
            window.print();
        }
    </script>
