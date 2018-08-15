<?php
$this->breadcrumbs=array(
	'Mst Voyage Documents'=>array('index'),
	$model->IdVoyageDocument,
);

$this->menu=array(
//array('label'=>'List MstVoyageDocument','url'=>array('index')),
array('label'=>'Manage Voyage Document','url'=>array('master/voydoc')),
array('label'=>'Create Voyage Document','url'=>array('master/voydoccreate')),
array('label'=>'View Voyage Document','url'=>array('master/voydocview','id'=>$model->IdVoyageDocument),'active'=>true),
array('label'=>'Update Voyage Document','url'=>array('master/voydocupdate','id'=>$model->IdVoyageDocument)),

array('label'=>'Delete Voyage Document','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->IdVoyageDocument),'confirm'=>'Are you sure you want to delete this item?')),

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

<h3>View Voyage Document<font color=#BD362F> #<?php echo $model->DocumentName; ?></font></h3>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'IdVoyageDocument',
		'DocumentName',
		array(

		'label'=>'Closed Voyage Document',
		//'value'=>$model->Status=='1' ? 'Used' : 'Unused',  
		'value'=>MstVoyageDocument::model()->isclosed($model->IsClosedVoyageDocument),  

		),
		//'IsClosedVoyageDocument',
),
)); ?>
