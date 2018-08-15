<?php
$this->breadcrumbs=array(
	'Quotations'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage SO ','url'=>array('so/admin')),
array('label'=>'Create SO','url'=>array('so/searchquo')),
array('label'=>'Create SO Without Quotation','url'=>array('soquo/quocreate')),
array('label'=>'Manage TC ','url'=>array('sooffhiredorder/admin')),
array('label'=>'Create TC','url'=>array('sooffhiredorder/create')),
);
?>

<div id="content">
<h2>Create Shiping Order </h2>
<hr>
</div>

<div class="alert alert-block alert-info">
<b><?php echo Yii::t('strings','Step 1 ') ?></b> :
<?php echo Yii::t('strings','Select Type Order') ?>
</div>

<?php echo $this->renderPartial('../soquo/_form', array('model'=>$model)); ?>