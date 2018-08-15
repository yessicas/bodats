<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_invitation',array('class'=>'span5','maxlength'=>21)); ?>

		<?php echo $form->textFieldRow($model,'invitation_date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'is_user',array('class'=>'span5','maxlength'=>0)); ?>

		<?php echo $form->textFieldRow($model,'email_target',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'userid_target',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'status',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'userid_sender',array('class'=>'span5','maxlength'=>40)); ?>

		<?php echo $form->textFieldRow($model,'ipaddress_sender',array('class'=>'span5','maxlength'=>100)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
