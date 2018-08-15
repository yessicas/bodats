<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_standard_agency_item',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_standard_agency',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_agency_item',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'description',array('class'=>'span5','maxlength'=>200)); ?>

		<?php echo $form->textFieldRow($model,'agency_fix_cost',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'agency_var_cost',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>

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
