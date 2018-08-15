
<!-- harus ada untuk menangkap file foto tapi di hidden biar ga keliatan-->
<div class="hidden">

<?php
if ($type=='IDV'||$type=='ADM'){
			$modeluserdatadiri=DataDiri::model()->findByAttributes(array('userid'=>$userid));
			$repo = "repository/users/";
			$DEF_FILE = ImageDisplayer::displayDefaultFile($repo , "defaultuser.jpg");
			if($modeluserdatadiri->foto != ""){
				$file = $repo.$modeluserdatadiri->foto;
				
				if(file_exists($file)){
					echo $fotoidv=ImageDisplayer::displayCustomFile($repo , $modeluserdatadiri->foto, "VS");
				}else{
					echo $fotoidv= $DEF_FILE;
				}
			}else{
				echo $fotoidv= $DEF_FILE;
			}	


		}

		else if ($type=='ETP'){
			$modeluserPerusahaan=UserPerusahaan::model()->findByAttributes(array('userid'=>$userid));
			$modelperusahaan=DataPerusahaan::model()->findByAttributes(array('id_perusahaan'=>$modeluserPerusahaan->id_perusahaan));

			$repo = "repository/company/";
			$DEF_FILE = ImageDisplayer::displayDefaultFile($repo , "defaultcompany.jpg");
			if($modelperusahaan->foto_profil != ""){
				$file = $repo.$modelperusahaan->foto_profil;
				
				if(file_exists($file)){
					//echo ImageDisplayer::displaySmallFotoWithConditional($repo, $model->foto, $model->userid, $model->userid);
					echo $fotoetp= ImageDisplayer::displayCustomFile($repo , $modelperusahaan->foto_profil, "VS");
				}else{
					echo $fotoetp= $DEF_FILE;
				}
			}else{
				echo $fotoetp= $DEF_FILE;
			}	

		}

		else if ($type=='SKL'){
			$modeluserSekolah=UserSekolah::model()->findByAttributes(array('userid'=>$userid));
			$modelsekolah=Sekolah::model()->findByAttributes(array('id_sekolah'=>$modeluserSekolah->id_sekolah));

			$repo = "repository/school/";
			$DEF_FILE = ImageDisplayer::displayDefaultFile($repo , "defaultschool.jpg");
			if($modelsekolah->foto_1 != ""){
				$file = $repo.$modelsekolah->foto_1;
				
				if(file_exists($file)){
					//echo ImageDisplayer::displaySmallFotoWithConditional($repo, $model->foto, $model->userid, $model->userid);
					echo $fotoskl= ImageDisplayer::displayCustomFile($repo , $modelsekolah->foto_1, "VS");
				}else{
					echo $fotoskl= $DEF_FILE;
				}
			}else{
				echo $fotoskl= $DEF_FILE;
			}	

		}

?>
</div >
<!-- harus ada untuk menangkap file foto tapi di hidden biar ga keliatan-->


<!--list nama-->
<?php if ($type=='IDV'||$type=='ADM'){

			$contentpopoveridv='<table><tr><td style=width:100px;><div style="width:100px;">'.$fotoidv.'</div></td>
			<td>'.CHtml::encode($modeluserdatadiri->getjk()).'<br>'.
				 CHtml::encode($modeluserdatadiri->last_status_education).'<br>'.CHtml::encode($modeluserdatadiri->tempat_lahir).'<br>'.
				 CHtml::encode($modeluserdatadiri->tanggal_tahun_lahir).'<br>'. CHtml::encode($modeluserdatadiri->last_status_work).
			'</td>
			</tr></table>';

			echo'<b>';
			echo CHtml::link(CHtml::encode($modeluserdatadiri->nama_lengkap),array('profile/'.$modeluserdatadiri->userid),
						array('id'=>'link'.$userid,
							  'rel'=>'popover',
							  'data-original-title' => $modeluserdatadiri->nama_lengkap,
							  'data-html'=>true,
							  'data-content'=>$contentpopoveridv,
							 )).' (Personal)';
			echo'</b>';
			echo'<br>';
			//echo CHtml::encode($modeluserdatadiri->tempat_lahir); 
			
		}


		else if ($type=='ETP'){
			$contentpopoveretp='<table><tr><td style=width:100px;><div style="width:100px;">'.$fotoetp.'</div></td>
			<td>'.CHtml::encode($modelperusahaan->BidangUsaha->bidang_usaha).'<br>'.
				 CHtml::encode($modelperusahaan->Country->country_name).
			'</td>
			</tr></table>';
			echo'<b>';
			echo CHtml::link(CHtml::encode($modelperusahaan->nama_perusahaan),array('profile/'.$modeluserPerusahaan->userid),
				array('id'=>'link'.$userid,
							  'rel'=>'popover',
							  'data-original-title' => $modelperusahaan->nama_perusahaan,
							  'data-html'=>true,
							  'data-content'=>$contentpopoveretp,
							 )).' (Perusahaan)';
			echo'</b>';
			echo'<br>';
			//echo CHtml::encode($modelperusahaan->alamat); 

		}

		else if ($type=='SKL'){
			$contentpopoverskl='<table><tr><td style=width:100px;><div style="width:100px;">'.$fotoskl.'</div></td>
			<td>'.CHtml::encode($modelsekolah->kategori).'<br>'.
				 CHtml::encode($modelsekolah->type).'<br>'.
				 CHtml::encode($modelsekolah->website).
			'</td>
			</tr></table>';
			echo'<b>';
			echo CHtml::link(CHtml::encode($modelsekolah->nama_sekolah),array('profile/'.$modeluserSekolah->userid),
				array('id'=>'link'.$userid,
							  'rel'=>'popover',
							  'data-original-title' => $modelsekolah->nama_sekolah,
							  'data-html'=>true,
							  'data-content'=>$contentpopoverskl,
							 )).' (Sekolah)';
			echo'</b>';
			echo'<br>';
			//echo CHtml::encode($modelsekolah->MstKabupatenkota->nama); 

		}
		?>
	<!--list nama-->