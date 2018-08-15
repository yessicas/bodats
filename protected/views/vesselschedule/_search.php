<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_vessel_schedule',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_vessel',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'day',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'month',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'year',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_vessel_status',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_shipping_order_detail',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'description',array('class'=>'span5','maxlength'=>250)); ?>

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
