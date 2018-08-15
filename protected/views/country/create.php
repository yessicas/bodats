<?php
$this->breadcrumbs=array(
	'Countries'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Country','url'=>array('index')),
array('label'=>'Manage Country','url'=>array('admin')),
);
?>
<div class="well">
<h3><?php echo Yii::t('strings','Add') ?> Data Country <?php //echo $model->nama_menu_ind; ?></h3>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>