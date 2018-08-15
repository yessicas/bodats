
<style>

body {
    width:800px;
    font-family: "Calibri";
    font-size: 10px;
    color: #4F6B72;

}

input[type="checkbox"] {
margin: 0px 0 0 !important;
margin-top: 1px \9;
line-height: normal;
}

.even .no_border_left{
	border-left: 1px solid #fff !important;
}


.even .no_border_right{
	border-right: 1px solid #fff !important;
}

.even .no_border_rightleft{
	border-right: 1px solid #fff !important;
	border-left: 1px solid #fff !important;
}

.even #no_border_top{
	border-top: 1px solid #fff !important;
}

.even #no_border_bottom{
	border-bottom: 1px solid #fff !important;
}

.even #no_border_bottom_and_top{
	border-top: 1px solid #fff !important;
	border-bottom: 1px solid #fff !important;
}

.even #no_border_top_bottom{
	border-top: 1px solid #fff !important;
	border-bottom: 1px solid #fff !important;
}

.grid-view table.items tr#report_content td { height: 100px !important; }



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

.even .no_border-on-tabel{
	border-left: 1px solid #fff !important;
	border-right: 1px solid #fff !important;
	border-top: 1px solid #fff !important;
	border-bottom: 1px solid #fff !important;
}
</style>




