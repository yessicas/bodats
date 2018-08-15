<?php
$this->breadcrumbs=array(
	'Quotations'=>array('index'),
	'Create',
);

$this->menu=array(
 array('label'=>'Manage Quotation', 'url'=>array('demand/quo')),
 array('label'=>'Create Quotation', 'url'=>array('demand/quocreate')),
);
?>
<div id="content">
<h2>Create Quotation</h2>
<hr>
</div>

<div class="alert alert-block alert-info">
<b><?php echo Yii::t('strings','Step 1 Of 3') ?></b> :
<?php echo Yii::t('strings','Select Type Order') ?>
</div>

<?php echo $this->renderPartial('../quotation/_form', array('model'=>$model)); ?>