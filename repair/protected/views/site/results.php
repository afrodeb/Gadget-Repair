   <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Marondera High School Classes</h2>   
                       
                       
                    </div>
                </div>
<?php
//$count=count($classes);
?>
            <div class="row">
            
                <div class="col-md-12">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Student results - <h5><?php if(isset($name)){echo $name;} ?> </h5>.
                        </div>
                        <div class="panel-body">

 <div class="form-group">
                                        <span class="input-group-addon">Class</span>
                                        <select name="classroom" class="form-control" id="classroom">
                                         <option ="">-------------------</option>
                                        <?php
                                          
if(isset($classes)) { 
$count=count($classes);
for($x=0;$x<$count;$x++) {
$class=$classes[$x];
$url=$this->createUrl("site/viewreport/class/{$class['name']}");
                                           
                                           ?>
                                          
                                           <option value="<?php echo $url; ?>"><?php echo $class['name']; ?></option>
                                           <?php
                                           }
                                           }
                                           ?>               
                                           </select>
                                        </div>
                                            <div class="form-group">
                                                <label for="disabledSelect">Student Name</label>
                                               <select name="student" class="form-control" id="student">
                                               <option ="">-------------------</option>
                                                <?php
                                                if(isset($students)) {
                                                $counts=count($students);
                                                for($x=0;$x<$counts;$x++) {
                                                $student=$students[$x];	
                                                $fullName=$student['name']." ".$student['surname'];
                                                $url=$this->createUrl("site/viewreport/name/{$fullName}");
                                                ?>                      
                                                <option value="<?php echo $url;  ?>"><?php echo $fullName; ?></option>
                                               
                                                <?php
                                                }
                                                }
                                                ?>                        
                                               </select>
                                            </div>                        
                        
                                                
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Subject</th>
                                            <th>Mark</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
if(isset($results)) {
$count=count($results);
for($x=0;$x<$count;$x++) {
$subject=$results[$x];
?>
                                        <tr>
                                        <td><?php echo $x+1; ?></td>
                                            <td><?php echo $subject['subject']; ?></td>
                                            <td><?php echo $subject['mark']; ?></td>
                                        </tr>
                                       
                                         <?php
      }
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