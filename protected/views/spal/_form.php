<div class="view">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'spal-form',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
)); ?>

<style>
.row-fluid [class*="span"]:first-child {
    margin-left: 2px;
    margin-top: 10px;
}
</style>

<?php echo $form->errorSummary($model); ?>

	<?php //echo $form->textFieldRow($model,'id_quotation',array('class'=>'span5')); ?>

	<div align="center" style="margin-bottom:-10px;">
	<?php 
	if($model->isNewRecord){
		//$dataformatnumber=NumberingDocumentDBSPAL::getFormatNumber($model,'id_spal','SpalNo','SpalMonth','SpalYear');

		//echo 'No.'.$form->textField($model,'SpalNumber',array('class'=>'span3','maxlength'=>32,'value'=>$dataformatnumber['NumberFormat'],'readonly'=>'readonly')); 
	
		//echo $form->hiddenField($model,'SpalNo',array('class'=>'span4','maxlength'=>32,'value'=>$dataformatnumber['NoOrder'],'readonly'=>'readonly')); 
		//echo $form->hiddenField($model,'SpalMonth',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDBSPAL::getMonthNow(),'readonly'=>'readonly')); 
		//echo $form->hiddenField($model,'SpalYear',array('class'=>'span4','maxlength'=>32,'value'=> NumberingDocumentDBSPAL::getYearNow(),'readonly'=>'readonly')); 
	


	}else {
		echo 'No. '.$form->textFieldRow($model,'SpalNumber',array('class'=>'span3','maxlength'=>32,'readonly'=>'readonly')); 
	}
	?>
	</div align="center">

	<div id="perorangan-grid" class="grid-view">
	<table class="items table table-bordered table-condensed">
	<tbody>

	<tr class="even">
		<td style="width:50%" colspan =4>
		Perjanjian Angkutan Laut (untuk selanjutnya disebut sebagai "Perjanjian")
		ini dibuat pada tanggal
		<br>						
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'model'=>$model,
		//'language'=>Yii::app()->language='id',
		'attribute'=>'SpalDate',
		'options'=>array(
							'showAnim'=>'slideDown',
							'dateFormat'=>'yy-mm-dd',          
							'changeMonth'=>true,
							'changeYear'=>true,
							'showOn'=>'focus',
							'showButtonPanel' => true,
						),
		'htmlOptions'=>array(
		'value'=>date("Y-m-d"),
		'style'=>'width:80px;margin-top: 10px;'),
		)); ?>	
		<br>
		<?php echo $form->error($model,'SpalDate'); ?> 
		oleh dan antara :						
		</td>

	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;">
		1.					
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:left;width:48%">		
		PEMILIK KAPAL / OPERATOR :	<br>
		<?php echo nl2br(GeneralDB::getsettingGeneral('Office Address')->field_value); ?>
		</td>
		<td style="vertical-align:top;text-align:left;width:2%;">
		2.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		PENYEWA RUANG KAPAL / PEMILIK MUATAN :	<br>
		<?php echo $modelquo->Customer->CompanyName; ?> <br>
		<?php echo $modelquo->Customer->Address; ?>
		</td>
		
	</tr>


	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;">
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

		<?php if($modelquo->IsSingleRoute==0){

				echo SPALDB::getRoute($modelquo->id_quotation);

		}
		?>




		</td>
		<td style="vertical-align:top;text-align:left;width:2%;">
		4.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		JENIS MUATAN :	<br>
		
		<?php
			//Jenis Muatan tergantung Type Ordernya
			$jenismuatan = BusinessTypeOrder::getJenisMuatan($modelquo);
		?>
		
		<?php echo $form->textField($model,'JenisMuatan',array('class'=>'span5','maxlength'=>250,'value'=>$jenismuatan)); ?>
		<?php echo $form->error($model,'JenisMuatan'); ?> 
		
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;">
		5.					
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:left;width:48%">		
		KESEDIAAN KAPAL UNTUK MUAT :	<br>
		Tanggal  : <?php //echo $modelquo->QuotationDate ?> <br>


		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'model'=>$model,
		//'language'=>Yii::app()->language='id',
		'attribute'=>'LoadingDate1',
		'options'=>array(
							'showAnim'=>'slideDown',
							'dateFormat'=>'yy-mm-dd',          
							'changeMonth'=>true,
							'changeYear'=>true,
							'showOn'=>'focus',
							'showButtonPanel' => true,
						),
		'htmlOptions'=>array(
		'value'=>$modelquo->QuotationDate,
		'style'=>'width:80px;margin-top: 10px;'),
		)); ?>	
		<?php echo $form->error($model,'LoadingDate1'); ?> 

		<font > - </font>

		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		'model'=>$model,
		//'language'=>Yii::app()->language='id',
		'attribute'=>'LoadingDate2',
		'options'=>array(
							'showAnim'=>'slideDown',
							'dateFormat'=>'yy-mm-dd',          
							'changeMonth'=>true,
							'changeYear'=>true,
							'showOn'=>'focus',
							'showButtonPanel' => true,
						),
		'htmlOptions'=>array(
		'value'=>$modelquo->QuotationDate,
		'style'=>'width:80px;margin-top: 10px;'),
		)); ?>	
		<?php echo $form->error($model,'LoadingDate2'); ?> 




		</td>
		<td style="vertical-align:top;text-align:left;width:2%;">
		6.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		JUMLAH MUATAN :	<br>

		<?php if($modelquo->id_bussiness_type_order!=250){ ?>
		Deadfreight : <?php echo GeneralDB::getlastBigListQuotation($modelquo->id_quotation)->Capacity.' MT '; ?>  <br>
		<?php } ?>

		<?php echo $form->textArea($model,'TotalMaxMuatan',array('class'=>'span9', 'rows'=>3, 'cols'=>150, 'maxlength'=>250,'value'=> GeneralDB::getsettingSpal('Max.Jumlah Muatan')->field_value)); ?>
		<?php echo $form->error($model,'TotalMaxMuatan'); ?> 			
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;">
		7.					
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:left;width:48%">		
		POSISI KAPAL SAAT INI : 	<br>
		<?php echo $form->textField($model,'PosisiKapal',array('class'=>'span5','maxlength'=>200)); ?>
		<?php echo $form->error($model,'PosisiKapal'); ?> 
		</td>
		<td style="vertical-align:top;text-align:left;width:2%;">
		8.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		KONDISI ANGKUTAN :	<br>
		<?php echo $form->textField($model,'KondisiAngkutan',array('class'=>'span5','maxlength'=>250,'value'=>GeneralDB::getsettingSpal('Kondisi Angkutan')->field_value)); ?>
		<?php echo $form->error($model,'KondisiAngkutan'); ?> 
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;">
		9.					
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:left;width:48%">		
		UANG TAMBANG : 	<br>
		<?php echo $form->textField($model,'UangTambang',array('class'=>'span5','maxlength'=>25)); ?>
		<?php echo $form->dropDownList($model,'id_currency_uang_tambang',CHtml::listData(Currency::model()->findAll(), 'id_currency', 'currency'),array('class'=>'span2'));?>
		<?php echo $form->error($model,'UangTambang'); ?> <br>
		- Tidak termasuk PPN 10%<br>
		- Tidak termasuk Alur Fee	
		</td>
		<td style="vertical-align:top;text-align:left;width:2%;">
		10.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		PENGIRIMAN BARANG :	<br>
		<?php echo $form->textField($model,'PengirimanBarang',array('class'=>'span5','maxlength'=>250,'value'=>GeneralDB::getsettingSpal('Pengiriman Barang')->field_value)); ?>
		<?php echo $form->error($model,'PengirimanBarang'); ?> 
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;">
		11.					
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:left;width:48%">		
		PELABUHAN MUAT :	<br>
		<?php echo $modelquo->JettyOrigin->JettyName; ?>
		
		</td>
		<td style="vertical-align:top;text-align:left;width:2%;">
		12.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		PELABUHAN BONGKAR :	<br>
		<?php echo $modelquo->JettyDestination->JettyName; ?>

		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;" rowspan=2>
		13.					
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:left;width:48%" rowspan=2>		
		SISTEM PEMBAYARAN : 	<br>
		Selambat - lambatnya <?php echo $modelquo->Customer->TermOfPayment; ?> hari setelah invoice diterima 	
		</td>
		<td style="vertical-align:top;text-align:left;width:2%;">
		14.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		KEAGENAN KAPAL :	<br>
		<?php echo $form->textField($model,'KeagenanKapal',array('class'=>'span7','maxlength'=>250,'value'=>GeneralDB::getsettingSpal('Keagenan Kapal')->field_value)); ?>
		<?php echo $form->error($model,'KeagenanKapal'); ?> 
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;">
		15.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		LAMA HARI BONGKAR DAN MUAT :	<br>
		<?php echo $form->textField($model,'LamaHariBongkarMuat',array('class'=>'span2','maxlength'=>4)); ?>
		<?php echo $form->error($model,'LamaHariBongkarMuat'); ?> <br>
		 hari (prorata) 
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;">
		16.					
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:left;width:48%">		
		ASURANSI KAPAL :	<br>
		<?php echo $form->textField($model,'AsuransiKapal',array('class'=>'span7','maxlength'=>250,'value'=>GeneralDB::getsettingSpal('Asuransi Kapal')->field_value)); ?>
		<?php echo $form->error($model,'AsuransiKapal'); ?> 
		
		</td>
		<td style="vertical-align:top;text-align:left;width:2%;">
		17.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		ASURANSI BARANG :	<br>
		<?php echo $form->textField($model,'AsuransiBarang',array('class'=>'span7','maxlength'=>250,'value'=>GeneralDB::getsettingSpal('Asuransi Barang')->field_value)); ?>
		<?php echo $form->error($model,'AsuransiBarang'); ?> 

		</td>
		
	</tr>


	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;">
		18.					
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:left;width:48%">		
		PEMBAYARAN DITRANSFER KE :	<br>
		<?php echo nl2br(GeneralDB::getsettingGeneral('Bank Account')->field_value); ?>
		
		
		</td>
		<td style="vertical-align:top;text-align:left;width:2%;">
		19.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		DEMMURAGE (DENDA KETERLAMBATAN MUAT DAN BONGKAR) :	<br>
		<?php echo $form->textField($model,'DemurageCost',array('class'=>'span5','maxlength'=>25)); ?>
		<?php echo $form->dropDownList($model,'id_currency_demurage_cost',CHtml::listData(Currency::model()->findAll(), 'id_currency', 'currency'),array('class'=>'span2'));?>
		<?php echo $form->error($model,'DemurageCost'); ?> <br>
		per hari (pro rata) Tidak termasuk PPN 10%.

		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;">
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
		<td style="vertical-align:top;text-align:left;width:2%;">
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
		<td colspan =2 style="vertical-align:top;text-align:center;">	
		<br>
		PEMILIK KAPAL / OPERATOR <br>
		PIHAK PERTAMA <br>
		<?php echo nl2br(GeneralDB::getsettingGeneral('Official Signature')->field_value); ?>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<?php echo nl2br(GeneralDB::getsettingGeneral('Marketing Head')->field_value); ?>
		</td>
		<td  colspan =2 style="border-left: 1px solid #fff ;vertical-align:top;text-align:center;">
		<br>
		PENYEWA RUANG KAPAL <br>
		PIHAK KEDUA <br>
		<?php echo $modelquo->Customer->ContactName; ?> 
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<?php echo $form->textField($model,'PihakKedua1',array('class'=>'span7','maxlength'=>250,'placeholder'=>'Pihak Kedua 1')); ?>
		<?php echo $form->error($model,'PihakKedua1'); ?> <br>
		<?php echo $form->textField($model,'PihakKedua2',array('class'=>'span7','maxlength'=>250,'placeholder'=>'Pihak Kedua 2')); ?>
		<?php echo $form->error($model,'PihakKedua2'); ?> <br>
		</td>
	</tr>

	</tbody>
	</table>
	</div>

	<?php //echo $form->textFieldRow($model,'SpalNumber',array('class'=>'span5','maxlength'=>64)); ?>

	<?php //echo $form->textFieldRow($model,'SpalNo',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'SpalMonth',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'SpalYear',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'SpalDate',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'JenisMuatan',array('class'=>'span5','maxlength'=>250)); ?>

	<?php // echo $form->textFieldRow($model,'TotalMaxMuatan',array('class'=>'span5','maxlength'=>250)); ?>

	<?php //echo $form->textFieldRow($model,'KondisiAngkutan',array('class'=>'span5','maxlength'=>250)); ?>

	<?php //echo $form->textFieldRow($model,'PengirimanBarang',array('class'=>'span5','maxlength'=>250)); ?>

	<?php //echo $form->textFieldRow($model,'UangTambang',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'DemurageCost',array('class'=>'span5')); ?>

	<?php //echo $form->textFieldRow($model,'KeagenanKapal',array('class'=>'span5','maxlength'=>250)); ?>

	<?php //echo $form->textFieldRow($model,'AsuransiKapal',array('class'=>'span5','maxlength'=>250)); ?>

	<?php //echo $form->textFieldRow($model,'AsuransiBarang',array('class'=>'span5','maxlength'=>250)); ?>

	<?php //echo $form->textFieldRow($model,'PihakKedua1',array('class'=>'span5','maxlength'=>250)); ?>

	<?php //echo $form->textFieldRow($model,'PihakKedua2',array('class'=>'span5','maxlength'=>250)); ?>

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