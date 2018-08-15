<?php
$this->breadcrumbs=array(
	'Mst Vessel Documents'=>array('index'),
	$model->id_vessel_document,
);

$this->menu=array(
//array('label'=>'List MstVesselDocument','url'=>array('index')),
array('label'=>'Create Mst Vessel Document','url'=>array('create')),
array('label'=>'Update Mst Vessel Document','url'=>array('update','id'=>$model->id_vessel_document)),
array('label'=>'View Mst Vessel Document','url'=>array('view','id'=>$model->id_vessel_document)),
array('label'=>'Delete Mst Vessel Document','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_vessel_document),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Mst Vessel Document','url'=>array('admin')),
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

<!--- <div id="content"> !---->

<h3>View  Vessel Document<font color=#BD362F> #<?php echo $model->VesselDocumentName; ?></font></h3>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_vessel_document',
		'VesselType',
		'VesselDocumentName',
		'Dasar',
		array(

		'label'=>'Status',
		//'value'=>$model->Status=='1' ? 'Used' : 'Unused',  
		'value'=>MstVesselDocument::model()->statusUsed($model->Status),  

		),
),
)); ?>
