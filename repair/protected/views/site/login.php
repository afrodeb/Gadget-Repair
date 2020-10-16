<?php
$site=new Site();
$systemDetails=$site->getSystemDetails();
$system=$systemDetails[0];
$name=$system['name'];
$logo=$system['logo'];

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array(
   'class'=>'form-login',	
	)
));
?>   
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> <?php echo $name; ?> : Login</h2>
               
                <h5>( Login yourself to get access )</h5>
                 <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Enter Details To Login </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
<?php echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'User name')); ?>
<?php echo $form->error($model,'username'); ?>
                                        </div>
<div class="form-group input-group">
<span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
<?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Password')); ?>
<?php echo $form->error($model,'password'); ?>	
                                        </div>
                                    <div class="form-group">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" /> Remember me
                                            </label>
                                            <span class="pull-right">
                                                   <a href="#" >Forget password ? </a> 
                                            </span>
                                        </div>
         <?php echo CHtml::submitButton('SIGN IN',array('class'=>'btn btn-primary')); ?>	                            
                                   
                                    <hr />
                                    Not register ? <a href="registeration.html" >click here </a> 
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>
<?php $this->endWidget(); ?>
