<?php
$this->breadcrumbs=array(
	'Quotations'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Agreement Document SPAL ','url'=>array('spal/admin')),
array('label'=>'Manage SPAL Without Quotation','url'=>array('spal/adminnonquo')),
array('label'=>'Create SPAL Without Quotation','url'=>array('spalquo/quocreate')),

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

<?php echo $this->renderPartial('../spalquo/_form', array('model'=>$model)); ?>