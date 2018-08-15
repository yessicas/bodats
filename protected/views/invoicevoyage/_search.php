<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id_invoice_voyage',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_voyage_order',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_customer',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'InvoiceDate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'InvoiceNumber',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textAreaRow($model,'print_CompanyName',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textAreaRow($model,'print_ShippingAddress',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'print_NPWP',array('class'=>'span5','maxlength'=>150)); ?>

		<?php echo $form->textFieldRow($model,'print_NoFakturPajak',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'print_top',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'sales_code',array('class'=>'span5','maxlength'=>50)); ?>

		<?php echo $form->textFieldRow($model,'print_CustomerCode',array('class'=>'span5','maxlength'=>150)); ?>

		<?php echo $form->textAreaRow($model,'invoice_description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textAreaRow($model,'invoice_marks',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

		<?php echo $form->textFieldRow($model,'invoice_termdelivery',array('class'=>'span5','maxlength'=>150)); ?>

		<?php echo $form->textFieldRow($model,'invoice_duedate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'VoyageNumber',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'VoyageOrderNumber',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'VONo',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'VOMonth',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'VOYear',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_quotation',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'id_so',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'bussiness_type_order',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'BargingVesselTug',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'BargingVesselBarge',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'BargeSize',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Capacity',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'TugPower',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'BargingJettyIdStart',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'BargingJettyIdEnd',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'StartDate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'EndDate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ActualStartDate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'ActualEndDate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'period_year',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'period_month',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'period_quartal',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'Price',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'change_rate',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'fuel_price',array('class'=>'span5')); ?>

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
