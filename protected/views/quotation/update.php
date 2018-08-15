<?php
$this->breadcrumbs=array(
	'Quotations'=>array('index'),
	$model->id_quotation=>array('view','id'=>$model->id_quotation),
	'Update',
);

	$this->menu=array(
    
   
    //array('label'=>'View Quotation','url'=>array('quotation/view','id'=>$model->id_quotation)),
    array('label'=>'Manage Quotation','url'=>array('demand/quo')),
	array('label'=>'Create Quotation','url'=>array('demand/quocreate')),
	array('label'=>'Update Quotation','url'=>array('demand/quoupdate','id'=>$model->id_quotation)),
    );
?>

<div id="content">
<h2>Update Quotation # <font color="#BD362F"><?php echo $model->QuotationNumber; ?></font></h2>
<hr>
</div>
	
<div class="alert alert-block alert-info">
<b><?php echo Yii::t('strings','Step 1 Of 3') ?></b> <br>
<?php echo Yii::t('strings','Select Type Order') ?>
</div>
	

<?php echo $this->renderPartial('../quotation/_form',array('model'=>$model)); ?>