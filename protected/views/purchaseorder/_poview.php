
<style>

input[type="checkbox"] {
	margin: 0px 0 0 !important;
	margin-top: 1px ;
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
	color: black;
}

.even .no_borderleft-on-tabel-o{
	border-left: 1px solid #fff !important;
}
</style>

<table width="100%" class="tabel_border_o" style="font-size: 12px;">
	<tr>
		<td style="width:80%;vertical-align:top;text-align:left;" ><font style="font-size:11px;">
		<?php echo nl2br(GeneralDB::getsettingGeneral('Invoice Header')->field_value); ?></font>
		</td>
		<td style="width:20%;vertical-align:top;text-align:right;">
		<font style="font-size:14px; font-weight:bold;">ORDER PEMBELIAN</font>
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
		<font style="font-size:13px; font-weight:bold;">
		<?php echo $model->Vendor->VendorName; ?></font>
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

		<td style="vertical-align:top;text-align:left;width:15%"  id="no_border_top" >
		<input type="checkbox"> Bahan Bakar
		</td>

		<td style="vertical-align:top;text-align:left;;width:15%"  id="no_border_top" class="no_border_left" >
		<input type="checkbox"> Consumable
		</td>


		<td style="vertical-align:top;text-align:left;"  colspan='4' rowspan = '2' id="no_border_top" type="border_right_end">
		<?php echo  nl2br($model->DeliveryPlace); ?>
		<?php
		/*
			if($model->PurchaseOrderDetailOne){
				if($model->PurchaseOrderDetailOne->id_po_category == 10200){
					if ($model->PurchaseRequest->Vessel){
						echo '('.$model->PurchaseRequest->Vessel->VesselName.')';
					}
				}
			}
		*/
		?>
		<?php
		$details = PurchaseOrderDetail::model()->findAllByAttributes(array('id_purchase_order'=>$model->id_purchase_order));
		$listvessel = array();
		foreach($details as $detail){
			if(isset($detail->PurchaseRequest)){
				if(isset($detail->PurchaseRequest->Vessel)){
					if(!isset($listvessel[$detail->PurchaseRequest->id_vessel])){
						//echo '('.$detail->PurchaseRequest->Vessel->VesselName.')';
						$listvessel[$detail->PurchaseRequest->id_vessel] = $detail->PurchaseRequest->Vessel->VesselName;
					}
				}
			}
		}

		if(count($listvessel) > 0){
			echo "( ";
			foreach($listvessel as $ves){
				echo $ves.";";
			}
			echo " )";
		}
		?>
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

	<?php
		$CURRENCY = '';
		//$details = PurchaseOrderDetail::model()->findAllByAttributes(array('id_purchase_order'=>$model->id_purchase_order));
		foreach($details as $detail){
			$CURRENCY = $detail->Currency->currency;
			break;
		}
	?>
	<tr class="even">
		<td style="vertical-align:top;text-align:left;"  id="no_border_top" colspan='2' >
		Mata Uang  : <?php echo $CURRENCY; ?>
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

