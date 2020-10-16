<?php
$stock=new Stock();
$jobs=$stock->getAllTickets();
$create=$this->createUrl("stock/create");
?>
   <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2><?php //echo $name; ?></h2>   
                        <h5>List of All jobs.</h5>
                       
                    </div>
                </div>
            <div class="row">
            <?php
           
                                    
            	
            ?>
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          
                        <div class="panel-body">
                            <div class="table-responsive">
                           
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="color:#000;">#</th>
                                            <th style="color:#000;">Number</th>
                                            <th style="color:#000;">Description</th>
                                            <th style="color:#000;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $count=count($jobs);
                                   for($y=0;$y<$count;$y++) {
                                   	$job=$jobs[$y];
                                   	$id=$job['id'];
                                   	$delete=$this->createUrl("stock/deleteticket/id/{$id}");
                                   	$update=$this->createUrl("stock/respond/id/{$id}");
                                     //$student=$students[$y];
                                    ?>
                                        <tr>
                                            <td style="color:#000;"><?php echo $y+1; ?></td>
                                            <td style="color:#000;"><?php echo $job['number']; ?></td>
                                            <td style="color:#000;"><?php echo $job['text']; ?></td>
                                            
<td style="color:#000;"> 
<a href="<?php echo $update; ?>"><i class="fa fa-edit"></i></a>
<a href="<?php echo $delete; ?>"><i class="fa fa-remove"></i></a></td>
                                        </tr>
                                        <?php
                                        }
                                       
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>                
                
            </div>
             </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>