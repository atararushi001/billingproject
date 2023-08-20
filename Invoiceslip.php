<?php
include 'db.php';

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
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
}


if (isset($_GET['id'])) {
    $inc_id = $_GET['id'];
   $sql = "SELECT * FROM `parts` join invoice on parts.invoice_id = invoice.inc_id  WHERE invoice.inc_id  = " . $_GET['id'];

    $result = $conn->query($sql);
   $row1 = $result->fetch_array();
// echo  $row1['inc_cgst'];
// echo  $row1['inc_sgst'];
// echo  $row1['inc_igst'];
    $notused = 0;
    $totalNetWeight = 0;
    $totalamount= 0;
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
        <a type="button" class="btn btn-primary" href="index.php?view=Invoiceslipform&id=<?php echo  $_GET['id']; ?>">edit</a>

    </div>
        <div>
            <div class="printpdf"  style="width: 90%;  margin: auto;" id="divID">
            <img src="assets/img/logo.png" alt="" style="height: 60px; margin:20px;" srcset="">
            <table class="report-container"  style="font-size:14px;">
                <thead class="report-header">
                    <tr>
                        <th colspan="14"  class="boldwork" style="text-align: center;">
                            <h3> INVOICE</h3>
                        </th>

                    </tr>
                    <tr>
                        <th colspan="14" class="boldwork" style="text-align: center;">
                            <p> (SUPPLYMENT FOR EXPORT UNDER LUT WITHOUT DUTY PAYMENTOF IGST)</p>
                        </th>

                    </tr>
                    <tr>
                        <th  colspan="6" style="width:500px;" class="boldwork">EXPORTER :</th>
                        <th class="boldwork"  colspan="1">invoice number</th>
                        <th colspan="5" ><?php echo $row1['inc_invoice_nu']; ?>asdadas</th>
                        <th class="boldwork" colspan="1">Invoice Date</th>
                        <th colspan="1"><?php echo $row1['inc_date']; ?></th>
                    </tr>


                    <tr>
                        <th colspan="6" rowspan="7">
                            <?php echo $row1['exporter_name']; ?>
                            <br />
                            <?php echo $row1['exporter_address']; ?>
                            <br />
                            <b class="boldwork">  dist:</b>
                            <?php echo $row1['exporter_district']; ?>
                            <b class="boldwork">  State:</b>
                            <?php echo $row1['exporter_state']; ?>
                            <b class="boldwork">  Country:</b>
                            <?php echo $row1['exporter_country']; ?>
                            <br />
                            <b class="boldwork">  M:</b>
                            <?php echo $row1['exporter_mobile']; ?>
                            <br />
                            <b class="boldwork">  Email:</b>
                            <?php echo $row1['exporter_email']; ?>
                        </th>
                        <th colspan="8">&nbsp;</th>

                    </tr>
                    <tr>
                        <th class="boldwork" colspan="1" style="width: 15%;">BUYER'S ORDER NO</th>
                        <th colspan="5" ><?php echo $row1['inc_buyer_order_no']; ?></th>
                        <th colspan="1" class="boldwork">Date</th>
                        <th  colspan="1"><?php echo $row1['inc_po_date']; ?></th>

                    </tr>
                    <tr>
                        <th colspan="8"> &nbsp;</th>

                    </tr>
                    <tr>
                        <th class="boldwork" colspan="5">OTHER REFEREANCE</th>
                        <th colspan="5">&nbsp;</th>


                    </tr>
                    <tr>
                        <th colspan="5" rowspan="3"> <?php echo $row1['inc_refereance']; ?></th>



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
                            <b class="boldwork">Dist:</b>
                            <?php echo $row1['bill_district']; ?>
                            <b class="boldwork">State:</b>
                            <?php echo $row1['bill_state']; ?>
                            <b class="boldwork">Country:</b>
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
                            <b class="boldwork">Dist:</b>
                            <?php echo $row1['ship_district']; ?>
                            <b class="boldwork">State:</b>
                            <?php echo $row1['ship_state']; ?>
                            <b class="boldwork">Country:</b>
                            <?php echo $row1['ship_country']; ?>
                            <br />
                            <b class="boldwork">Tel:</b>
                            <?php echo $row1['ship_mobile']; ?>
                            <br />
                            <b class="boldwork">Email:</b>
                            <?php echo $row1['ship_email']; ?>
                        </th>

                        <th colspan="2" rowspan=""> <?php echo $row1['inc_BUYER']; ?></th>



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
                        <td colspan="2"><p class="boldwork">County of Final Destination </p></td>
                    </tr>
                    <tr>
                        <td colspan="2"><?php echo $row1['inc_pre_carrier']; ?></td>
                        <td colspan="8"  ><?php echo $row1['inc_pre_carriage_by']; ?> </td>
                        <td colspan="3"><?php echo $row1['inc_country_orgin_of_goods']; ?> </td>
                        <td colspan="2"><?php echo $row1['inc_contry_of_final_destination']; ?> </td>
                    </tr>
                    <tr>
                        <td colspan="2"><p class="boldwork"><p class="boldwork"> Ship via / Mode of Transport</p> </td>
                        <td colspan="8"><p class="boldwork"><p class="boldwork"> Port of Loading  </p></td>
                        <td colspan="4" rowspan="4"> <b class="boldwork"> Terms of Delievry : </b> <?php echo $row1['inc_term_of_delievry']; ?><br>
                        <b class="boldwork">  Terms of Payment : </b><?php echo $row1['pack_term_of_Payment']; ?>
                        <br>
                        <b class="boldwork">  Currency : </b><?php echo $row1['inc_currency']; ?>
                    </td>
                    </tr>
                    <tr>
                        <td colspan="2"><?php echo $row1['inc_vessel']; ?></td>
                        <td colspan="8"> <?php echo $row1['inc_loding']; ?></td>
                    </tr>

                    <tr>
                        <td colspan="2"><p class="boldwork"> Port of Deschargc </p> </td>
                        <td colspan="8"><p class="boldwork"> Final Destination </p> </td>
                       </tr>
                    <tr>
                        <td colspan="2"> <?php echo $row1['inc_descharge']; ?></td>
                        <td colspan="8"><?php echo $row1['inc_destination']; ?></td>
                        <!-- <td colspan="1"><b class="boldwork"> Currency </b> </td>
                        <td colspan="2"><?php echo $row1['inc_currency']; ?></b> </td>
                        <td colspan="4">&nbsp; </td> -->
                    </tr>
                    <tr>
                        <td  colspan="14">

                        <table style="border:none; text-align: center;">
                       
                    <tr>
                        <td  class="boldwork" colspan="2">S.r.No.</td>
                
                        <td class="boldwork"  colspan="3">HSN code</td>
                        <td class="boldwork" colspan="3" style=" width: 40%;">Description of Goods </td>
                        <td class="boldwork"  colspan="3">Part No.</td>
                        <td class="boldwork">Quantity NOs. </td>
                        <td class="boldwork">Rate per No.(Rs)</td>
                        <td class="boldwork" >Total Amount(Rs)</td>
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
                            <td colspan="3"><?php echo  $row['part_gid']; ?></td>
                            <td colspan="3" style="text-align: left;" class="descriprtion"><?php echo  $row['part_description']; ?> </td>
                            <td colspan="3"> <?php echo  $row['part_hsn']; ?></td>
                            <td><?php  echo $row['part_quantity'];  $totalquantity += $row['part_quantity']; ?> </td>
                            <td><?php  echo $row['part_netweight'];  $totalNetWeight += $row['part_netweight']; ?></td>
                         

                         <td ><?php  echo $row['part_netweight']*$row['part_quantity'] ; $totalamount += $row['part_netweight']*$row['part_quantity']; ?>
                          </td> 
                      
                           
                     

                        
                            
                       
                        </tr>
                    <?php
                        $count++;
                      
                     } 
                     $cgst = 0; $sgst = 0;  $igst = 0;
                     $cgst =  $row1['inc_cgst']!= 0 ? (($totalamount + $row1['inc_other_charges']) * $row1['inc_cgst'])/100 : "0" ;
                     $sgst =  $row1['inc_sgst']!= 0 ? (($totalamount + $row1['inc_other_charges']) * $row1['inc_sgst'])/100 : "0" ;
                     $igst =  $row1['inc_igst']!= 0 ? (($totalamount + $row1['inc_other_charges']) * $row1['inc_igst'])/100 : "0" ;?>

                 


                 
