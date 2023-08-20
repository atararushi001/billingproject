<?php
include 'db.php';

    if(isset($_GET['action'])){
        if($_GET['action'] == "delete"){
        
        $sql = "DELETE FROM `invoice` WHERE `inc_id` = ".$_GET['id'];            
          $sql2 = "DELETE FROM `parts` WHERE  `invoice_id` = ".$_GET['id'];
          $conn->query($sql2);
    
          if ($conn->query($sql) == TRUE)  {

          }
        }
        }
        $sql = "SELECT * FROM  invoice ";
        $result = $conn->query($sql);
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
<div style="width:85%; margin:auto;">
<table id="example" class="table table-striped" >

        <thead>
            <tr>
                <th>Sr No</th>
                <th>invoice LIST NO.</th>
                <th>BUYER'S ORDER NO</th>
                <th>Bill to</th>
                <th>Invoice date</th>
                <th>PO Date</th>
                <th style="width:20%;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php     
            $countpart = 0;
        while ($row = $result->fetch_assoc()) {
            $countpart++;
                  ?>

        
            <tr>
                <td><?php echo $countpart; ?></td>
                <td><?php echo $row['inc_invoice_nu']; ?></td>
                <td><?php echo $row['inc_buyer_order_no']; ?></td>
                <td><?php echo $row['bill_name']; ?></td>
                <td><?php echo $row['inc_date']; ?></td>
                <td><?php echo $row['inc_po_date']; ?></td>
                <td><a href="index.php?view=Invoicesliplist&id=<?php echo $row['inc_id']; ?>&action=delete" class="btn btn-danger delete">Delete </a> 
                <a type="button" class="btn btn-primary" href="index.php?view=Invoiceslipform&id=<?php echo $row['inc_id']; ?>">edit</a>
                <a type="button" class="btn btn-primary" href="index.php?view=Invoiceslip&id=<?php echo $row['inc_id']; ?>">View</a></td>
            </tr>
            <?php } ?>
           
        </tbody>
        <tfoot>
            <tr>
                <th>Sr No</th>
                <th>invoice LIST NO.</th>
                <th>BUYER'S ORDER NO</th>
                <th>Bill to</th>
                <th>Invoice date</th>
                <th>PO Date</th>
                <th style="width:18%;">Action</th>
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