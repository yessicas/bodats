<h3 align ="center" style="margin-bottom:0px;">SURAT PERJANJIAN ANGKUTAN LAUT </h3>


<div align="center">
	<?php
		echo '<b> No. '.$model->SpalNumber.'</b>'; 
	?>
	</div align="center">

	<div id="perorangan-grid" class="grid-view" style="padding: 0px 0;">
	<table class="items table table-bordered table-condensed">
	<tbody>

		<tr class="even">
		<td style="vertical-align:top;text-align:left;width:50%" colspan=2>
		Perjanjian Angkutan Laut (untuk selanjutnya disebut sebagai "Perjanjian")
		ini dibuat pada tanggal	 <?php echo Yii::app()->dateFormatter->formatDateTime($model->SpalDate, 'medium', false) ?>	
		oleh dan antara :					
		</td>
		<td style="vertical-align:top;text-align:left;width:50%" colspan=2>					
		</td>
		
		</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;" class="no_border">
		1.					
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:left;width:48%">		
		PEMILIK KAPAL / OPERATOR :	<br>
		<?php echo nl2br(GeneralDB::getsettingGeneral('Office Address')->field_value); ?>
		</td>
		<td style="vertical-align:top;text-align:left;width:2%;" class="no_border">
		2.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		PENYEWA RUANG KAPAL / PEMILIK MUATAN :	<br>
		<?php echo $modelquo->Customer->CompanyName; ?> <br>
		<?php echo nl2br($modelquo->Customer->Address); ?>
		</td>
		
	</tr>


	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;" class="no_border">
		3.					
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:left;width:48%">		
		NAMA TUG BOAT / BARGE :	<br>
		<?php if($modelquo->IsSingleRoute==1){ ?>

		<?php if($modelquo->id_bussiness_type_order==250){ ?>
			Mother Vessel Boat : <?php echo $modelquo->Mothervessel->MV_Name; ?>
		<?php } ?> 

		<?php if($modelquo->id_bussiness_type_order!=250){ ?>
		Tug Boat : <?php 
					//echo $modelquo->VesselTug->VesselName 
					echo SPALDB::getTugName($modelquo->id_quotation)
					 ?> <br>
		Barge    : <?php 
					//echo $modelquo->VesselBarge->VesselName 
					echo SPALDB::getBargeName($modelquo->id_quotation)
					?> 

		<?php } ?>
		<?php } ?> 

		<?php if($modelquo->IsSingleRoute==0){ ?>

		Tug Boat : <?php 
					//echo $modelquo->VesselTug->VesselName 
					echo SPALDB::getTugNameReport($modelquo->id_quotation,$_GET['route'])
					 ?> <br>
		Barge    : <?php 
					//echo $modelquo->VesselBarge->VesselName 
					echo SPALDB::getBargeNameReport($modelquo->id_quotation,$_GET['route'])
					?> 

		<?php }?>
		</td>
		<td style="vertical-align:top;text-align:left;width:2%;" class="no_border">
		4.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		JENIS MUATAN :	<br>
		<?php echo $model->JenisMuatan ?>
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;" class="no_border">
		5.					
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:left;width:48%">		
		KESEDIAAN KAPAL UNTUK MUAT :	<br>
		Tanggal  : 
					<?php echo Yii::app()->dateFormatter->formatDateTime($model->LoadingDate1, 'medium', false)?>
					<?php 
					if($model->LoadingDate2 != "0000-00-00"){
						echo '-';
						echo Yii::app()->dateFormatter->formatDateTime($model->LoadingDate2, 'medium', false);
						
					}
					//echo Yii::app()->dateFormatter->formatDateTime($modelquo->QuotationDate, 'medium', false) ?>  
					<?php //echo Yii::app()->dateFormatter->formatDateTime($model->LoadingDate2, 'medium', false)?>
		</td>
		<td style="vertical-align:top;text-align:left;width:2%;" class="no_border">
		6.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		JUMLAH MUATAN :	<br>

		<?php if($modelquo->id_bussiness_type_order!=250){ ?>
		Deadfreight : <?php echo GeneralDB::getlastBigListQuotation($modelquo->id_quotation)->Capacity.' MT '; ?> 
		<?php } ?> 

		<?php echo $model->TotalMaxMuatan ?>			
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;" class="no_border">
		7.					
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:left;width:48%">		
		POSISI KAPAL SAAT INI : 	<br>
		<?php echo $model->PosisiKapal ?>
		</td>
		<td style="vertical-align:top;text-align:left;width:2%;" class="no_border">
		8.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		KONDISI ANGKUTAN :	<br>
		<?php echo $model->KondisiAngkutan ?>
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;" class="no_border">
		9.					
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:left;width:48%">		
		UANG TAMBANG : 	<br>
		<?php echo isset($model->CurrencyTambang->currency) ? $model->CurrencyTambang->currency : "".'. '.Yii::app()->numberFormatter->formatCurrency($model->UangTambang,""); ?> /MT<br>
		- Tidak termasuk PPN 10% <br>
		- Tidak termasuk Alur Fee	
		</td>
		<td style="vertical-align:top;text-align:left;width:2%;" class="no_border">
		10.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		PENGIRIMAN BARANG :	<br>
		<?php echo $model->PengirimanBarang; ?>
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;" class="no_border">
		11.					
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:left;width:48%">		
		PELABUHAN MUAT :	<br>
		<?php echo $modelquo->JettyOrigin->JettyName; ?>
		
		</td>
		<td style="vertical-align:top;text-align:left;width:2%;"class="no_border">
		12.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		PELABUHAN BONGKAR :	<br>
		<?php echo $modelquo->JettyDestination->JettyName; ?>

		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;" rowspan=2 class="no_border">
		13.					
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:left;width:48%" rowspan=2>		
		SISTEM PEMBAYARAN : 	<br>
		Selambat - lambatnya <?php echo $modelquo->Customer->TermOfPayment; ?> hari setelah invoice diterima 	
		</td>
		<td style="vertical-align:top;text-align:left;width:2%;" class="no_border">
		14.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		KEAGENAN KAPAL :	<br>
		<?php echo $model->KeagenanKapal; ?>
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;" class="no_border">
		15.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		LAMA HARI BONGKAR DAN MUAT :	<br>
		<?php echo $model->LamaHariBongkarMuat ?>  hari (prorata) 
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;" class="no_border">
		16.					
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:left;width:48%">		
		ASURANSI KAPAL :	<br>
		<?php echo $model->AsuransiKapal; ?>
		
		</td>
		<td style="vertical-align:top;text-align:left;width:2%;" class="no_border">
		17.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		ASURANSI BARANG :	<br>
		<?php echo $model->AsuransiBarang; ?>

		</td>
		
	</tr>


	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;" class="no_border">
		18.					
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:left;width:48%">		
		PEMBAYARAN DITRANSFER KE :	<br>
		<?php echo nl2br(GeneralDB::getsettingGeneral('Bank Account')->field_value); ?>
		
		
		</td>
		<td style="vertical-align:top;text-align:left;width:2%;" class="no_border">
		19.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		DEMMURAGE (DENDA KETERLAMBATAN MUAT DAN BONGKAR) :	<br>
		<?php echo isset($model->CurrencyDemurage->currency) ? $model->CurrencyDemurage->currency:"".'. '.Yii::app()->numberFormatter->formatCurrency($model->DemurageCost,""); ?> / hari (pro rata) Tidak termasuk PPN 10%.

		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;" class="no_border">
		20.					
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:left;width:48%" colspan=3>		
		SYARAT-SYARAT DAN TAMBAHAN YANG DISETUJUI BERSAMA	<br>
		1. Penyusutan muatan selama dalam pelayaran menjadi tanggung jawab Pemilik Barang	<br>										
		2. N.O.R diberlakukan 1 x 24 jam setelah informasi kedatangan kapal di Pelabuhan Muat / Bongkar diinformasikan oleh agen kapal <br>											
		3. Tertundanya keberangkatan akibat legalitas dokumen dihitung Demmurage <br>											
		4. SPAL ini berlaku apabila point 13 telah dilaksanakan	<br>							
		5. Loading dan unloading muatan ditanggung pemilik barang			<br>								
		6. Jika terjadi kelebihan muatan atas kapasitas maksimum yang disebutkan dalam poin 6 perjanjian ini maka segala kerugian yang timbul											
		akan menjadi tanggung jawab penuh penyewa tongkang	<br>										
		7. Jika terjadi air surut pada saat kapal menunggu untuk sandar, proses pemuatan, dan perjalanan maka kami akan membebankan biaya 											
		demurrage faktor cuaca sesuai besaran demurrage yang kami tagihkan per harinya dengan memperhitungkan kedalam laytime(lihat poin 15 & 19) <br>											
		8. Pencharter wajib menyediakan assist tug baik di tempat muat ataupun bongkar apabila diperlukan dan segala biaya yang timbul akan menjadi											
		beban pihak pencharter				<br>							
		9. Biaya atas pengamanan cargo yang timbul, menjadi beban pencharter.	<br>										

		</td>

		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;" class="no_border">
		21.					
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:left;width:48%" colspan=3>		
		PERSELISIHAN	<br>		
		Akan diselesaikan secara musyawarah bersama dan apabila tidak terdapat kesepakatan maka kedua belah pihak										
		setuju untuk diselesaikan di Pengadilan Negeri banjarmasin										

		</td>
	
	</tr>

	<tr class="even">
		<td  colspan=4>		
		Demikian Perjanjian Angkutan Laut ini dibuat, setelah dibaca dan disetujui bersama ditandatangani dalam rangkap 2 (dua)										
		bermeterai cukup dan masing-masing mempunyai kekuatan hukum yang sama.													
		</td>
	
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:center;width:50%" colspan=2 class="no_border">
		<br>
		PEMILIK KAPAL / OPERATOR <br>
		PIHAK PERTAMA <br>
		<?php echo nl2br(GeneralDB::getsettingGeneral('Official Signature')->field_value); ?>
		
		
		<br>
		<br>
		<br>
		<br>

		<?php echo nl2br(GeneralDB::getsettingGeneral('Marketing Head')->field_value); ?>				
		</td>
		<td style="vertical-align:top;text-align:center;width:50%" colspan=2>
		<br>
		PENYEWA RUANG KAPAL <br>
		PIHAK KEDUA <br>
		<?php echo $modelquo->Customer->ContactName; ?> 
		
		<br>
		<br>
		<br>
		<br>
		<br>
		<?php echo $model->PihakKedua1 ?> 
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php echo $model->PihakKedua2 ?>					
		</td>
		
		</tr>


	</tbody>
	</table>
	</div>


