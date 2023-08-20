<?php
include 'db.php';

    if(isset($_GET['action'])){
        if($_GET['action'] == "delete"){
            ?>

            <?php
        
          $sql = "DELETE FROM `package` WHERE `pack_id` = ".$_GET['pack_id'];
        
         
           $sql1 = "DELETE FROM `boxes` WHERE  `pack_id` = ".$_GET['pack_id'];
           $sql2 = "DELETE FROM `parts` WHERE  `part_packid` = ".$_GET['pack_id'];
           
          if ($conn->query($sql) == TRUE and $conn->query($sql1) == TRUE and $conn->query($sql2) == TRUE)  {
         
            echo("<script>window.location.href=index.php?view=Packageslip';</script>");
            // header("Location : index.php?view=viewpackage");
          }
        }   
        }
        $sql = "SELECT * FROM  package ";
        $result = $conn->query($sql);
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
<div style="width:85%; margin:auto;">
<table id="example" class="table table-striped" >

        <thead>
            <tr>
                <th>Sr No</th>
                <th>PACKING LIST NO.</th>
                <th>BUYER'S ORDER NO</th>
                <th>Bill to</th>
                <th>Package date</th>
                <th>PO Date</th>
                <th style="width:20%;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
              $countpart = 1;    while ($row = $result->fetch_assoc()) {
                  ?>

        
            <tr>
                <td><?php echo $countpart; ?></td>
                <td><?php echo $row['pack_packing_list_no']; ?></td>
                <td><?php echo $row['pack_BUYER']; ?></td>
                  <td><?php echo $row['bill_name']; ?></td>
                <td><?php echo $row['pack_date']; ?></td>
                <td><?php echo $row['pack_po_date']; ?></td>
                <td><a href="index.php?view=Packagesliplist&pack_id=<?php echo $row['pack_id']; ?>&action=delete" class="btn btn-danger delete">Delete </a> 
                <a type="button" class="btn btn-primary" href="index.php?view=Packageslipfrom&editid=<?php echo $row['pack_id']; ?>">edit</a>
                <a type="button" class="btn btn-primary" href="index.php?view=Packageslip&id=<?php echo $row['pack_id']; ?>">View</a></td>
            </tr>
            <?php   $countpart++; } ?>
           
        </tbody>
        <tfoot>
            <tr>
            <th>Sr No</th>
                <th>PACKING LIST NO.</th>
                <th>BUYER'S ORDER NO</th>
                <th>Bill to</th>
                <th>Package date</th>
                <th>PO Date</th>
                <th style="width:20%;">Action</th>
            </tr>
        </tfoot>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script>
    new DataTable('#example');
</script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("a.delete").click(function(e){
        if(!confirm('Are you sure?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});
</script>