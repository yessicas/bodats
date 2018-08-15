<?php
$this->breadcrumbs=array(
	'Voyage Closes'=>array('index'),
	'Create',
);

/*
$this->menu=array(
array('label'=>'Close Voyage Order','url'=>array('voyageorder/close_voyage')),
array('label'=>'Create Voyage Close','url'=>array('voyageclose/create','id'=>$_GET['id'])),
);
*/

VoyageOrderDisplayer::displayTabLabelVoyageClosed($this,2, "Create Closed Voyage Report", "voyageclose/create/id/".$modelvoyage->id_voyage_order);
?>
<div id="content">
<h2>Create Voyage Close</h2>
<hr>
</div>

<div class="alert alert-block alert-info">
<b><?php echo Yii::t('strings','Step 1') ?></b> :
<?php echo Yii::t('strings','Voyage Close Statement') ?>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model,'modelvoyage'=>$modelvoyage)); ?>