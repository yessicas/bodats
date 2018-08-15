<style>
body {
    width:800px; 
    font-family: "Calibri";
    font-size: 10px;
    /*color: #4F6B72;*/
     color: black;
    
}

.even .no_border{
	border-right: 1px solid #fff !important;
}

.even #no_border{
	border-top: 1px solid #fff !important;
}

.even .allnoborder{
	border-top: 1px solid #fff !important;
	border-bottom: 1px solid #fff !important;
}

.even .titikdua{
	border-top: 1px solid #fff !important;
	border-bottom: 1px solid #fff !important;
	border-left: 1px solid #fff !important;
}

.grid-view table.items tr#report_content td { height: 150px !important; }

</style>

<h3 align="center"> FAKTUR PAJAK </h3>

	<div id="invoice-grid" class="grid-view">
	<table class="items table table-bordered table-condensed">
	<tbody>

	<tr class="even">
		<td  colspan ='2' class="no_border">
		Kode dan Nomor Seri Faktur Pajak :
		</td>

		<td  colspan ='2' class="no_border">
		<?php echo $model->print_NoFakturPajak; ?>
		</td>

		<td style=" vertical-align:top;text-align:right" colspan ='2'>
		Inv . No : 
		<?php echo$model->InvoiceNumber; ?>
		</td>
	</tr>

	<tr class="even">
		<td style="border-bottom: 1px solid #fff !important ;" colspan ='6' >
		<b>Pengusaha Kena Pajak<b/>
		</td>
	</tr>

	<tr class="even">
		<td style="border-bottom: 1px solid #fff !important ;" colspan ='2' class="no_border" id="no_border" >
		Nama
		</td>

		<td style="border-bottom: 1px solid #fff !important ;" colspan ='4' id="no_border">
		: <?php echo nl2br(GeneralDB::getsettingGeneral('Company Name')->field_value); ?>
		</td>
	</tr>

	<tr class="even">
		<td style="border-bottom: 1px solid #fff !important ;" colspan ='2' class="no_border" id="no_border">
		Alamat
		</td>

		<td style="border-bottom: 1px solid #fff !important ;" colspan ='4' id="no_border">
		: <?php echo GeneralDB::getsettingGeneral('Office Address')->field_value; ?>
		</td>
	</tr>
	<tr class="even">
		<td  colspan ='2' class="no_border" id="no_border">
		NPWP
		</td>

		<td  colspan ='4' id="no_border" style="text-align: left;">

		
		<?php $mpwp = GeneralDB::getsplitnpwp(GeneralDB::getsettingGeneral('Office NPWP')->field_value); ?>
		<table class="items table table-bordered table-condensed">
		<tr class="even">
		<td style="text-align:left;padding: 0px 2px 0px 0px;" class="titikdua">:</td> 
		<td style="text-align:center;padding: 3px;"><?php echo $mpwp[0]; ?> </td> 
		<td style="text-align:center;padding: 3px;"><?php echo $mpwp[1]; ?></td> 
		<td style="text-align:center;padding: 3px;" class="allnoborder">.</td> 
		<td style="text-align:center;padding: 3px;"><?php echo $mpwp[2]; ?></td> 
		<td style="text-align:center;padding: 3px;"><?php echo $mpwp[3]; ?></td> 
		<td style="text-align:center;padding: 3px;"><?php echo $mpwp[4]; ?></td> 
		<td style="text-align:center;padding: 3px;" class="allnoborder">.</td> 
		<td style="text-align:center;padding: 3px;"><?php echo $mpwp[5];?></td> 
		<td style="text-align:center;padding: 3px;"><?php echo $mpwp[6];?></td> 
		<td style="text-align:center;padding: 3px;"><?php echo $mpwp[7];?></td> 
		<td style="text-align:center;padding: 3px;" class="allnoborder">.</td> 
		<td style="text-align:center;padding: 3px;"><?php echo $mpwp[8];?></td> 
		<td style="text-align:center;padding: 3px;" class="allnoborder">-</td> 
		<td style="text-align:center;padding: 3px;"><?php echo $mpwp[9];?></td> 
		<td style="text-align:center;padding: 3px;"><?php echo $mpwp[10];?></td> 
		<td style="text-align:center;padding: 3px;"><?php echo $mpwp[11];?></td> 
		<td style="text-align:center;padding: 3px;" class="allnoborder">.</td> 
		<td style="text-align:center;padding: 3px;"><?php echo $mpwp[12];?></td> 
		<td style="text-align:center;padding: 3px;"><?php echo $mpwp[13];?></td> 
		<td style="text-align:center;padding: 3px;"><?php echo $mpwp[14];?></td> 
		</tr>
		</table>

		
		 <?php //echo GeneralDB::getsettingGeneral('Office NPWP')->field_value; ?>
		</td>
	</tr>


	<tr class="even">
		<td style="border-bottom: 1px solid #fff !important ;" colspan ='6' >
		<b>Pembeli Barang Kena Pajak / Penerima Jasa Kena Pajak<b/>
		</td>
	</tr>

	<tr class="even">
		<td style="border-bottom: 1px solid #fff !important ;" colspan ='2' class="no_border" id="no_border">
		Nama
		</td>

		<td style="border-bottom: 1px solid #fff !important ;" colspan ='4' id="no_border">
		: <?php echo $modelvoyage->Quotation->Customer->CompanyName; ?>
		</td>
	</tr>

	<tr class="even">
		<td style="border-bottom: 1px solid #fff !important  ;" colspan ='2' class="no_border" id="no_border">
		Alamat
		</td>

		<td style="border-bottom: 1px solid #fff !important ;" colspan ='4' id="no_border">
		: <?php echo $modelvoyage->Quotation->Customer->Address ?> <?php echo $modelvoyage->Quotation->Customer->Address2 ?>
		</td>
	</tr>
	<tr class="even">
		<td colspan ='2'  class="no_border" id="no_border">
		NPWP
		</td>

		<td  colspan ='4' id="no_border">
		: <?php echo $modelvoyage->Quotation->Customer->NPWP ?>
		</td>
	</tr>


	<tr class="even">
		<td style="vertical-align:top;text-align:center;width:5px;"  rowspan ='2'>
		No Urut
		</td>

		<td colspan ='2' style="vertical-align:top;text-align:center;" rowspan ='2'>
		Nama Barang Kena Pajak / Jasa Kena Pajak
		</td>

		<td  style="vertical-align:top;text-align:center;" colspan ='3'>
		Harga Jual / Penggantian / Uang Muka / Termijn
		</td>


	</tr>

	<tr class="even">
		

		<td  style="vertical-align:top;text-align:center;" colspan='2'>
		Valas *)
		</td>

		<td  style="vertical-align:top;text-align:center;" >
		Rp 
		</td>


	</tr>


	<tr class="even">
		<td style="vertical-align:top;border-bottom: 1px solid #fff !important  ; text-align:center;">
		1
		</td>

		<td colspan ='2' style="vertical-align:top;border-bottom: 1px solid #fff !important  ;">
		Coal barging  Transportation for slot : 
		<?php //echo InvoiceDB::getdayfromdatetime($modelvoyage->ActualStartDate) ?>   <?php //echo InvoiceDB::getdayfromdatetime($modelvoyage->ActualEndDate) ?> <?php //echo InvoiceDB::getmonthandyearsfromdatetime($modelvoyage->ActualEndDate) ?> <!-- isi dari mana -->
		<?php echo Yii::app()->dateFormatter->formatDateTime($model->print_slot1, 'medium', false)?> -  
		<?php echo Yii::app()->dateFormatter->formatDateTime($model->print_slot2, 'medium', false)?>
		</td>

		<td  style="vertical-align:top;border-bottom: 1px solid #fff !important; width:5% ;" class="no_border">
		</td>

		<td  style="vertical-align:top;border-bottom: 1px solid #fff !important ;  width:10% ;">
		</td>

		<td style="vertical-align:top;border-bottom: 1px solid #fff !important  ; width:15% ;">
		</td>

	</tr>

	<tr class="even" id="report_content">
		<td style="vertical-align:top;text-align:center;" id="no_border">
		
		</td>

		<td colspan ='2' style="vertical-align:top;text-align:left;" id="no_border" >
		Tug Boat : <?php echo $modelvoyage->VesselTug->VesselName ?> ; Barge : <?php echo $modelvoyage->VesselBarge->VesselName ?> | 
		<?php echo $modelvoyage->JettyOrigin->Acronym ?> - <?php echo $modelvoyage->JettyDestination->Acronym ?> | 
		<?php echo $modelvoyage->Currency->currency ?>  <?php echo Yii::app()->numberFormatter->formatCurrency($modelvoyage->Price,"") ?>  x <?php echo  NumberAndCurrency::formatNumber($modelvoyage->Capacity) ?> MT
		</td>

		<td  style="vertical-align:top;text-align:left;" id="no_border" class="no_border">
		<?php echo $modelvoyage->Currency->currency ?>   
		</td>


		<td  style="vertical-align:top;text-align:right;" id="no_border">

		<?php 
		$c1=$modelvoyage->Capacity * $modelvoyage->Price ;
		echo Yii::app()->numberFormatter->formatCurrency($c1,"");
		?>
		</td>

		<td style="vertical-align:top;text-align:left;" id="no_border">
		</td>

	</tr>


	<tr class="even">

		<td colspan ='3' style="vertical-align:top;text-align:left;">
		Harga Jual / Penggantian / Uang Muka / Termijn **)
		</td>

		<td  style="vertical-align:top;text-align:left;" class="no_border">
		<?php echo $modelvoyage->Currency->currency ?>  
		</td>

		<td  style="vertical-align:top;text-align:right;">
		 <?php $c2= $modelvoyage->Capacity * $modelvoyage->Price ;
		 echo Yii::app()->numberFormatter->formatCurrency($c2,""); ?>
		</td>

		<td style="vertical-align:top;text-align:left;">

		</td>

	</tr>

	<tr class="even">

		<td colspan ='3' style="vertical-align:top;text-align:left;">
		Dikurangi Potongan Harga
		</td>

		<td  style="vertical-align:top;text-align:left;" class="no_border">
		<?php echo $modelvoyage->Currency->currency ?>  
		</td>

		<td  style="vertical-align:top;text-align:right;">
		<?php //echo $modelvoyage->Currency->currency ?>  
		</td>

		<td style="vertical-align:top;text-align:left;">

		</td>

	</tr>

	<tr class="even">

		<td colspan ='3' style="vertical-align:top;text-align:left;">
		Dikurangi Uang Muka Yang Telah Diterima
		</td>

		<td  style="vertical-align:top;text-align:left;" class="no_border">
		<?php echo $modelvoyage->Currency->currency ?>  
		</td>

		<td  style="vertical-align:top;text-align:right;">
		<?php //echo $modelvoyage->Currency->currency ?>  
		</td>

		<td style="vertical-align:top;text-align:left;">

		</td>

	</tr>

	<tr class="even">

		<td colspan ='3' style="vertical-align:top;text-align:left;">
		Dasar Pengenaan Pajak
		</td>

		<td  style="vertical-align:top;text-align:left;" class="no_border">
		<?php echo $modelvoyage->Currency->currency ?>  
		</td>


		<td  style="vertical-align:top;text-align:right;">
		<?php 
		$c3 = $modelvoyage->Capacity * $modelvoyage->Price; 
		echo Yii::app()->numberFormatter->formatCurrency($c3,"");
		 ?>
		</td>

		<td style="vertical-align:top;text-align:right;">
		<?php
		$total = $modelvoyage->Capacity * $modelvoyage->Price;
		echo Yii::app()->numberFormatter->formatCurrency(InvoiceDB::getkonversimoney($total,$modelvoyage->Currency->id_currency),"");
		?> 
		</td>

	</tr>

	<tr class="even">

		<td colspan ='3' style="vertical-align:top;text-align:left;">
		PPN 10 % x Dasar Pengenaan Pajak
		</td>

		<td  style="vertical-align:top;text-align:left;" class="no_border">
		<?php echo $modelvoyage->Currency->currency ?>  
		</td>


		<td  style="vertical-align:top;text-align:right;">
		<?php echo NumberAndCurrency::formatCurrency(($modelvoyage->Capacity * $modelvoyage->Price) * (10/100)) ?> 
		</td>

		<td style="vertical-align:top;text-align:right;">

		<?php
		$ppn = ($modelvoyage->Capacity * $modelvoyage->Price) * (10/100);
		echo Yii::app()->numberFormatter->formatCurrency(InvoiceDB::getkonversimoney($ppn,$modelvoyage->Currency->id_currency),"");
		?> 

		</td>

	</tr>


	<tr class="even">

		<td style="vertical-align:top;text-align:center;" class="no_border">
		
		</td>

		<td colspan ='2' style="vertical-align:top;text-align:left;" class="no_border">
		Pajak  Penjualan Atas Barang Mewah 

		<div id="invoice-grid" class="grid-view" style="padding: 0px 0;">
		<table class="items table table-bordered table-condensed" style="width:70%;margin-top:0px;">
		<tbody>

		<tr class="even">
			<td style="vertical-align:top;text-align:center">
			<b>Tarif</b> 
			</td>

			<td style="vertical-align:top;text-align:center">
			<b>DPP</b>
			</td>

			<td style="vertical-align:top;text-align:center">
			<b>PPn BM</b>
			</td>
		</tr>

		<tr class="even">
			<td style="vertical-align:top;text-align:center">
			............... %
			</td>

			<td style="vertical-align:top;text-align:center">
			Rp. ...............
			</td>

			<td style="vertical-align:top;text-align:center">
			Rp. ...............
			</td>
		</tr>

		<tr class="even">
			<td style="vertical-align:top;text-align:center">
			............... %
			</td>

			<td style="vertical-align:top;text-align:center">
			Rp. ...............
			</td>

			<td style="vertical-align:top;text-align:center">
			Rp. ...............
			</td>
		</tr>

		<tr class="even">
			<td style="vertical-align:top;text-align:center">
			............... %
			</td>

			<td style="vertical-align:top;text-align:center">
			Rp. ...............
			</td>

			<td style="vertical-align:top;text-align:center">
			Rp. ...............
			</td>
		</tr>

		<tr class="even">
			<td style="vertical-align:top;text-align:center">
			............... %
			</td>

			<td style="vertical-align:top;text-align:center">
			Rp. ...............
			</td>

			<td style="vertical-align:top;text-align:center">
			Rp. ...............
			</td>
		</tr>

		
		<tr class="even">
			<td style="vertical-align:top;text-align:left" colspan='2'>
			Jumlah
			</td>

			<td style="vertical-align:top;text-align:center">
			Rp. ...............
			</td>
		</tr>

		</tbody>
		</table>
		</div>

		<br> Catatan : <br>
		Kurs : <?php echo $modelvoyage->Currency->currency ?>  <?php echo NumberAndCurrency::formatCurrency($currency=Currency::model()->findByPk($modelvoyage->Currency->id_currency)->change_rate); // USD currency ?>
		<br>
		<b><?php echo GeneralDB::getsettinginvoice('KMK Faktur')->field_value ?> </b>

		</td>


		<td style="vertical-align:top;text-align:center;" colspan ='3'>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		Cikarang, <?php echo InvoiceDB::getformatdate($model->InvoiceDate) ?> 
		
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<?php //echo nl2br(GeneralDB::getsettinginvoice('Invoice Signature')->field_value); ?>
		<?php echo $model->print_sign_name.'<br>';
		  echo $model->print_sign_position;
		?>


		</td>

	</tr>



	</tbody>
	</table>
	</div>

	<font style="font-size:10px">
	*) Diisi apabila penyerahan menggunakan mata uang asing <br>
	**) Coret Yang Tidak Perlu
	</font>

