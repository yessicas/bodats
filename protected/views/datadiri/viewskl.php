<?php
$this->breadcrumbs=array(
	'Data Diri'=>array('view'),
	$model->nama_lengkap,
);

$this->menu=array(
array('label'=>'List Data Diri','url'=>array('index')),
array('label'=>'Create Data Diri','url'=>array('create')),
array('label'=>'Update Data Diri','url'=>array('update','id'=>$model->id_data_diri)),
array('label'=>'Delete Data Diri','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_data_diri),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Data Diri','url'=>array('admin')),
);
?>

<?php if(Yii::app()->user->hasFlash('success')):?>
<div class = "animated flash">
	<?
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

<div class="well">
<h4>View Data   <?php echo $model->nama_lengkap; ?></h4>
<hr>
</div>


<div class ="view">
<table width="100%">
	<tr>
		<td width = "210" style="vertical-align:top;">
		<?php
			//echo"<figure class='cap-left'>"; // untuk hover  ubah foto

			$repo = "repository/users/";
			$DEF_FILE = ImageDisplayer::displayDefaultFile($repo , "defaultuser.jpg");
			if($model->foto != ""){
				$file = $repo.$model->foto;
				
				if(file_exists($file)){
					//echo ImageDisplayer::displaySmallFotoWithConditional($repo, $model->foto, $model->userid, $model->userid);
					echo ImageDisplayer::displayCustomFile($repo , $model->foto, "FC");
				}else{
					echo $DEF_FILE;
				}
			}else{
				echo $DEF_FILE;
			}	

			//$url = Yii::app()->createUrl("datadiri/uploadfoto");
			//echo '<a href="'.$url .'" class="various fancybox.ajax"><span class="menu_icon icon-edit"></span> Ubah Foto Profil</a>';
			//echo"<figcaption><a href='$url'class='various fancybox.ajax' style='color:#ffffff;'>Ubah Foto </a></figcaption>"; 
			//echo"</figure>";  // untuk hover  ubah foto
		?>
		</td>
		<td style="vertical-align:top;">
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'type' => 'striped  condensed',
'cssFile' => Yii::app()->baseUrl .'/css/left_label_detil_view.css',
'data'=>$model,
'attributes'=>array(
		//'id_data_diri',
		//'id_ektp',
		//'no_ktp',
		//'foto',
		'nama_lengkap',
		'nama_depan',
		//'nama_tengah',
		//'nama_belakang',
		'nama_panggilan',
		//'id_last_job_status',
		//'last_job_status_date',
		'last_status_education',
		'school_name',
		'graduated_date',
		'student_entry_year',
		'last_status_work',
		//'status_work_date',
		'work_place_name',
		//'niw',
		//'jenis_kelamin',
		array(
		'name' => 'jenis_kelamin',
		'type' => 'raw',
		'value' => CHtml::encode($model->getjk()),
		),
		//'alamat1',
		//'alamat2',
		//'wilayah',
		'email',
		/*
		'telepon',
		'handphone',
		'tempat_lahir',
		'tanggal_tahun_lahir',
		'agama',
		'tanggal_pernikahan',
		'tempat_pernikahan',
		'no_akte_nikah',
		'dinikahkan_oleh',
		'note_kondisi_warga',
		'tanggal_wafat',
		'tempat_pemakaman',
		'dimakamkan_oleh',
		'warga_titipan',
		'no_surat_wt',
		'no_status_warga',
		'tanggal_atestasi',
		'asal_atestasi',
		'no_surat_atestasi',
		'tanggal_masuk_sekolah',
		'tempat_masuk_sekolah',
		'kepala_saat_masuk_sekolah',
		'no_induk_masuk_sekolah',
		'tanggal_kuliah',
		'tempat_kuliah',
		'kepala_tempat_kuliah',
		'no_surat_kuliah',
		'status_pendidikan',
		'tingkat_pendidikan',
		'fakultas_pendidikan',
		'tempat_pendidikan',
		'profesi_detail',
		'profesi_alamat',
		'profesi_telepon',
		'profesi_email',
		'pekerjaan_nama_kantor',
		'pekerjaan_bidang_usaha',
		'pekerjaan_jabatan_kantor',
		'pekerjaan_alamat_kantor',
		'pekerjaan_email_kantor',
		'pelayanan_1',
		'pelayanan_2',
		'pelayanan_3',
		'pelayanan_4',
		'pelayanan_5',
		'minat_hobi',
		'bakat_potensi',
		'nama_ibu_kandung',
		'id_ibu_kandung',
		'nama_ayah_kandung',
		'id_ayah_kandung',
		'kontak_keluarga',
		'alamat_keluarga',
		'no_telepon_keluarga',
		'memo',
		'last_update',
		*/
),
)); ?>


</td>
	</tr>
</table>
</div>




