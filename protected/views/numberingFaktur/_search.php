<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_numbering_faktur',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'first_number',array('class'=>'span5','maxlength'=>150)); ?>

		<?php echo $form->textFieldRow($model,'last_number',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>0)); ?>

		<?php echo $form->textFieldRow($model,'notes',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'taken_date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'user_taken',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'ip_user_taken',array('class'=>'span5','maxlength'=>50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>