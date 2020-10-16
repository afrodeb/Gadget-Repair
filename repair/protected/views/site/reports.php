            <div id="page-inner">
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Element Examples
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                </div>  
                                <div class="col-md-8">
                                    <h3>Record A students results</h3>
                                    <?php
                                    $url=$this->createUrl("site/createreport");
                                    ?>
                                    <form role="form" method="post" action="<?php echo $url ?>">
                                        <fieldset>
                                        <div class="form-group">
                                        <span class="input-group-addon">Class</span>
                                        <select name="classroom" class="form-control" id="classroom">
                                        <?php
                                           $count=count($classes);
                                           for($x=0;$x<$count;$x++) {
                                           	$class=$classes[$x];
                                           	$url=$this->createUrl("site/reports/class/{$class['name']}")
                                           
                                           ?>
                                           <option value="<?php echo $url; ?>"><?php echo $class['name']; ?></option>
                                           <?php
                                           }
                                           ?>               
                                           </select>
                                        </div>
                                            <div class="form-group">
                                                <label for="disabledSelect">Student Name</label>
                                               <select name="student" class="form-control" >
                                                <?php
                                                if(isset($students)) {
                                                $counts=count($students);
                                                for($x=0;$x<$counts;$x++) {
                                                $student=$students[$x];	
                                                $fullName=$student['name']." ".$student['surname'];
                                                ?>                      
                                                <option value="<?php echo $fullName;  ?>"><?php echo $fullName; ?></option>
                                                <input type="hidden" value="<?php echo $thisClass; ?>" name="thisClass" ?>
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
                                    <?php for($x=1;$x<13;$x++) { ?>
                                        <tr>
                                            <td><?php echo $x; ?></td>
                                            <td><input type="text" name="subject[]"></td>
                                            <td><input type="text" name="mark[]"></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>                                            
                                            
                                            <input type="submit" class="btn btn-primary" />
                                        </fieldset>
                                    </form>
                                
                     
                                   
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
    </div>
    <script type="text/javascript">
function refer(value)
    {
alert(value);    
    }
    
    </script>