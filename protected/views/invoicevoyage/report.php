<style>
body {
    width:800px; 
    font-family: "Calibri";
    font-size: 10px;
   /* color: #4F6B72;*/
     color: black;
}


.even .no_border{
	border-right: 1px solid #fff !important;
}

.even #no_border{
	border-bottom: 1px solid #fff !important;
}

.even .no_borderright{
	border-right: 1px solid #fff !important;
}

.even .no_borderleft{
	border-left: 1px solid #fff !important;
}

.even #no_borderup{
	border-top: 1px solid #fff !important;
}


.even .allnoborder{
	border-top: 1px solid #fff !important;
	border-bottom: 1px solid #fff !important;
	border-left: 1px solid #fff !important;
	border-right: 1px solid #fff !important;
}

.grid-view table.items tr#report_content td { height: 150px !important; }

</style>

<?php
if(!isset($_GET['mode'])){
	echo ReportViewDB::getlogoheader();
}

 ?>
<br>

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
	
	<table class="tabel_border_o">

	<tr>
		<td style="width:8%;vertical-align:top;text-align:left;" >
		<?php echo nl2br(GeneralDB::getsettingGeneral('Invoice Header')->field_value); ?>
		</td>
		<td style="width:20%;vertical-align:top;text-align:right;">
		INVOICE 
		<br>
		<?php echo'No : '.$model->InvoiceNumber; ?>
		</td>
	</tr>
	</table>
	
	<div id="invoice-grid" class="grid-view">
	<table class="items">
	

	<tr class="even">
		<td style="width:50%" colspan ='4'>
		INVOICE KEPADA (INVOICE TO)	
		<br>
		<?php 
		echo '<b>'.$modelvoyage->Quotation->Customer->CompanyName.'</b><br>';
		echo $modelvoyage->Quotation->Customer->Address.'<br>';
		echo $modelvoyage->Quotation->Customer->Address2.'<br>';
		echo 'Attn : '.$modelvoyage->Quotation->attn.'<br>';
		?>
		<?php //echo $form->hiddenField($model,'id_customer',array('class'=>'span5','maxlength'=>20,'value'=>$modelvoyage->Quotation->Customer->id_customer)); ?>			
		</td>
		<td style="width:50%" colspan ='5'>
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
		<td style="vertical-align:top;text-align:left;" colspan ='2'>		
		NPWP : <br>
		<?php echo $modelvoyage->Quotation->Customer->NPWP.'<br>'; ?>
		
		</td>
		<td style="vertical-align:top;text-align:left;" colspan ='2'>		
		NO FAKTUR PAJAK (VAT NO) <br>
		<?php echo $model->print_NoFakturPajak; ?>
		</td>

		<td style="vertical-align:top;text-align:left;" colspan ='2'>		
		SYARAT PEMBAYARAN (TERM OF PAYMENT) 	<br>
		<?php echo $modelvoyage->Quotation->Customer->TermOfPayment.' Days<br>'; ?>
		
		</td>
		<td style="vertical-align:top;text-align:left;" colspan ='3' >		
		NOMOR PELAYANAN (FLEET NUMBER) 	<br>
		<?php echo $modelvoyage->VoyageNumber.'<br>'; ?>
		
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;" colspan ='3'>		
		PELABUAH MUAT  (LOADING PORT) <br>
		<?php echo $modelvoyage->JettyOrigin->JettyName.'<br>'; ?>
		
		</td>
		<td style="vertical-align:top;text-align:left;" colspan ='3'>		
		PELABUAH BONGKAR  (UNLOADING PORT) <br>
		<?php echo $modelvoyage->JettyDestination->JettyName.'<br>'; ?>
		</td>

		
		
		
		<td style="vertical-align:top;text-align:left;" colspan ='3'>		
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
		<td style="vertical-align:top;text-align:left;" colspan ='2'>		
		NO PESANAN (ORDER NO) <br>
		<?php echo $modelvoyage->Quotation->QuotationNumber.'<br>'; ?>
		
		</td>
		<td style="vertical-align:top;text-align:left;" colspan ='2'>		
		TANGGAL ORDER (ORDER DATE) <br>
		<?php echo InvoiceDB::getformatdate($modelvoyage->Quotation->QuotationDate) ?>
		<?php //echo $modelvoyage->Quotation->QuotationDate.'<br>'; ?>
		</td>

		<td style="vertical-align:top;text-align:left;" colspan ='2'>		
		KODE PENJUALAN (SALES CODE ) 	<br>
		<?php echo $model->sales_code; ?>
		</td>
		<td style="vertical-align:top;text-align:left;" colspan ='3'>		
		KODE PELANGGAN (CUSTOMER CODE) 	<br>
		<?php echo $modelvoyage->Quotation->Customer->id_customer.'<br>'; ?>
		
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:center;" colspan ='4'>		
		PENJELASAN 	(DESCRIPTION) 
		</td>
		<td style="vertical-align:top;text-align:center;width:10%;" >		
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
		<td style="vertical-align:top;text-align:left;" colspan ='4'>		
		Coal barging  Transportation for slot 
		<?php //echo InvoiceDB::getdayfromdatetime($modelvoyage->ActualStartDate) ?>   <?php //echo InvoiceDB::getdayfromdatetime($modelvoyage->ActualEndDate) ?> <?php //echo InvoiceDB::getmonthandyearsfromdatetime($modelvoyage->ActualEndDate) ?> <!-- isi dari mana -->
		<?php echo Yii::app()->dateFormatter->formatDateTime($model->print_slot1, 'medium', false)?> -  
		<?php echo Yii::app()->dateFormatter->formatDateTime($model->print_slot2, 'medium', false)?>
		</td>
		<td style="vertical-align:top;text-align:center;"  id="no_border">		
		
		</td>
		<td style="vertical-align:top;text-align:center;" class="no_borderright" id="no_border">		
		
		
		</td>

		<td style="vertical-align:top;border-left: 1px solid #fff;text-align:center;" id="no_border" >		
		
		
		</td>

		<td style="vertical-align:top;text-align:center;" class="no_borderright" id="no_border">		
		
		</td>

		<td style="vertical-align:top;border-left: 1px solid #fff;text-align:center;" id="no_border">		
		
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

		<td style="vertical-align:top;text-align:center;" id="no_border">		
		
		</td>

		<td style="vertical-align:top;text-align:center;" class="no_borderright" id="no_border">		
		
		
		</td>

		<td style="vertical-align:top;text-align:center;" id="no_border">		
		
		
		</td>
		<td style="vertical-align:top;text-align:center;" class="no_borderright" id="no_border">		
		
		</td>

		<td style="vertical-align:top;text-align:center;" id="no_border">		
		
		</td>
		
	</tr>




	<!-- isi dari mana -->
	<tr class="even" id='report_content'>
		<td style="vertical-align:top;text-align:left;" >		
		<?php echo $modelvoyage->VesselTug->VesselName ?>
		</td>
		<td style="vertical-align:top;text-align:left;" >		
		<?php echo $modelvoyage->VesselBarge->VesselName ?>
		</td>
		<td style="vertical-align:top;text-align:center;" >		
		<?php echo $modelvoyage->JettyOrigin->Acronym ?> - <?php echo $modelvoyage->JettyDestination->Acronym ?>
		</td>
		<td style="vertical-align:top;text-align:center;" >		
		<?php echo InvoiceDB::getformatdatetime($modelvoyage->ActualStartDate) ?>
		</td>

		<td style="vertical-align:top;text-align:center;" >		
		<?php echo $CAPACITY; ?> MT
		</td>

		<td style="vertical-align:top;text-align:left;" class="no_borderright">		
		<?php echo $modelvoyage->Currency->currency ?>  
		</td>
		<td style="vertical-align:top;text-align:right;" >		
		<?php echo NumberAndCurrency::formatCurrency($modelvoyage->Price) ?> 
		</td>
		<td style="vertical-align:top;text-align:left;" class="no_borderright" >		
		<?php echo $modelvoyage->Currency->currency ?>  
		</td>
		

		<td style="vertical-align:top;text-align:right;" class="no_borderleft">		
		<?php echo $TOTAL_AMOUNT; ?>
		</td>
		
	</tr>
	<!-- end isi dari mana -->


	<tr class="even">
		<td style="vertical-align:top;text-align:left;" colspan ='3' rowspan ='2'>		
		SHIPPING MARKS  <br>
		<?php echo $model->invoice_marks; ?>
		</td>
		<td style="vertical-align:top;text-align:left;" colspan ='2'>		
		MATA UANG (CURRENCY) <br>
		<?php echo '<center>'.$modelvoyage->Currency->currency.'</center><br>'; ?>
		</td>

		
	
		<td style="vertical-align:top;text-align:left;" colspan ='3' id="no_border" class="no_borderright">		
		JUMLAH (AMOUNT)
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:right;" id="no_border" >		
		<?php $TOTAL_AMOUNT; ?>
		</td>
		
	</tr>

	<tr class="even">
		
		
		
		<td style="vertical-align:top;text-align:left;" colspan ='2'>		
		SYARAT PENGIRIMAN (TERM OF DELIVERY)  <br>
		<?php echo $model->invoice_termdelivery; ?>
		
		</td>

		
		
	
		<td style="vertical-align:top;text-align:left;" colspan ='3' class="allnoborder" >		
		PPN  (VAT) <br>
		10%
		</td>
		<td style="vertical-align:top;text-align:right;" id="no_border">		
		<?php echo $PPN;  ?>
		</td>
		
	</tr>


	<tr class="even">
		<td style="vertical-align:top;text-align:left;" colspan ='3' rowspan ='2'>		
		CATATAN LAIN (OTHER REMARKS)  <br>
		<?php echo $model->invoice_description; ?>
		
		</td>
		<td style="vertical-align:top;text-align:left;" colspan ='2' >		
		JATUH TEMPO (DUEDATE)  <br>
		<?php echo InvoiceDB::getformatdate($model->invoice_duedate) ?> 
		
		</td>

		
		
		<td style="vertical-align:top;text-align:left;" colspan ='3' id="no_borderup" class="no_borderright">		
		TOTAL
		</td>
		<td style="vertical-align:top;text-align:right;" id="no_borderup" >		
		<?php echo $GRAND_TOTAL; ?>
		</td>
		
	</tr>


	
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

	<table class="tabel_border_o">

	<tr>
		<td style="width:85%;vertical-align:top;text-align:left;" >
	<?php echo nl2br(GeneralDB::getsettingGeneral('Payment Info')->field_value); ?>
		</td>
		<td style="width:15%;vertical-align:top;text-align:right;">
	Cikarang, <?php echo InvoiceDB::getformatdate($model->InvoiceDate) ?> 
	
	<br>
	<br>
	<br>
	<br>
	<br>
	<?php //echo nl2br(GeneralDB::getsettinginvoice('Invoice Signature')->field_value); ?>
	<?php echo $model->print_sign_name.'<br>';
		  echo $model->print_sign_position;
	?>
	</div>
		</td>
	</tr>
	</table>