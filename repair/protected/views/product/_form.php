  <div id="page-wrapper" >
            <div id="page-inner">
                  <div class="col-md-8 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>Enter details for a new product.</strong>  
                            </div>
                            <div class="panel-body">
                                
                                
                                
                              

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stock-form',
	//'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	  <div class="form-group input-group">
      <span class="input-group-addon"><i class="fa fa-user">
		<?php echo $form->labelEx($model,'name'); ?></i></span>
		<?php echo $form->textField($model,'name',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	  <div class="form-group input-group">
      <span class="input-group-addon"><i class="fa fa-desc">
		<?php echo $form->labelEx($model,'description'); ?></i></span>
		<?php echo $form->textArea($model,'description',array('class'=>'form-control','rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

 <div class="form-group input-group">
      <span class="input-group-addon"><i class="fa fa-money">
		<?php echo $form->labelEx($model,'price'); ?></i></span>
		<?php echo $form->textField($model,'price',array('class'=>'form-control','size'=>60,'maxlength'=>255)); ?>
	
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="form-group input-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary')); ?>
	</div>
</form>
<?php $this->endWidget(); ?>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>
