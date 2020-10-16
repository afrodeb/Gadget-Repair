<?php
$site=new Site();
$systemDetails=$site->getSystemDetails();
$system=$systemDetails[0];
$name=$system['name'];
$logo=$system['logo'];
$newclass=$this->createUrl("site/newclass");
?>
   <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2><?php echo $name; ?> Classes</h2>   
                        <h5>List of all classes </h5>
                       <a href="<?php echo $newclass ?>" class="btn btn-primary">New Class</a>
                    </div>
                </div>
<?php
$count=count($classes);
?>
            <div class="row">
            
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form 1 Classes
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" style="color:#000;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Label</th>
                                            <th>Teacher</th>
                                            <th>Student count</th>
                                            <th>Assign Teacher</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
for($x=0;$x<$count;$x++) {
$class=$classes[$x];
$site=new Site();
$students=$site->getStudents($class['name']);
$counts=count($students);
?>
                                        <tr>
                                        <td><?php echo $x+1; ?></td>
                                            <td><?php echo $class['name']; ?></td>
                                            
                                            <td>Not Assigned</td>
                                            <td><?php echo $counts; ?></td>
                                            <td><i class="fa fa-pencil"></i></td>
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
             <!-- /. PAGE INNER  -->
            </div>