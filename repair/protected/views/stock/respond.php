<?php
$stock=new Stock();
//$jobs=$stock->getAllTickets();
$create=$this->createUrl("stock/create");
$action=$this->createUrl("stock/done");
?>
   <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2><?php //echo $name; ?></h2>   
                        <h5>Responding to a job.</h5>
                       
                    </div>
                </div>
            <div class="row">
            <?php
           
                                    
            	
            ?>
                <div class="col-md-12">
                <form action="<?php echo $action; ?>" method="post">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          
                        <div class="panel-body">
                            <div class="table-responsive">
                          <h2>Respond to a problem.</h2>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="color:#000;">#</th>
                                            <th style="color:#000;">From</th>
                                            <th style="color:#000;">Description</th>
                                            <th style="color:#000;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $count=count($ticket);
                                    $stock=new Stock();
                                   for($y=0;$y<$count;$y++) {
                                   	$job=$ticket[$y];
                                   	$id=$job['id'];
                                   	$delete=$this->createUrl("stock/deletes/id/{$id}");
                                   	$update=$this->createUrl("stock/update/id/{$id}");
                                     $res=$stock->getResponses($id);
                                     $rcount=count($res);
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
                                        for($x=0;$x<$rcount;$x++) {   
                                        $resp=$res[$x];                                     
                                        ?>
                                         <tr>
                                            <td style="color:#000;"><?php echo $x+1; ?></td>
                                            <td style="color:#000;"><?php echo $resp['name']; ?></td>
                                            <td style="color:#000;"><?php echo $resp['text']; ?></td>
                                            
<td style="color:#000;"> 
<a href="<?php echo $update; ?>"><i class="fa fa-edit"></i></a>
<a href="<?php echo $delete; ?>"><i class="fa fa-remove"></i></a></td>
                                        </tr>
                                        <?php
                                        }
                                       }
                                        ?>
                                    </tbody>
                                </table>
                                
                                <div class="form-group input-group">
                                <input type="hidden" value="<?php echo $id; ?>" name="id">
                                <input type="hidden" value="Technician" name="name">
      <span class="input-group-addon"><i class="fa fa-desc">Response</i></span>
		<textarea name="response" class="form-control"></textarea>
		
	</div>
	<div class="form-group input-group">
	<input type="submit" class="btn btn-primary" value="Done">
		
	</div>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>                
   </form>             
            </div>
             </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>