
<style>

input[type="checkbox"] {
margin: 0px 0 0 !important;
margin-top: 1px \9;
line-height: normal;
}

.even .no_border_left{
	border-left: 1px solid #fff !important;
}


.even #no_border_top{
	border-top: 1px solid #fff !important;
}

.even #no_border_top_bottom{
	border-top: 1px solid #fff !important;
	border-bottom: 1px solid #fff !important;
}

.grid-view table.items tr#report_content td { height: 150px !important; }

.grid-view table.items tr.even td[type="border_right_end"] { border-right: 1px solid #dddddd !important; }

.grid-view table.items tr.even td[type="border_bottom_end"] { border-bottom: 1px solid #dddddd !important; }

.grid-view table.items tr.even td#border_bottom_end { border-bottom: 1px solid #dddddd !important; }

.table-bordered {
border: 1px solid #dddddd;
border-bottom: 1px solid #fff !important;
border-right: 1px solid #fff !important;
border-collapse: separate;
border-left: 0;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 0px !important;
}

.even .no_borderleft-on-tabel-o{
	border-left: 1px solid #fff !important;
}
</style>


<?php
$this->breadcrumbs=array(
	'Purchase Orders'=>array('index'),
	$model->id_purchase_order,
);


$this->menu=array(
//array('label'=>'Manage  Purchase Request','url'=>array('purchaserequest/admin')),
//array('label'=>'Purchase Request Appproved','url'=>array('purchaserequest/prapproved')),
//array('label'=>'Purchase Request Rejected','url'=>array('purchaserequest/prrejected')),
//array('label'=>'Purchase Order','url'=>array('purchaserequest/po')),

array('label'=>'Purchase Order','url'=>array('purchaseorder/po')),
array('label'=>'Purchase Request Appproved','url'=>array('purchaseorder/prapproved')),

array('label'=>'Update Purchase Order','url'=>array('purchaseorder/update','id'=>$model->id_purchase_request)),
array('label'=>'View Purchase Order','url'=>array('purchaseorder/view','id'=>$model->id_purchase_request)),
//array('label'=>'Delete PurchaseOrder','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_purchase_order),'confirm'=>'Are you sure you want to delete this item?')),

);

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
<h2>View Purchase Order #<?php echo $model->id_purchase_order; ?></h2>
<hr>
</div>

<table class="tabel_border_o" style="font-size: 12px;">

	<tr>
		<td style="width:80%;vertical-align:top;text-align:left;" >
		<?php echo nl2br(GeneralDB::getsettingGeneral('Invoice Header')->field_value); ?>
		</td>
		<td style="width:20%;vertical-align:top;text-align:center;">
		<font style="font-size:14px;">ORDER PEMBELIAN </font>
		<br>
		Purchase Order
		</td>
	</tr>
	</table>



	<div id="invoice-grid" class="grid-view">
	<table class="items table table-bordered table-condensed">
	<tbody>

	<tr class="even">

	<td style="vertical-align:top;text-align:left;" colspan='2' >	
	Kepada : 
	</td>

	<td style="vertical-align:top;text-align:left;"  class="no_border_left">	
	Vendor No : 
	</td>

	<td style="vertical-align:top;text-align:left;"  class="no_border_left">	
	<?php echo $model->Vendor->VendorNumber; ?>
	</td>

	<td style="vertical-align:top;text-align:left;" >	
	Nomor Order  
	</td>
	<td style="vertical-align:top;text-align:left;"  class="no_border_left">	
	: 
	</td>
	<td style="vertical-align:top;text-align:left;" colspan='2'  class="no_border_left" type="border_right_end">	
	<?php echo $model->PONumber; ?>
	</td>

	</tr>


	<tr class="even">

	<td style="vertical-align:top;text-align:left;" colspan='4'  id="no_border_top">	
	<?php echo $model->Vendor->VendorName; ?>
	</td>


	<td style="vertical-align:top;text-align:left;"  id="no_border_top">	
	Tanggal  
	</td>
	<td style="vertical-align:top;text-align:left;"  id="no_border_top"  class="no_border_left">	
	: 
	</td>
	<td style="vertical-align:top;text-align:left;" colspan='2'  id="no_border_top"  class="no_border_left"  type="border_right_end">	
	<?php echo Yii::app()->dateFormatter->format("d MMMM y",strtotime($model->PODate)) ?>
	</td>
	
	</tr>

	<tr class="even">

	<td style="vertical-align:top;text-align:left;" colspan='4'  id="no_border_top" >	
	<?php echo $model->Vendor->Address; ?>
	</td>


	<td style="vertical-align:top;text-align:left;"  id="no_border_top" >	
	Revisi No :
	</td>
	<td style="vertical-align:top;text-align:left;"  id="no_border_top"  class="no_border_left">	
	: 
	</td>
	<td style="vertical-align:top;text-align:left;" colspan='2'  id="no_border_top"  class="no_border_left " type="border_right_end">	
	<?php echo $model->RevisionNumber ?>
	</td>
	
	</tr>


	<tr class="even">

	<td style="vertical-align:top;text-align:left; width:5%;"  colspan='2'  >	
	Pembayaran :
	</td>

	<td style="vertical-align:top;text-align:left;" colspan='2'   >	
	Jenis Barang :
	</td>


	<td style="vertical-align:top;text-align:left;"  colspan='4' type="border_right_end">	
	Tempat Penyerahan :
	</td>
	
	
	</tr>

	<tr class="even">

	<td style="vertical-align:top;text-align:left;"  colspan='2' id="no_border_top" >	
	<input type="checkbox"> Tunai
	</td>

	<td style="vertical-align:top;text-align:left;width:20%"  id="no_border_top" >	
	<input type="checkbox"> Bahan Bakar
	</td>

	<td style="vertical-align:top;text-align:left;;width:20%"  id="no_border_top" class="no_border_left" >	
	<input type="checkbox"> Consumable
	</td>


	<td style="vertical-align:top;text-align:left;"  colspan='4' rowspan = '2' id="no_border_top" type="border_right_end">	
	<?php echo  nl2br($model->DeliveryPlace); ?>
	</td>
	
	
	</tr>

	<tr class="even">

	<td style="vertical-align:top;text-align:left;"  colspan='2' id="no_border_top" >	
	<input type="checkbox"> Kredit
	</td>

	<td style="vertical-align:top;text-align:left;"  id="no_border_top" >	
	<input type="checkbox"> Jasa
	</td>

	<td style="vertical-align:top;text-align:left;"  id="no_border_top" class="no_border_left" >	
	<input type="checkbox"> Other
	</td>

	<!--
	<td style="vertical-align:top;text-align:left;"  colspan='4'id="no_border_top" type="border_right_end">	
	PLG-TTB 
	</td>
	-->
	
	
	</tr>


	<tr class="even">

	<td style="vertical-align:top;text-align:left;"  id="no_border_top" colspan='2' >	
	Mata Uang  : <?php echo $model->Currency->currency; ?>
	</td>

	<td style="vertical-align:top;text-align:left;" colspan='2' id="no_border_top"  >	
	Pembayaran : <?php echo $model->TermOfPayment ?>  hr setelah invoice diterima/masa sewa
	</td>


	<td style="vertical-align:top;text-align:left;"  colspan='4' id="no_border_top" type="border_right_end">	
	Up : <?php echo $model->up; ?>
	</td>

	</tr>

	<tr class="even">

	<td style="vertical-align:top;text-align:center; width:5px;"  >	
	No
	</td>

	<td style="vertical-align:top;text-align:center; width:25%;" colspan='2' >	
	Nama Barang
	</td>

	<td style="vertical-align:top;text-align:center;"  >	
	Jumlah
	</td>

	<td style="vertical-align:top;text-align:center;width:15%;"  >	
	Harga Satuan 
	</td>

	<td style="vertical-align:top;text-align:center;width:5%;"  >	
	PPN
	</td>

	<td style="vertical-align:top;text-align:center;width:15%;"  >	
	Jumlah
	</td>

	<td style="vertical-align:top;text-align:center;" type="border_right_end" >	
	Catatan
	</td>


	</tr>


	<tr class="even">

	<td style="vertical-align:top;text-align:center; width:5px;"  >	
	01
	</td>

	<td style="vertical-align:top;text-align:left; width:25%;" colspan='2' >	
	<?php echo $model->PoCategory->category_name ?>
	</td>

	<td style="vertical-align:top;text-align:center;"  >	
	<?php echo $model->amount." ".$model->MetricPr->metric_name; ?>
	</td>

	<td style="vertical-align:top;text-align:right;width:15%;"  >	
	<?php 
	//echo $model->PriceUnit 
	echo Yii::app()->numberFormatter->formatCurrency($model->PriceUnit,"");
	?>
	</td>

	<td style="vertical-align:top;text-align:center;width:5%;"  >	
	<?php echo $model->ppn ?> %
	</td>

	<td style="vertical-align:top;text-align:right;width:15%;"  >	
	<?php 
	$ppn=($model->PriceUnit*$model->ppn)/100;
	$total=$ppn+$model->PriceUnit;
	echo Yii::app()->numberFormatter->formatCurrency($total,"");
	?>

	</td>

	<td style="vertical-align:top;text-align:left;"  type="border_right_end">	
	<?php echo $model->notes ?>
	</td>


	</tr>




	<tr class="even" id='report_content'>

	<td style="vertical-align:top;text-align:center; width:5px;" id="no_border_top" >	
	02
	</td>

	<td style="vertical-align:top;text-align:left; width:25%;" colspan='2' id="no_border_top">	
	Rincian Terlampir
	</td>

	<td style="vertical-align:top;text-align:center;" id="no_border_top" >	
	-
	</td>

	<td style="vertical-align:top;text-align:right;width:15%;" id="no_border_top" >	
	-
	</td>

	<td style="vertical-align:top;text-align:center;width:5%;" id="no_border_top" >	
	0 %
	</td>

	<td style="vertical-align:top;text-align:right;width:15%;" id="no_border_top" >	
	-
	</td>

	<td style="vertical-align:top;text-align:left;"  type="border_right_end" id="no_border_top" >	
	
	</td>


	</tr>

	<tr class="even" >

	<td style="vertical-align:top;text-align:left;" colspan='2' class="no_border_left">	
	Delivery Date
	</td>

	<td style="vertical-align:top;text-align:left; width:30%;"  colspan ='2' class="no_border_left" >	
	<?php echo $model->DeliveryDateRangeStart." - ".$model->DeliveryDateRangeEnd ?>
	</td>


	<td style="vertical-align:top;text-align:left;width:15%;"  >	
	Sub Total 
	</td>

	<td style="vertical-align:top;text-align:center;width:5%;" class="no_border_left" >	
	<?php echo $model->Currency->currency; ?>
	</td>

	<td style="vertical-align:top;text-align:right;width:15%;"  >	
	<?php 
	$ppn=($model->PriceUnit*$model->ppn)/100;
	$total=$ppn+$model->PriceUnit;
	echo Yii::app()->numberFormatter->formatCurrency($total,"");
	?>
	</td>

	<td style="vertical-align:top;text-align:left;" >	
	
	</td>


	</tr>


	<tr class="even" >

	<td style="vertical-align:top;text-align:left;" colspan='2' id="no_border_top" class="no_border_left">	
	Proses Date
	</td>

	<td style="vertical-align:top;text-align:left; width:30%;"  colspan ='2' id="no_border_top"  class="no_border_left">	
	
	</td>


	<td style="vertical-align:top;text-align:left;width:15%;"  >	
	Discount
	</td>

	<td style="vertical-align:top;text-align:center;width:5%;" class="no_border_left" >	
	0 %
	</td>

	<td style="vertical-align:top;text-align:right;width:15%;"  >	
	-
	</td>

	<td style="vertical-align:top;text-align:left;" id="no_border_top" >	
	
	</td>


	</tr>


	<tr class="even" >

	<td style="vertical-align:top;text-align:left;" colspan='2' id="no_border_top" class="no_border_left">	
	
	</td>

	<td style="vertical-align:top;text-align:left; width:30%;"  colspan ='2' id="no_border_top" class="no_border_left" >	
	
	</td>


	<td style="vertical-align:top;text-align:left;width:15%;"  >	
	Subtotal
	</td>

	<td style="vertical-align:top;text-align:center;width:5%;" class="no_border_left" >	
	
	</td>

	<td style="vertical-align:top;text-align:right;width:15%;"  >	
	<?php 
	$ppn=($model->PriceUnit*$model->ppn)/100;
	$total=$ppn+$model->PriceUnit;
	echo Yii::app()->numberFormatter->formatCurrency($total,"");
	?>
	</td>

	<td style="vertical-align:top;text-align:left;" id="no_border_top" >	
	
	</td >


	</tr>


	<tr class="even" >

	<td style="vertical-align:top;text-align:left;" colspan='2' id="no_border_top" class="no_border_left">	
	Catatan :
	</td>

	<td style="vertical-align:top;text-align:left; width:30%;"  colspan ='2' id="no_border_top" class="no_border_left">	
	
	</td>


	<td style="vertical-align:top;text-align:left;width:15%;"  >	
	PPN
	</td>

	<td style="vertical-align:top;text-align:center;width:5%;" class="no_border_left" >	
	0 %
	</td>

	<td style="vertical-align:top;text-align:right;width:15%;"  >	
	-
	</td>

	<td style="vertical-align:top;text-align:left;" id="no_border_top" >	
	
	</td>


	</tr>


	<tr class="even" >

	<td style="vertical-align:top;text-align:left;" colspan='4' id="no_border_top" class="no_border_left">	
	<?php echo $model->PONotes ?>
	</td>
	<td style="vertical-align:top;text-align:left;width:15%;"  >	
	PBBKB
	</td>

	<td style="vertical-align:top;text-align:center;width:5%;" class="no_border_left" >	
	0 %
	</td>

	<td style="vertical-align:top;text-align:right;width:15%;"  >	
	-
	</td>

	<td style="vertical-align:top;text-align:left;" id="no_border_top" >	
	
	</td>


	</tr>


	<tr class="even" >

	<td style="vertical-align:top;text-align:left;" colspan='2' id="no_border_top_bottom" class="no_border_left">	
	
	</td>

	<td style="vertical-align:top;text-align:left; width:30%;"  colspan ='2' id="no_border_top_bottom" class="no_border_left" >	
	
	</td>


	<td style="vertical-align:top;text-align:left;width:15%;" type="border_bottom_end" >	
	Total
	</td>

	<td style="vertical-align:top;text-align:center;width:5%;" class="no_border_left" type="border_bottom_end">	
	<?php echo $model->Currency->currency; ?>
	</td>

	<td style="vertical-align:top;text-align:right;width:15%;"  type="border_bottom_end" >	
	<?php 
	$ppn=($model->PriceUnit*$model->ppn)/100;
	$total=$ppn+$model->PriceUnit;
	echo Yii::app()->numberFormatter->formatCurrency($total,"");
	?>
	</td>

	<td style="vertical-align:top;text-align:left;" id="no_border_top" >	
	
	</td>


	</tr>




	</tbody>
	</table>
	</div>

<br>

<font style ="font-size: 12px;">Demikian mohon konfirmasi secepatnya. Terima kasih.</font>
<br>
<br>
<table  class = 'tabel_border_o' style ="font-size: 12px;">
				<tr>

			<td width ='33%'>
<div align = center>

Menyetujui syarat diatas<br>
<br>
<br>
<br>
<br>



Tanda Tangan & Cap Perusahaan
</div>
</td>

<td width ='33%'>
<div align = center>


</div>
</td>

				
				<td width ='33%'>
<div align = center>

Hormat kami<br>
<br>
<br>
<br>
<br>



<u><?php echo $model->SignName ?></u>

</div>

				</td>			

			</tr>
</table>


<div id="note" class="grid-view">
	<table class="items table table-bordered table-condensed" style ="width:40%; margin: 0px auto;">
	<tbody>
	<tr class="even" >
	<td style="vertical-align:top;" type="border_right_end" id="border_bottom_end" >
		<div align="center"> <?php echo nl2br(GeneralDB::getsettingGeneral('Company Name')->field_value); ?></div>
		<table class="tabel_border_o">

		<tr>

		<td style="width:40%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft-on-tabel-o">
		SAP NO  
		</td>
		<td style="width:5%;vertical-align:top;text-align:left;padding: 5px 0px;"  class="no_borderleft-on-tabel-o" >
		: 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;"  class="no_borderleft-on-tabel-o" >
		...................................
		</td>
		
		</tr>

		<tr>

		<td style="width:40%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft-on-tabel-o">
		PROFIT/COST CENTER  
		</td>
		<td style="width:5%;vertical-align:top;text-align:left;padding: 5px 0px;"  class="no_borderleft-on-tabel-o" >
		: 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;"  class="no_borderleft-on-tabel-o" >
		...................................
		</td>
		
		</tr>
		
		<tr>

		<td style="width:40%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft-on-tabel-o">
		ORDER 
		</td>
		<td style="width:5%;vertical-align:top;text-align:left;padding: 5px 0px;"  class="no_borderleft-on-tabel-o" >
		: 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;"  class="no_borderleft-on-tabel-o" >
		...................................
		</td>
		
		</tr>
		<tr>

		<td style="width:40%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft-on-tabel-o">
		ADVANCE NO 
		</td>
		<td style="width:5%;vertical-align:top;text-align:left;padding: 5px 0px;"  class="no_borderleft-on-tabel-o" >
		: 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;"  class="no_borderleft-on-tabel-o" >
		...................................
		</td>
		
		</tr>
		<tr>

		<td style="width:40%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft-on-tabel-o">
		REVERSAL FOR  
		</td>
		<td style="width:5%;vertical-align:top;text-align:left;padding: 5px 0px;"  class="no_borderleft-on-tabel-o" >
		: 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;"  class="no_borderleft-on-tabel-o" >
		...................................
		</td>
		
		</tr>

		<tr>

		<td style="width:40%;vertical-align:top;text-align:left;padding: 5px 0px;" class="no_borderleft-on-tabel-o">
		REVERSAL NO 
		</td>
		<td style="width:5%;vertical-align:top;text-align:left;padding: 5px 0px;"  class="no_borderleft-on-tabel-o" >
		: 
		</td>
		<td style="vertical-align:top;text-align:left;padding: 5px 0px;"  class="no_borderleft-on-tabel-o" >
		...................................
		</td>
		
		</tr>

		</table>



	</td>
	</tr>
	</tbody>
	</table>
	</div>

<br>
<br>


<?php /* $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_purchase_order',
		'id_purchase_request',
		'id_vendor',
		'up',
		'PONumber',
		'PODate',
		'PONo',
		'POMonth',
		'POYear',
		'RevisionNumber',
		'TermOfPayment',
		'id_po_category',
		'amount',
		'id_metric_pr',
		'PriceUnit',
		'id_currency',
		'ppn',
		'pph15',
		'pph23',
		'others',
		'dedicated_to',
		'id_vessel',
		'id_voyage_order',
		'notes',
		'DeliveryDateRangeStart',
		'DeliveryDateRangeEnd',
		'is_mutliple_item',
		'SignName',
		'PONotes',
		'created_user',
		'created_date',
		'ip_user_created',
		'Status',
),
)); 

*/

?>

	
<?php

$this->widget('bootstrap.widgets.TbButton', array(      

                        'label' =>Yii::t('strings','Print'),
                        'icon'=>'print white',
                        'type' => 'info',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        //'url'=>array('create'), 
                        //'size'=>'small',  
                        'url'=>array('purchaseorder/report','id'=>$model->id_purchase_request),
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
                        'url'=>array('purchaseorder/viewreport','id'=>$model->id_purchase_request),
                        'htmlOptions' => array(
                                               'target'=>'_blank',
                                                ),
                    
                        )); 


?>


