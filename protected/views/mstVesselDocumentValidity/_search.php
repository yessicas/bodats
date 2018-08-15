<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_vessel_document_validity',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'no',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'vessel_document_validity',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'color',array('class'=>'span5','maxlength'=>20)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
