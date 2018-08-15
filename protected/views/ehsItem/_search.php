<?php
/* @var $this EhsItemController */
/* @var $model EhsItem */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_ehs_item'); ?>
		<?php echo $form->textField($model,'id_ehs_item'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_po_category'); ?>
		<?php echo $form->textField($model,'id_po_category'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ehs_category'); ?>
		<?php echo $form->textField($model,'ehs_category',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ehs_item'); ?>
		<?php echo $form->textArea($model,'ehs_item',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parent_level1'); ?>
		<?php echo $form->textField($model,'parent_level1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parent_level2'); ?>
		<?php echo $form->textField($model,'parent_level2',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parent_level3'); ?>
		<?php echo $form->textField($model,'parent_level3',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serial_number'); ?>
		<?php echo $form->textField($model,'serial_number',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>800)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estimated_unit_price'); ?>
		<?php echo $form->textField($model,'estimated_unit_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'metric'); ?>
		<?php echo $form->textField($model,'metric',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'category'); ?>
		<?php echo $form->textField($model,'category',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'impa'); ?>
		<?php echo $form->textField($model,'impa',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->