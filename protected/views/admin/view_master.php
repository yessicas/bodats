<?php
$this->breadcrumbs=array(
	'Data Diri'=>array('index'),
	$model->nama_lengkap,
);

$this->menu=array(
array('label'=>'List Data Diri','url'=>array('index')),
array('label'=>'Create Data Diri','url'=>array('create')),
array('label'=>'Update Data Diri','url'=>array('update','id'=>$model->id_data_diri)),
array('label'=>'Delete Data Diri','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_data_diri),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Data Diri','url'=>array('admin')),
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
<h4>View Data   <?php echo $model->nama_lengkap; ?></h4>
<hr>
</div>

<?php
$this->widget(
    'bootstrap.widgets.TbTabs',
    array(
        'type' => 'tabs', // 'tabs' or 'pills'
        'tabs' => array(
        	array('label' => 'Data Diri ',  'content' => $this->renderPartial('view_data_diri', array('model'=>$model),true),'active' => true),
            array('label' => 'Data Lain', 'content' => 'Data Lain'),
            
        ),
    )
);
?>