<table class="tabel_border_o" style="font-size: 12px;width:100%;">

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

	<td style="vertical-align:top;text-align:left;" colspan='2'  class="no_border_right" id="no_border_bottom" >
	Kepada :
	</td>

	<td style="vertical-align:top;text-align:left;"  class="no_border_right" id="no_border_bottom" >
	Vendor No :
	</td>

	<td style="vertical-align:top;text-align:left;" id="no_border_bottom"  >
	<?php echo $model->Vendor->id_vendor; ?>
	</td>

	<td style="vertical-align:top;text-align:left;"  class="no_border_right" id="no_border_bottom" >
	Nomor Order
	</td>
	<td style="vertical-align:top;text-align:left;"  class="no_border_right" id="no_border_bottom" >
	:
	</td>
	<td style="vertical-align:top;text-align:left;" colspan='2'  id="no_border_bottom" >
	<?php echo $model->PONumber; ?>
	</td>

	</tr>


	<tr class="even">

	<td style="vertical-align:top;text-align:left;" colspan='4'  id="no_border_bottom_and_top"  >
	<?php echo $model->Vendor->VendorName; ?>
	</td>


	<td style="vertical-align:top;text-align:left;" id="no_border_bottom_and_top"  class="no_border_right">
	Tanggal
	</td>
	<td style="vertical-align:top;text-align:left;"  id="no_border_bottom_and_top"  class="no_border_right">
	:
	</td>
	<td style="vertical-align:top;text-align:left;" colspan='2'  id="no_border_bottom_and_top"    >
	<?php echo Yii::app()->dateFormatter->format("d MMMM y",strtotime($model->PODate)) ?>
	</td>

	</tr>

	<tr class="even">

	<td style="vertical-align:top;text-align:left;" colspan='4' id="no_border_top" >
	<?php echo $model->Vendor->Address; ?>
	</td>


	<td style="vertical-align:top;text-align:left;" id="no_border_top" class="no_border_right">
	Revisi No :
	</td>
	<td style="vertical-align:top;text-align:left;" id="no_border_top" class="no_border_right"  >
	:
	</td>
	<td style="vertical-align:top;text-align:left;" colspan='2'  id="no_border_top" >
	<?php echo $model->RevisionNumber ?>
	</td>

	</tr>


	<tr class="even">

	<td style="vertical-align:top;text-align:left; width:20%;"  colspan='2' id="no_border_bottom"  >
	Pembayaran :
	</td>

	<td style="vertical-align:top;text-align:left;" colspan='2'  id="no_border_bottom" >
	Jenis Barang :
	</td>


	<td style="vertical-align:top;text-align:left;"  colspan='4' id="no_border_bottom" >
	Tempat Penyerahan :
	</td>


	</tr>

	<tr class="even">

	<td style="vertical-align:top;text-align:left;width:90px;"  colspan='2' id="no_border_bottom_and_top"  >
	<input type="checkbox"> Tunai
	</td>

	<td style="vertical-align:top;text-align:left;"  id="no_border_bottom_and_top"  class="no_border_right" >
	<input type="checkbox"> Bahan Bakar
	</td>

	<td style="vertical-align:top;text-align:left;"  id="no_border_bottom_and_top" >
	<input type="checkbox"> Consumable
	</td>


	<td style="vertical-align:top;text-align:left;"  colspan='5' rowspan='2' id="no_border_bottom_and_top"  >
	<?php echo  nl2br($model->DeliveryPlace); ?>
	</td>


	</tr>

	<tr class="even">

	<td style="vertical-align:top;text-align:left;width:90px;"  colspan='2' id="no_border_bottom_and_top"   >
	<input type="checkbox"> Kredit
	</td>

	<td style="vertical-align:top;text-align:left;" id="no_border_bottom_and_top"   class="no_border_right">
	<input type="checkbox"> Jasa
	</td>

	<td style="vertical-align:top;text-align:left;"  id="no_border_bottom_and_top"   >
	<input type="checkbox"> Other
	</td>


	<!--
	<td style="vertical-align:top;text-align:left;"  colspan='4'id="no_border_top" type="border_right_end">
	PLG-TTB
	</td>
	-->


	</tr>


	<tr class="even">

	<td style="vertical-align:top;text-align:left;width:80px;"  colspan='2' id="no_border_top" >
	Mata Uang  : <?php echo $model->Currency->currency; ?>
	</td>

	<td style="vertical-align:top;text-align:left;" colspan='2' id="no_border_top" >
	Pembayaran : <?php echo $model->TermOfPayment ?>  hr setelah invoice diterima/masa sewa
	</td>


	<td style="vertical-align:top;text-align:left;"  colspan='4' id="no_border_top" >
	Up : <?php echo $model->up; ?>
	</td>

	</tr>

	<tr class="even">

	<td style="vertical-align:top;text-align:center; width:5px;"  >
	No
	</td>

	<td style="vertical-align:top;text-align:center; width:30%;" colspan='2' >
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

	<td style="vertical-align:top;text-align:center;"  >
	Catatan
	</td>


	</tr>


	<tr class="even">

	<td style="vertical-align:top;text-align:center; width:5px;" id="no_border_bottom" >
	01
	</td>

	<td style="vertical-align:top;text-align:left; width:30%;" colspan='2' id="no_border_bottom" >
	<?php echo $model->PoCategory->category_name ?>
	</td>

	<td style="vertical-align:top;text-align:center;" id="no_border_bottom" >
	<?php echo $model->amount." ".$model->MetricPr->metric_name; ?>
	</td>

	<td style="vertical-align:top;text-align:right;width:15%;" id="no_border_bottom" >
	<?php
	//echo $model->PriceUnit
	echo Yii::app()->numberFormatter->formatCurrency($model->PriceUnit,"");
	?>
	</td>

	<td style="vertical-align:top;text-align:center;width:5%;" id="no_border_bottom" >
	<?php echo $model->ppn ?> %
	</td>

	<td style="vertical-align:top;text-align:right;width:15%;" id="no_border_bottom" >
	<?php
	$ppn=($model->PriceUnit*$model->ppn)/100;
	$total=$ppn+$model->PriceUnit;
	echo Yii::app()->numberFormatter->formatCurrency($total,"");
	?>

	</td>

	<td style="vertical-align:top;text-align:left;" id="no_border_bottom" >
	<?php echo $model->notes ?>
	</td>


	</tr>




	<tr class="even" id='report_content'>

	<td style="vertical-align:top;text-align:center; width:5px;" id="no_border_top" >
	02
	</td>

	<td style="vertical-align:top;text-align:left; width:30%;" colspan='2' id="no_border_top" >
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

	<td style="vertical-align:top;text-align:left;"  id="no_border_top" >

	</td>


	</tr>

	<tr class="even" >

	<td style="vertical-align:top;text-align:left;" colspan='2' class="no_border_rightleft"  id="no_border_bottom"  >
	Delivery Date
	</td>

	<td style="vertical-align:top;text-align:left; width:30%;"  colspan ='2'  id="no_border_bottom" >
	<?php echo $model->DeliveryDateRangeStart." - ".$model->DeliveryDateRangeEnd ?>
	</td>


	<td style="vertical-align:top;text-align:left;width:15%;" class="no_border_right" >
	Sub Total
	</td>

	<td style="vertical-align:top;text-align:right;width:5%;" >
	<?php echo $model->Currency->currency; ?>
	</td>

	<td style="vertical-align:top;text-align:right;width:15%;"  >
	<?php
	$ppn=($model->PriceUnit*$model->ppn)/100;
	$total=$ppn+$model->PriceUnit;
	echo Yii::app()->numberFormatter->formatCurrency($total,"");
	?>
	</td>

	<td style="vertical-align:top;text-align:left;" id="no_border_bottom" class="no_border_right" >

	</td>


	</tr>


	<tr class="even" >

	<td style="vertical-align:top;text-align:left;" colspan='2' class="no_border_rightleft"  id="no_border_bottom_and_top" >
	Proses Date
	</td>

	<td style="vertical-align:top;text-align:left; width:30%;"  colspan ='2'  id="no_border_bottom_and_top">

	</td>


	<td style="vertical-align:top;text-align:left;width:15%;" class="no_border_right"  >
	Discount
	</td>

	<td style="vertical-align:top;text-align:right;width:5%;"  >
	0 %
	</td>

	<td style="vertical-align:top;text-align:right;width:15%;"  >
	-
	</td>

	<td style="vertical-align:top;text-align:left;" id="no_border_bottom" class="no_border_right"  >

	</td>


	</tr>


	<tr class="even" >

	<td style="vertical-align:top;text-align:left;" colspan='2' class="no_border_rightleft"  id="no_border_bottom_and_top">

	</td>

	<td style="vertical-align:top;text-align:left; width:30%;"  colspan ='2' id="no_border_bottom_and_top" >

	</td>


	<td style="vertical-align:top;text-align:left;width:15%;" class="no_border_right"  >
	Subtotal
	</td>

	<td style="vertical-align:top;text-align:right;width:5%;"  >

	</td>

	<td style="vertical-align:top;text-align:right;width:15%;"  >
	<?php
	$ppn=($model->PriceUnit*$model->ppn)/100;
	$total=$ppn+$model->PriceUnit;
	echo Yii::app()->numberFormatter->formatCurrency($total,"");
	?>
	</td>

	<td style="vertical-align:top;text-align:left;" id="no_border_bottom" class="no_border_right"  >

	</td >


	</tr>


	<tr class="even" >

	<td style="vertical-align:top;text-align:left;" colspan='2' class="no_border_rightleft"  id="no_border_bottom_and_top">
	Catatan :
	</td>

	<td style="vertical-align:top;text-align:left; width:30%;"  colspan ='2'  id="no_border_bottom_and_top">

	</td>


	<td style="vertical-align:top;text-align:left;width:15%;" class="no_border_right" >
	PPN
	</td>

	<td style="vertical-align:top;text-align:right;width:5%;"  >
	0 %
	</td>

	<td style="vertical-align:top;text-align:right;width:15%;"  >
	-
	</td>

	<td style="vertical-align:top;text-align:left;" id="no_border_bottom" class="no_border_right" >

	</td>


	</tr>


	<tr class="even" >

	<td style="vertical-align:top;text-align:left;" colspan='4' class="no_border_left"  id="no_border_bottom_and_top">
	<?php echo $model->PONotes ?>
	</td>
	<td style="vertical-align:top;text-align:left;width:15%;" class="no_border_right" >
	PBBKB
	</td>

	<td style="vertical-align:top;text-align:right;width:5%;"  >
	0 %
	</td>

	<td style="vertical-align:top;text-align:right;width:15%;"  >
	-
	</td>

	<td style="vertical-align:top;text-align:left;" id="no_border_bottom" class="no_border_right" >

	</td>


	</tr>


	<tr class="even" >

	<td style="vertical-align:top;text-align:left;" colspan='2' class="no_border_rightleft"  id="no_border_bottom_and_top">

	</td>

	<td style="vertical-align:top;text-align:left; width:30%;"  colspan ='2' id="no_border_bottom_and_top" >

	</td>


	<td style="vertical-align:top;text-align:left;width:15%;"  class="no_border_right" >
	Total
	</td>

	<td style="vertical-align:top;text-align:right;width:5%;" >
	<?php echo $model->Currency->currency; ?>
	</td>

	<td style="vertical-align:top;text-align:right;width:15%;"   >
	<?php
	$ppn=($model->PriceUnit*$model->ppn)/100;
	$total=$ppn+$model->PriceUnit;
	echo Yii::app()->numberFormatter->formatCurrency($total,"");
	?>
	</td>

	<td style="vertical-align:top;text-align:left;" id="no_border_bottom" class="no_border_right" >

	</td>


	</tr>




	</tbody>
	</table>
	</div>

