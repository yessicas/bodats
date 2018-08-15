<?php
/* @var $this VesselController */
/* @var $model Vessel */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_vessel'); ?>
		<?php echo $form->textField($model,'id_vessel'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VesselName'); ?>
		<?php echo $form->textField($model,'VesselName',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VesselChecklist'); ?>
		<?php echo $form->textArea($model,'VesselChecklist',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Status'); ?>
		<?php echo $form->textField($model,'Status',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BargeSize'); ?>
		<?php echo $form->textField($model,'BargeSize',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VesselType'); ?>
		<?php echo $form->textField($model,'VesselType',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Capacity'); ?>
		<?php echo $form->textField($model,'Capacity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VesselDate'); ?>
		<?php echo $form->textField($model,'VesselDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RunningHour'); ?>
		<?php echo $form->textField($model,'RunningHour'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LastDateMaintenance'); ?>
		<?php echo $form->textField($model,'LastDateMaintenance'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LastRHMaintenance'); ?>
		<?php echo $form->textField($model,'LastRHMaintenance'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inventoryid'); ?>
		<?php echo $form->textField($model,'inventoryid'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->