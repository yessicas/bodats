<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_customer',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'CustomerNumber',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'ContactName',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textAreaRow($model,'Address',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'address_line1',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'address_line2',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textAreaRow($model,'CompanyName',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textAreaRow($model,'NPWP',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'Telephone',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textAreaRow($model,'Email',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'CustomerCode',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'City',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'PostalCode',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Street',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'FaxNumber',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'VATreg',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'Acronym',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'id_payment_top',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'BankName',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'BranchAddress',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'BankCity',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'AccountName',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'AccountNumber',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
