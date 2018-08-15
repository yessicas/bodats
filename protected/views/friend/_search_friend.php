<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php //echo $form->textFieldRow($model,'id_friendship',array('class'=>'span5','maxlength'=>20)); ?>

		<?php //echo $form->textFieldRow($model,'from_userid',array('class'=>'span5','maxlength'=>250)); ?>

		<?php //echo $form->textFieldRow($model,'to_userid',array('class'=>'span5','maxlength'=>250)); ?>
		<?php echo $form->textFieldRow($model,'nama_lengkap',array('class'=>'span5')); ?>

		<?php //echo $form->textFieldRow($model,'req_date',array('class'=>'span5')); ?>

		<?php //echo $form->textFieldRow($model,'active_date',array('class'=>'span5')); ?>

		<?php //echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>0)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>Yii::t('strings','Search'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
