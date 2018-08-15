<style>

.grid-view table.items tr#report_content td { height: 200px !important; }

</style>

<?php
$this->breadcrumbs=array(
	'Invoice Voyages'=>array('index'),
	$model->id_invoice_voyage,
);

$this->menu=array(
	array('label'=>'Manage Non Voyage Invoice ', 'url'=>array('voyageorder/invoiceNotVoyage')),  
	array('label'=>'Update Non Voyage Invoice','url'=>array('invoicevoyage/updateInvoicenonVoyage','id'=>$model->id_quotation)),
	array('label'=>'View Non Voyage Invoice','url'=>array('invoicevoyage/viewNonVoyage','id'=>$model->id_quotation)),
	);
	
	
	//InvoiceDisplayer::displayTabInvoiceVoyage($this,3,"View Invoice", 'invoicevoyage/view/id/'.$model->id_voyage_order);
?>

<?php
if(Yii::app()->user->hasFlash('success')):?>

<div class = "animated flash">
	<?php
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'success' => array('closeText' => '&times;'), 

    ),
	));
	?>
</div>

<?php endif; ?>

<div id="content">
<h2>View Invoice Non Voyage</h2>
<hr>
</div>

<?php
/*
 $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_invoice_voyage',
		'id_voyage_order',
		'id_customer',
		'InvoiceDate',
		'InvoiceNumber',
		'print_CompanyName',
		'print_ShippingAddress',
		'print_NPWP',
		'print_NoFakturPajak',
		'print_top',
		'sales_code',
		'print_CustomerCode',
		'invoice_description',
		'invoice_marks',
		'invoice_termdelivery',
		'invoice_duedate',
		'VoyageNumber',
		'VoyageOrderNumber',
		'VONo',
		'VOMonth',
		'VOYear',
		'id_quotation',
		'id_so',
		'bussiness_type_order',
		'BargingVesselTug',
		'BargingVesselBarge',
		'BargeSize',
		'Capacity',
		'TugPower',
		'BargingJettyIdStart',
		'BargingJettyIdEnd',
		'StartDate',
		'EndDate',
		'ActualStartDate',
		'ActualEndDate',
		'period_year',
		'period_month',
		'period_quartal',
		'Price',
		'id_currency',
		'change_rate',
		'fuel_price',
		'created_date',
		'created_user',
		'ip_user_updated',
),
)); 

*/
?>



<div style ="float:right;text-align:right;">
	INVOICE 
	<br>
	<?php echo'No : '.$model->InvoiceNumber; ?>
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
		<?php //echo $form->hiddenField($model,'id_customer',array('class'=>'span5','maxlength'=>20,'value'=>$modelvoyage->Quotation->Customer->id_customer)); ?>			
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
		<?php echo $model->print_NoFakturPajak; ?>
		</td>

		<td style="vertical-align:top;text-align:left;" colspan =2>		
		SYARAT PEMBAYARAN (TERM OF PAYMENT) 	<br>
		<?php echo $modelvoyage->Customer->TermOfPayment.' Days<br>'; ?>
		
		</td>
		<td style="vertical-align:top;text-align:left;" colspan =3 >		
		NOMOR PELAYANAN (FLEET NUMBER) 	<br>
		<?php //echo $modelvoyage->VoyageNumber.'<br>'; // ini ga ada  ?>
		
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
		} */
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
		<?php echo $model->sales_code; ?>
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

		( <?php echo Yii::app()->dateFormatter->formatDateTime($model->print_slot1, 'medium', false)?> )  
		<?php //echo Yii::app()->dateFormatter->formatDateTime($model->print_slot2, 'medium', false)?>
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
		<?php //echo $modelvoyage->JettyOrigin->Acronym ?> <?php //echo $modelvoyage->JettyDestination->Acronym ?>
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
		<?php echo $model->invoice_marks; ?>
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
		<?php echo $model->invoice_termdelivery; ?>
		
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
		<?php echo $model->invoice_description; ?>
		
		</td>
		<td style="vertical-align:top;text-align:left;" colspan =2>		
		JATUH TEMPO (DUEDATE)  <br>
		<?php echo InvoiceDB::getformatdate($model->invoice_duedate) ?> 
		
		</td>

		
		
		<td style="border-top: 1px solid #fff ;vertical-align:top;text-align:left;" colspan ='3'>		
		TOTAL
		</td>
		<td style="border-top: 1px solid #fff ;border-left: 1px solid #fff ;vertical-align:top;text-align:right;" >		
		<?php //echo NumberAndCurrency::formatCurrency( ( ($modelvoyage->Capacity * $modelvoyage->Price) ) +  ( ($modelvoyage->Capacity * $modelvoyage->Price) * (10/100) ) ) ?>
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
	<?php echo nl2br(GeneralDB::getsettingGeneral('Payment Info')->field_value); ?>
	<br>
	<br>
	<br>
	<br>
	<br>



<?php

$this->widget('bootstrap.widgets.TbButton', array(      

                        'label' =>Yii::t('strings','Print'),
                        'icon'=>'print white',
                        'type' => 'info',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        //'url'=>array('create'), 
                        //'size'=>'small',  
                        'url'=>array('invoicevoyage/reportNonVoyage','id'=>$model->id_quotation),
                        'htmlOptions' => array(
                                               'target'=>'_blank',
                                                ),
                    
                        )); 

echo' ';

$this->widget('bootstrap.widgets.TbButton', array(      

                        'label' =>Yii::t('strings','View'),
                        'icon'=>'eye-open white',
                        'type' => 'warning',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        //'url'=>array('create'), 
                        //'size'=>'small',  
                        'url'=>array('invoicevoyage/viewreportNonVoyage','id'=>$model->id_quotation),
                        'htmlOptions' => array(
                                               'target'=>'_blank',
                                                ),
                    
                        )); 

echo' ';


$this->widget('bootstrap.widgets.TbButton', array(      

                        'label' =>Yii::t('strings','Print / View Without Header'),
                        'icon'=>'print white',
                        'type' => 'inverse',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        //'url'=>array('create'), 
                        //'size'=>'small',  
                        'url'=>array('invoicevoyage/reportNonVoyage','id'=>$model->id_quotation,'mode'=>'noheader'),
                        'htmlOptions' => array(
                                               'target'=>'_blank',
                                                ),
                    
                        )); 

echo' ';

$this->widget('bootstrap.widgets.TbButton', array(      

                        'label' =>Yii::t('strings','Print Faktur Pajak'),
                        'icon'=>'print white',
                        'type' => 'info',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        //'url'=>array('create'), 
                        //'size'=>'small',  
                        'url'=>array('invoicevoyage/printfakturNonVoyage','id'=>$model->id_quotation),
                        'htmlOptions' => array(
                                               'target'=>'_blank',
                                                ),
                    
                        )); 


echo' ';

$this->widget('bootstrap.widgets.TbButton', array(      

                        'label' =>Yii::t('strings','View Faktur Pajak'),
                        'icon'=>'eye-open white',
                        'type' => 'warning',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        //'url'=>array('create'), 
                        //'size'=>'small',  
                        'url'=>array('invoicevoyage/viewfakturNonVoyage','id'=>$model->id_quotation),
                        'htmlOptions' => array(
                                               'target'=>'_blank',
                                                ),
                    
                        )); 

?>


