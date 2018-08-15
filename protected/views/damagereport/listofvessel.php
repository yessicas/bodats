<?php
/* @var $this VesselController */
/* @var $model Vessel */

$this->breadcrumbs=array(
	'Vessels'=>array('index'),
	'Manage',
);

$this->menu=array(
    array('label'=>'List of Vessel Damage Report', 'url'=>array('repair/listofvessel','mode'=>$_GET['mode'])),
    
	
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('vessel-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div id="content">
<h2>List Of Vessel Damage Report</h2>
<hr>


</div>

<?php if(Yii::app()->user->hasFlash('success')):?>
<div class = "animated flash">
    <?
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
	'id'=>'vessel-grid',
    'type' => 'striped bordered condensed',
	'dataProvider'=>$model->searchActiveVessel(),
	'filter'=>$model,
	'columns'=>array(
         array(
        'header'=>'No',    'value'=>'$row+1',
                ),
		//'id_vessel',
		'VesselName',
        'VesselType',
		'Status',
        array('name'=>'NumberOfDamage', 'htmlOptions'=>array('style'=>'width:50px')),
        array('name'=>'LastDateofDamage',
            'value'=>function($data) {
            return ($data->LastDateofDamage == "0000-00-00") ? "-" : Yii::app()->dateFormatter->formatDateTime($data->LastDateofDamage, "medium",""); },
             ),

        array(
            'header'=>'Add Report ',
            'type'=>'raw',
            'value'=>function($data) {
            return  CHtml::link("Add Report", Yii::app()->controller->createUrl("repair/damagecreate",array("id"=>$data->id_vessel)), array("title"=>"Add Report"));
                   // CHtml::link("view", Yii::app()->controller->createUrl("repair/damage",array("id"=>$data->id_vessel)), array("title"=>"View"));
            },
            ),

         array(
            'header'=>'View Report ',
            'type'=>'raw',
            'value'=>function($data) {
            return  //CHtml::link("Create", Yii::app()->controller->createUrl("repair/damagecreate",array("id"=>$data->id_vessel)), array("title"=>"Create"))." ".
                    CHtml::link("View Report", Yii::app()->controller->createUrl("repair/damage",array("id"=>$data->id_vessel)), array("title"=>"View Report"));
            },
            ),

		
		
		/*
		
		'VesselDate',
		'RunningHour',
		'LastDateMaintenance',
		'LastRHMaintenance',
		'inventoryid',
		*/
		
),
)); ?>




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
        'width'       => 400,
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
