<?php
$this->breadcrumbs=array(
	'Po Categories'=>array('index'),
	$model->id_po_category,
);

$this->menu=array(
//array('label'=>'List PoCategory','url'=>array('index')),
array('label'=>'Manage PO Category','url'=>array('master/maspo')),
array('label'=>'Create PO Category','url'=>array('master/maspocreate')),
array('label'=>'View PO Category','url'=>array('master/maspoview','id'=>$model->id_po_category),'active'=>true),
array('label'=>'Update PO Category','url'=>array('master/maspoupdate','id'=>$model->id_po_category)),
array('label'=>'Delete PO Category','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_po_category),'confirm'=>'Are you sure you want to delete this item?')),

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
<div id="content">
<h2>View PO Category<font color=#BD362F> #<?php echo $model->id_po_category; ?></font></h2>
<hr>
</div>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_po_category',
		'code',
		'category',
		'category_name',
	//	'id_parent',
	//	'is_end_node',
		'level1',
		'level2',
		'level3',
		'num_level',
	//	'auth',
		'type_good_issue',
		'dedicated_to',
		'lead_time_from_approval',
		'request_by',
),
)); ?>