<?php /*
	<tr class="even">
		<td style="vertical-align:top;text-align:center; width:5px;"  >
		01
		</td>

		<td style="vertical-align:top;text-align:left; width:25%;" colspan='2' >
		<?php //echo $model->PoCategory->category_name ?>
		</td>

		<td style="vertical-align:top;text-align:center;"  >
		<?php //echo $model->amount." ".$model->MetricPr->metric_name; ?>
		</td>

		<td style="vertical-align:top;text-align:right;width:15%;"  >
		<?php
		//echo $model->PriceUnit
		//echo Yii::app()->numberFormatter->formatCurrency($model->PriceUnit,"");
		?>
		</td>

		<td style="vertical-align:top;text-align:center;width:5%;"  >
		<?php echo $model->ppn ?> %
		</td>

		<td style="vertical-align:top;text-align:right;width:15%;"  >
		<?php
		//$ppn=($model->PriceUnit*$model->ppn)/100;
		//$total=$ppn+$model->PriceUnit;
		//echo Yii::app()->numberFormatter->formatCurrency($total,"");
		?>

		</td>

		<td style="vertical-align:top;text-align:left;"  type="border_right_end">
		<?php echo $model->notes ?>
		</td>
	</tr>
*/
?>

	<?php
		//$details = PurchaseOrderDetail::model()->findAllByAttributes(array('id_purchase_order'=>$model->id_purchase_order));
		$no=0;
		$TOTAL_SUM = 0;
		$CURRENCY = '';

		foreach($details as $detail){
			$no++;
			$total_amount = $detail->quantity*$detail->price_unit;
			$totola_amount_with_ppn = $total_amount+ (($detail->ppn)/100*$total_amount);
			$TOTAL_SUM = $TOTAL_SUM+ $totola_amount_with_ppn ;
			$CURRENCY = $detail->Currency->currency;

			// notes
			//$noPR = ($detail->PurchaseRequest->PRNumber) ? $detail->PurchaseRequest->PRNumber : '-';
			//if($detail->PurchaseRequest){

			//	if($detail->PurchaseRequest->dedicated_to=='VOYAGE'){
			//		$noVo=($detail->PurchaseRequest->VoyageOrder) ? $detail->PurchaseRequest->VoyageOrder->VoyageOrderNumber : '-' ;
			//	}else{
			//		$noVo='AA';
			//	}
			//}else{
			//	$noVo='BB';

				//$noVo=$detail->PurchaseRequest->PRNumber;
			//}
			$idPR = ($detail->id_purchase_request_detail) ? $detail->id_purchase_request_detail : '-';
			if($detail->id_purchase_request_detail){
				$noPR= $detail->PurchaseRequestDetail->PurchaseRequest->PRNumber;
					if($detail->PurchaseRequestDetail->PurchaseRequest->dedicated_to=='VOYAGE'){
						$noVo= $detail->PurchaseRequestDetail->PurchaseRequest->VoyageOrder->VoyageOrderNumber;
					}
					else{
						$noVo='-';
					}
			}else{
				$noPR= $detail->PO->PurchaseRequest->PRNumber;
				if($detail->PO->PurchaseRequest->dedicated_to=='VOYAGE'){
					$noVo= $detail->PO->PurchaseRequest->VoyageOrder->VoyageOrderNumber;
				}
				else{
					$noVo='-';
				}
			}



			if($detail->notes==''){
				$notes = $noPR.' ; '.$noVo;
			}else{
				$notes = $detail->notes;
			}

			//end notes


			echo '
			<tr class="even">
				<td style="vertical-align:top;text-align:center; width:5px;"  >
				'.$no.'.
				</td>

				<td style="vertical-align:top;text-align:left; width:25%;" colspan="2" >
				'.PurchaseRequestDB::getItemDetailPR($detail).'
				</td>

				<td style="vertical-align:top;text-align:center;"  >
				'.NumberAndCurrency::formatNumberTwoDigitDec($detail->quantity).'&nbsp&nbsp'.$detail->metric.'
				</td>

				<td style="vertical-align:top;text-align:right;width:15%;"  >
				'.NumberAndCurrency::formatCurrency($detail->price_unit).'
				</td>

				<td style="vertical-align:top;text-align:center;width:5%;"  >
				'.$detail->ppn.' %
				</td>

				<td style="vertical-align:top;text-align:right;width:15%;"  >
				'.NumberAndCurrency::formatCurrency($totola_amount_with_ppn).'
				</td>

				<td style="vertical-align:top;text-align:left;"  type="border_right_end">
				'.$notes.'
				</td>
			</tr>
			';
		}
	?>

	<?php /*
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
	*/
	?>

	<tr class="even" id='report_content'>
		<td style="vertical-align:top;text-align:center; width:5px;" id="no_border_top" >
		</td>

		<td style="vertical-align:top;text-align:left; width:25%;" colspan='2' id="no_border_top">
		</td>

		<td style="vertical-align:top;text-align:center;" id="no_border_top" >
		</td>

		<td style="vertical-align:top;text-align:right;width:15%;" id="no_border_top" >
		</td>

		<td style="vertical-align:top;text-align:center;width:5%;" id="no_border_top" >
		</td>

		<td style="vertical-align:top;text-align:right;width:15%;" id="no_border_top" >
		</td>

		<td style="vertical-align:top;text-align:left;"  type="border_right_end" id="no_border_top" >
		</td>
	</tr>

	<tr class="even" >
		<td style="vertical-align:top;text-align:left;" colspan='2' class="no_border_left">
		Delivery Date
		</td>

		<td style="vertical-align:top;text-align:left; width:30%;"  colspan ='2' class="no_border_left" >
		<?php echo Timeanddate::getDisplayReportDate($model->DeliveryDateRangeStart)." - ".Timeanddate::getDisplayReportDate($model->DeliveryDateRangeEnd); ?>
		</td>

		<td style="vertical-align:top;text-align:left;width:15%;"  >
		Sub Total
		</td>

		<td style="vertical-align:top;text-align:center;width:5%;" class="no_border_left" >
		<?php //echo $model->Currency->currency; ?>
		</td>

		<td style="vertical-align:top;text-align:right;width:15%;"  >
		<?php
		echo NumberAndCurrency::formatCurrency($TOTAL_SUM);
		?>
		</td>

		<td style="vertical-align:top;text-align:left;" >
		</td>
	</tr>

	<?php
		//Perthiungan Total;
		$DISCOUNT = ($model->discount/100)*$TOTAL_SUM;
		$SUB_TOTAL2 = $TOTAL_SUM - $DISCOUNT;

		$PPN = ($model->ppn/100)*$SUB_TOTAL2;
		$PBBKB = ($model->pbbkb/100)*$SUB_TOTAL2;

		$SUB_TOTAL3 = $SUB_TOTAL2+$PPN+$PBBKB;
	?>
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
		<?php echo $model->discount; ?> %
		</td>

		<td style="vertical-align:top;text-align:right;width:15%;"  >
		<?php echo NumberAndCurrency::formatCurrency($DISCOUNT); ?>
		</td>

		<td style="vertical-align:top;text-align:left;" id="no_border_top" >

		</td>
	</tr>


	<tr class="even" >
		<td style="vertical-align:top;text-align:left;" colspan='2' id="no_border_top" class="no_border_left">

		</td>

		<td style="vertical-align:top;text-align:left; width:30%;"  colspan ='2' id="no_border_top" class="no_border_left" >

		</td>


		<td style="vertical-align:top;text-align:left;width:15%; font-weight:bold;"  >
		Sub Total
		</td>

		<td style="vertical-align:top;text-align:center;width:5%;" class="no_border_left" >

		</td>

		<td style="vertical-align:top;text-align:right;width:15%; font-weight:bold;">
		<?php echo NumberAndCurrency::formatCurrency($SUB_TOTAL2); ?>
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
		<?php echo $model->ppn; ?> %
		</td>

		<td style="vertical-align:top;text-align:right;width:15%;"  >
		<?php echo NumberAndCurrency::formatCurrency($PPN); ?>
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
		<?php echo $model->pbbkb; ?> %
		</td>

		<td style="vertical-align:top;text-align:right;width:15%;"  >
		<?php echo NumberAndCurrency::formatCurrency($PBBKB); ?>
		</td>

		<td style="vertical-align:top;text-align:left;" id="no_border_top" >
		</td>
	</tr>


	<tr class="even" >
		<td style="vertical-align:top;text-align:left;" colspan='2' id="no_border_top_bottom" class="no_border_left">
		</td>

		<td style="vertical-align:top;text-align:left; width:30%;"  colspan ='2' id="no_border_top_bottom" class="no_border_left" >
		</td>

		<td style="vertical-align:top;text-align:left;width:15%; font-weight:bold;" type="border_bottom_end" >
		Total
		</td>

		<td style="vertical-align:top;text-align:center;width:5%;" class="no_border_left" type="border_bottom_end">
		<?php echo $CURRENCY; ?>
		</td>

		<td style="vertical-align:top;text-align:right;width:15%; font-weight:bold;"  type="border_bottom_end" >
		<?php echo NumberAndCurrency::formatCurrency($SUB_TOTAL3); ?>
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
<table  width="100%" class = 'tabel_border_o' style ="font-size: 12px;">
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
	<table class="items table table-bordered table-condensed" style ="width:40%; margin: 0px auto;margin-top:-85px;">
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
