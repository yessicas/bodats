<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_fuel',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fuel',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'fuel_price',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fuel_price_updated',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fuel_price_updated_by',array('class'=>'span5','maxlength'=>64)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
