<?php
$this->breadcrumbs=array(
	'Agency Items'=>array('index'),
	$model->id_agency_item,
);

$this->menu=array(
//array('label'=>'List AgencyItem','url'=>array('index')),
array('label'=>'Manage AgencyItem','url'=>array('master/agen')),
array('label'=>'Create AgencyItem','url'=>array('master/agencreate')),
array('label'=>'View AgencyItem','url'=>array('view','id'=>$model->id_agency_item),'active'=>true),
array('label'=>'Update AgencyItem','url'=>array('update','id'=>$model->id_agency_item)),
array('label'=>'Delete AgencyItem','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_agency_item),'confirm'=>'Are you sure you want to delete this item?')),

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
<h3>View Agency Item <font color="#BD362F"> #<?php echo $model->id_agency_item; ?> </font></h3>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_agency_item',
		'agency_item',
		'description',
),
)); ?>
