<?php
$this->breadcrumbs=array(
	'Mst Vessel Document Validities'=>array('index'),
	$model->id_vessel_document_validity,
);

$this->menu=array(
//array('label'=>'List MstVesselDocumentValidity','url'=>array('index')),
array('label'=>'Manage Vessel Document Validity','url'=>array('master/valid')),
array('label'=>'Create Vessel Document Validity','url'=>array('master/validcreate')),
array('label'=>'View Vessel Document Validity','url'=>array('view','id'=>$model->id_vessel_document_validity),'active'=>true),
array('label'=>'Update Vessel Document Validity','url'=>array('update','id'=>$model->id_vessel_document_validity)),

array('label'=>'Delete Vessel Document Validity','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_vessel_document_validity),'confirm'=>'Are you sure you want to delete this item?')),

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

<h3>Vessel Document Validity<font color=#BD362F> <?php echo $model->color; ?></font></h3>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
	//	'id_vessel_document_validity',
		'no',
		'vessel_document_validity',
		'color',
),
)); ?>
