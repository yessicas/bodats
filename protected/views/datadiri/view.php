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

<center>
<h3 class= "header"><img src="repository/icon/userbig.png"> <?php echo $model->nama_lengkap; ?> <?php //echo Yii::t('strings','My Profile') ?>
<span class="header-line"><img src="repository/icon/headline.png"></span>
</h3>
</center>



<!-- <div class="well">
<h4><img src="repository/icon/userbig.png"> <?php echo Yii::t('strings','My Profile') ?></h4>
<hr>
</div>
-->

<div class ="view">
<table width="100%">
	<tr>
		<td width = "210" style="vertical-align:top;">
		<?php
			echo"<figure class='cap-left'>"; // untuk hover  ubah foto

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

			$url = Yii::app()->createUrl("datadiri/uploadfoto");
			//echo '<a href="'.$url .'" class="various fancybox.ajax"><span class="menu_icon icon-edit"></span> Ubah Foto Profil</a>';
			echo"<figcaption><a href='$url'class='various fancybox.ajax' style='color:#ffffff;'>".Yii::t('strings','Upload Photo')." </a></figcaption>"; 
			echo"</figure>";  // untuk hover  ubah foto
		?>
		</td>
		<td style="vertical-align:top;">
			<?php $this->widget('bootstrap.widgets.TbDetailView',array(
			//'type' => 'striped bordered condensed',
			'type' => 'striped  condensed',
			'cssFile' => Yii::app()->baseUrl .'/css/left_label_detil_view.css',
			'data'=>$model,
			'attributes'=>array(
					//'id_data_diri',
					//'id_ektp',
					//'no_ktp',
					//'foto',
					//'nama_lengkap',
					//'nama_depan',
					//'nama_tengah',
					//'nama_belakang',
					'nama_panggilan',
					array(
						'name' => 'jenis_kelamin',
						'type' => 'raw',
						'value' => CHtml::encode($model->getjk()),
					),
					'tempat_lahir',
					//'tanggal_tahun_lahir',
					array(
						'name' => 'tanggal_tahun_lahir',
						'type' => 'raw',
						'value' => CHtml::encode($model->getBirthdate()),
					),
					'alamat1',
					'agama',
					'LastJobStatus.status',
					'handphone',
					'user.email',
					//'id_last_job_status',
					//'last_job_status_date',
					//'last_status_education',
					//'school_name',
					//'graduated_date',
					//'student_entry_year',
					//'last_status_work',
					//'status_work_date',
					//'work_place_name',
					//'niw',
					//'jenis_kelamin',

					//'alamat1',
					//'alamat2',
					//'wilayah',
					//'email',
					/*
					'telepon',
					'handphone',
					
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

<div align="right">
<?php 
$modelusers=Users::model()->findByPk($model->userid);
$url = Yii::app()->createUrl("datadiri/update/id/".$model->id_data_diri."/c/".SecurityGenerator::SecurityDisplay($modelusers->code_id));
echo '<a href="'.$url .'" class="various fancybox.ajax"><span class="menu_icon icon-edit" style="margin-right:4px;"></span>' . Yii::t("strings","Update").'</a>';
?>
</div>
</td>
	</tr>
</table>
</div>

<?php
	if(isset($sukses)){
		$url = Yii::app()->createUrl("datadiri/view");
		echo '<div class="info">'.Yii::t('strings','Upload Photos succeeded. If the images in the picture has not seemed to change, it is likely your browser cache.').'
		<br>'.Yii::t('strings','Please').' <b><a href="'.$url.'">refresh</a></b> '.Yii::t('strings','Back to your browser by clicking').'  <b><a href="'.$url.'">'.Yii::t('strings','this link').' </a></b>. </div>';
	}
?>

<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.popup_foto',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 'auto',
        'height'      => 'auto',
        'autoSize'    => false,
        'closeClick'  => false,
        'closeBtn'    =>true,  
      
       //'title'=>'dfsf',
        
        'helpers'=>array(
            'title'=>array( 'type' => 'inside' ), // inside or outside
            'overlay'=>array( 'closeClick' => false ), 
         
        ),
        'openEffect'  => 'elastic',
        'closeEffect' => 'elastic',
      

    ),
));
?>

<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.various',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 'auto',
        'height'      => 'auto',
        'autoSize'    => false,
        'closeClick'  => false,
        'closeBtn'    =>true,  
      
       //'title'=>'dfsf',
        
        'helpers'=>array(
            'title'=>false, // inside or outside
            'overlay'=>array( 'closeClick' => false ), 
         
        ),
        'openEffect'  => 'elastic',
        'closeEffect' => 'elastic',
      

    ),
));
?>

<br>
<br>
<div id='chat' style="width:300px"></div>
<?php 
/*
    $this->widget('YiiChatWidget',array(
        'chat_id'=>'123',                   // a chat identificator
        'identity'=>Yii::app()->user->id,   // the user, Yii::app()->user->id ?
        'selector'=>'#chat',                // were it will be inserted
        'minPostLen'=>1,                    // min and
        'maxPostLen'=>50,                   // max string size for post
        'model'=>new ChatHandler(),    	// the class handler. **** FOR DEMO, READ MORE LATER IN THIS DOC ****
        'data'=>'any data',                 // data passed to the handler
        // success and error handlers, both optionals.
        'onSuccess'=>new CJavaScriptExpression(
            "function(code, text, post_id){   }"),
        'onError'=>new CJavaScriptExpression(
            "function(errorcode, info){  }"),
    ));
  */
?>



<!--
<?php
//echo CHtml::link('open dialog', '#', array('id'=>'ds'));
?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
		
			'type'=>'primary',
			'label'=>'ok',
			'url'=>array('datadiri/view'),
			 'htmlOptions' => array(
                                        'id'=>'ds'
                                        ),
		)); 
?>


<script type="text/javascript">
$('#document').ready(function(){

	$('#ds').on('click', function(){

    $.fancybox({
        width: 400,
        height: 400,
        autoSize: false,
        href: 'http://localhost/careerpath/datadiri/view',
        type: 'ajax'
    });
     return false; // prevent normal submit


});

});
</script>
-->

<?php 
/*
if(isset($_GET['contoh'])){

$array=$_GET['contoh'];

echo $listsatu= $array['satu']; 
echo $listdua= $array['dua']; 
}


else if(!isset($_GET['contoh']))
{
echo $listsatu= '' ;
echo $listdua= '' ;
}

*/
 ?>

<!--
<a href="#" data-toggle="tooltip" title="first tooltip" data-placement="bottom" >hover over me</a>
-->