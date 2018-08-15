<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_timesheet',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_voyage_order',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_voyage_activity',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Activity',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'StartDate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Duration',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Remarks',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'updated_date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'updated_user',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span5','maxlength'=>50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
