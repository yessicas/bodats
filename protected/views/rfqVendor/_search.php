<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_rfq_vendor',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'RFQNumber',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'NoOrder',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'NoMonth',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'NoYear',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_vendor',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'From',array('class'=>'span5','maxlength'=>64)); ?>

		<?php echo $form->textFieldRow($model,'QuotationDate',array('class'=>'span5')); ?>

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
