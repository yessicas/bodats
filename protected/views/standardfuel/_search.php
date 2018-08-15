<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_standard_fuel',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'type_set_power',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'type_set_feet',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'JettyIdStart',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'JettyIdEnd',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'jarak',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'speed_standard',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'target_sailing_time',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'lay_time',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'sailing_time',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'cycle_time',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'total_bbm',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'agency_rate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'agency_rate_id_currency',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'type',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
