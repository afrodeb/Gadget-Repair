<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>

   <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br /><br />
                <h2> New Student : Register</h2>
               
                <h5>( Register a new student. )</h5>
                 <br />
            </div>
        </div>
         <div class="row">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong> Enter Student details below. </strong>  
                            </div>
                            <div class="panel-body">
                            <?php 
                            $action=$this->createUrl("site/registration");
                            ?>
                                <form role="form" method="post" action="<?php echo $action; ?>">
<br/>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Name</span>
                                            <input name="fname" type="text" class="form-control" placeholder="Student Name" />
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon">Surname</span>
                                            <input name="sname" type="text" class="form-control" placeholder="Student surname" />
                                        </div>
 <div class="form-group input-group">
                                            <span class="input-group-addon">Parent's Full name</span>
                                            <input name="pname" type="text" class="form-control" placeholder="Parent's Name" />
                                        </div>                                        

 <div class="form-group input-group">
                                            <span class="input-group-addon">Contact Number</i></span>
                                            <input name="phone" type="text" class="form-control" placeholder="Contact Number" />
                                        </div>                
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Contact Email</span>
                                            <input name="email" type="text" class="form-control" placeholder="Contact Email" />
                                        </div> 
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">Physical Address</span>
                                            <!--<input name="sname" type="text" class="form-control" placeholder="Student surname" />-->
                                            <textarea class="form-control" name="address" placeholder="Address"></textarea>
                                        </div>
                                       <div class="form-group input-group">
                                            <span class="input-group-addon">Date of Birth</span>
                                            <input name="dob" type="text" id="datetimepicker" class="form-control" placeholder="Date of Birth - 7 March 1991" />
                                        </div>                   
                                        
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">Class</span>
                                           <select name="classroom" class="form-control">
                                           <?php
                                           $count=count($classes);
                                           for($x=0;$x<$count;$x++) {
                                           	$class=$classes[$x];
                                           ?>
                                           <option value="<?php echo $class['name'] ?>"><?php echo $class['name']; ?></option>
                                           <?php
                                           }
                                           ?>               
                                           </select>
                                        </div>
                                     
                                     
                                     <input type="submit" class="btn btn-success " value="Register Me" />
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>
</div>
</div>
</div>
</div>

     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
