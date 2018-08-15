<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_fuel_consumption_daily',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'log_date',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_vessel',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'last_fuel_remain',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'status_remain',array('class'=>'span5','maxlength'=>0)); ?>

		<?php echo $form->textFieldRow($model,'last_longitude',array('class'=>'span5','maxlength'=>30)); ?>

		<?php echo $form->textFieldRow($model,'last_latitude',array('class'=>'span5','maxlength'=>30)); ?>

		<?php echo $form->textFieldRow($model,'NearestJettyId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'NearestDistancePoint',array('class'=>'span5')); ?>

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
