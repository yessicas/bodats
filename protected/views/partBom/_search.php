<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_part_bom',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'alias_name',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'code',array('class'=>'span5','maxlength'=>150)); ?>

		<?php echo $form->textFieldRow($model,'id_bom',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_part',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_part_parent',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'quantity',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'metric',array('class'=>'span5','maxlength'=>20)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
