<?php 
include 'includes/header.php';


$stmtTrans = $reg_user->runQuery("SELECT * FROM transfer WHERE acc_no=:acc_no ORDER BY dot DESC");
$stmtTrans->execute(array(":acc_no"=>$_SESSION['acc_no']));

$numTransCount = $stmtTrans->rowCount();


include 'includes/html.php';
?>  				 


<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">

    <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
        <span><i class='fas fa-key' style='font-size:24px;color:orange'></i> E-Statement/ Ledger Statement</span>
    </a>
</li> 
</ul>    



<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Recent Account History
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
                        <button class="active btn btn-focus">Last Week</button>
                        <button class="btn btn-focus">All Month</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">REFERENCE NO</th>
                            <th>DATE</th>
                            <th class="text-center">NARATION</th>
                            <th class="text-center">TYPE</th>
                            <th class="text-center">RECEIVER A/C</th>
                            <th class="text-center">RECEIVER EMAIL</th>
                            <th class="text-center">RECEIVER BANK</th>
                            <th class="text-center">SWIFT/IBAN/RT</th>
                            <th class="text-center">DEBIT (<?php echo $row['currency']; ?>)</th>
                            <th class="text-center">CREDIT (<?php echo $row['currency']; ?>)</th>
                            <th class="text-center">STATUS</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if ($numTransCount < 1) { ?>

                            <tr> 
                           <td colspan="6" align="right">You do not have any transaction record</td>
                       </tr>

                   <?php } else{ ?>
                        <?php while($rowTrans = $stmtTrans->fetch(PDO::FETCH_ASSOC)){?>
                            <tr>
                             <td class="text-center text-muted">
                                <?php echo $rowTrans['refNo']; ?>
                             </td>
                             <td class="text-center">
                                <?php echo date('jS \of F y h:i:s A', $rowTrans['dot']); ?>
                            </td>
                            <td class="text-center"><?php echo $rowTrans['naration']; ?></td>
                            <td class="text-center"><?php echo $rowTrans['mode']; ?></td>
                            <td class="text-center"><?php echo $rowTrans['accno']; ?></td>
                            <td class="text-center"><?php echo $rowTrans['bemailadd']; ?></td>
                            <td class="text-center"><?php echo $rowTrans['rbname']; ?></td>
                            <td class="text-center"><?php echo $rowTrans['swift']; ?>/<?php echo $rowTrans['iban']; ?>/<?php echo $rowTrans['routing']; ?></td>
                            <td class="text-center">
                                <?php 
                                    if ($rowTrans['type'] == "Debit") {
                                 ?>
                                <div class="badge badge-danger">&nbsp;<?php echo number_format($rowTrans['amount'],2); ?></div>
                            <?php } ?>
                            </td>
                            <td class="text-center">
                                <?php 
                                    if ($rowTrans['type'] == "Credit") {
                                 ?>
                                <div class="badge badge-primary">&nbsp;<?php echo number_format($rowTrans['amount'],2); ?></div>
                            <?php } ?>
                            </td>
                            <td class="text-center">
                                <?php 
                                    if ($rowTrans['status'] == "Success") {
                                 ?>
                                <div class="badge badge-success">SUCCESS</div>
                            <?php } ?>
                            <?php 
                                    if ($rowTrans['status'] == "Pending") {
                                 ?>
                                <div class="badge badge-warning">PENDING</div>
                            <?php } ?>
                            <?php 
                                    if ($rowTrans['status'] == "Failed") {
                                 ?>
                                <div class="badge badge-danger">FAILED</div>
                            <?php }  ?>
                            <?php 
                                    if ($rowTrans['status'] == "Cancled") {
                                 ?>
                                <div class="badge badge-danger">CANCLED</div>
                            <?php }  ?>
                            <?php 
                                    if ($rowTrans['status'] == "Hold") {
                                 ?>
                                <div class="badge badge-warning">HOLD</div>
                            <?php } ?>
                                
                            </td>
                        </tr>
                    <?php } } ?>

            </tbody>
        </table>
    </div>
    <div class="d-block text-center card-footer">
        <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
        <!-- <button class="btn-wide btn btn-success">Save</button> -->
    </div>
</div>
</div>
</div>


<?php include 'includes/footer.php'; ?>  