<?php
$this->breadcrumbs=array(
	'Data Diri'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Data Diri','url'=>array('index')),
array('label'=>'Create Data Diri','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('data-warga-grid', {
data: $(this).serialize()
});
return false;
});
");
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
<h4><?php echo Yii::t('strings','Manage') ?> Data </h4>
<hr>
</div>

<!-- di disable tombol search nya sementara 
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div> 
-->

<br>
<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Data',
        'headerIcon' => 'icon-th',
        'htmlOptions' => array('class' => 'bootstrap-widget-table'),
   
    )
);?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'data-warga-grid',
'type' => 'striped  condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_data_diri',
		'userid',

		//'id_last_job_status',
		//'last_job_status_date',
		'last_status_education',
		'school_name',
		'graduated_date',
		'student_entry_year',
		'last_status_work',
		//'status_work_date',
		'work_place_name',

		//'id_ektp',
		'no_ktp',
		//'foto',
		'nama_lengkap',
		/*
		'nama_depan',
		'nama_tengah',
		'nama_belakang',
		'nama_panggilan',
		'niw',
		*/

		'jenis_kelamin',
		/*
		'alamat1',
		'alamat2',
		'wilayah',	
		'email',
		'telepon',
		'handphone',
		*/
		'tempat_lahir',
		'tanggal_tahun_lahir',
		'agama',
		/*
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
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>

<?php $this->endWidget(); ?>
