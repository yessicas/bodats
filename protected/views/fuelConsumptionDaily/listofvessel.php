<?php
/* @var $this VesselController */
/* @var $model Vessel */

$this->breadcrumbs=array(
	'Vessels'=>array('index'),
	'Manage',
);

$this->menu=array(
    array('label'=>'Fuel ROB per Vessel', 'url'=>array('fuelconsumptiondaily/vesselfuel'), 'active'=>true),
    
	
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
<h2>Fuel Last ROB Per Vessel</h2>
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
        //'VesselType',
		array(
			'name'=>'VesselType', 
			'filter'=>false,
		),
		'Status',
        array(
			'name'=>'LastROBValue', 
			'htmlOptions'=>array('style'=>'width:100px; text-align: right;'),
			'value'=>function($data) {
				return (NumberAndCurrency::formatNumber($data->LastROBValue));
			}
		),
        array('name'=>'LastROBDate',
            'value'=>function($data) {
            return ($data->LastROBDate == "0000-00-00") ? "-" : Timeanddate::getDisplayStandardDatetime($data->LastROBDate) ; },
             ),

        array(
            'header'=>'View Detail ROB',
            'type'=>'raw',
            'value'=>function($data) {
				return  CHtml::link("View", Yii::app()->controller->createUrl("fuelconsumptiondaily/admin",array("id_vessel"=>$data->id_vessel)));
            },
        ),
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
