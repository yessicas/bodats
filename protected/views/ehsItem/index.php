<?php
/* @var $this EhsItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ehs Items',
);

$this->menu=array(
	array('label'=>'Create EhsItem', 'url'=>array('create')),
	array('label'=>'Manage EhsItem', 'url'=>array('admin')),
);
?>

<h1>Ehs Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
