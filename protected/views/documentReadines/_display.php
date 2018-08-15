<style>
table td, table th {
    padding: 5px 5px 5px 5px;
    text-align: center;
    border: 1px solid #87A1A2;
    font-size: 11px;
}

th {
  font-weight: bold;
  color:white;
}

td{
  color: black;
}

.row-fluid .spancenter {
    width: 65.4468%;
}

[class^="icon-"], [class*=" icon-"] {

    margin: 1px 0px -1px 0px;
}

</style>
<?php
	$vessel = VesselDB::getVessel($id_vessel);
	$VesselType = $vessel->VesselType;
?>
<h3>Document Readiness for <?php echo $vessel->VesselName; ?> ( <?php echo $VesselType; ?>)</h3>

<table border="1px solid black" cellspacing=0 cellpadding=0 width=100% >
	<tr>
		<th  width=2%  rowspan=2 align="center" bgcolor="#1A354F" style="vertical-align:middle;"> No. </th>
		<th  width=40% rowspan=2 align="center" bgcolor="#1A354F" style="vertical-align:middle;"> Jenis Document </th>
		<th  width=10% rowspan=2 align="center" bgcolor="#1A354F" style="vertical-align:middle;"> Dasar Hukum </th>
		<th  width=30% colspan=2 align="center" bgcolor="#1A354F"> <?php echo $vessel->VesselName; ?> ( <?php echo $VesselType; ?>)</th>
		<th  align="center" rowspan=2 bgcolor="#1A354F" style="vertical-align:middle;"> Attachment </th>
		<th  align="center" rowspan=2 bgcolor="#1A354F" style="vertical-align:middle;"> Action </th>
		<th  align="center" rowspan=2 bgcolor="#1A354F" style="vertical-align:middle;"> Renew </th>
	</tr>

	<th bgcolor="#1A354F"> Start Date </th>
	<th bgcolor="#1A354F"> Expired Date </th>

	<?php
		$LISTDOCUMENT = VesselDocumentInfo::model()->findAllByAttributes(array('id_vessel'=>$id_vessel));
		foreach($LISTDOCUMENT as $document){
			$docinfo[$document->id_vessel_document] = $document;
		}	
		
		$listdocument = MstVesselDocument::model()->findAllByAttributes(array('VesselType'=>$VesselType));
		$no = 0;
		foreach($listdocument as $document){
			$no++;
			echo '
			<tr>
				<td> '.$no.'. </td>
				<td style="text-align:left;"> '.$document->VesselDocumentName.' <br> 
					<font style="font-style:italic; color:#BD362F"> '.$document->VesselDocumentNameEng.' </font> 
				</td>
				<td> '.$document->Dasar.' </td>';
				
			if(isset($docinfo[$document->id_vessel_document])){
				$docinfodetail = $docinfo[$document->id_vessel_document];
				$url_update = Yii::app()->createUrl("documentreadines/update", array('id_vessel'=>$id_vessel, 'id_vessel_document'=>$document->id_vessel_document));
				$url_renew = Yii::app()->createUrl("documentreadines/renew", array('id_vessel'=>$id_vessel, 'id_vessel_document'=>$document->id_vessel_document));
				echo '
					<td> '.$docinfodetail->PlaceCreated.' <br> '.Timeanddate::getShortDateIndo($docinfodetail->DateCreated).' </td>';
				if($docinfodetail->IsPermanen == 1){
					echo '<td bgcolor="#8D9696"> Permanent </td>';
				}else{

					//$bgcolor = '#49DE45'; //Ini warna nanti dibuat dinamis sesuai dengan kategori validity periodenya
					$bgcolor=VesselDocumentInfoDB::getDurationBackground($docinfodetail->DateCreated,$docinfodetail->ValidUntil); 
					if($docinfodetail->IsNotUsed == 1){
						$bgcolor = '#0000ff';
						echo '<td bgcolor="'.$bgcolor.'">NOT USED</td>';
					}else{
						echo '<td bgcolor="'.$bgcolor.'">'.Timeanddate::getShortDateIndo($docinfodetail->ValidUntil).'</td>';
					}
				}
				
				echo '
					<td style="vertical-align:middle;">'.attachment($docinfodetail).'</td> <!-- attachment -->
					<td style="vertical-align:middle;">
					<h5> <a href="'.$url_update.'" class="various fancybox.ajax" style="font-size:12px;"> Edit  </a>
					</td>
					<td style="vertical-align:middle;">
					<h5> <a href="'.$url_renew.'" class="various fancybox.ajax" style="font-size:12px;">  Renew  </a>
					</td>';
			}else{
				$url_add = Yii::app()->createUrl("documentreadines/add", array('id_vessel'=>$id_vessel, 'id_vessel_document'=>$document->id_vessel_document));
				echo '
					<td> Not Set </td>
					<td> Not Set </td>
					<td> - </td>  <!-- attachment -->
					<td>
					<h5> <a href="'.$url_add.'" class="various fancybox.ajax" style="font-size:12px;"> Add  </a>
					</td>
					<td> - </td>';

			}	
			echo '
			</tr>
			';
		}
	?>

	<?php function attachment($docinfodetail){
			if ($docinfodetail->Attachment==null||$docinfodetail->Attachment=='tempName') {
				return '-';
			}else{
				return  CHtml::link("View", Yii::app()->request->baseUrl."/repository/readinessdoc/".$docinfodetail->Attachment, array("target"=>"_blank" ,"title"=>"View Attachment"));
			
			}
		}
	?>
	
