<?php
$this->breadcrumbs=array(
	'Account GLs'=>array('index'),
	$model->id_account_gl,
);

$this->menu=array(
//array('label'=>'List AccountGl','url'=>array('index')),
array('label'=>'Manage Account GL','url'=>array('admin')),
array('label'=>'Create Account GL','url'=>array('create')),
array('label'=>'View Account GL','url'=>array('view','id'=>$model->id_account_gl)),
array('label'=>'Update Account GL','url'=>array('update','id'=>$model->id_account_gl)),

array('label'=>'Delete Account GL','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_account_gl),'confirm'=>'Are you sure you want to delete this item?')),

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

<h3>View Account GL<font color=#BD362F> #<?php echo $model->gl_name; ?></font></h3>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_account_gl',
		'gl_number',
		'gl_name',
		'coa_level1',
		'coa_level2',
		'coa_level3',
		
),
)); ?>
