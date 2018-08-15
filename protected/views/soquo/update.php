<?php
$this->breadcrumbs=array(
	'Quotations'=>array('index'),
	$model->id_quotation=>array('view','id'=>$model->id_quotation),
	'Update',
);

	$this->menu=array(
    
   
    //array('label'=>'View Quotation','url'=>array('quotation/view','id'=>$model->id_quotation)),
    //array('label'=>'Manage Quotation','url'=>array('demand/quo')),
	array('label'=>'Manage SO ','url'=>array('so/admin')),
	array('label'=>'Create SO','url'=>array('so/searchquo')),
	array('label'=>'Create SO Without Quotation','url'=>array('soquo/quocreate')),
	array('label'=>'Update SO Without Quotation','url'=>array('soquo/quoupdate','id'=>$model->id_quotation)),
    );
?>

<div id="content">
<h2>Update Quotation # <font color="#BD362F"><?php echo $model->QuotationNumber; ?></font></h2>
<hr>
</div>
	
<div class="alert alert-block alert-info">
<b><?php echo Yii::t('strings','Step 1 ') ?></b> <br>
<?php echo Yii::t('strings','Select Type Order') ?>
</div>
	

<?php echo $this->renderPartial('../soquo/_form',array('model'=>$model)); ?>