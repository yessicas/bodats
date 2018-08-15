<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_quotation',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'QuotationNumber',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'id_customer',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'QuotationDate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'SignName',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'SignPosition',array('class'=>'span5','maxlength'=>250)); ?>

		<?php echo $form->textFieldRow($model,'Status',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'Category',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textAreaRow($model,'StatusDescription',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'attachment',array('class'=>'span5','maxlength'=>100)); ?>

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
