<?php 
include 'includes/header.php';

$stmtTrans = $reg_user->runQuery("SELECT * FROM loan WHERE acc_no=:acc_no ORDER BY id DESC");
$stmtTrans->execute(array(":acc_no"=>$_SESSION['acc_no']));

$numTransCount = $stmtTrans->rowCount();



include 'includes/html.php';
?> 

<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">

    <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
        <span><i class='fas fa-people-carry' style='font-size:24px;color:orange'></i> Approved and Concurent Servicing Loan</span>
    </a>
</li> 
</ul>    

Here is the list of your approved and Pending Loans from our Customer's Service

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Recent Loan/Mortage History
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
                            <th class="text-center">DATE</th>
                            <th class="text-center">LOAN TYPE</th>
                            <th class="text-center">AMOUNT(<?php echo $row['currency']; ?>)</th>

                            <th class="text-center">INTEREST</th>
                            <th class="text-center">DURATION</th>
                            <th class="text-center">MONTHLY PAYMENT</th>
                            <th class="text-center">STATUS</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if ($numTransCount < 1) { ?>

                            <tr> 
                           <td colspan="6" align="right">You do not have any loan record</td>
                       </tr>

                   <?php } else{ ?>
                        <?php while($rowTrans = $stmtTrans->fetch(PDO::FETCH_ASSOC)){?>
                            <tr>
                             <td class="text-center text-muted">
                                <?php echo $rowTrans['refNo']; ?>
                             </td>
                             <td class="text-center">
                                <?php echo $rowTrans['loanDate']; ?>
                            </td>
                            <td class="text-center"><?php echo $rowTrans['type']; ?></td>
                            <td class="text-center"><?php echo $rowTrans['amount']; ?></td>
                            <td class="text-center"><?php echo $rowTrans['intrest']; ?></td>
                            <td class="text-center"><?php echo $rowTrans['duration']; ?></td>
                            <td class="text-center"><?php echo $rowTrans['monthPay']; ?></td>
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
                                    if ($rowTrans['status'] == "Review") {
                                 ?>
                                <div class="badge badge-primary"> UNDER REVIEW</div>
                            <?php } ?>
                            <?php 
                                    if ($rowTrans['status'] == "Rejected") {
                                 ?>
                                <div class="badge badge-danger">REJECTED</div>
                            <?php } ?>
                                
                            </td>
                        </tr>
                    <?php } } ?>

                   </tbody>
               </table>
           </div>
           <div class="d-block text-center card-footer">
            <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
            <button class="btn-wide btn btn-success">Save</button>
        </div>
    </div>
</div>
</div>


<?php include 'includes/footer.php'; ?>  