<tr> 
                    <td colspan="8"  >&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td colspan="3" style="text-align: right;"  class="boldwork">Total&nbsp;&nbsp;&nbsp;</td>
                    <td colspan="1"><?php echo $totalquantity; ?></td>
                    <td>&nbsp;</td>
                    <td colspan="1"><?php echo $totalamount; ?></td>
                   
                    </tr>
                    <tr>
                        <td colspan="12"><b class="boldwork">&nbsp;</b></td>
                        <td><b class="boldwork">Packing and Forwarding charges </b></td>
                        <td><?php echo $row1['inc_other_charges']; ?></td>
                    </tr>
                    <tr> 
                    <tr style="text-align: left; ">
                        <td colspan="8"> <b class="boldwork">IEC Code No. </b><?php echo $row1['inc_iec_code_no']; ?></td>
                        <td colspan="4">  <b class="boldwork">Net Weight:</b> <?php echo $totalNetWeight; ?> kg Approx</td>
                        <td><b class="boldwork">CGST on Sales @ <?php echo  $row1['inc_cgst']; ?>%:</b></td>
                        <td><?php echo $cgst;  ?></td>
                    </tr>   
                    <tr style="text-align: left; ">
                        <td colspan="8"> <b class="boldwork">GST NO :</b> <?php echo $row1['inc_gst_no']; ?></td>
                        <td colspan="4">  <b class="boldwork">Total Amount :</b><?php echo $totalamount; ?>kg Approx</td>
                        <td><b class="boldwork">SGST on Sales @<?php echo  $row1['inc_sgst']; ?>%:</b></td>
                        <td><?php echo $sgst;  ?></td>
                    </tr>   
                    <tr style="text-align: left; ">
                        <td colspan="8">  <b class="boldwork">LUT(ARN) No:</b> <?php echo $row1['inc_lut_no']; ?></td>
                        <td colspan="4">   <b class="boldwork">Nos. & Kind of Pack:</b> <?php echo $row1['inc_total_boxs']; ?><br /></td>
                        <td><b class="boldwork">IGST on Sales @<?php echo  $row1['inc_igst']; ?>%:</b></td>
                        <td><?php echo $igst;  ?></td>
                    </tr>  
                 
                        </tr>

                        <tr>
                        <td colspan="12"><b class="boldwork"><?php echo getIndianCurrency(($totalamount+$row1['inc_other_charges']) + $cgst + $sgst +$igst) ;?></b></td>
                        <td><b class="boldwork">Net Total</b></td>
                        <td><?php echo ($totalamount+$row1['inc_other_charges']) + $cgst + $sgst +$igst; ?></td>
                    </tr>
                  
                        </table>
                        </td>
                        </tr>
                        <tr>
                        <td colspan="10" style="text-align: left; " >
                        <b class="boldwork" style="margin-right:220px;">BANK:</b> <?php echo $row1['bank']; ?><br>
                        <b class="boldwork"  style="margin-right:205px;">BRANCH:</b><?php echo $row1['bank_branch']; ?><br>
                        <b class="boldwork"  style="margin-right:195px;">ADDRESS: </b><?php echo $row1['bank_address']; ?><br>
                        <b class="boldwork"  style="margin-right:160px;">ACCOUNT NO. :</b> <?php echo $row1['bank_account_no']; ?><br>
                        <b class="boldwork"  style="margin-right:105px;">Sort Code or BSB Code : </b><?php echo $row1['bank_sort_code']; ?> <br>
                        <b class="boldwork"  style="margin-right:155px;">BANK IFS Code : </b><?php echo $row1['inc_lut_no']; ?><br>
                        <b class="boldwork"  style="margin-right:74px;">IBAN Number/SWIFT CODE :</b>    <?php echo $row1['inc_lut_no']; ?><br>
                </td>
                <td colspan="4" style="text-align: left; ">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                 
                

                 </td>
                 </tr>
                 <tr>
                 <td colspan="10" style="text-align: top;" class="boldwork">
                    Declaration: <br>
                    1) Payment should be made by cheque/drafts "Payee's A/c Only. <br>
                    2) Our responsibility ceases as soon as goods leave our premises. <br>
                    3) Goods once sols will not be taken bacl under any circumstances. <br>
                    4) Interest @ 24% p.a will e charged on payment received after due date. <br>
                    We declare that this Invoice Show the actual price of the goods described and that particulars are ture and correct.
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
                <tfoot class="footer-info" style="border: none;">
                <tr> 
                    <td colspan="14" class="report-footer" style="border: none !important;"  >
                    Commercial Invoice Format: F-P-20-05 Rev.01
                    </td>
                </tr>
                <tr class="footer"> 
                    <td colspan="14" class="report-footer" style="border: none !important; color:#3d909b; font-size:18px; "  >

                    <i class="fa-solid fa-location-dot"></i> &nbsp;&nbsp;  Road No.A22 Plot No.1-10 &11, VulNagar, <br> &nbsp;  &nbsp; ,Dist.Anand, Gujarat-38B121,lndia
            &nbsp; &nbsp; &nbsp;   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    &nbsp; 
                    <i class="fa-solid fa-mobile"></i>&nbsp;&nbsp;+91 70165 70255    &nbsp;    &nbsp;     &nbsp; 
                    <i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;info@formura.co.in &nbsp;    &nbsp;     &nbsp; 
                    <i class="fa-solid fa-globe"></i>&nbsp;&nbsp;www.formura.co.in
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
        </div>
    </div> <!-- /container -->

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script type="text/javascript">
        
        function convertHTMLtoPDF() {
            window.print();
        }
            // const { jsPDF } = window.jspdf;

            // let doc = new jsPDF('p', 'pt', 'letter');
            // let pdfjs = document.querySelector('#divID');

            // doc.html(pdfjs, {

                
                
            //     callback: function(doc) {
            //         doc.save("packegeslip.pdf");
            //     },
            //     x: 0,
            //     y: 0,
    
            // });
    //         var doc = new jsPDF('p', 'pt', 'a4');
    //   var specialElementHandlers = {

    //   };
    //         doc.fromHTML($('#divID').get(0), 15, 15, {
    //       'width': 250,
    //       'margin': 1,
    //       'pagesplit': true,
    //       'elementHandlers': specialElementHandlers
    //     });

    //     doc.save('sample-file.pdf');
   
            
    //     }

    </script>
