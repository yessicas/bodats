<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'CrewId',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'NIP',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'VesselId',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textAreaRow($model,'CrewName',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'DateOfBirth',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'PlaceOfBirth',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textAreaRow($model,'Address',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'PhoneNumber',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'MobileNumber',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textAreaRow($model,'Email',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textAreaRow($model,'CurrentResidence',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'Status',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'Profession',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'MaritalStatus',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'NameOfSpouse',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textAreaRow($model,'NameOfChildren',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textAreaRow($model,'BankAccountNumber',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'BankName',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textAreaRow($model,'AccountHolder',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textAreaRow($model,'GovernmentFileTaxNumber',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textAreaRow($model,'EmployeeRegisteredNumber',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'AuditTime',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'AuditActivity',array('class'=>'span5','maxlength'=>32)); ?>

		<?php echo $form->textFieldRow($model,'StatusRelief',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'CertificateLevel',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'Notes',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'Photo',array('class'=>'span5','maxlength'=>255)); ?>

		<?php echo $form->textFieldRow($model,'LastMutationId',array('class'=>'span5','maxlength'=>255)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
