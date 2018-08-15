<?php
$this->breadcrumbs=array(
	'Friendships'=>array('index'),
	$model->id_friendship,
);

$this->menu=array(
array('label'=>'List Friendship','url'=>array('index')),
array('label'=>'Create Friendship','url'=>array('create')),
array('label'=>'Update Friendship','url'=>array('update','id'=>$model->id_friendship)),
array('label'=>'Delete Friendship','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_friendship),'confirm'=>'Are you sure you want to delete this item?')),
//array('label'=>'Delete Friendship','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_friendship),'confirm'=>'Apakah anda yakin akan menghapus data ini?')),
array('label'=>'Manage Friendship','url'=>array('admin')),
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
<h4>View Friendship  <?php echo $model->id_friendship; ?></h4>
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
		'id_friendship',
		'from_userid',
		'to_userid',
		'req_date',
		'active_date',
		'status',
),
)); ?>
