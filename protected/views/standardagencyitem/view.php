<?php
$this->breadcrumbs=array(
	'Standard Agency Items'=>array('index'),
	$model->id_standard_agency_item,
);

$this->menu=array(
array('label'=>'List StandardAgencyItem','url'=>array('index')),
array('label'=>'Create StandardAgencyItem','url'=>array('create')),
array('label'=>'Update StandardAgencyItem','url'=>array('update','id'=>$model->id_standard_agency_item)),
array('label'=>'Delete StandardAgencyItem','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_standard_agency_item),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage StandardAgencyItem','url'=>array('admin')),
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
<h2>View StandardAgencyItem #<?php echo $model->id_standard_agency_item; ?></h2>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_standard_agency_item',
		'id_standard_agency',
		'id_agency_item',
		'description',
		'agency_fix_cost',
		'agency_var_cost',
		'id_currency',
		'created_date',
		'created_user',
		'ip_user_updated',
),
)); ?>
