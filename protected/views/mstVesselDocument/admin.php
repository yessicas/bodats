<?php
$this->breadcrumbs=array(
	'Mst Vessel Documents'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Manage Vessel Document','url'=>array('master/masdoc')),
array('label'=>'Create Vessel Document','url'=>array('master/masdoccreate')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('mst-vessel-document-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
<h2>Manage Vessel Documents</h2>
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


<?php $gridWidget= $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'mst-vessel-document-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
        'VesselType',
	//	'id_vessel_document',
		'VesselDocumentName',
       // 'VesselDocumentNameEng',
        'Dasar',
		//'Information',
         array(
                'header'=>'Status',
                'name'=>'Status',
              //  'value'=>function($data) {
            //return ($data->Status == "1") ? "Used" : "Unused";
            //},
                'value'=>'MstVesselDocument::model()->statusUsed($data->Status)',
            ),
           
        //'Status',
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
 // 'template'=>'{view}{update}{delete}{download}',
'buttons'=>array(

                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("MstVesselDocument/update",array("id"=>$data->id_vessel_document))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("MstVesselDocument/view",array("id"=>$data->id_vessel_document))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("MstVesselDocument/delete",array("id"=>$data->id_vessel_document))',
                       
                    ),
                    ),
),
),
)); ?> 

<?php $this->widget('bootstrap.widgets.TbButton', array(

                'label' =>Yii::t('strings','Export'),
                'icon'=>'download white',
                //'type' => 'primary',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('MstVesselDocument/ExportToFile'),
                'htmlOptions' => array(
                                        'class'=>'btn btn-primary pull-right',
                                        'style'=>'margin-top:-50px; width:60px; border-radius:20px;',
                                        ),
                ));?>


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
        'maxWidth'    => 900,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 550,
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




