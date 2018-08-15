<?php
$this->breadcrumbs=array(
	'Sos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage SO ','url'=>array('so/admin')),
array('label'=>'Create SO','url'=>array('so/searchquo')),
array('label'=>'Create SO Step 2','url'=>array('so/addSalesPlan','idquo'=>$_GET['idquo'])),
array('label'=>'Create SO Step 3','url'=>array('so/create','idquo'=>$_GET['idquo'],'idsp'=>$_GET['idsp'])),
);
?>

<div id="content">
<h2>Create Shipping Order</h2>
<hr>
</div>

<div class="alert alert-block alert-info">
<b><?php echo Yii::t('strings','Step 3 of 3') ?></b> :
<?php echo Yii::t('strings','Create Shiping Order') ?>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model,'modelquo'=>$modelquo,'modeldetailquo'=>$modeldetailquo)); ?>