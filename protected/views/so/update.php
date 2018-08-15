<?php
$this->breadcrumbs=array(
	'Sos'=>array('index'),
	$model->id_so=>array('view','id'=>$model->id_so),
	'Update',
);

	$this->menu=array(
	array('label'=>'Manage SO ','url'=>array('so/admin')),
	array('label'=>'Create SO','url'=>array('so/searchquo')),
	array('label'=>'Update SO','url'=>array('so/update','id'=>$model->id_so)),
	);
	?>

<div id="content">
<h2>Update Shipping Order # <font color="#BD362F"><?php echo $model->ShippingOrderNumber; ?></font></h2>
<hr>
</div>

<div class="alert alert-block alert-info">
<b><?php echo Yii::t('strings','Step 2 of 2') ?></b> :
<?php echo Yii::t('strings','Update Shiping Order') ?>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model,'modelquo'=>$modelquo,'modeldetailquo'=>$modeldetailquo)); ?>