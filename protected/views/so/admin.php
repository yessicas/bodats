<?php
$this->breadcrumbs=array(
	'Sos'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Manage SO ','url'=>array('so/admin')),
array('label'=>'Create SO','url'=>array('so/searchquo')),
array('label'=>'Create SO Without Quotation','url'=>array('soquo/quocreate')),
array('label'=>'Manage TC ','url'=>array('sooffhiredorder/admin')),
array('label'=>'Create TC','url'=>array('sooffhiredorder/create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('so-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
<h2>Manage Shipping Order (SO)</h2>
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


<style>
tr.highlight
{
background: #FFDCDC;
font-weight:bold;
}
tr.white
{
background-color: #fff;
}
</style>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'so-grid',
'type' => 'bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'rowCssClassExpression' => '$data->cssReason()', 
'columns'=>array(
		//'id_so',
		//'id_quotation',
         array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),

		'ShippingOrderNumber',
		'Quotation.Customer.CompanyName',
		array(
			'header'=>'Loading Date',
			//'value'=>'Timeanddate::getDisplayStandardDate($data->Quotation->LoadingDate)',
			'value'=>function($data) {
					if(isset($data->Quotation)){
						return Timeanddate::getDisplayStandardDate($data->Quotation->LoadingDate);
					}else{
						return "-- QuoNF --";
					}
                },
		),
		array(  
				'header'=>'Tug',
				'value'=>function($data) {
					if(isset($data->Quotation)){
						if(isset($data->Quotation->VesselTug)){
							return $data->Quotation->VesselTug->VesselName;
						}else{
							return " -- VesselTug NOT FOUND -- (".$data->Quotation->BargingVesselTug.")";
						}
					}else{
						return "-- QuoNF --";
					}
                },
                'filter'=>CHtml::listData(Vessel::model()->findAll(), 'id_vessel', 'VesselName'),
                           
		),
		array(  
				'header'=>'Barge',
				'value'=>function($data) {
					if(isset($data->Quotation)){
						if(isset($data->Quotation->VesselBarge)){
							return $data->Quotation->VesselBarge->VesselName;
						}else{
							return " -- VesselBarge NOT FOUND -- (".$data->Quotation->BargingVesselBarge.")";
						}
					}else{
						return "-- QuoNF --";
					}
                },
                'filter'=>CHtml::listData(Vessel::model()->findAll(), 'id_vessel', 'VesselName'),
                           
		),
		array(  
				'header'=>'Loading',
				'value'=>function($data) {
					if(isset($data->Quotation)){
						if(isset($data->Quotation->JettyOrigin)){
							return $data->Quotation->JettyOrigin->JettyName;
						}else{
							return " -- Port NOT FOUND -- (".$data->Quotation->BargingJettyIdStart.")";
						}
					}else{
						return "-- QuoNF --";
					}
                },
                'filter'=>CHtml::listData(Vessel::model()->findAll(), 'id_vessel', 'VesselName'),
                           
		),
		array(  
				'header'=>'UnLoading',
				'value'=>function($data) {
					if(isset($data->Quotation)){
						if(isset($data->Quotation->JettyDestination)){
							return $data->Quotation->JettyDestination->JettyName;
						}else{
							return " -- Port NOT FOUND -- (".$data->Quotation->BargingJettyIdEnd.")";
						}
					}else{
						return "-- QuoNF --";
					}
                },
                'filter'=>CHtml::listData(Vessel::model()->findAll(), 'id_vessel', 'VesselName'),
                           
		),
        //'SODate',
        /*
         array(   
                'header'=>'Quotation Number',
                'value'=>'$data->Quotation->QuotationNumber',
                ),
        */
		//'SONo',
		//'SOMonth',
		//'SOYear',
		/*
		'period_year',
		'period_month',
		'period_quartal',
		'SOQuartal',
        */
		
		//'Consignee',
		//'Quotation.LoadingDate',
		

		//'NotifyAddress',
		//'Marks',
		//'DocumentsRequired',
		//'SI_Number',

        array(
            'header'=>'Shipping Instruction Document',
            'type'=>'raw',
            'value'=>function($data) {
            return ($data->SI_Attachment == "-") ? CHtml::link("Upload Document", Yii::app()->controller->createUrl("so/updateattch",array("id"=>$data->id_so)), array("class"=>"various fancybox.ajax","title"=>"Edit Attachment"))
             : CHtml::link("View", Yii::app()->request->baseUrl."/repository/so/".$data->SI_Attachment, array("target"=>"_blank" ,"title"=>"View Attachment"))." ".
                CHtml::link("Download", Yii::app()->controller->createUrl("so/download",array("id"=>$data->id_so)), array("target"=>"_blank","title"=>"Download Attachment"))." ".
                CHtml::link("Edit", Yii::app()->controller->createUrl("so/updateattch",array("id"=>$data->id_so)), array("class"=>"various fancybox.ajax","title"=>"Edit Attachment")) ;
            },
            ),


        /*
        array(  
                'header'=>'Shipping Instruction Document',
                'type'=>'raw',
                'value'=>'
                 CHtml::link("View", Yii::app()->request->baseUrl."/repository/so/".$data->SI_Attachment, array("target"=>"_blank" ,"title"=>"View Attachment"))." ".
                 CHtml::link("Download", Yii::app()->controller->createUrl("so/download",array("id"=>$data->id_so)), array("target"=>"_blank","title"=>"Download Attachment"))." ".
                 CHtml::link("Edit", Yii::app()->controller->createUrl("so/updateattch",array("id"=>$data->id_so)), array("class"=>"various fancybox.ajax","title"=>"Edit Attachment"))
                '
                ),
        */

        /*
        array(          
            'class'=>'CLinkColumn',         
            'header'=>'Attachment View',           
            'urlExpression'=>'Yii::app()->request->baseUrl."/repository/so/".$data->SI_Attachment',          
            'label'=>'View',       
            'linkHtmlOptions'=>array(
                            'target'=>'_blank',
                        ),
        ),  

         array(          
            'class'=>'CLinkColumn',         
            'header'=>'Attachment Download',           
            'urlExpression'=>'array("so/download","id"=>$data->id_so)',          
            'label'=>'download',       
            'linkHtmlOptions'=>array(
                            'target'=>'_blank',
                        ),
        ),  
		*/

array(
'header'=>'Action',
 'class'=>'bootstrap.widgets.TbButtonColumn',
 
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("so/update",array("id"=>$data->id_so,"idsp"=>$data->id_sales_plan))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),

                    /*
                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("controller/view",array("id"=>$data->class2id))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("controller/delete",array("id"=>$data->class2id))',
                       
                    ),
                    */
                    ),

),


        array(
            'header'=>'',
            'type'=>'raw',
            'value'=>function($data) {
            return ($data->SI_Attachment == "") ? " Document Not Uploaded Yet"
             : "" ; },
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


