<?php
$stock=new Product();
$jobs=$stock->getProducts();
$create=$this->createUrl("product/create");
?>
   <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2><?php //echo $name; ?></h2>   
                        <h5>List of All Products.</h5>
                       
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
                            <a href="<?php echo $create; ?>" class='btn btn-primary'>Enter new Product</a>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="color:#000;">#</th>
                                            <th style="color:#000;">Name</th>
                                            <th style="color:#000;">Description</th>
                                            <th style="color:#000;">Registered on</th>
                                            <th style="color:#000;">Price</th>
                                            
                                            <th style="color:#000;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $count=count($jobs);
                                   for($y=0;$y<$count;$y++) {
                                   	$job=$jobs[$y];
                                   	$id=$job['id'];
                                   	$delete=$this->createUrl("product/deletes/id/{$id}");
                                   	$update=$this->createUrl("product/update/id/{$id}");
                                     //$student=$students[$y];
                                    ?>
                                        <tr>
                                            <td style="color:#000;"><?php echo $y+1; ?></td>
                                            <td style="color:#000;"><?php echo $job['name']; ?></td>
                                            <td style="color:#000;"><?php echo $job['description']; ?></td>
                                            <td style="color:#000;"><?php echo $job['created']; ?></td>
                                           <td style="color:#000;"><?php echo $job['price']; ?></td>
                                          
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