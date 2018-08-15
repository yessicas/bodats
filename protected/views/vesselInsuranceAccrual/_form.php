<?php 
 echo"<script type='text/javascript'>
 function hitung_month() {
	var annual = $('#VesselInsuranceAccrual_amount').val(); 
	var monthly = annual/12;
    $('#monthly').val(monthly.toFixed(2));
}
 </script>";
?>

<?php  if($model->amount>0){
 echo"<script type='text/javascript'>
 window.onload = function (){
	var annual = $('#VesselInsuranceAccrual_amount').val(); 
	var monthly = annual/12;
    $('#monthly').val(monthly.toFixed(2));
}
 </script>";
}
?>

<div class="view">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'vessel-insurance-accrual-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	  <?php echo $form->textFieldRow($model,'year',array('readonly'=>'readonly')); ?>

		<div class="control-group ">
		<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('id_vessel'); ?> <span class="required">*</span></label> <!-- label -->
		<div class="controls">
		<?php echo Chtml::textField('Vessel',$model->Vessel->VesselName,array('class'=>'span3','readonly'=>'readonly')); ?> 
		</div>
		</div>

		<?php echo $form->hiddenField($model,'id_vessel',array()); ?>

		<div class="control-group ">
		<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('amount'); ?> <span class="required">*</span></label> <!-- label -->
		<div class="controls">	
		<?php echo $form->textField($model,'amount',array('onChange' => 'javascript:hitung_month()')); ?> IDR
		<?php echo $form->error($model,'amount'); ?>
		</div>
		</div>

		<div class="control-group ">
		<label class="control-label required" ><?php echo $model::model()->getAttributeLabel('Monthly Accrued'); ?> <span class="required">*</span></label> <!-- label -->
		<div class="controls">
		<?php echo Chtml::textField('monthly','',array('class'=>'span3','readonly'=>'readonly')); ?> IDR
		</div>
		</div>

	<?php //echo $form->textFieldRow($model,'id_vessel',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'year',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'amount',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'created_user',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span5','maxlength'=>50)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

</div>
