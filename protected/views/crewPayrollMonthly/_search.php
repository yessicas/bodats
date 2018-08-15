<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_crew_payroll_monthly',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'month',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'year',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'CrewId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_payroll_item',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'amount',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'transfer_date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'transfer_type',array('class'=>'span5','maxlength'=>0)); ?>

		<?php echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'created_user',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span5','maxlength'=>50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
