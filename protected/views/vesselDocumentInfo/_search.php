<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_vessel_document_info',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_vessel',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'DateCreated',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ValidUntil',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_vessel_document',array('class'=>'span5')); ?>

		<?php echo $form->textAreaRow($model,'Attachment',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'Check1',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Check2',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Check3',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Check4',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Check5',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Check6',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Status',array('class'=>'span5','maxlength'=>0)); ?>

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
