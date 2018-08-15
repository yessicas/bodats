<?php
$this->breadcrumbs=array(
	'Vessel Document Infos'=>array('index'),
	'Manage',
);

$this->menu=array(

array('label'=>$title,'url'=>array('warningpreventif'), 'active'=>true),

);

?>

<div id="content">
<h2><?php echo $title; ?></h2>
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

<div class="alert alert-<?php echo $css; ?>"><?php echo $desc; ?></div>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'vessel-document-info-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model,
//'filter'=>$model,
'columns'=>array(
 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
		//'id_vessel_document_info',
		//'id_vessel',
		array(  
				'header'=>'Vessel',
				'value'=>function($data) {
					if(isset($data->idVessel)){
                        return $data->idVessel->VesselName;
					}else{
						return " -- VesselTug NOT FOUND -- (".$data->id_vessel.")";
					}
                },
                'filter'=>CHtml::listData(Vessel::model()->findAll(), 'id_vessel', 'VesselName'),
                           

             ),
		array(  
				'header'=>'Document',
				'value'=>function($data) {
					if(isset($data->idVesselDocument)){
                        return $data->idVesselDocument->VesselDocumentName;
					}else{
						return " -- Document Not NOT FOUND -- (".$data->id_vessel_document.")";
					}
                },
                'filter'=>CHtml::listData(Vessel::model()->findAll(), 'id_vessel', 'VesselName'),
                           

             ),
		//'DateCreated',
		//'ValidUntil',
		array(  
				'name'=>'ValidUntil',
				'value'=>function($data) {
					return $data->ValidUntil;
                },
				'filter'=>false,
                //'filter'=>CHtml::listData(Vessel::model()->findAll(), 'id_vessel', 'VesselName'),
                           

             ),
		array(
            'header'=>'Detail ',
            'type'=>'raw',
            'value'=>function($data)  {
				return   CHtml::link('Detail', Yii::app()->controller->createUrl("documentreadines/displaydoc",array("id_vessel"=>$data->id_vessel)), array("title"=>"Detail")) ; 
            },
        ),
		//'id_vessel_document',

		//'Attachment',
		/*
		'Check1',
		'Check2',
		'Check3',
		'Check4',
		'Check5',
		'Check6',
		'Status',
		'created_date',
		'created_user',
		'ip_user_updated',
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

