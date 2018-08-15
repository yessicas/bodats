<?php
$this->breadcrumbs=array(
	'Quotations'=>array('index'),
	'Create',
);

$this->menu=array(
 //array('label'=>'Manage Quotation', 'url'=>array('demand/quo')),
 array('label'=>'Manage SO ','url'=>array('so/admin')),
 array('label'=>'Create SO','url'=>array('so/searchquo')),
 array('label'=>'Create SO Without Quotation','url'=>array('soquo/quocreate')),
 array('label'=>'Create SO Without Quotation  Step 2', 'url'=>array('soquo/quocreate2','id'=>$model->id_quotation)),
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
<h4 style="color:#BD362F;"> Barging </h4>
<?php } ?>
<?php if($model->id_bussiness_type_order==200){ ?>
<h4 style="color:#BD362F;"> Barging Transhipment </h4>
<?php } ?>
<?php if($model->id_bussiness_type_order==250){ ?>
<h4 style="color:#BD362F;"> Transhipment </h4>
<?php } ?>
<br>
<b><?php echo Yii::t('strings','Step 2') ?></b> :
<?php echo Yii::t('strings','Select Vessel & Route') ?> <br>
You Can 
<?php echo CHtml::link('Back to step 1 ',array('soquo/quoupdate','id'=>$model->id_quotation)); ?>
</div>

<?php echo $this->renderPartial('../soquo/_form2', array('model'=>$model)); ?>