<?php /*
	<tr>
	  <td> 1 </td>
	  <td style="text-align:left;"> Surat Laut <br> <font style="font-style:italic; color:#BD362F"> Certificates Of Nationality </font> </td>
	  
	  <td> UU 17/2008 </td>

	  <td> Jakarta <br> <?php echo date("d-m-Y"); ?> </td>

	   <td bgcolor="#8D9696"> Permanent </td>

	   <td style="vertical-align:middle;">

	  <h5> <a href="Documentreadines/update" class="various fancybox.ajax" style="font-size:12px;"> Update  </a>
		</td>

		<td style="vertical-align:middle;">

	  <h5> <a href="#" class="various fancybox.ajax" style="font-size:12px;">    </a>
		</td>
	  </tr>

	  <tr>
	  <td> 2 </td>
	  <td style="text-align:left;"> Sertifikat Radio Keselamatan Kapal Barang <br> 
		<font style="font-style:italic; color:#BD362F"> Cargo Ship Safety Radio Certificate </font> </td>
	  
	  <td> UU 17/2008 </td>

	  <td> Banjarmasin <br> <?php echo date("d-m-Y"); ?> </td>

	   <td bgcolor="#BF3120"> <?php echo date("d-m-Y"); ?> </td>

	   <td style="vertical-align:middle;">

	  <h5> <a href="#" class="various fancybox.ajax" style="font-size:12px;">   </a>
		</td>

		<td style="vertical-align:middle;">

	  <h5> <a href="Documentreadines/renew" class="various fancybox.ajax" style="font-size:12px;"> Renew   </a>
		</td>
	  </tr>


	  <tr>
	  <td> 3 </td>
	  <td style="text-align:left;"> Sertifikat Radio Keselamatan Kapal Barang <br> 
		<font style="font-style:italic; color:#BD362F"> Cargo Ship Safety Radio Certificate </font> </td>
	  
	  <td> UU 17/2008 </td>

	  <td> Tidak Pakai  </td>

	   <td bgcolor="#9BD1F3"> Tidak Pakai </td>

	   <td style="vertical-align:middle;">

	  <h5> <a href="Documentreadines/add" class="various fancybox.ajax" style="font-size:12px;"> Add  </a>
		</td>

		<td style="vertical-align:middle;">

	  <h5> <a href="#" class="various fancybox.ajax" style="font-size:12px;">   </a>
		</td>
	  </tr>

	  <tr>
	  <td> 3 </td>
	  <td style="text-align:left;"> Sertifikat Radio Keselamatan Kapal Barang <br> 
		<font style="font-style:italic; color:#BD362F"> Cargo Ship Safety Radio Certificate </font> </td>
	  
	  <td> UU 17/2008 </td>

	  <td> Jakarta <br> <?php echo date("d-m-Y"); ?> </td>

	   <td bgcolor="Yellow"> <?php echo date("d-m-Y"); ?> </td>

	   <td style="vertical-align:middle;">

	  <h5> <a href="#" class="various fancybox.ajax" style="font-size:12px;">   </a>
		</td>

		<td style="vertical-align:middle;">

	  <h5> <a href="Documentreadines/renew" class="various fancybox.ajax" style="font-size:12px;">  Renew </a>
		</td>
	  </tr>

	  <tr>
	  <td> 3 </td>
	  <td style="text-align:left;"> Sertifikat Radio Keselamatan Kapal Barang <br> 
		<font style="font-style:italic; color:#BD362F"> Cargo Ship Safety Radio Certificate </font> </td>
	  
	  <td> UU 17/2008 </td>

	  <td> Jakarta <br> <?php echo date("d-m-Y"); ?> </td>

	   <td bgcolor="#49DE45"> <?php echo date("d-m-Y"); ?> </td>

	   <td style="vertical-align:middle;">

	  <h5> <a href="Documentreadines/update" class="various fancybox.ajax" style="font-size:12px;"> Update  </a>
		</td>

		<td style="vertical-align:middle;">

	  <h5> <a href="#" class="various fancybox.ajax" style="font-size:12px;">   </a>
		</td>
	  </tr>
*/
?>
</table>

<table style="border: 0px solid black;">
	 <tr>
	  <td width=7% bgcolor="#49DE45" style="border:0px solid white;"> </td>
	  <td style="border: 1px solid white; text-align:left;"> Warna Hijau Menunjukan Sertifikat Masih Berlaku </td>
	</tr>

	<tr>
	  <td width=7% bgcolor="yellow" style="border:0px solid white;"> </td>
	  <td style="border: 1px solid white; text-align:left;"> Warna Kuning Menunjukan Sertifikat Harus Diperpanjang dalam waktu 15 hari</td>
	</tr>

	<tr>
	  <td width=7% bgcolor="#BF3120" style="border:0px solid white;"> </td>
	  <td style="border: 1px solid white; text-align:left;"> Warna Merah Menunjukan Sertifikat Sudah Mati & Tidak Berlaku lagi ( Harus dihidari dan tidak boleh ada ) </td>
	</tr>

	<tr>
	  <td width=7% bgcolor="#8D9696" style="border:0px solid white;"> </td>
	  <td style="border: 1px solid white; text-align:left;"> Warna Abu-abu Menunjukan Permanent berarti sekali dikeluarkan sertifikat akan berlaku selamanya, kalau tidak ada
		perubahan kontruksi kapal dan nama Pemilik </td>
	</tr>

	<tr>
	  <td width=7% bgcolor="#9BD1F3" style="border:0px solid white;"> </td>
	  <td style="border: 1px solid white; text-align:left;"> Tidak Dipakai </td>
	</tr>
</table>