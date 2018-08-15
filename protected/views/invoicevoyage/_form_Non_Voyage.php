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



	<?php //echo $form->textFieldRow($model,'id_voyage_order',array('class'=>'span5','maxlength'=>20)); ?>


	<div style ="float:right;text-align:right;">
	INVOICE 
	<br>
	<?php echo'No '.$form->textField($model,'InvoiceNumber',array('class'=>'span7','maxlength'=>50)); ?>
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
		echo '<b>'.$modelvoyage->Customer->CompanyName.'</b><br>';
		echo $modelvoyage->Customer->Address.'<br>';
		echo $modelvoyage->Customer->Address2.'<br>';
		echo 'Attn : '.$modelvoyage->attn.'<br>';
		?>
		<?php echo $form->hiddenField($model,'id_customer',array('class'=>'span5','maxlength'=>20,'value'=>$modelvoyage->Customer->id_customer)); ?>			
		</td>
		<td style="width:50%" colspan =3>
		DIKIRIM KE (SHIP TO)	
		<br>
		<?php 
		echo '<b>'.$modelvoyage->Customer->CompanyName.'</b><br>';
		echo $modelvoyage->Customer->Address.'<br>';
		echo $modelvoyage->Customer->Address2.'<br>';
		echo 'Attn : '.$modelvoyage->attn.'<br>';
		?>
		</td>
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;" colspan =2>		
		NPWP : <br>
		<?php echo $modelvoyage->Customer->NPWP.'<br>'; ?>
		
		</td>
		<td style="vertical-align:top;text-align:left;" colspan =2>		
		NO FAKTUR PAJAK (VAT NO) <br>
		<?php echo $form->textField($model,'print_NoFakturPajak',array('class'=>'span7','maxlength'=>50)); ?>
		<?php echo $form->error($model,'print_NoFakturPajak'); ?> 
		</td>

		<td style="vertical-align:top;text-align:left;" colspan =2>		
		SYARAT PEMBAYARAN (TERM OF PAYMENT) 	<br>
		<?php echo $modelvoyage->Customer->TermOfPayment.' Days<br>'; ?>
		
		</td>
		<td style="vertical-align:top;text-align:left;" colspan =3 >		
		NOMOR PELAYANAN (FLEET NUMBER) 	<br>
		<?php //echo $modelvoyage->VoyageNumber.'<br>';  // ini di coment?>
		
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;" colspan =3>		
		PELABUAH MUAT  (LOADING PORT) <br>
		<?php 
		if($modelvoyage->id_bussiness_type_order==250){
			echo $modelvoyage->JettyOrigin->JettyName.'<br>'; 
		}else{
			echo'<br>';
		}
		?>
		
		</td>
		<td style="vertical-align:top;text-align:left;" colspan =3>		
		PELABUAH BONGKAR  (UNLOADING PORT) <br>
		<?php 
		if($modelvoyage->id_bussiness_type_order==250){
			echo $modelvoyage->JettyDestination->JettyName.'<br>'; 
		}else{
			echo'<br>';
		}?>
		</td>

		
		
		</td>
		<td style="vertical-align:top;text-align:left;" colspan =3>		
		TANGGAL BERANGKAT (SAILING ON) 	<br>
		<?php /*$sailingon= InvoiceDB::getdatefromdatetime($modelvoyage->ActualStartDate);
		if ($sailingon == "-"){
			echo $sailingon;
		}else{
			echo InvoiceDB::getformatdate($sailingon) ;
		}
			*/
		?> 
		<br>
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;" colspan =2>		
		NO PESANAN (ORDER NO) <br>
		<?php echo $modelvoyage->QuotationNumber.'<br>'; ?>
		
		</td>
		<td style="vertical-align:top;text-align:left;" colspan =2>		
		TANGGAL ORDER (ORDER DATE) <br>
		<?php echo InvoiceDB::getformatdate($modelvoyage->QuotationDate) ?>
		<?php //echo $modelvoyage->Quotation->QuotationDate.'<br>'; ?>
		</td>

		<td style="vertical-align:top;text-align:left;" colspan =2>		
		KODE PENJUALAN (SALES CODE ) 	<br>
		<?php echo $form->textField($model,'sales_code',array('class'=>'span7','maxlength'=>50,'value'=>GeneralDB::getsettinginvoice('Sales Code')->field_value)); ?>
		<?php echo $form->error($model,'sales_code'); ?>
		
		</td>
		<td style="vertical-align:top;text-align:left;" colspan =3>		
		KODE PELANGGAN (CUSTOMER CODE) 	<br>
		<?php echo $modelvoyage->Customer->id_customer.'<br>'; ?>
		
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
		<?php 

		if($modelvoyage->id_bussiness_type_order==250){
			echo 'MV '.$modelvoyage->Mothervessel->MV_Name;
		}else{
			echo 'Time Charter';
		}

		?>
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
		'value'=>$modelvoyage->LoadingDate
		),
		)); ?>	
		<?php echo $form->error($model,'print_slot1'); ?> 

		 

		<?php /*$this->widget('zii.widgets.jui.CJuiDatePicker', array(
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
		<?php echo $form->error($model,'print_slot2'); */?> 

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
		Loading Port
		</td>
		<td style="vertical-align:top;text-align:center;" >		
		Destination
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




	<!-- isi dari mana -->
	<tr class="even" id='report_content'>
		<td style="vertical-align:top;text-align:left;" >		
		<?php 
		if($modelvoyage->id_bussiness_type_order!=250){
			echo $modelvoyage->VesselTug->VesselName ;
		}?>
		</td>
		<td style="vertical-align:top;text-align:left;" >		
		<?php 
		if($modelvoyage->id_bussiness_type_order!=250){
			echo $modelvoyage->VesselBarge->VesselName ;
		}?>
		</td>
		<td style="vertical-align:top;text-align:center;" >		
		<?php //echo $modelvoyage->JettyOrigin->Acronym ?>  <?php //echo $modelvoyage->JettyDestination->Acronym //ini kalo time charter ga ada?>
		<?php 
		if($modelvoyage->id_bussiness_type_order==250){
			echo $modelvoyage->JettyOrigin->JettyName ;
		}?> 
		</td>
		<td style="vertical-align:top;text-align:center;" >		
		<?php //echo InvoiceDB::getformatdatetime($modelvoyage->ActualStartDate) ?>
		<?php 
		if($modelvoyage->id_bussiness_type_order==250){
			echo $modelvoyage->JettyDestination->JettyName ;
		}?> 
		</td>

		<td style="border-top: 1px solid #fff ;vertical-align:top;text-align:center;" >		
		<?php 
		if($modelvoyage->id_bussiness_type_order==250){
			echo NumberAndCurrency::formatNumber($modelvoyage->TotalQuantity).' MT'; 
		}else{
			echo NumberAndCurrency::formatNumber($modelvoyage->TotalQuantity).' Unit'; 
		}
		?> 
		</td>

		<td style="border-top: 1px solid #fff ;vertical-align:top;text-align:left;" >		
		<?php 
		
			echo $modelvoyage->Currency->currency ;
		?>  
		</td>
		<td style="border-top: 1px solid #fff ;border-left: 1px solid #fff;vertical-align:top;text-align:right;" >		
		<?php
		if($modelvoyage->id_bussiness_type_order==250){
		 	echo NumberAndCurrency::formatCurrency($modelvoyage->QuantityPrice) ;
		 }else{
		 	echo NumberAndCurrency::formatCurrency($modelvoyage->TCPrice) ;
		 }
		?> 
		</td>
		<td style="border-top: 1px solid #fff ;vertical-align:top;text-align:left;" >		
		<?php 
			echo $modelvoyage->Currency->currency ;
		?>  
		</td>
		

		<td style="border-top: 1px solid #fff ;border-left: 1px solid #fff;vertical-align:top;text-align:right;" >		
		<?php //echo NumberAndCurrency::formatCurrency($modelvoyage->Capacity * $modelvoyage->Price)  ?>
		<?php 
		if($modelvoyage->id_bussiness_type_order==250){
			echo NumberAndCurrency::formatCurrency($modelvoyage->total_price) ;
		}else{
			echo NumberAndCurrency::formatCurrency($modelvoyage->TCPrice) ;
		}
		 ?>
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
		<?php 
		
			echo '<center>'.$modelvoyage->Currency->currency.'</center><br>'; 
		?>
		</td>

		
	
		<td style="vertical-align:top;text-align:left;" colspan ='3'>		
		JUMLAH (AMOUNT)
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:right;" >		
		<?php //echo NumberAndCurrency::formatCurrency($modelvoyage->Capacity * $modelvoyage->Price)  ?>
		<?php 
		if($modelvoyage->id_bussiness_type_order==250){
			echo NumberAndCurrency::formatCurrency($modelvoyage->total_price) ;
		}else{
			echo NumberAndCurrency::formatCurrency($modelvoyage->TCPrice) ;
		}
		 ?>
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
		<?php //echo NumberAndCurrency::formatCurrency(($modelvoyage->Capacity * $modelvoyage->Price) * (10/100))  ?>
		<?php 
		if($modelvoyage->id_bussiness_type_order==250){
			echo NumberAndCurrency::formatCurrency(($modelvoyage->total_price) * (10/100)) ;
		}else{
			echo NumberAndCurrency::formatCurrency(($modelvoyage->TCPrice) * (10/100)) ;
		}
		 ?>
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
		'value'=>InvoiceDB::adddate(date("Y-m-d"),"+".$modelvoyage->Customer->TermOfPayment."day")),
		)); ?>	
		<?php echo $form->error($model,'invoice_duedate'); ?> 
		
		</td>

		
		
		<td style="border-top: 1px solid #fff ;vertical-align:top;text-align:left;" colspan ='3'>		
		TOTAL
		</td>
		<td style="border-top: 1px solid #fff ;border-left: 1px solid #fff ;vertical-align:top;text-align:right;" >		
		<?php //echo NumberAndCurrency::formatCurrency(( ($modelvoyage->Capacity * $modelvoyage->Price) ) +  ( ($modelvoyage->Capacity * $modelvoyage->Price) * (10/100) ))  ?>
		<?php 
		if($modelvoyage->id_bussiness_type_order==250){
			echo NumberAndCurrency::formatCurrency(($modelvoyage->total_price) + (($modelvoyage->total_price) * (10/100)) )  ;
		}else{
			echo NumberAndCurrency::formatCurrency(($modelvoyage->TCPrice) + (($modelvoyage->TCPrice) * (10/100)) ) ;
		}
		 ?>
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

	<?php echo $form->hiddenField($model,'print_CompanyName',array('rows'=>6, 'cols'=>50, 'class'=>'span8' , 'value'=>$modelvoyage->Customer->CompanyName)); ?>

	<?php echo $form->hiddenField($model,'print_ShippingAddress',array('rows'=>6, 'cols'=>50, 'class'=>'span8', 'value'=>$modelvoyage->Customer->Address)); ?>

	<?php echo $form->hiddenField($model,'print_NPWP',array('class'=>'span5','maxlength'=>150, 'value'=>$modelvoyage->Customer->NPWP)); ?>

	<?php //echo $form->textFieldRow($model,'print_NoFakturPajak',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'print_top',array('class'=>'span5', 'value'=>$modelvoyage->Customer->TermOfPayment)); ?>

	<?php //echo $form->textFieldRow($model,'sales_code',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->hiddenField($model,'print_CustomerCode',array('class'=>'span5','maxlength'=>150, 'value'=>$modelvoyage->Customer->id_customer)); ?>

	<?php //echo $form->textAreaRow($model,'invoice_description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php //echo $form->textAreaRow($model,'invoice_marks',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php //echo $form->textFieldRow($model,'invoice_termdelivery',array('class'=>'span5','maxlength'=>150)); ?>

	<?php //echo $form->textFieldRow($model,'invoice_duedate',array('class'=>'span5')); ?>



	<?php //echo $form->hiddenField($model,'VoyageNumber',array('class'=>'span5','maxlength'=>100, 'value'=>$modelvoyage->VoyageNumber)); // tidak ada?>

	<?php //echo $form->hiddenField($model,'VoyageOrderNumber',array('class'=>'span5', 'value'=>$modelvoyage->VoyageOrderNumber)); ?>

	<?php echo $form->hiddenField($model,'VONo',array('class'=>'span5', 'value'=>$modelvoyage->NoOrder)); ?>

	<?php echo $form->hiddenField($model,'VOMonth',array('class'=>'span5', 'value'=>$modelvoyage->NoMonth)); ?>

	<?php echo $form->hiddenField($model,'VOYear',array('class'=>'span5', 'value'=>$modelvoyage->NoYear)); ?>

	<?php echo $form->hiddenField($model,'id_quotation',array('class'=>'span5','maxlength'=>20, 'value'=>$modelvoyage->id_quotation)); ?>



	<?php //echo $form->hiddenField($model,'id_so',array('class'=>'span5','maxlength'=>20, 'value'=>$modelvoyage->id_so)); // tidak ada ?>

	<?php echo $form->hiddenField($model,'bussiness_type_order',array('class'=>'span5', 'value'=>$modelvoyage->id_bussiness_type_order)); ?>



	<?php echo $form->hiddenField($model,'BargingVesselTug',array('class'=>'span5', 'value'=>$modelvoyage->BargingVesselTug)); ?>

	<?php echo $form->hiddenField($model,'BargingVesselBarge',array('class'=>'span5', 'value'=>$modelvoyage->BargingVesselBarge)); ?>



	<?php //echo $form->hiddenField($model,'BargeSize',array('class'=>'span5', 'value'=>$modelvoyage->BargeSize)); ?>

	<?php //echo $form->hiddenField($model,'Capacity',array('class'=>'span5', 'value'=>$modelvoyage->Capacity)); ?>

	<?php //echo $form->hiddenField($model,'TugPower',array('class'=>'span5', 'value'=>$modelvoyage->TugPower)); ?>



	<?php echo $form->hiddenField($model,'BargingJettyIdStart',array('class'=>'span5', 'value'=>$modelvoyage->BargingJettyIdStart)); ?>

	<?php echo $form->hiddenField($model,'BargingJettyIdEnd',array('class'=>'span5', 'value'=>$modelvoyage->BargingJettyIdEnd)); ?>

	<?php //echo $form->hiddenField($model,'StartDate',array('class'=>'span5', 'value'=>$modelvoyage->StartDate)); ?>

	<?php //echo $form->hiddenField($model,'EndDate',array('class'=>'span5', 'value'=>$modelvoyage->EndDate)); ?>



	<?php /*
	<?php echo $form->hiddenField($model,'ActualStartDate',array('class'=>'span5', 'value'=>$modelvoyage->ActualStartDate)); ?>

	<?php echo $form->hiddenField($model,'ActualEndDate',array('class'=>'span5', 'value'=>$modelvoyage->ActualEndDate)); ?>

	<?php echo $form->hiddenField($model,'period_year',array('class'=>'span5', 'value'=>$modelvoyage->period_year)); ?>

	<?php echo $form->hiddenField($model,'period_month',array('class'=>'span5', 'value'=>$modelvoyage->period_month)); ?>

	<?php echo $form->hiddenField($model,'period_quartal',array('class'=>'span5', 'value'=>$modelvoyage->period_quartal)); ?>
	*/
	?>
	<?php 
		if($modelvoyage->id_bussiness_type_order==250){
			$fielPrice='total_price' ;
		}else{
			$fielPrice='TCPrice' ;
		}
		 ?>

	<?php echo $form->hiddenField($model,'Price',array('class'=>'span5', 'value'=>$modelvoyage->$fielPrice)); ?>

	<?php echo $form->hiddenField($model,'id_currency',array('class'=>'span5', 'value'=>$modelvoyage->QuantityPriceCurency)); ?>

	<?php /*
	<?php echo $form->hiddenField($model,'change_rate',array('class'=>'span5', 'value'=>$modelvoyage->change_rate)); ?>

	<?php echo $form->hiddenField($model,'fuel_price',array('class'=>'span5', 'value'=>$modelvoyage->fuel_price)); ?>
	*/ 
	?>
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