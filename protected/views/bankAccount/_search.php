<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_bank_account',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'BankName',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'BranchAddress',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'BankCity',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'AccountName',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'AccountNumber',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'Currency',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
