
<?php 
$this->menu=array(
array('label'=>'Close Voyage Order','url'=>array('voyageorder/close_voyage')),
array('label'=>'Closed  Voyage Document','url'=>array('voyageclose/create_voyage_document','id'=>$_GET['id'])),
array('label'=>'Change Actual Capacity','url'=>array('voyageclose/changeactualcapacity','id'=>$_GET['id']), 'active'=>true),
//array('label'=>'Finished VO','url'=>array('voyageorder/finished_vo')),
);
?>

<div id="content">
<h2>Change Actual Capacity</h2>
<hr>
</div>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'voyage-close-form',
	'enableAjaxValidation'=>false,
	'type' => 'horizontal',
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

<?php echo $form->errorSummary($model); ?>


<div class='view'>


	<?php //echo $form->textFieldRow($model,'CrewIdMaster',array('class'=>'span5')); // dupakai ?>

	<?php //echo $form->textFieldRow($model,'CloseVoyageReportDate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'Capacity',array('class'=>'span5', 'readonly'=>'readonly')); ?>

	<?php echo $form->textFieldRow($model,'ActualCapacity',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'StandardFuel',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'StandardLayTime',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'ActualFuel',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'ActualLayTime',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'StartFuelStock',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'Bunker',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'LastFuelStock',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'AE_Over',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'Deviation',array('class'=>'span5')); ?>

	<?php //echo $form->textAreaRow($model,'Remark',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php //echo $form->textFieldRow($model,'Nautical',array('class'=>'span5','maxlength'=>150)); // dipakai ?>

	<?php //echo $form->textFieldRow($model,'NauticalHead',array('class'=>'span5','maxlength'=>150)); // dipakai ?>

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



