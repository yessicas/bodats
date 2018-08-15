<?php
$this->breadcrumbs=array(
	'Voyage Mst Activity Groups'=>array('admin'),
	$model->id_voyage_activity_group,
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

<h1> <?php
 echo $title; ?>

<font color=#7EFC65> #<?php echo $model->id_voyage_activity_group; ?></font></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_voyage_activity_group',
		'voyage_activity_group_short',
		'voyage_activity_group',
		'voyage_activity_group_desc',
		'color',
),
)); ?>
