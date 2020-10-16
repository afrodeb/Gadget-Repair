<?php
$site=new Site();
$systemDetails=$site->getSystemDetails();
$system=$systemDetails[0];
$name=$system['name'];
$logo=$system['logo'];
?>   
   <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2><?php echo $name; ?></h2>   
                        <h5>List of all students,categorized according to class </h5>
                       
                    </div>
                </div>
            <div class="row">
            <?php
            $count=count($classes);
            for($x=0;$x<$count;$x++) {
           	$class=$classes[$x];
         	$site=new Site();
            $students=$site->getStudents($class['name']);
                                     //print_r($students);
                                     $counts=count($students);
                                     if($counts > 0) {
                                    
            	
            ?>
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <?php 
                           echo $class['name']; ?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="color:#000;">#</th>
                                            <th style="color:#000;">First Name</th>
                                            <th style="color:#000;">Last Name</th>
                                            <th style="color:#000;">Class</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                   for($y=0;$y<$counts;$y++) {
                                     $student=$students[$y];
                                    ?>
                                        <tr>
                                            <td style="color:#000;"><?php echo $y+1; ?></td>
                                            <td style="color:#000;"><?php echo $student['name']; ?></td>
                                            <td style="color:#000;"><?php echo $student['surname']; ?></td>
                                            <td style="color:#000;"><?php echo $student['class']; ?></td>
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
<?php
}
}
?>                
                
            </div>
             </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>