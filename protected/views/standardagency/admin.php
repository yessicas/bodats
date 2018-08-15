<?php
$this->breadcrumbs=array(
	'Standard Agencies'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Manage Standard Agency','url'=>array('standardagency/admin')),
array('label'=>'Create Standard Agency','url'=>array('standardagency/create')),
);


?>

<div id="content">
<h2>Manage Standard Agencies</h2>
<hr>
<?php /*
<div class="tambah">
<?php      $this->widget('bootstrap.widgets.TbButton', array(      

                'label' =>Yii::t('strings','Add controllerClass'),
                'icon'=>'plus white',
                'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('controllerClass/create'),
                'htmlOptions' => array(
                                        'class'=>''
                                        ),
            
                )); 
				?> </div> */ ?>
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

<?php /* echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div><!-- search-form --> */ ?>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'standard-agency-grid',
'type' => 'striped bordered condensed',
'htmlOptions'=>array('style'=>'font-size:10px;'),
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
		//'id_standard_agency',
		//'JettyIdStart',
		//'JettyIdEnd',
		//'JettyIdStart',
		array( 
            'class' => 'editable.EditableColumn',
            'name' => 'JettyIdStart',
			'filter'=>CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
            'editable' => array(
                'type'      => 'select',
				'source'    => Editable::source(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
                'url'       => $this->createUrl('standardagency/editable'),
                'placement' => 'top',
            )
          ),
		//'JettyIdEnd',
		array( 
            'class' => 'editable.EditableColumn',
            'name' => 'JettyIdEnd',
			'filter'=>CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
            'editable' => array(
                'type'      => 'select',
				'source'    => Editable::source(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
                'url'       => $this->createUrl('standardagency/editable'),
                'placement' => 'top',
            )
          ),
		//'agency_fix_cost',
		 array( 
            'class' => 'editable.EditableColumn',
            'name' => 'agency_fix_cost',
            'type'=>'raw',
           // 'value' => 'CHtml::encode(number_format($data->agency_fix_cost,0,".",","))',
            'value'=>'Yii::app()->numberFormatter->formatCurrency($data->agency_fix_cost,"")',
           // 'value'=>'Yii::app()->numberFormatter->formatCurrency($data->agency_fix_cost,"")."<br>".CHtml::link("Detail", Yii::app()->controller->createUrl("standardagencyitem/viewdetail",
                                     // array("id"=>$data->id_standard_agency))) ',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardagency/editable'),
                'placement' => 'top',
                'htmlOptions'=>array('data-value'=>'$data->agency_fix_cost'),
                'options' => array(
                'success' => 'js: function(response, newValue) {
                              if (!response.success){
                                return response.msg;
                              }else{
                                $.fn.yiiGridView.update("standard-agency-grid");
                              }  
                            }',
                ),
            )
          ),  
		//'agency_var_cost',
		 array( 
            'class' => 'editable.EditableColumn',
            'name' => 'agency_var_cost',
            'value'=>'Yii::app()->numberFormatter->formatCurrency($data->agency_var_cost,"")',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardagency/editable'),
                'placement' => 'top',
                'htmlOptions'=>array('data-value'=>'$data->agency_var_cost'),
                'options' => array(
                'success' => 'js: function(response, newValue) {
                              if (!response.success){
                                return response.msg;
                              }else{
                                $.fn.yiiGridView.update("standard-agency-grid");
                              }  
                            }',
                ),
            )
          ),  

          array(  
                'header'=>' ',
                'type'=>'raw',
                'value'=>'CHtml::link("Detail", Yii::app()->controller->createUrl("standardagencyitem/viewdetail",
                                      array("id"=>$data->id_standard_agency)))'
                ),

		//'rent',
		/*
		array( 
            'class' => 'editable.EditableColumn',
            'name' => 'rent',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardagency/editable'),
                'placement' => 'top',
            )
          ),  
		
		//'other',
		array( 
            'class' => 'editable.EditableColumn',
            'name' => 'other',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardagency/editable'),
                'placement' => 'top',
            )
          ),  
		//'id_currency',
		*/
        /*
		array( 
            'class' => 'editable.EditableColumn',
            'name' => 'id_currency',
			'filter'=>CHtml::listData(Currency::model()->findAll(), 'id_currency', 'currency'),
            'editable' => array(
                'type'      => 'select',
				'source'    => Editable::source(Currency::model()->findAll(), 'id_currency', 'currency'),
                'url'       => $this->createUrl('standardagency/editable'),
                'placement' => 'top',
            )
          ),
		*/
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
 'template'=>'{delete}',
 /*
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("controller/update",array("id"=>$data->class2id))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),

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
                    ),
*/
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

