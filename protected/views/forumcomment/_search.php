<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_forum_comment',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_forum_topic',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'comment',array('class'=>'span5','maxlength'=>1000)); ?>

		<?php echo $form->textFieldRow($model,'userid',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'update_date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ip_address',array('class'=>'span5','maxlength'=>64)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
