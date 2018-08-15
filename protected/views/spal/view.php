<?php
$this->breadcrumbs=array(
	'Spals'=>array('index'),
	$model->id_spal,
);

$this->menu=array(
//array('label'=>'List Spal','url'=>array('index')),
array('label'=>'Manage Agreement Document SPAL','url'=>array('spal/admin')),
//array('label'=>'Create Spal','url'=>array('create')),
array('label'=>'Update Agreement Document SPAL','url'=>array('spal/update','id'=>$model->id_quotation)),
array('label'=>'View Agreement Document SPAL','url'=>array('spal/view','id'=>$model->id_quotation)),
//array('label'=>'Delete Spal','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_spal),'confirm'=>'Are you sure you want to delete this item?')),
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

<?php echo $this->renderPartial('_report', array('model'=>$model,'modelquo'=>$modelquo)); ?>

<?php 
/*
<div id="content">
<h2>View SURAT PERJANJIAN ANGKUTAN LAUT #<?php echo $model->id_spal; ?></h2>
<hr>
</div>


<div align="center" style="font-weight:bold;">
	<?php
		echo ' No. '.$model->SpalNumber; 
	?>
	</div align="center">

	<div id="perorangan-grid" class="grid-view">
	<table class="items table table-bordered table-condensed">
	<tbody>

	<tr class="even">
		<td style="width:50%" colspan =2>
		Perjanjian Angkutan Laut (untuk selanjutnya disebut sebagai "Perjanjian")
		ini dibuat pada tanggal	 <?php echo Yii::app()->dateFormatter->formatDateTime($model->SpalDate, 'medium', false) ?>	
		oleh dan antara :						
		</td>
		<td style="width:50%" colspan =2>
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
		<?php echo nl2br($modelquo->Customer->Address); ?>
		</td>
		
	</tr>


	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;">
		3.					
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:left;width:48%">		
		NAMA TUG BOAT / BARGE :	<br>

		<?php if($modelquo->IsSingleRoute==1){ ?>

		Tug Boat : <?php 
					//echo $modelquo->VesselTug->VesselName 
					echo SPALDB::getTugName($modelquo->id_quotation)
					 ?> <br>
		Barge    : <?php 
					//echo $modelquo->VesselBarge->VesselName 
					echo SPALDB::getBargeName($modelquo->id_quotation)
					?> 

		<?php } ?> 

		<?php if($modelquo->IsSingleRoute==0){

				
				echo CHtml::beginForm(array('spal/view'),'get',array('target'=>"_blank")); 
				echo CHtml::hiddenField('id',$modelquo->id_quotation);
				echo SPALDB::getRoute($modelquo->id_quotation);


		}
		?>

		</td>
		<td style="vertical-align:top;text-align:left;width:2%;">
		4.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		JENIS MUATAN :	<br>
		<?php echo $model->JenisMuatan ?>
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;">
		5.					
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:left;width:48%">		
		KESEDIAAN KAPAL UNTUK MUAT :	<br>
		Tanggal  : <?php //echo Yii::app()->dateFormatter->formatDateTime($modelquo->QuotationDate, 'medium', false) ?> 
					<?php echo Yii::app()->dateFormatter->formatDateTime($model->LoadingDate1, 'medium', false)?> -  
					<?php echo Yii::app()->dateFormatter->formatDateTime($model->LoadingDate2, 'medium', false)?>
		<br>
		</td>
		<td style="vertical-align:top;text-align:left;width:2%;">
		6.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		JUMLAH MUATAN :	<br>
		Deadfreight : <?php echo NumberAndCurrency::formatNumber(GeneralDB::getlastBigListQuotation($modelquo->id_quotation)->Capacity).' MT '; ?> 
		<?php echo $model->TotalMaxMuatan ?>			
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;">
		7.					
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:left;width:48%">		
		POSISI KAPAL SAAT INI : 	<br>
		<?php echo $model->PosisiKapal ?>
		</td>
		<td style="vertical-align:top;text-align:left;width:2%;">
		8.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		KONDISI ANGKUTAN :	<br>
		<?php echo $model->KondisiAngkutan ?>
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;">
		9.					
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:left;width:48%">		
		UANG TAMBANG : 	<br>
		<?php echo isset($model->CurrencyTambang->currency) ? isset($model->CurrencyTambang->currency) : "" .'. '.Yii::app()->numberFormatter->formatCurrency($model->UangTambang,""); ?> /MT<br>
		- Tidak termasuk PPN 10% <br>
		- Tidak termasuk Alur Fee	
		</td>
		<td style="vertical-align:top;text-align:left;width:2%;">
		10.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		PENGIRIMAN BARANG :	<br>
		<?php echo $model->PengirimanBarang; ?>
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
		<?php echo $model->KeagenanKapal; ?>
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;">
		15.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		LAMA HARI BONGKAR DAN MUAT :	<br>
		<?php echo $model->LamaHariBongkarMuat ?>  hari (prorata) 
		</td>
		
	</tr>

	<tr class="even">
		<td style="vertical-align:top;text-align:left;width:2%;">
		16.					
		</td>
		<td style="border-left: 1px solid #fff ;vertical-align:top;text-align:left;width:48%">		
		ASURANSI KAPAL :	<br>
		<?php echo $model->AsuransiKapal; ?>
		
		</td>
		<td style="vertical-align:top;text-align:left;width:2%;">
		17.					
		</td>
		<td style="border-left: 1px solid #fff ; vertical-align:top;text-align:left;width:48%">		
		ASURANSI BARANG :	<br>
		<?php echo $model->AsuransiBarang; ?>

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
		<?php echo isset($model->CurrencyDemurage->currency) ? $model->CurrencyDemurage->currency : "".'. '.Yii::app()->numberFormatter->formatCurrency($model->DemurageCost,"") ?> / hari (pro rata) Tidak termasuk PPN 10%.

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
		<br>
		<?php echo $model->PihakKedua1 ?> 
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php echo $model->PihakKedua2 ?>
		</td>
	</tr>

	</tbody>
	</table>
	</div>
*/ ?>

<?php



if($modelquo->IsSingleRoute==1){
$this->widget('bootstrap.widgets.TbButton', array(      

                        'label' =>Yii::t('strings','Print'),
                        'icon'=>'print white',
                        'type' => 'info',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        //'url'=>array('create'), 
                        //'size'=>'small',  
                        'url'=>array('spal/report','id'=>$model->id_quotation),
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
                        'url'=>array('spal/viewreport','id'=>$model->id_quotation),
                        'htmlOptions' => array(
                                               'target'=>'_blank',
                                                ),
                    
                        ));


}else{

	$this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'htmlOptions'=>array('name'=>'print'),
            'icon'=>'print white',
            'type' => 'info',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'label' =>Yii::t('strings','Print'),
        )); 
	echo' ';

	$this->widget('bootstrap.widgets.TbButton', array(
	            'buttonType' => 'submit',
	            'htmlOptions'=>array('name'=>'report'),
	            'label' =>Yii::t('strings','View'),
                'icon'=>'eye-open white',
                'type' => 'warning',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	        )); 
	echo CHtml::endForm(); 

}



?>