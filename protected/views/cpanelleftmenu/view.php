<?php
$this->breadcrumbs=array(
	'Cpanel Leftmenus'=>array('index'),
	$model->id_leftmenu,
);

$this->menu=array(
//array('label'=>'List CpanelLeftmenu','url'=>array('index')),
array('label'=>'Manage CpanelLeftmenu','url'=>array('master/masleft')),
array('label'=>'Create CpanelLeftmenu','url'=>array('master/masleftcreate')),
array('label'=>'View CpanelLeftmenu','url'=>array('view','id'=>$model->id_leftmenu),'active'=>true),
array('label'=>'Update CpanelLeftmenu','url'=>array('update','id'=>$model->id_leftmenu)),

array('label'=>'Delete CpanelLeftmenu','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_leftmenu),'confirm'=>'Are you sure you want to delete this item?')),

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

<h3>View Cpanel Leftmenu<font color=#BD362F> #<?php echo $model->value_indo; ?></font></h2>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_leftmenu',
		//'id_parent_leftmenu',
		//'has_child',
		//'menu_name',
		//'menu_icon',
		'value_indo',
		'value_eng',
		//'url',
		array(

		'label'=>'Visible',
		//'value'=>$model->Status=='1' ? 'Used' : 'Unused',  
		'value'=>CpanelLeftmenu::model()->status($model->visible),  

		),
		//'visible',
		'auth',
),
)); ?>
