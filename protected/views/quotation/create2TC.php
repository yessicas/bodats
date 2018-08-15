<?php
$this->breadcrumbs=array(
	'Quotations'=>array('index'),
	'Create',
);

$this->menu=array(
 array('label'=>'Manage Quotation', 'url'=>array('demand/quo')),
 array('label'=>'Create Quotation', 'url'=>array('demand/quocreate')),
 array('label'=>'Create Quotation Step 2', 'url'=>array('demand/quocreate2TC','id'=>$model->id_quotation)),
 //array('label'=>'Back to step 1 ', 'url'=>array('demand/quoupdate','id'=>$model->id_quotation)),
);
?>
<?php /*
<div id="content">
<h2>Create Quotation # <font color="#BD362F"><?php echo $model->QuotationNumber; ?></font></h2>
<hr>
</div>
*/ ?>

<div class="alert alert-block alert-info">
<h4 style="color:#BD362F; margin-bottom:10px;"> Time Charter </h4>
<b><?php echo Yii::t('strings','Step 2 Of 3') ?></b> :
<?php echo Yii::t('strings','Select Vessel & Time') ?> <br>
You Can 
<?php echo CHtml::link('Back to step 1 ',array('demand/quoupdate','id'=>$model->id_quotation)); ?>
</div>

<?php echo $this->renderPartial('../quotation/_form2TC', array('model'=>$model)); ?>