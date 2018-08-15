<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_quotation_detail',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_quotation',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'IdNodeOrigin',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'IdNodeDestination',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'BargeSize',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Capacity',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'Price',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'change_rate',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
