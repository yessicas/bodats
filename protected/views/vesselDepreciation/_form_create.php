<?php
/* @var $this VesselDepreciationController */
/* @var $model VesselDepreciation */
/* @var $form CActiveForm */
?>


<?php 
 echo"<script type='text/javascript'>
 function hitung_month() {
	var annual = $('#VesselDepreciation_amount').val(); 
	var monthly = annual/12;
    $('#monthly').val(monthly.toFixed(2));
}
 </script>";
?>


<div class="view">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'standard-vessel-brokerage-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	
		
	
		<?php echo $form->textFieldRow($model,'year',array('readonly'=>'readonly','value'=>$_GET['year'])); ?>

		<div class="control-group ">
		<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('id_vessel'); ?> <span class="required">*</span></label> <!-- label -->
		<div class="controls">
		<?php echo Chtml::textField('Vessel',$modelvessel->VesselName,array('class'=>'span3','readonly'=>'readonly')); ?> 
		</div>
		</div>

		<?php echo $form->hiddenField($model,'id_vessel',array('value'=>$modelvessel->id_vessel)); ?>

		

		<div class="control-group ">
		<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('amount'); ?> <span class="required">*</span></label> <!-- label -->
		<div class="controls">	
		<?php echo $form->textField($model,'amount',array('onChange' => 'javascript:hitung_month()')); ?> IDR
		<?php echo $form->error($model,'amount'); ?>
		</div>
		</div>

		<div class="control-group ">
		<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('Monthly Depreciation'); ?> <span class="required">*</span></label> <!-- label -->
		<div class="controls">
		<?php echo Chtml::textField('monthly','',array('class'=>'span3','readonly'=>'readonly')); ?> IDR
		</div>
		</div>
	

	<?php /*

	<div class="row">
		<?php echo $form->labelEx($model,'created_date'); ?>
		<?php echo $form->textField($model,'created_date'); ?>
		<?php echo $form->error($model,'created_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created_user'); ?>
		<?php echo $form->textField($model,'created_user',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'created_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ip_user_updated'); ?>
		<?php echo $form->textField($model,'ip_user_updated',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'ip_user_updated'); ?>
	</div>

	*/ 
	?>

	<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->