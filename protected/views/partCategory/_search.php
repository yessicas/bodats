<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_part_category',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'PartCategoryName',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'PartDescription',array('class'=>'span5','maxlength'=>250)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
