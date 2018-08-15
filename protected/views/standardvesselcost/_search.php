<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_standard_vessel_cost',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_vessel',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'month',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'year',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'depreciation_cost',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'crew_own_cost',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'crew_subcont_cost',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'insurance',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'repair',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'docking',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'brokerage_fee',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'others',array('class'=>'span5')); ?>

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
