<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_demurage_cost',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_voyage_order',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'transaction_date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'description',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'amount',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'is_invoice_created',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'invoice_number',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'id_invoice_voyage',array('class'=>'span5','maxlength'=>20)); ?>

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
