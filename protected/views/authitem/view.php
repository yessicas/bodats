<?php
$this->breadcrumbs=array(
	'Authitems'=>array('index'),
	$model->name,
);

$this->menu=array(
     array('label'=>'Manage Level Access','url'=>array('master/maslev')),
    array('label'=>'Create Level Access','url'=>array('master/maslevcreate')),
    array('label'=>'View Level Access','url'=>array('master/maslevview','id'=>$model->name),'active'=>true),
     array('label'=>'Update Level Access','url'=>array('master/maslevupdate','id'=>$model->name)),
    array('label'=>'Delete Level Access','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->name),'confirm'=>'Are you sure you want to delete this item?')),
  
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


<h3>View Level Access # <font color="#BD362F">  <?php echo $model->name; ?></font> </h3>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'name',
		//'type',
		'description',
		//'bizrule',
		//'data',
),
)); ?>
