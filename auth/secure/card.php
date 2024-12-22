<?php 
include 'includes/header.php';

$stmtTrans = $reg_user->runQuery("SELECT * FROM loan WHERE acc_no=:acc_no");
$stmtTrans->execute(array(":acc_no"=>$_SESSION['acc_no']));

$numTransCount = $stmtTrans->rowCount();



include 'includes/html.php';
?>

 
 <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                             
                                <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                    <span><i class='fa fa-credit-card' style='font-size:24px;color:orange'></i> List of Valid Bank Cards</span>
                                </a>
                            </li> 
                        </ul>    
                        
                         Here is the list of your approved Cards from our Customer's Service

      <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">My Card List
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
                                                <th class="text-center">USER</th> 
                                                <th class="text-center">CARD NO</th>
                                                 <th class="text-center">EXPIRY DATE</th>
                                                <th class="text-center">SECURITY/CVV</th> 
                                                <th class="text-center">CARD PIN</th>
                                                 <th class="text-center">CARD TYPE</th> 
                                                <th class="text-center">STATUS</th>
                                            </tr>
                                            </thead>
                                            
                                              
                                            
                                            <tbody>
                                            
                                            
                                            
                                            
                                            
                                            <tr  >
                                                
                                                							  <tr> 
						   <td colspan="6" align="right">You donot have any approved Credit/Debit Cards yets</td>
						  </tr>
						
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