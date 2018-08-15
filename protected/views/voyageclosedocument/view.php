<?php
$this->breadcrumbs=array(
	'Voyage Close Documents'=>array('index'),
	$model->id_voyage_close_document,
);

$this->menu=array(
array('label'=>'List Voyage Close Document','url'=>array('index')),
array('label'=>'Create Voyage Close Document','url'=>array('create')),
array('label'=>'Update Voyage Close Document','url'=>array('update','id'=>$model->id_voyage_close_document)),
array('label'=>'Delete Voyage Close Document','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_voyage_close_document),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Voyage Close Document','url'=>array('admin')),
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
<h2>View VoyageCloseDocument #<?php echo $model->id_voyage_close_document; ?></h2>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_voyage_close_document',
		'id_voyage_order',
		'IdVoyageDocument',
		'VoyageDocumentName',
		'uploaded_date',
		'uploaded_user',
		'ip_user_uploaded',
),
)); ?>
