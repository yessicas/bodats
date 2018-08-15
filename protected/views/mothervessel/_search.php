<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_mothervessel',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'MotherVesselCode',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'MV_Name',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'MV_Type',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textAreaRow($model,'MV_Route',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
