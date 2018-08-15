<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_inbox',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'to_inbox',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'from_inbox',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textAreaRow($model,'message',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>0)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
