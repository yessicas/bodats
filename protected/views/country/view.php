<?php
$this->breadcrumbs=array(
	'Countries'=>array('index'),
	$model->id_country,
);

$this->menu=array(
array('label'=>'List Country','url'=>array('index')),
array('label'=>'Create Country','url'=>array('create')),
array('label'=>'Update Country','url'=>array('update','id'=>$model->id_country)),
array('label'=>'Delete Country','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_country),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Country','url'=>array('admin')),
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

<div class="well">
<h3>Data Country
<?php echo $model->country_name; ?></h3>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'type' => 'striped bordered condensed',
'attributes'=>array(
		'id_country',
		'country_name',
		'code',
		'id_language',
),
)); ?>
