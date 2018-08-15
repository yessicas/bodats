<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_voyage_close_document',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_voyage_order',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'IdVoyageDocument',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'VoyageDocumentName',array('class'=>'span5','maxlength'=>240)); ?>

		<?php echo $form->textFieldRow($model,'uploaded_date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'uploaded_user',array('class'=>'span5','maxlength'=>45)); ?>

		<?php echo $form->textFieldRow($model,'ip_user_uploaded',array('class'=>'span5','maxlength'=>50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
