        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Payments</h2>                          
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Enter details below.
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Basic Form Examples</h3>
                                    <form role="form">
                                        <div>
                                            <label style="color:#000;">Student ID number.</label>
                                            <input id="idNumber" class="form-control" placeholder="Student ID number." />
                                            <label id="studentName" style="color:#000;"></label>  
                                            <label id="studentClass" style="color:#000;"></label>
                                        </div>
                                <br>        
                                        <div id="pay">
                                            <label style="color:#000;">Paying for.</label>
                                            <select id="charge" class="form-control" >
                                            <option value="">------------------</option>
                                           <?php
                                           $count=count($charges);
                                           for($x=0;$x<$count;$x++) {
                                           $details=$charges[$x];
                                           $id=$details['id'];
                                           $name=$details['name'];
                                           echo "<option value='{$id}'>{$name}</option>";
                                           }
                                           ?>                                           
                                            </select>
                                            
                                        </div>
<br>
                                         <div id="amo">
                                            <label style="color:#000;">Amount.</label>
                                            <input id="amount" type="text" class="form-control" placeholder="0.00." />
                                        </div>
                                        <br><br>
                                        <input type="hidden" id="login" value="<?php echo YII::app()->session['id']; ?>" >                                   
                                        <button id="btnSearch" type="button" class="btn btn-default">Search Student</button>
                                        <button id="btnPay" type="button" class="btn btn-default">Done</button>
                                        <button id="reset" type="reset" class="btn btn-primary">Reset</button>

                                    </form>
                                   
                                                  
    </div>
                                                 
                                
                                
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
             
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>
     