<?php 
$class=$this->createUrl("site/class");
?>   
       <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <a href="<?php echo $class ?>" class="btn btn-primary">Classes</a>
                     <h2>Create new Classes.</h2>   
                         <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">

 <form role="form">
 <?php 
for($x=1;$x<=10;$x++) { 
 ?>                                        
                                        <div class="form-group">
                                            <label style="color:#000;">Class <?php echo $x; ?></label>
                                             <input class="form-control newClass" placeholder="Class <?php echo $x; ?>" />
                                        </div>                                
<?php
}
?>
 <span class="input-group-btn">
                                                <button id="btnClass" class="btn btn-default" type="button">Submit</i>
                                                </button>
                                            </span>
</form>
                                
                                </div>
                                </div>
                                </div>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
     