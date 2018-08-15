<?php
$this->breadcrumbs=array(
	'Request For Schedules'=>array('index'),
	'Manage',
);

$titleMenu=isset($_GET['mode']) ? $_GET['mode'] : 'DOCKING';
$this->menu=array(

array('label'=>'Manage RFS '.$titleMenu,'url'=>array('requestForSchedule/admin','mode'=>isset($_GET['mode']) ? $_GET['mode'] : 'DOCKING' )),
array('label'=>'Create RFS '.$titleMenu,'url'=>array('requestForSchedule/create','mode'=>isset($_GET['mode']) ? $_GET['mode'] : 'DOCKING')),
array('label'=>'Approved RFS '.$titleMenu,'url'=>array('requestForSchedule/approved','mode'=>isset($_GET['mode']) ? $_GET['mode'] : 'DOCKING')),
array('label'=>'Rejected RFS '.$titleMenu,'url'=>array('requestForSchedule/rejected','mode'=>isset($_GET['mode']) ? $_GET['mode'] : 'DOCKING')),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('request-for-schedule-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
<?php if(isset($_GET['mode'])){

    if($_GET['mode']=='REPAIR'){
        echo'<h2>Rejected Request For Schedules Repair</h2>';
        $modelDataProvider=$model->searchrejected($_GET['mode']);
    }

    if($_GET['mode']=='DOCKING'){
        echo'<h2>Rejected Request For Schedules Docking</h2>';
        $modelDataProvider=$model->searchrejected($_GET['mode']);
    }
    
}else{
    echo'<h2>Rejected Request For Schedules Docking</h2>';
    $modelDataProvider=$model->searchrejected(); 
}
?>
<hr>

</div>

<?php
if(Yii::app()->user->hasFlash('success')):?>

<div class = "animated flash">
	<?php
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'success' => array('closeText' => '&times;'), 

    ),
	));
	?>
</div>

<?php endif; ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'request-for-schedule-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$modelDataProvider,
'filter'=>$model,
'columns'=>array(
 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
		//'id_request_for_schedule',
 array(   
                'header'=>'Vessel',
                'name'=>'id_vessel',
                'value'=>'$data->vessel->VesselName',
                'filter'=>CHtml::listData(Vessel::model()->findAll(),'id_vessel', 'VesselName'),

               // 'filter'=>array("GROUP"=>"GROUP","NON-GROUP"=>"NON-GROUP"),
                ),
		//'id_vessel',
 /*
 array(   
                'header'=>'Vessel Status',
                'name'=>'id_vessel_status',
                'value'=>'$data->vesselstat->vessel_status',
                'filter'=>CHtml::listData(VesselStatus::model()->findAll(),'id_vessel_status', 'vessel_status'),

               // 'filter'=>array("GROUP"=>"GROUP","NON-GROUP"=>"NON-GROUP"),
                ),
*/
		//'id_vessel_status',
		//'status_rfs',
  array(
            'name'=>'StartDate',
            'value'=>'Yii::app()->dateFormatter->format("d MMMM y",strtotime($data->StartDate))',
            //'value'=>'Yii::app()->dateFormatter->formatDateTime($data->StartDate, "medium","")',
          //  'filter'=> CHtml::activeTextField($model, 'StartDate', array('id'=>'posting_date_grid')),
            ),
	//	'StartDate',

  array(
            'name'=>'EndDate',
            //'value'=>'Yii::app()->dateFormatter->formatDateTime($data->EndDate, "medium","")',
            'value'=>'Yii::app()->dateFormatter->format("d MMMM y",strtotime($data->EndDate))',
          //  'filter'=> CHtml::activeTextField($model, 'StartDate', array('id'=>'posting_date_grid')),
            ),
    array('name'=>'TypeSchedule','filter'=>array('UNSCHEDULED'=>'UNSCHEDULED', 'SCHEDULED'=>'SCHEDULED')),
    array('name'=>'TypeBreakdown','filter'=>array('UNBREAKDOWN'=>'UNBREAKDOWN', 'BREAKDOWN'=>'BREAKDOWN')),
    'notes',
	//	'EndDate',
		/*
		'notes',
		'id_schedule',
		'created_date',
		'created_user',
		'ip_user_updated',
		*/

),
)); ?> 

<br><br>

<?php
/*
$rfs=array(
    array('label'=>Yii::t('strings','RFS APPROVED'), 'url'=>array('requestforschedule/approve'), 'active'=>true),
    array('label'=>Yii::t('strings','RFS REJECTED'), 'url'=>array('requestforschedule/reject')),
);

 echo TabMenu::displayTabMenuFromBasedMenu($rfs);
*/
?>


           




<?php 
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.popup_foto',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 400,
        'height'      => 'auto',
        'autoSize'    => false,
        'closeClick'  => false,
        'closeBtn'    =>true,  
      
       //'title'=>'dfsf',
        
        'helpers'=>array(
            'title'=>array( 'type' => 'inside' ), // inside or outside
            'overlay'=>array( 'closeClick' => false ), 
         
        ),
        'openEffect'  => 'elastic',
        'closeEffect' => 'elastic',
      

    ),
));
?>

<?php

$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.various',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 450,
        'height'      => 'auto',
        'autoSize'    => false,
        'closeClick'  => false,
        'closeBtn'    =>true,  
      
       //'title'=>'dfsf',
        
        'helpers'=>array(
            'title'=>false, // inside or outside
            'overlay'=>array( 'closeClick' => false ), 
         
        ),
        'openEffect'  => 'elastic',
        'closeEffect' => 'elastic',
      

    ),
));
?>





