<?php
$this->breadcrumbs=array(
	'Standard Vessel Brokerages'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Manage Standard Vessel Cost','url'=>array('standardvesselcost/admin')),
array('label'=>'Create Standard Vessel Cost','url'=>array('standardvesselcost/create')),
array('label'=>'Detail Brokerage Fee','url'=>array('standardvesselbrokerage/viewdetail','id'=>$_GET['id'])),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('standard-vessel-brokerage-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
<h2>View Detail -  Standard Vessel Cost ( Brokerage Fee ) </h2>
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





<div class="view">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'standard-vessel-cost-form',
    'type' => 'horizontal',
    'enableAjaxValidation'=>false,
    'clientOptions'=>array('validateOnSubmit'=>true),
    'enableClientValidation'=>true,
)); ?>

    <?php echo $form->dropDownListRow($modelVesselCost,'id_vessel',CHtml::listData(Vessel::model()->findAll(), 'id_vessel', 'VesselName','VesselType'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span4','disabled'=>'disabled'));?>   

    <?php echo $form->textFieldRow($modelVesselCost,'brokerage_fee',array('class'=>'span3', 'maxlength'=>14)); ?>


<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>$modelVesselCost->isNewRecord ? 'Save' : 'Save',
        )); ?>
</div>

<?php $this->endWidget(); ?>
</div>




<div class="tambah">
<?php      $this->widget('bootstrap.widgets.TbButton', array(      

                'label' =>Yii::t('strings','Add item Brokerage Fee'),
                'icon'=>'plus white',
                'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('standardvesselbrokerage/create','id'=>$modelVesselCost->id_standard_vessel_cost),
                'htmlOptions' => array(
                                        //'class'=>'various fancybox.ajax',
                                        ),
            
                )); 
?> 
</div>



<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'standard-vessel-brokerage-grid',
'type' => 'striped bordered condensed',
'enableSorting'=>false,
'ajaxUpdate'=>false,
'summaryText'=>'',
'dataProvider'=>$model->searchbyvesselcost($modelVesselCost->id_standard_vessel_cost),
//'filter'=>$model,
'columns'=>array(
         array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                    'htmlOptions'=>array('style'=>'text-align:center'),
            ),
		//'id_standard_vessel_brokerage',
		//'id_standard_vessel_cost',
		'BrokerageItem.brokerage_item',
		//'amount',
        array(
            'class'=>'ext.gridcolumns.TotalColumn',
            'header'=>'Cost',
            'name'=>'amount',
            'htmlOptions'=>array('style'=>'text-align:right'),
            'output'=>'Yii::app()->numberFormatter->formatCurrency($value,"")',
            'type'=>'raw',
            'footer'=>true,
            'footerHtmlOptions'=>array(
                'style'=>'text-align: right; padding-right: 5px;font-weight:bold;'
            ),
            ),
		'Currency.currency',
		'description',
		/*
		'created_date',
		'created_user',
		'ip_user_updated',
		*/
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
  'template'=>'{update}{delete}',
 
'buttons'=>array(
                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("standardvesselbrokerage/delete",array("id"=>$data->id_standard_vessel_brokerage,"id_standard_vessel_cost"=>$data->id_standard_vessel_cost))',
                       
                    ),
                    ),
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

