<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_vessel_document',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'VesselDocumentName',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'Information',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'Status',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
