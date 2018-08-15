<?php
$this->breadcrumbs=array(
	'Job Categories'=>array('index'),
	$model->id_job_category,
);

$this->menu=array(
array('label'=>'List JobCategory','url'=>array('index')),
array('label'=>'Create JobCategory','url'=>array('create')),
array('label'=>'Update JobCategory','url'=>array('update','id'=>$model->id_job_category)),
array('label'=>'Delete JobCategory','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_job_category),'confirm'=>'Are you sure you want to delete this item?')),
//array('label'=>'Delete JobCategory','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_job_category),'confirm'=>'Apakah anda yakin akan menghapus data ini?')),
array('label'=>'Manage JobCategory','url'=>array('admin')),
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
<div class="well">
<h4>View JobCategory  <?php echo $model->id_job_category; ?></h4>
<hr>
</div>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
//'type'=>'striped bordered condensed',
'attributes'=>array(
	//array('label'=>'Label','name'=>'attribute','value'=>'value'),
	/*
	array(
		'name' => 'hak_akses',
		'type' => 'raw',
		'value' => CHtml::encode($model->ubahAkses()),
		),
	*/
		'id_job_category',
		'category_indo',
		'category_eng',
),
)); ?>
