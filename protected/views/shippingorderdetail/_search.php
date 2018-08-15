<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_shipping_order_detail',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_shipping_order',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_vessel_tug',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_vessel_barge',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'IdJettyOrigin',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'IdJettyDestination',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'BargeSize',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Capacity',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Price',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'change_rate',array('class'=>'span5')); ?>

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
