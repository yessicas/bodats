
<style>

font input[type="checkbox"] {
margin: 0px 0 0 !important;
margin-top: 1px ;
line-height: normal;
}

.even .bordered_bottom{
	border-bottom: 1.2px solid #111 !important;
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

.even #no_border_bottom_to_left{
	border-bottom: 1px solid #fff !important;
	padding-left: -43px !important;
}

.even #no_border_bottom_and_right{
	border-bottom: 1px solid #fff !important;
	border-right: 1px solid #fff !important;
}

.even #no_border_bottom_and_top{
	border-top: 1px solid #fff !important;
	border-bottom: 1px solid #fff !important;
}


.even #border_bottom2{
	border-top: 1px solid #fff !important;
}

.even #no_border_bottom_and_top_to_left{
	border-top: 1px solid #fff !important;
	border-bottom: 1px solid #fff !important;
	padding-left: -43px !important;
}

.even #no_border_top_bottom{
	border-top: 1px solid #fff !important;
	border-bottom: 1px solid #fff !important;
}


/*.grid-view table.items tr#report_content td { height: 250px !important; }*/



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
<?php
if(!isset($_GET['mode'])){
	echo ReportViewDB::getlogoheader();
}
?>
<br>
<br>
<table width="100%" class="tabel_border_o" style="font-size: 9px;">
	<tr>
		<td style="width:80%;vertical-align:top;text-align:left;" ><font style="font-size:9px;">
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

	<td style="vertical-align:top;text-align:left;" colspan='3' class="no_border_right" id="no_border_bottom" >
	Kepada :
	</td>

	<td style="vertical-align:top;text-align:left;width:11%"  class="no_border_right" id="no_border_bottom">
	Vendor No :
	</td>

	<td style="vertical-align:top;text-align:left;"  id="no_border_bottom">
	<?php echo $model->Vendor->VendorNumber; ?>
	</td>

	<td style="vertical-align:top;text-align:left;width:10%"  class="no_border_right" id="no_border_bottom" >
	Nomor Order
	</td>
	<td style="vertical-align:top;text-align:left;"  class="no_border_right" id="no_border_bottom" >
	:
	</td>
	<td style="vertical-align:top;text-align:left;" colspan='1'  id="no_border_bottom" >
	<?php echo $model->PONumber; ?>
	</td>

	</tr>


	<tr class="even">


		<td style="vertical-align:top;text-align:left;" colspan='5'  id="no_border_bottom_and_top">
		<font style="font-size:13px; font-weight:bold;">
		<?php echo $model->Vendor->VendorName; ?></font>
		</td>


		<td style="vertical-align:top;text-align:left;"  id="no_border_bottom_and_top"  class="no_border_right">
		Tanggal
		</td>
		<td style="vertical-align:top;text-align:left;"  id="no_border_bottom_and_top"  class="no_border_right">
		:
		</td>
		<td style="vertical-align:top;text-align:left;" colspan='1'  id="no_border_bottom_and_top" >
		<?php echo Yii::app()->dateFormatter->format("d MMMM y",strtotime($model->PODate)) ?>
		</td>
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;" colspan='5'  id="no_border_top" >
		<?php echo $model->Vendor->Address; ?>
		</td>


		<td style="vertical-align:top;text-align:left;"  id="no_border_top" class="no_border_right" >
		Revisi No
		</td>
		<td style="vertical-align:top;text-align:left;"  id="no_border_top" class="no_border_right" >
		:
		</td>
		<td style="vertical-align:top;text-align:left;" colspan='1'  id="no_border_top">
		<?php echo $model->RevisionNumber ?>
		</td>
	</tr>


	<tr class="even">

		<td style="vertical-align:top;text-align:left; width:2px;" id="no_border_bottom_and_right"  >

		</td>

		<td style="vertical-align:top;text-align:left; width:20%;"  colspan='2' id="no_border_bottom_to_left"  >
		<font style="margin-left:-15px;">Pembayaran :</font>
		</td>

		<td style="vertical-align:top;text-align:left;" colspan='2'  id="no_border_bottom" >
		Jenis Barang :
		</td>


		<td style="vertical-align:top;text-align:left;"  colspan='3' id="no_border_bottom" >
		Tempat Penyerahan :
		</td>

	</tr>

	<tr class="even">

		<td style="vertical-align:top;text-align:left; width:2px;" id="no_border_bottom_and_right"  >

		</td>

		<td style="vertical-align:top;text-align:left;width:90px;"  colspan='2' id="no_border_bottom_and_top_to_left"  >
		<font style="margin-left:-15px;"><input type="checkbox"></font> Tunai
		</td>

		<td style="vertical-align:top;text-align:left;"  id="no_border_bottom_and_top"  class="no_border_right" >
		<input type="checkbox"> Bahan Bakar
		</td>

		<td style="vertical-align:top;text-align:left;"  id="no_border_bottom_and_top" >
		<input type="checkbox"> Consumable
		</td>


		<td style="vertical-align:top;text-align:left;"  colspan='3' rowspan='2' id="no_border_bottom_and_top"  >
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
		</td>


	</tr>

	<tr class="even">

		<td style="vertical-align:top;text-align:left; width:2px;" id="no_border_bottom_and_right"  >

		</td>

		<td style="vertical-align:top;text-align:left;width:90px;"  colspan='2' id="no_border_bottom_and_top_to_left"   >
		<font style="margin-left:-15px;"><input type="checkbox"></font> Kredit
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

	<?php
		$CURRENCY = '';
		$details = PurchaseOrderDetail::model()->findAllByAttributes(array('id_purchase_order'=>$model->id_purchase_order));
		foreach($details as $detail){
			$CURRENCY = $detail->Currency->currency;
			break;
		}
	?>
	<tr class="even">
		<td style="vertical-align:top;text-align:left;"  colspan='3' id="no_border_top" >
		Mata Uang  : <?php echo $CURRENCY; ?>
		</td>

		<td style="vertical-align:top;text-align:left;" colspan='2' id="no_border_top"   >
		Pembayaran : <?php echo $model->TermOfPayment ?>  hr setelah invoice diterima/masa sewa
		</td>

		<td style="vertical-align:top;text-align:left;"  colspan='3' id="no_border_top">
		Up : <?php echo $model->up; ?>
		</td>
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:center; width:2px;"  >
		No
		</td>

		<td style="vertical-align:top;text-align:center; width:25%;" colspan='2' class="bordered_bottom" >
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

		$page=0;
		$dataNo=0;
		$batas_page_pertama=30; // ini biar batas nya dinamis saat nama barang panjang dan dua baris belum ketemu
		$batas_page_selanjutnya=46; // ini biar batas nya dinamis saat nama barang panjang dan dua baris belum ketemu


		$TOTAL_SUM = 0;
		$CURRENCY = '';
		foreach($details as $detail){
			$no++;
			$total_amount = $detail->quantity*$detail->price_unit;
			$totola_amount_with_ppn = $total_amount+ (($detail->ppn)/100*$total_amount);
			$TOTAL_SUM = $TOTAL_SUM+ $totola_amount_with_ppn ;
			$CURRENCY = $detail->Currency->currency;

			/*// notes ( nomor PR tidak muncul di catatan )
			$noPO = ($detail->PurchaseRequest) ? $detail->PurchaseRequest->PRNumber : '-';
			if($detail->PurchaseRequest){

				if($detail->PurchaseRequest->dedicated_to=='VOYAGE'){
					$noVo=($detail->PurchaseRequest->VoyageOrder) ? $detail->PurchaseRequest->VoyageOrder->VoyageOrderNumber : '-' ;
				}else{
					$noVo='-';
				}
			}else{
				$noVo='-';
			}


			if($detail->notes==''){
				$notes = $noPO.' ; '.$noVo;
			}else{
				$notes = $detail->notes;
			}

			//end notes */
			//nomor PR muncul di catatan
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
			//end of nomor pr muncul di catatan


			if($no<$batas_page_pertama){
				echo '
					<tr class="even">
						<td style="vertical-align:top;text-align:center; width:2px;" id="no_border_bottom" >
						'.$no.'.
						</td>

						<td style="vertical-align:top;text-align:left; width:30%;" colspan="2" id="no_border_bottom_and_top" >
						'.PurchaseRequestDB::getItemDetailPR($detail).'
						</td>

						<td style="vertical-align:top;text-align:center;"  id="no_border_bottom" >
						'.NumberAndCurrency::formatNumberTwoDigitDec($detail->quantity).'
						</td>

						<td style="vertical-align:top;text-align:right;width:15%;" id="no_border_bottom" >
						'.NumberAndCurrency::formatCurrency($detail->price_unit).'
						</td>

						<td style="vertical-align:top;text-align:center;width:5%;" id="no_border_bottom" >
						'.$detail->ppn.' %
						</td>

						<td style="vertical-align:top;text-align:right;width:15%;" id="no_border_bottom" >
						'.NumberAndCurrency::formatCurrency($totola_amount_with_ppn).'
						</td>

						<td style="vertical-align:top;text-align:left;"  type="border_right_end" id="no_border_bottom">
						'.$notes.'
						</td>
					</tr>
				';
			}

			else if($no==$batas_page_pertama){
				echo '
				<tr class="even">
					<td style="vertical-align:top;text-align:center; width:2px;" >
					'.$no.'.
					</td>

					<td style="vertical-align:top;text-align:left; width:30%;" colspan="2" id="border_bottom2" >
					'.PurchaseRequestDB::getItemDetailPR($detail).'
					</td>

					<td style="vertical-align:top;text-align:center;"   >
					'.NumberAndCurrency::formatNumber($detail->quantity).'
					</td>

					<td style="vertical-align:top;text-align:right;width:15%;"  >
					'.NumberAndCurrency::formatCurrency($detail->price_unit).'
					</td>

					<td style="vertical-align:top;text-align:center;width:5%;" >
					'.$detail->ppn.' %
					</td>

					<td style="vertical-align:top;text-align:right;width:15%;" >
					'.NumberAndCurrency::formatCurrency($totola_amount_with_ppn).'
					</td>

					<td style="vertical-align:top;text-align:left;"  type="border_right_end" >
					'.$notes.'
					</td>
				</tr>
				';
			}

			else if($no>$batas_page_pertama){
				$page++;
				if($page==1){

						echo'
						<tr class="even">
							<td style="vertical-align:top;text-align:center; width:2px;"  >
							No
							</td>

							<td style="vertical-align:top;text-align:center; width:25%;" colspan="2" class="bordered_bottom" >
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
						</tr>';
						echo '
						<tr class="even">
							<td style="vertical-align:top;text-align:center; width:2px;" id="no_border_bottom" >
							'.$no.'.
							</td>

							<td style="vertical-align:top;text-align:left; width:30%;" colspan="2" id="no_border_bottom_and_top" >
							'.PurchaseRequestDB::getItemDetailPR($detail).'
							</td>

							<td style="vertical-align:top;text-align:center;"  id="no_border_bottom" >
							'.NumberAndCurrency::formatNumber($detail->quantity).'
							</td>

							<td style="vertical-align:top;text-align:right;width:15%;" id="no_border_bottom" >
							'.NumberAndCurrency::formatCurrency($detail->price_unit).'
							</td>

							<td style="vertical-align:top;text-align:center;width:5%;" id="no_border_bottom" >
							'.$detail->ppn.' %
							</td>

							<td style="vertical-align:top;text-align:right;width:15%;" id="no_border_bottom" >
							'.NumberAndCurrency::formatCurrency($totola_amount_with_ppn).'
							</td>

							<td style="vertical-align:top;text-align:left;"  type="border_right_end" id="no_border_bottom">
							'.$notes.'
							</td>
						</tr>
						';
				}else{

					if ($page % $batas_page_selanjutnya == 0 ){
						$dataNo=$page+$batas_page_pertama +1;
							echo '
							<tr class="even">
								<td style="vertical-align:top;text-align:center; width:2px;" >
								'.$no.'.
								</td>

								<td style="vertical-align:top;text-align:left; width:30%;" colspan="2" id="no_border_top" >
								'.PurchaseRequestDB::getItemDetailPR($detail).'
								</td>

								<td style="vertical-align:top;text-align:center;"  >
								'.NumberAndCurrency::formatNumber($detail->quantity).'
								</td>

								<td style="vertical-align:top;text-align:right;width:15%;" >
								'.NumberAndCurrency::formatCurrency($detail->price_unit).'
								</td>

								<td style="vertical-align:top;text-align:center;width:5%;" >
								'.$detail->ppn.' %
								</td>

								<td style="vertical-align:top;text-align:right;width:15%;" >
								'.NumberAndCurrency::formatCurrency($totola_amount_with_ppn).'
								</td>

								<td style="vertical-align:top;text-align:left;"  type="border_right_end">
								'.$notes.'
								</td>
							</tr>
							';
						}

					else if($no == $dataNo){
							echo'
							<tr class="even">
								<td style="vertical-align:top;text-align:center; width:2px;"  >
								No
								</td>

								<td style="vertical-align:top;text-align:center; width:25%;" colspan="2" class="bordered_bottom"  >
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
							</tr>';
							echo '
							<tr class="even">
								<td style="vertical-align:top;text-align:center; width:2px;" id="no_border_bottom" >
								'.$no.'.
								</td>

								<td style="vertical-align:top;text-align:left; width:30%;" colspan="2" id="no_border_bottom_and_top" >
								'.PurchaseRequestDB::getItemDetailPR($detail).'
								</td>

								<td style="vertical-align:top;text-align:center;"  id="no_border_bottom" >
								'.NumberAndCurrency::formatNumber($detail->quantity).'
								</td>

								<td style="vertical-align:top;text-align:right;width:15%;" id="no_border_bottom" >
								'.NumberAndCurrency::formatCurrency($detail->price_unit).'
								</td>

								<td style="vertical-align:top;text-align:center;width:5%;" id="no_border_bottom" >
								'.$detail->ppn.' %
								</td>

								<td style="vertical-align:top;text-align:right;width:15%;" id="no_border_bottom" >
								'.NumberAndCurrency::formatCurrency($totola_amount_with_ppn).'
								</td>

								<td style="vertical-align:top;text-align:left;"  type="border_right_end" id="no_border_bottom">
								'.$notes.'
								</td>
							</tr>
							';
						}
						else{
							echo '
							<tr class="even">
								<td style="vertical-align:top;text-align:center; width:2px;" id="no_border_bottom" >
								'.$no.'.
								</td>

								<td style="vertical-align:top;text-align:left; width:30%;" colspan="2" id="no_border_bottom_and_top" >
								'.PurchaseRequestDB::getItemDetailPR($detail).'
								</td>

								<td style="vertical-align:top;text-align:center;"  id="no_border_bottom" >
								'.NumberAndCurrency::formatNumber($detail->quantity).'
								</td>

								<td style="vertical-align:top;text-align:right;width:15%;" id="no_border_bottom" >
								'.NumberAndCurrency::formatCurrency($detail->price_unit).'
								</td>

								<td style="vertical-align:top;text-align:center;width:5%;" id="no_border_bottom" >
								'.$detail->ppn.' %
								</td>

								<td style="vertical-align:top;text-align:right;width:15%;" id="no_border_bottom" >
								'.NumberAndCurrency::formatCurrency($totola_amount_with_ppn).'
								</td>

								<td style="vertical-align:top;text-align:left;"  type="border_right_end" id="no_border_bottom">
								'.$notes.'
								</td>
							</tr>
							';
						}


					}
			}
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

	<?php
	$missData=15-count($details);
	$height=$missData * 15 ;
	?>
	<tr class="even">
		<?php echo '
		<td style="vertical-align:top;text-align:center;height:'.$height.'px !important; width:2px;" id="no_border_top" >
		</td>';
		?>

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
		<td style="vertical-align:top;text-align:left;" colspan='2' class="no_border_rightleft"  id="no_border_bottom">
		Delivery Date
		</td>

		<td style="vertical-align:top;text-align:left; width:30%;"  colspan ='2'  id="no_border_bottom" >
		<?php echo Timeanddate::getDisplayReportDate($model->DeliveryDateRangeStart)." - ".Timeanddate::getDisplayReportDate($model->DeliveryDateRangeEnd); ?>
		</td>

		<td style="vertical-align:top;text-align:left;width:15%;" class="no_border_right" >
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

		<td style="vertical-align:top;text-align:left;" id="no_border_bottom" class="no_border_right"  >
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
		<td style="vertical-align:top;text-align:left;" colspan='2' class="no_border_rightleft"  id="no_border_bottom_and_top">
		Proses Date
		</td>

		<td style="vertical-align:top;text-align:left; width:30%;"  colspan ='2'  id="no_border_bottom_and_top">
		</td>

		<td style="vertical-align:top;text-align:left;width:15%;" class="no_border_right" >
		Discount
		</td>

		<td style="vertical-align:top;text-align:center;width:5%;"  >
		<?php echo $model->discount; ?> %
		</td>

		<td style="vertical-align:top;text-align:right;width:15%;"  >
		<?php echo NumberAndCurrency::formatCurrency($DISCOUNT); ?>
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

		<td style="vertical-align:top;text-align:right;width:15%; font-weight:bold;">
		<?php echo NumberAndCurrency::formatCurrency($SUB_TOTAL2); ?>
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

		<td style="vertical-align:top;text-align:center;width:5%;"  >
		<?php echo $model->ppn; ?> %
		</td>

		<td style="vertical-align:top;text-align:right;width:15%;"  >
		<?php echo NumberAndCurrency::formatCurrency($PPN); ?>
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

		<td style="vertical-align:top;text-align:center;width:5%;"  >
		<?php echo $model->pbbkb; ?> %
		</td>

		<td style="vertical-align:top;text-align:right;width:15%;"  >
		<?php echo NumberAndCurrency::formatCurrency($PBBKB); ?>
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

		<td style="vertical-align:top;text-align:center;width:5%;" >
		<?php echo $CURRENCY; ?>
		</td>

		<td style="vertical-align:top;text-align:right;width:15%; font-weight:bold;"  >
		<?php echo NumberAndCurrency::formatCurrency($SUB_TOTAL3); ?>
		</td>

		<td style="vertical-align:top;text-align:left;" id="no_border_bottom" class="no_border_right" >

		</td>
	</tr>




	</tbody>
	</table>
	</div>

<br>

<font style ="font-size: 9px;">Demikian mohon konfirmasi secepatnya. Terima kasih.</font>
<br>
<br>
<table class="tabel_border_o" style="font-size: 9px;width:100%;">
	<tr>
			<td width ='80%'>
				<div>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menyetujui syarat diatas<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				Tanda Tangan & Cap Perusahaan
				</div>
			</td>


			<td width ='20%' style="vertical-align:top;text-align:center;">
				<div align = center>
				Hormat kami<br>
				<br>
				<br>
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
