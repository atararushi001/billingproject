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
}
?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js">
    </script>
    <style>
        @media print
{
    #header { 
    
    position: fixed;  
width: 70%;
  }  
#content{
    margin-top: 500px;
}
  .button
  {
    display: none;
  }
}

        .table {
            
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border: solid;
        }

        table,
        th,
        td,thead {
            border: 1px solid black;
            border-collapse: collapse;
        }
        .table thead th{
            border: 1px solid black;
        }


       
    </style>


    <div class="main" >

        <input type="button" class="button" value="Download PDF" onclick="convertHTMLtoPDF()">
        <div >
            <div class="printpdf"  style="width: 70%;  margin: auto;" id="divID">
            <img src="assets/img/logo.png" alt="" style="height: 40px; margin:20px;" srcset="">
            <table class="table" style="font-size:10px;" id="header">
                <thead >
                    <tr>
                        <th colspan="14" style="text-align: center;">
                            <h3>PACKING LIST</h3>
                        </th>

                    </tr>
                    <tr>
                        <th colspan="10" style="width:500px;">EXPORTER :</th>
                        <th>PACKING LIST NO.</th>
                        <th><?php echo $row1['pack_packing_list_no']; ?></th>
                        <th>Date</th>
                        <th><?php echo $row1['pack_date']; ?></th>
                    </tr>


                    <tr>
                        <th colspan="10" rowspan="7">
                            <?php echo $row1['exporter_name']; ?>
                            <br />
                            <?php echo $row1['exporter_address']; ?>
                            <br />
                            dist:
                            <?php echo $row1['exporter_district']; ?>
                            State:
                            <?php echo $row1['exporter_state']; ?>
                            country:
                            <?php echo $row1['exporter_country']; ?>
                            <br />
                            M:
                            <?php echo $row1['exporter_mobile']; ?>
                            <br />
                            Email:
                            <?php echo $row1['exporter_email']; ?>
                        </th>
                        <th colspan="4">&nbsp;</th>

                    </tr>
                    <tr>
                        <th>BUYER'S ORDER NO</th>
                        <th><?php echo $row1['pack_buyer_order_no']; ?></th>
                        <th>Date</th>
                        <th>30.04.2023</th>

                    </tr>
                    <tr>
                        <th colspan="4"> &nbsp;</th>

                    </tr>
                    <tr>
                        <th>OThER REFEREANCE</th>
                        <th colspan="3">&nbsp;</th>


                    </tr>
                    <tr>
                        <th colspan="4" rowspan="3"> <?php echo $row1['pack_refereance']; ?></th>



                    </tr>
                    <tr></tr>
                    <tr></tr>



                    <tr>
                        <th colspan="4">Bill To</th>
                        <th colspan="4">Ship To</th>
                        <th colspan="6">BUYER'S (IF OThER ThAN CONSIGNEE )</th>

                    </tr>


                    <tr>
                        <th colspan="4" rowspan="">
                            <?php echo $row1['bill_name']; ?>
                            <br />

                            <?php echo $row1['bill_address']; ?>
                            <br />
                            dist:
                            <?php echo $row1['bill_district']; ?>
                            State:
                            <?php echo $row1['bill_state']; ?>
                            country:
                            <?php echo $row1['bill_country']; ?>
                            <br />
                            Tel:
                            <?php echo $row1['bill_mobile']; ?>
                            <br />
                            Fax:
                            <?php echo $row1['bill_fax']; ?>
                        </th>


                        <th colspan="4" rowspan=""> <?php echo $row1['ship_name']; ?>
                            <br />

                            <?php echo $row1['ship_address']; ?>
                            <br />
                            dist:
                            <?php echo $row1['ship_district']; ?>
                            State:
                            <?php echo $row1['ship_state']; ?>
                            country:
                            <?php echo $row1['ship_country']; ?>
                            <br />
                            Tel:
                            <?php echo $row1['ship_mobile']; ?>
                            <br />
                            email:
                            <?php echo $row1['ship_email']; ?>
                        </th>

                        <th colspan="6" rowspan=""> <?php echo $row1['pack_BUYER']; ?></th>



                    </tr>
    </thead>
            </table>
    <table class="table" style="font-size:10px;" id="content">
                    <tbody>
                    <tr>
                        <td colspan="10" rowspan="">
                            &nbsp;
                        </td>
                        <td colspan="4" rowspan="">
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="2">Pre- Carriage by <br > <?php echo $row1['pack_pre_carriage_by']; ?></td>
                        <td colspan="8" rowspan="2">Place of Receipt of Pre -Carrier<br > <?php echo $row1['pack_pre_carrier']; ?></td>
                        <td colspan="1">Country Orgin of Goods  </td>
                        <td colspan="3">County of Final Destination </td>
                    </tr>
                    <tr>

                        <td colspan="1"><?php echo $row1['pack_country_orgin_of_goods']; ?> </td>
                        <td colspan="3"><?php echo $row1['pack_contry_of_final_destination']; ?> </td>
                    </tr>
                    <tr>
                        <td colspan="2">Vessel/Flight No.  <br > <?php echo $row1['pack_vessel']; ?></td>
                        <td colspan="8">Port of Loading  <br > <?php echo $row1['pack_loding']; ?></td>
                        <td colspan="4" rowspan="2"> Terms of Delievry Ex-Works,V.tJ. Nagar <br />DELIEVRY: <?php echo $row1['pack_term_of_delievry']; ?></td>
                    </tr>

                    <tr>
                        <td colspan="2">Port of Deschargc  <br > <?php echo $row1['pack_descharge']; ?></td>
                        <td colspan="8">Final Destination  <br > <?php echo $row1['pack_destination']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">sr NO.</td>
                        <td>GOI Part No.</td>
                        <td>HSN code</td>
                        <td colspan="6">Description of Goods </td>
                        <td>QUANTITY<br />NOS </td>
                        <td>DIMENTION OF BOXES<br />LXBXH </td>
                        <td>Net Weight</td>
                        <td>Gross Weight</td>
                    </tr>
                   
                    <?php
                    $result = $conn->query($sql);
                    $result1 = $conn->query($sql);
                    $row1 = $result1->fetch_assoc();
                    // print_r($result->num_rows);  
                    $count = 1;
                    while ($row = $result->fetch_assoc()) {
                    
                    ?>
                        <tr>
                            <td colspan="2"><?php echo $count; ?></td>
                            <td><?php echo  $row['part_gid']; ?></td>
                            <td> <?php echo  $row['part_hsn']; ?></td>
                            <td colspan="6">Pinion: 7 T 1/14 Pitchfor Letourneau Jacking System,QA/QC certification:C/G, MFG:
                                ESI Energy Services Intl Al Wajba Offshore Rig </td>
                            <td>2 </td>
                            <?php
                           
                           $numcall = $row['box_coll'];
                        
                        if($box_id != $row['box_id']){            ?>
                          <td rowspan="<?php echo  $row['box_coll'];  // echo  $numcall;  $notused = 0;?>"><?php  echo $row['box_dimention']; ?>
                            </td> 
                           <?php }
                           ?>

                            <td><?php  echo $row['part_netweight'];  $totalNetWeight += $row['part_netweight']; ?></td>
                                <?php 
                         
                           if($box_id != $row['box_id']){   
                           ?>
                            

                           <td rowspan="<?php echo  $row['box_coll'];  // echo  $numcall;  $notused = 0;?>"><?php  echo $row['box_grossweight']; $totalgrossweight +=  $row['box_grossweight']; ?>
                            </td> 
                           <?php    } $box_id = $row['box_id'];     ?>
                       
                        </tr>
                    <?php
                        $count++;
                     } ?>

                    

                    <tr> 
                        <td colspan="9">&nbsp;</td>
                        <td>Total Quantity</td>
                        <td>&nbsp;&nbsp;</td>
                       <td>Total (Weight)</td>
                    <td><?php echo $totalNetWeight; ?></td>
                    <td><?php echo $totalgrossweight; ?></td>
                    </tr>
                    <tr> 
                    <td colspan="14" style="text-align: center; ">Subject to Anand Jurisdiction</td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
    </div> <!-- /container -->

    <script type="text/javascript">
        
        function convertHTMLtoPDF() {
            window.print();
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
        }

    </script>
