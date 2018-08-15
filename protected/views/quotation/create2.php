<?php
$this->breadcrumbs=array(
	'Quotations'=>array('index'),
	'Create',
);

$this->menu=array(
 array('label'=>'Manage Quotation', 'url'=>array('demand/quo')),
 array('label'=>'Create Quotation', 'url'=>array('demand/quocreate')),
 array('label'=>'Create Quotation Step 2', 'url'=>array('demand/quocreate2','id'=>$model->id_quotation)),
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

<?php if($model->id_bussiness_type_order==100){ ?>
<h4 style="color:#BD362F; margin-bottom:10px;"> Barging </h4>
<?php } ?>
<?php if($model->id_bussiness_type_order==200){ ?>
<h4 style="color:#BD362F; margin-bottom:10px;"> Barging Transhipment </h4>
<?php } ?>
<?php if($model->id_bussiness_type_order==250){ ?>
<h4 style="color:#BD362F; margin-bottom:10px;"> Transhipment </h4>
<?php } ?>
<br>
<b><?php echo Yii::t('strings','Step 2 Of 3') ?></b> :
<?php echo Yii::t('strings','Select Vessel & Route') ?> <br>
You Can 
<?php echo CHtml::link('Back to step 1 ',array('demand/quoupdate','id'=>$model->id_quotation)); ?>
</div>

<?php echo $this->renderPartial('../quotation/_form2', array('model'=>$model)); ?>