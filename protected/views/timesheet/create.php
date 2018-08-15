<?php
$this->breadcrumbs=array(
	'Timesheets'=>array('index'),
	'Create',
);


if(isset($_GET['inVoyageClose'])){

$title='Create Timesheet';
$this->menu=array(
array('label'=>'Close Voyage Order','url'=>array('voyageorder/close_voyage')),
array('label'=>'Timesheet','url'=>array('timesheet/update_daily','id'=>$modelvoyage->id_voyage_order,'inVoyageClose'=>1)),
array('label'=>'Create Timesheet','url'=>array('timesheet/create','id'=>$modelvoyage->id_voyage_order,'inVoyageClose'=>1)),
);
}else{
$title='Create Update Daily';
$this->menu=array(
array('label'=>'Voyage Order On Sailing','url'=>array('voyageorder/voyage_timesheet')),
array('label'=>'Daily Update','url'=>array('timesheet/update_daily','id'=>$modelvoyage->id_voyage_order)),
array('label'=>'Create Daily Update','url'=>array('timesheet/create','id'=>$modelvoyage->id_voyage_order)),
);
}


?>
<div id="content">
<h2><?php echo $title ?>  For Voyage Number <?php echo $modelvoyage->VoyageNumber ?></h2>
<hr>
</div>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'voyage-close-form-info',
)); ?>
<?php echo $this->renderPartial('../Cfile/voyage_info', array('modelvoyage'=>$modelvoyage)); ?>
<?php $this->endWidget(); ?>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelvoyage'=>$modelvoyage,'prevActivity'=>$prevActivity,)); ?>