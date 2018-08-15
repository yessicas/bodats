<?php
$this->breadcrumbs=array(

	'Standard Vessel Costs'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Manage Standard Fixed Cost','url'=>array('standardvesselcost/admin')),
array('label'=>'Create Standard Fixed Cost','url'=>array('standardvesselcost/create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('standard-vessel-cost-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
<h2>Manage Standard Fixed Costs</h2>
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
'id'=>'standard-vessel-cost-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		//'id_sp_standard_vessel_cost',

         array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),

		//'id_vessel',

         /*
          array(   
                'header'=>'Vessel Name',
                'name'=>'id_vessel',
                'value'=>'$data->Vessel->VesselName',
                'filter'=>CHtml::listData(Vessel::model()->findAll(),'id_vessel', 'VesselName'),
                ),
          */
        array( 
            'class' => 'editable.EditableColumn',
            'name' => 'id_vessel',
           'filter'=>CHtml::listData(Vessel::model()->findAll(array('order'=>'VesselName ASC')),'id_vessel', 'VesselName'),
            'editable' => array(
                'type'      => 'select',
                'source'    => Editable::source(Vessel::model()->findAll(),'id_vessel', 'VesselName'),
                'url'       => $this->createUrl('standardvesselcost/editable'),
                'placement' => 'top',
            )
          ),

        
		//'month',
		//'year',
		//'depreciation_cost',
        array( 
            'class' => 'editable.EditableColumn',
            'name' => 'depreciation_cost',
            'value'=>'Yii::app()->numberFormatter->formatCurrency($data->depreciation_cost,"")',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardvesselcost/editable'),
                'placement' => 'top',
                'htmlOptions'=>array('data-value'=>'$data->depreciation_cost'),
                'options' => array(
                'success' => 'js: function(response, newValue) {
                              if (!response.success){
                                return response.msg;
                              }else{
                                $.fn.yiiGridView.update("standard-vessel-cost-grid");
                              }  
                            }',
                ),
            )
          ),  

        //'rent_cost',
        array( 
            'class' => 'editable.EditableColumn',
            'name' => 'rent_cost',
            'value'=>'Yii::app()->numberFormatter->formatCurrency($data->rent_cost,"")',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardvesselcost/editable'),
                'placement' => 'top',
                'htmlOptions'=>array('data-value'=>'$data->rent_cost'),
                'options' => array(
                'success' => 'js: function(response, newValue) {
                              if (!response.success){
                                return response.msg;
                              }else{
                                $.fn.yiiGridView.update("standard-vessel-cost-grid");
                              }  
                            }',
                ),
            )
          ),  

		//'crew_own_cost',
         array( 
            'class' => 'editable.EditableColumn',
            'name' => 'crew_own_cost',
             'value'=>'Yii::app()->numberFormatter->formatCurrency($data->crew_own_cost,"")',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardvesselcost/editable'),
                'placement' => 'top',
                'htmlOptions'=>array('data-value'=>'$data->crew_own_cost'),
                'options' => array(
                'success' => 'js: function(response, newValue) {
                              if (!response.success){
                                return response.msg;
                              }else{
                                $.fn.yiiGridView.update("standard-vessel-cost-grid");
                              }  
                            }',
                ),
            )
          ),  
		//'crew_subcont_cost',
        array( 
            'class' => 'editable.EditableColumn',
            'name' => 'crew_subcont_cost',
            'value'=>'Yii::app()->numberFormatter->formatCurrency($data->crew_subcont_cost,"")',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardvesselcost/editable'),
                'placement' => 'top',
                'htmlOptions'=>array('data-value'=>'$data->crew_subcont_cost'),
                'options' => array(
                'success' => 'js: function(response, newValue) {
                              if (!response.success){
                                return response.msg;
                              }else{
                                $.fn.yiiGridView.update("standard-vessel-cost-grid");
                              }  
                            }',
                ),
            )
          ),  

		//'insurance',
        array( 
            'class' => 'editable.EditableColumn',
            'name' => 'insurance',
            'value'=>'Yii::app()->numberFormatter->formatCurrency($data->insurance,"")',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardvesselcost/editable'),
                'placement' => 'top',
                'htmlOptions'=>array('data-value'=>'$data->insurance'),
                'options' => array(
                'success' => 'js: function(response, newValue) {
                              if (!response.success){
                                return response.msg;
                              }else{
                                $.fn.yiiGridView.update("standard-vessel-cost-grid");
                              }  
                            }',
                ),
            )
          ),  
		//'repair',
        array( 
            'class' => 'editable.EditableColumn',
            'name' => 'repair',
            'value'=>'Yii::app()->numberFormatter->formatCurrency($data->repair,"")',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardvesselcost/editable'),
                'placement' => 'top',
                'htmlOptions'=>array('data-value'=>'$data->repair'),
                'options' => array(
                'success' => 'js: function(response, newValue) {
                              if (!response.success){
                                return response.msg;
                              }else{
                                $.fn.yiiGridView.update("standard-vessel-cost-grid");
                              }  
                            }',
                ),
            )
          ),  
		//'docking',
        array( 
            'class' => 'editable.EditableColumn',
            'name' => 'docking',
            'value'=>'Yii::app()->numberFormatter->formatCurrency($data->docking,"")',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardvesselcost/editable'),
                'placement' => 'top',
                'htmlOptions'=>array('data-value'=>'$data->docking'),
                'options' => array(
                'success' => 'js: function(response, newValue) {
                              if (!response.success){
                                return response.msg;
                              }else{
                                $.fn.yiiGridView.update("standard-vessel-cost-grid");
                              }  
                            }',
                ),
            )
          ),  
		//'brokerage_fee',
        array( 
            'class' => 'editable.EditableColumn',
            'name' => 'brokerage_fee',
            'type'=>'raw',
             //'value'=>'Yii::app()->numberFormatter->formatCurrency($data->brokerage_fee,"")',
            'value'=>'Yii::app()->numberFormatter->formatCurrency($data->brokerage_fee,"")."<br>".CHtml::link("Detail", Yii::app()->controller->createUrl("standardvesselbrokerage/viewdetail",
                                      array("id"=>$data->id_sp_standard_vessel_cost))) ',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardvesselcost/editable'),
                'placement' => 'top',
                'htmlOptions'=>array('data-value'=>'$data->brokerage_fee'),
                'options' => array(
                'success' => 'js: function(response, newValue) {
                              if (!response.success){
                                return response.msg;
                              }else{
                                $.fn.yiiGridView.update("standard-vessel-cost-grid");
                              }  
                            }',
                ),
            )
          ),  
		//'others',
         array( 
            'class' => 'editable.EditableColumn',
            'name' => 'others',
            'value'=>'Yii::app()->numberFormatter->formatCurrency($data->others,"")',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardvesselcost/editable'),
                'placement' => 'top',
                'htmlOptions'=>array('data-value'=>'$data->others'),
                'options' => array(
                'success' => 'js: function(response, newValue) {
                              if (!response.success){
                                return response.msg;
                              }else{
                                $.fn.yiiGridView.update("standard-vessel-cost-grid");
                              }  
                            }',
                ),
            )
          ),  
		//'created_date',
		//'created_user',
		//'ip_user_updated',
		
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
 'template'=>'{delete}',
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

