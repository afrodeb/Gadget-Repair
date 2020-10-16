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
                     <h2><?php echo $name; ?> Teachers</h2>   
                        <h5>List of all classes </h5>

 <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" style="color:#000;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Name</th>
                                            <th>EC Number</th>
                                            <th>DOB</th>
                                            <th>Start Date</th>
                                            <th>Address</th>
                                            <th>Class</th>
                                        </tr>
                                    </thead>
                                    <tbody>
         <?php
         $count=count($model);
         $site=new Teachers();
         //print_r($model);
         for($x=0;$x<$count;$x++) {                          
         $teacher=$model[$x];
         $id=$teacher['id'];
         $url=$this->createUrl("teachers/update/id/{$id}");
         $classname=$site->getClassTeacher($id);
         ?> 
                                        <tr>
<td><?php echo "<a href='{$url}'>".$teacher['id']."</a>"; ?></td>
<td><?php echo $teacher['title']; ?></td>
<td><?php echo "<a href='{$url}'>".$teacher['name']."</a>";?></td>
<td><?php echo $teacher['ecnumber']; ?></td>
<td><?php echo $teacher['dob']; ?></td>
<td><?php echo $teacher['startdate']; ?></td>   
<td><?php echo $teacher['address']; ?></td>
<td>
<a href="#"  data-toggle="modal" data-target="#assignTeacher<?php echo $x; ?>">
<span class="glyphicon glyphicon-users"></span><?php echo $classname; ?></a>
</td>
                                    
                                        </tr>
  <div class="modal fade" id="assignTeacher<?php echo $x; ?>">
  <div class="modal-dialog">
   <div class="modal-content">
   <button type="button" class="close" data-dismiss="modal">
   <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>


   <div class="row">
            <div class="col-sm-6">
                <h4>Select a Class</h4>
                <div class="form-group">
                <label for="exampleInputPassword1" style="color:#000;">Assign <?php echo $teacher['name']; ?> a Class.</label>
                
              <select id="theClass<?php echo $teacher['id']; ?>" class="form-control" >
              <?php
                $countClasses=count($classes);
                for($y=0;$y<$countClasses;$y++) {
                	$myClass=$classes[$y];
                ?>
 <option value="<?php $myClass['id']; ?>"><?php echo $myClass['name']; ?></option>               
                <?php
}               
                ?>
              </select>
              
                </div>
                
                <button id="<?php echo $teacher['id']; ?>" onclick="return assignTeacher(this.id);" type="submit" class="btn btn-danger">Submit</button>
            </div>
           
    </div>  
</div>
  </div>
</div>                                      
   <?php
   }
   ?>                                    
                                         
                                    </tbody>
                                </table>
                            </div>



</div>
</div>
</div>
</div>
