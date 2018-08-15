<style>
form.form-vertical input, textarea{
	background-color:#B6DEFF;
}

.grid-view table.items tr#report_content td { height: 200px !important; }

</style>
<div class="view">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'invoice-voyage-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<!--<p class="help-block">Fields with <span class="required">*</span> are required.</p>-->

<?php echo $form->errorSummary($model); ?>

	<?php
		$CAPACITY = NumberAndCurrency::formatNumber($modelvoyage->ActualCapacity);
		$TOTAL_AMOUNT = NumberAndCurrency::formatNumber($modelvoyage->ActualCapacity * $modelvoyage->Price);
		
		$PPN = NumberAndCurrency::formatNumber(($modelvoyage->ActualCapacity * $modelvoyage->Price) * (10/100));
		$GRAND_TOTAL = NumberAndCurrency::formatNumber(($modelvoyage->ActualCapacity * $modelvoyage->Price) +  ( ($modelvoyage->ActualCapacity * $modelvoyage->Price) * (10/100) )) ;
		
		if($CAPACITY  <= 0){
			$CAPACITY = 'ACTUAL CAPACITY NOT SET';
			$TOTAL_AMOUNT = ' -- PLEASE CHECK ACTUAL CAPACITY -- ';
			$PPN = ' -- ? --';
			$GRAND_TOTAL = ' -- ? --';
		}
	?>

	<?php //echo $form->textFieldRow($model,'id_voyage_order',array('class'=>'span5','maxlength'=>20)); ?>


	<div style ="float:right;text-align:right;">
	INVOICE 
	<br>
	<?php
		//Get Invoice Number
		if($model->isNewRecord){
			$model->InvoiceNumber = InvoiceDB::getFullLastInvoiceNumber();
			$model->print_NoFakturPajak = FakturNumbering::getLastActiveNumberingFakturAllocation();
		}
	?>
	<?php echo'No '.$form->textField($model,'InvoiceNumber',array('class'=>'span12','maxlength'=>50)); ?>
	<?php echo $form->error($model,'InvoiceNumber'); ?> 
	</div>
	
	<?php echo nl2br(GeneralDB::getsettingGeneral('Invoice Header')->field_value); ?>
	
	<div id="invoice-grid" class="grid-view">
	<table class="items table table-bordered table-condensed">
	<tbody>

	<tr class="even">
		<td style="width:50%" colspan =4>
		INVOICE KEPADA (INVOICE TO)	
		<br>
		<?php 
		echo '<b>'.$modelvoyage->Quotation->Customer->CompanyName.'</b><br>';
		echo $modelvoyage->Quotation->Customer->Address.'<br>';
		echo $modelvoyage->Quotation->Customer->Address2.'<br>';
		echo 'Attn : '.$modelvoyage->Quotation->attn.'<br>';
		?>
		<?php echo $form->hiddenField($model,'id_customer',array('class'=>'span5','maxlength'=>20,'value'=>$modelvoyage->Quotation->Customer->id_customer)); ?>			
		</td>
		<td style="width:50%" colspan =3>
		DIKIRIM KE (SHIP TO)	
		<br>
		<?php 
		echo '<b>'.$modelvoyage->Quotation->Customer->CompanyName.'</b><br>';
		echo $modelvoyage->Quotation->Customer->Address.'<br>';
		echo $modelvoyage->Quotation->Customer->Address2.'<br>';
		echo 'Attn : '.$modelvoyage->Quotation->attn.'<br>';
		?>
		</td>
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;" colspan =2>		
		NPWP : <br>
		<?php echo $modelvoyage->Quotation->Customer->NPWP.'<br>'; ?>
		
		</td>
		<td style="vertical-align:top;text-align:left;" colspan =2>		
		NO FAKTUR PAJAK (VAT NO) <br>
		<?php echo $form->textField($model,'print_NoFakturPajak',array('class'=>'span12','maxlength'=>50)); ?>
		<?php echo $form->error($model,'print_NoFakturPajak'); ?> 
		</td>

		<td style="vertical-align:top;text-align:left;" colspan =2>		
		SYARAT PEMBAYARAN (TERM OF PAYMENT) 	<br>
		<?php echo $modelvoyage->Quotation->Customer->TermOfPayment.' Days<br>'; ?>
		
		</td>
		<td style="vertical-align:top;text-align:left;" colspan =3 >		
		NOMOR PELAYANAN (FLEET NUMBER) 	<br>
		<?php echo $modelvoyage->VoyageNumber.'<br>'; ?>
		
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;" colspan =3>		
		PELABUAH MUAT  (LOADING PORT) <br>
		<?php echo $modelvoyage->JettyOrigin->JettyName.'<br>'; ?>
		
		</td>
		<td style="vertical-align:top;text-align:left;" colspan =3>		
		PELABUAH BONGKAR  (UNLOADING PORT) <br>
		<?php echo $modelvoyage->JettyDestination->JettyName.'<br>'; ?>
		</td>

		
		
		</td>
		<td style="vertical-align:top;text-align:left;" colspan =3>		
		TANGGAL BERANGKAT (SAILING ON) 	<br>
		<?php $sailingon= InvoiceDB::getdatefromdatetime($modelvoyage->ActualStartDate);
		if ($sailingon == "-"){
			echo $sailingon;
		}else{
			echo InvoiceDB::getformatdate($sailingon) ;
		}
		?> 
		
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;" colspan =2>		
		NO PESANAN (ORDER NO) <br>
		<?php echo $modelvoyage->Quotation->QuotationNumber.'<br>'; ?>
		
		</td>
		<td style="vertical-align:top;text-align:left;" colspan =2>		
		TANGGAL ORDER (ORDER DATE) <br>
		<?php echo InvoiceDB::getformatdate($modelvoyage->Quotation->QuotationDate) ?>
		<?php //echo $modelvoyage->Quotation->QuotationDate.'<br>'; ?>
		</td>

		<td style="vertical-align:top;text-align:left;" colspan =2>		
		KODE PENJUALAN (SALES CODE ) 	<br>
		<?php echo $form->textField($model,'sales_code',array('class'=>'span7','maxlength'=>50,'value'=>GeneralDB::getsettinginvoice('Sales Code')->field_value)); ?>
		<?php echo $form->error($model,'sales_code'); ?>
		
		</td>
		<td style="vertical-align:top;text-align:left;" colspan =3>		
		KODE PELANGGAN (CUSTOMER CODE) 	<br>
		<?php echo $modelvoyage->Quotation->Customer->id_customer.'<br>'; ?>
		
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:center;" colspan =4>		
		PENJELASAN 	(DESCRIPTION) 
		</td>
		<td style="vertical-align:top;text-align:center;width:15%;" >		
		QUANTITY
		</td>
		<td style="vertical-align:top;text-align:center;width:15%;" colspan='2' >		
		HARGA SATUAN  <br>
		(UNIT PRICE)
		</td>
		<td style="vertical-align:top;text-align:center;width:15%;" colspan='2' >		
		JUMLAH  <br>
		(AMOUNT)
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;" colspan =4>		
		Coal barging  Transportation for slot 
		<?php //echo InvoiceDB::getdayfromdatetime($modelvoyage->ActualStartDate) ?>   <?php //echo InvoiceDB::getdayfromdatetime($modelvoyage->ActualEndDate) ?> <?php //echo InvoiceDB::getmonthandyearsfromdatetime($modelvoyage->ActualEndDate) ?> <!-- isi dari mana -->

		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'model'=>$model,
		//'language'=>Yii::app()->language='id',
		'attribute'=>'print_slot1',
		'options'=>array(
							'showAnim'=>'slideDown',
							'dateFormat'=>'yy-mm-dd',          
							'changeMonth'=>true,
							'changeYear'=>true,
							'showOn'=>'focus',
							'showButtonPanel' => true,
						),
		'htmlOptions'=>array(
		'style'=>'width:80px;',
		//'value'=>date("Y-m-d")
		),
		)); ?>	
		<?php echo $form->error($model,'print_slot1'); ?> 

		 - 

		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'model'=>$model,
		//'language'=>Yii::app()->language='id',
		'attribute'=>'print_slot2',
		'options'=>array(
							'showAnim'=>'slideDown',
							'dateFormat'=>'yy-mm-dd',          
							'changeMonth'=>true,
							'changeYear'=>true,
							'showOn'=>'focus',
							'showButtonPanel' => true,
						),
		'htmlOptions'=>array(
		'style'=>'width:80px;',
		//'value'=>date("Y-m-d")
		),
		)); ?>	
		<?php echo $form->error($model,'print_slot2'); ?> 

		</td>
		<td style="vertical-align:top;text-align:center;" >		
		
		</td>
		<td style="vertical-align:top;text-align:center;" >		
		
		
		</td>

		<td style="vertical-align:top;border-left: 1px solid #fff;text-align:center;" >		
		
		
		</td>

		<td style="vertical-align:top;text-align:center;" >		
		
		</td>

		<td style="vertical-align:top;border-left: 1px solid #fff;text-align:center;" >		
		
		</td>
		
	</tr>


	<tr class="even">
		<td style="vertical-align:top;text-align:center;" >		
		Tug boat
		</td>
		<td style="vertical-align:top;text-align:center;" >		
		Barge
		</td>
		<td style="vertical-align:top;text-align:center;" >		
		Description
		</td>
		<td style="vertical-align:top;text-align:center;" >		
		Load data / Mother Vessel 
		</td>

		<td style="border-top: 1px solid #fff ;vertical-align:top;text-align:center;" >		
		
		</td>

		<td style="border-top: 1px solid #fff ;vertical-align:top;text-align:center;" >		
		
		
		</td>

		<td style="border-top: 1px solid #fff ;border-left: 1px solid #fff;vertical-align:top;text-align:center;" >		
		
		
		</td>
		<td style="border-top: 1px solid #fff ;vertical-align:top;text-align:center;" >		
		
		</td>

		<td style="border-top: 1px solid #fff ;border-left: 1px solid #fff;vertical-align:top;text-align:center;" >		
		
		</td>
		
	</tr>


	<?php
		//Mencari & Mendapatkan Vessel
		if(isset($modelvoyage->VesselTug)){
			$VesselTugName = $modelvoyage->VesselTug->VesselName;
		}else{
			$VesselTugName = "UNKNOWN TUG (".$modelvoyage->BargingVesselBarge.")";
		}
		
		if(isset($modelvoyage->VesselBarge)){
			$VesselBargeName = $modelvoyage->VesselBarge->VesselName;
		}else{
			$VesselBargeName = "UNKNOWN BARGE (".$modelvoyage->BargingVesselBarge.")";
		}
	?>

	<!-- isi dari mana -->
	<tr class="even" id='report_content'>
		<td style="vertical-align:top;text-align:left;" >		
		<?php echo $VesselTugName;  ?>
		</td>
		<td style="vertical-align:top;text-align:left;" >		
		<?php echo $VesselBargeName; ?>
		</td>
		<td style="vertical-align:top;text-align:center;" >		
		<?php echo $modelvoyage->JettyOrigin->Acronym ?> - <?php echo $modelvoyage->JettyDestination->Acronym ?>
		</td>
		<td style="vertical-align:top;text-align:center;" >		
		<?php echo InvoiceDB::getformatdatetime($modelvoyage->ActualStartDate) ?>
		</td>

		<td style="border-top: 1px solid #fff ;vertical-align:top;text-align:center;" >		
		<?php echo $CAPACITY; ?> MT
		</td>

		<td style="border-top: 1px solid #fff ;vertical-align:top;text-align:left;" >		
		<?php echo $modelvoyage->Currency->currency ?>  
		</td>
		<td style="border-top: 1px solid #fff ;border-left: 1px solid #fff;vertical-align:top;text-align:right;" >		
		<?php echo NumberAndCurrency::formatCurrency($modelvoyage->Price) ?> 
		</td>
		<td style="border-top: 1px solid #fff ;vertical-align:top;text-align:left;" >		
		<?php echo $modelvoyage->Currency->currency ?>  
		</td>
		

		<td style="border-top: 1px solid #fff ;border-left: 1px solid #fff;vertical-align:top;text-align:right;" >		
		<?php echo $TOTAL_AMOUNT;  ?>
		</td>
		
	</tr>
	<!-- end isi dari mana -->

	<tr class="even">
		<td style="vertical-align:top;text-align:left;" colspan =3 rowspan =2>		
		SHIPPING MARKS  <br>
		<?php echo $form->textArea($model,'invoice_marks',array('rows'=>2, 'cols'=>50, 'class'=>'span8')); ?>
		<?php echo $form->error($model,'invoice_marks'); ?> 
		
		</td>
		<td style="vertical-align:top;text-align:left;" colspan =2>		
		MATA UANG (CURRENCY) <br>
		<?php echo '<center>'.$modelvoyage->Currency->currency.'</center><br>'; ?>
		</td>

		
	
		<td style="vertical-align:top;text-align:left;" colspan ='3'>		
		JUMLAH (AMOUNT)
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:right;" >		
		<?php echo $TOTAL_AMOUNT;  ?>
		</td>
		
	</tr>

	<tr class="even">
		
		
		</td>
		<td style="vertical-align:top;text-align:left;" colspan =2>		
		SYARAT PENGIRIMAN (TERM OF DELIVERY)  <br>
		<?php echo $form->textField($model,'invoice_termdelivery',array('class'=>'span8','maxlength'=>150)); ?>
		<?php echo $form->error($model,'invoice_termdelivery'); ?> 
		
		</td>

		
		
	
		<td style="border-top: 1px solid #fff ;vertical-align:top;text-align:left;" colspan ='3'>		
		PPN  (VAT) <br>
		10%
		</td>
		<td style="border-top: 1px solid #fff ;border-left: 1px solid #fff ;vertical-align:top;text-align:right;" >		
		<?php echo $PPN; ?>
		</td>
		
	</tr>


	<tr class="even">
		<td style="vertical-align:top;text-align:left;" colspan =3 rowspan =2>		
		CATATAN LAIN (OTHER REMARKS)  <br>
		<?php echo $form->textArea($model,'invoice_description',array('rows'=>2, 'cols'=>50, 'class'=>'span8')); ?>
		<?php echo $form->error($model,'invoice_description'); ?> 
		
		</td>
		<td style="vertical-align:top;text-align:left;" colspan =2>		
		JATUH TEMPO (DUEDATE)  <br>
		<?php //echo $form->textfield($model,'invoice_duedate',array('class'=>'span8')); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'model'=>$model,
		//'language'=>Yii::app()->language='id',
		'attribute'=>'invoice_duedate',
		'options'=>array(
							'showAnim'=>'slideDown',
							'dateFormat'=>'yy-mm-dd',          
							'changeMonth'=>true,
							'changeYear'=>true,
							'showOn'=>'focus',
							'showButtonPanel' => true,
						),
		'htmlOptions'=>array(
		'style'=>'width:80px;',
		'value'=>InvoiceDB::adddate(date("Y-m-d"),"+".$modelvoyage->Quotation->Customer->TermOfPayment."day")),
		)); ?>	
		<?php echo $form->error($model,'invoice_duedate'); ?> 
		
		</td>

		
		
		<td style="border-top: 1px solid #fff ;vertical-align:top;text-align:left;" colspan ='3'>		
		TOTAL
		</td>
		<td style="border-top: 1px solid #fff ;border-left: 1px solid #fff ;vertical-align:top;text-align:right;" >		
		<?php echo $GRAND_TOTAL;  ?>
		</td>
		
	</tr>


	</tbody>
	</table>
	</div>

	<font> 
	Jumlah Uang yang tercantum dalam faktur/invoice 
	adalah sesuai dengan pesanan kami dan merupakan hutang yang sah dan
	wajib dibayar kepada <?php echo nl2br(GeneralDB::getsettingGeneral('Company Name')->field_value); ?>.
	</font>
	<br>

	<font> 
	<i>(The invoice amount conforms to our order and is legal debt which is due for payment to <?php echo nl2br(GeneralDB::getsettingGeneral('Company Name')->field_value); ?>.)</i>
	</font>

	<br>
	<br>
	<br>

	<div style ="float:right;text-align:right;">
	Cikarang, 
	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'model'=>$model,
		//'language'=>Yii::app()->language='id',
		'attribute'=>'InvoiceDate',
		'options'=>array(
							'showAnim'=>'slideDown',
							'dateFormat'=>'yy-mm-dd',          
							'changeMonth'=>true,
							'changeYear'=>true,
							'showOn'=>'focus',
							'showButtonPanel' => true,
						),
		'htmlOptions'=>array(
		'style'=>'width:80px;',
		'value'=>date("Y-m-d")),
		)); ?>	
		<?php echo $form->error($model,'InvoiceDate'); ?> 
	<br>
	<br>
	<br>
	<br>
	<br>
	<?php //echo nl2br(GeneralDB::getsettinginvoice('Invoice Signature')->field_value); ?>
	<?php echo $form->textField($model,'print_sign_name',array('class'=>'span8','maxlength'=>50,'value'=>GeneralDB::getsettinginvoice('Invoice Signature')->field_value)); ?>
	<?php echo $form->error($model,'print_sign_name'); ?> 
	
	<?php echo $form->textField($model,'print_sign_position',array('class'=>'span5','maxlength'=>50,'value'=>'Director')); ?>
	<?php echo $form->error($model,'print_sign_position'); ?> 
	</div>
	<?php echo nl2br(GeneralDB::getsettingGeneral('Payment Info')->field_value); ?>



	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>


	<?php //echo $form->textFieldRow($model,'id_customer',array('class'=>'span5','maxlength'=>20,'value'=>$modelvoyage->Quotation->Customer->id_customer)); ?>

	<?php //echo $form->textFieldRow($model,'InvoiceDate',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'InvoiceNumber',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'print_CompanyName',array('rows'=>6, 'cols'=>50, 'class'=>'span8' , 'value'=>$modelvoyage->Quotation->Customer->CompanyName)); ?>

	<?php echo $form->hiddenField($model,'print_ShippingAddress',array('rows'=>6, 'cols'=>50, 'class'=>'span8', 'value'=>$modelvoyage->Quotation->Customer->Address)); ?>

	<?php echo $form->hiddenField($model,'print_NPWP',array('class'=>'span5','maxlength'=>150, 'value'=>$modelvoyage->Quotation->Customer->NPWP)); ?>

	<?php //echo $form->textFieldRow($model,'print_NoFakturPajak',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'print_top',array('class'=>'span5', 'value'=>$modelvoyage->Quotation->Customer->TermOfPayment)); ?>

	<?php //echo $form->textFieldRow($model,'sales_code',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'print_CustomerCode',array('class'=>'span5','maxlength'=>150, 'value'=>$modelvoyage->Quotation->Customer->id_customer)); ?>

	<?php //echo $form->textAreaRow($model,'invoice_description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php //echo $form->textAreaRow($model,'invoice_marks',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php //echo $form->textFieldRow($model,'invoice_termdelivery',array('class'=>'span5','maxlength'=>150)); ?>

	<?php //echo $form->textFieldRow($model,'invoice_duedate',array('class'=>'span5')); ?>

	<?php echo $form->hiddenField($model,'VoyageNumber',array('class'=>'span5','maxlength'=>100, 'value'=>$modelvoyage->VoyageNumber)); ?>

	<?php echo $form->hiddenField($model,'VoyageOrderNumber',array('class'=>'span5', 'value'=>$modelvoyage->VoyageOrderNumber)); ?>

	<?php echo $form->hiddenField($model,'VONo',array('class'=>'span5', 'value'=>$modelvoyage->VONo)); ?>

	<?php echo $form->hiddenField($model,'VOMonth',array('class'=>'span5', 'value'=>$modelvoyage->VOMonth)); ?>

	<?php echo $form->hiddenField($model,'VOYear',array('class'=>'span5', 'value'=>$modelvoyage->VOYear)); ?>

	<?php echo $form->hiddenField($model,'id_quotation',array('class'=>'span5','maxlength'=>20, 'value'=>$modelvoyage->id_quotation)); ?>

	<?php echo $form->hiddenField($model,'id_so',array('class'=>'span5','maxlength'=>20, 'value'=>$modelvoyage->id_so)); ?>

	<?php echo $form->hiddenField($model,'bussiness_type_order',array('class'=>'span5', 'value'=>$modelvoyage->bussiness_type_order)); ?>

	<?php echo $form->hiddenField($model,'BargingVesselTug',array('class'=>'span5', 'value'=>$modelvoyage->BargingVesselTug)); ?>

	<?php echo $form->hiddenField($model,'BargingVesselBarge',array('class'=>'span5', 'value'=>$modelvoyage->BargingVesselBarge)); ?>

	<?php echo $form->hiddenField($model,'BargeSize',array('class'=>'span5', 'value'=>$modelvoyage->BargeSize)); ?>

	<?php echo $form->hiddenField($model,'Capacity',array('class'=>'span5', 'value'=>$modelvoyage->Capacity)); ?>

	<?php echo $form->hiddenField($model,'TugPower',array('class'=>'span5', 'value'=>$modelvoyage->TugPower)); ?>

	<?php echo $form->hiddenField($model,'BargingJettyIdStart',array('class'=>'span5', 'value'=>$modelvoyage->BargingJettyIdStart)); ?>

	<?php echo $form->hiddenField($model,'BargingJettyIdEnd',array('class'=>'span5', 'value'=>$modelvoyage->BargingJettyIdEnd)); ?>

	<?php echo $form->hiddenField($model,'StartDate',array('class'=>'span5', 'value'=>$modelvoyage->StartDate)); ?>

	<?php echo $form->hiddenField($model,'EndDate',array('class'=>'span5', 'value'=>$modelvoyage->EndDate)); ?>

	<?php echo $form->hiddenField($model,'ActualStartDate',array('class'=>'span5', 'value'=>$modelvoyage->ActualStartDate)); ?>

	<?php echo $form->hiddenField($model,'ActualEndDate',array('class'=>'span5', 'value'=>$modelvoyage->ActualEndDate)); ?>

	<?php echo $form->hiddenField($model,'period_year',array('class'=>'span5', 'value'=>$modelvoyage->period_year)); ?>

	<?php echo $form->hiddenField($model,'period_month',array('class'=>'span5', 'value'=>$modelvoyage->period_month)); ?>

	<?php echo $form->hiddenField($model,'period_quartal',array('class'=>'span5', 'value'=>$modelvoyage->period_quartal)); ?>

	<?php echo $form->hiddenField($model,'Price',array('class'=>'span5', 'value'=>$modelvoyage->Price)); ?>

	<?php echo $form->hiddenField($model,'id_currency',array('class'=>'span5', 'value'=>$modelvoyage->id_currency)); ?>

	<?php echo $form->hiddenField($model,'change_rate',array('class'=>'span5', 'value'=>$modelvoyage->change_rate)); ?>

	<?php echo $form->hiddenField($model,'fuel_price',array('class'=>'span5', 'value'=>$modelvoyage->fuel_price)); ?>

	<?php //echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'created_user',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldRow($model,'ip_user_updated',array('class'=>'span5','maxlength'=>50)); ?>


<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Save' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>

</div>