<br>

<font style ="font-size: 12px;">Demikian mohon konfirmasi secepatnya. Terima kasih.</font>
<br>
<br>
<table class="tabel_border_o" style="font-size: 12px;width:100%;">
				<tr>

			<td width ='80%'>
<div>

Menyetujui syarat diatas<br>
<br>
<br>
<br>
<br>



Tanda Tangan & Cap Perusahaan
</div>
</td>




				<td width ='20%'>
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
	<td style="vertical-align:top;text-align:center;" >
	<?php echo nl2br(GeneralDB::getsettingGeneral('Company Name')->field_value); ?>
	</td>
	</tr>

	<tr class="even" >
	<td style="vertical-align:top;text-align:left;"  >

		<table class="items table" style ="width:100%;">


		<tr >

		<td style="vertical-align:top;text-align:left;width:120px;" class="no_border-on-tabel">
		SAP NO
		</td>
		<td style="vertical-align:top;text-align:left;"   class="no_border-on-tabel">
		:
		</td>
		<td style="vertical-align:top;text-align:left"  class="no_border-on-tabel">
		....................................................
		</td>

		</tr>

		<tr >

		<td style="vertical-align:top;text-align:left;" class="no_border-on-tabel">
		PROFIT/COST CENTER
		</td>
		<td style="vertical-align:top;text-align:left;"   class="no_border-on-tabel">
		:
		</td>
		<td style="vertical-align:top;text-align:left"  class="no_border-on-tabel">
		....................................................
		</td>

		</tr>
		<tr >

		<td style="vertical-align:top;text-align:left;" class="no_border-on-tabel">
		ORDER
		</td>
		<td style="vertical-align:top;text-align:left;"   class="no_border-on-tabel">
		:
		</td>
		<td style="vertical-align:top;text-align:left"  class="no_border-on-tabel">
		....................................................
		</td>

		</tr>
		<tr >

		<td style="vertical-align:top;text-align:left;" class="no_border-on-tabel">
		ADVANCE NO
		</td>
		<td style="vertical-align:top;text-align:left;"   class="no_border-on-tabel">
		:
		</td>
		<td style="vertical-align:top;text-align:left"  class="no_border-on-tabel">
		....................................................
		</td>

		</tr>
		<tr >

		<td style="vertical-align:top;text-align:left;" class="no_border-on-tabel">
		REVERSAL FOR
		</td>
		<td style="vertical-align:top;text-align:left;"   class="no_border-on-tabel">
		:
		</td>
		<td style="vertical-align:top;text-align:left"  class="no_border-on-tabel">
		....................................................
		</td>

		</tr>
		<tr >

		<td style="vertical-align:top;text-align:left;" class="no_border-on-tabel">
		REVERSAL NO
		</td>
		<td style="vertical-align:top;text-align:left;"   class="no_border-on-tabel">
		:
		</td>
		<td style="vertical-align:top;text-align:left"  class="no_border-on-tabel">
		....................................................
		</td>

		</tr>

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
