<?php
$this->breadcrumbs=array(
	'Standard Fuels'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Manage Standard Fuel','url'=>array('standardfuel/admin')),
array('label'=>'Create Standard Fuel','url'=>array('standardfuel/create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});

//$('.search-form form').submit(function(){
//$.fn.yiiGridView.update('standard-fuel-grid', {
//data: $(this).serialize()
//});
//return false;
//});

$('.search-form form').submit(function(){
     $.fn.yiiListView.update('standard-fuel', { 
        data: $(this).serialize()
    });

    return false;
});

");
?>

<style>
.deleteajax:hover{
cursor:pointer;
}
</style>

<script type="text/javascript">

 function deletestrfuel(id_standard_fuel)
   {
    //alert(id_standard_fuel);
    
     var text = "<?php echo Yii::t('strings','Are You Sure Delete This Data???')?>";
      var jawab;
 
      jawab = confirm(text)
      if(jawab)
      {
    jQuery.ajax({'type':'post','success':allFine,'url':'<?php echo Yii::app()->request->baseUrl; ?>/standardfuel/deleteajax/id/'+id_standard_fuel,'cache':false,'data':jQuery(this).parents("form").serialize()});return false;
    return false;
    }
      
   }
   
function allFine(data) {
                $.fn.yiiListView.update('standard-fuel', {   
                    data: $(this).serialize()
                });
                        
        }
        
          


</script>

<div id="content">
<h2>Manage Standard Fuels</h2>
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

<?php /*echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div><!-- search-form -->
*/ ?>

<?php 


$this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'standard-fuel-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'htmlOptions'=>array('style'=>'font-size:10px;'),
'filter'=>$model,
'columns'=>array(
		//'id_standard_fuel',
		 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
		  //'type_set_feet',
		  array( 
            'class' => 'editable.EditableColumn',
            'name' => 'type_set_feet',
            'header'=>'Size',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            )
          ),  
          //'type_set_power',
        array( 
            'class' => 'editable.EditableColumn',
            'name' => 'type_set_power',
            'header'=>'Hp',
            //'headerHtmlOptions'=>array('style'=>'font-size:10px;'),
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            )
          ),  
		//'JettyIdStart',
		array( 
            'class' => 'editable.EditableColumn',
            'name' => 'JettyIdStart',
            'header'=>'Start',
			'filter'=>CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
            'editable' => array(
                'type'      => 'select',
				'source'    => Editable::source(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            )
          ),
		//'JettyIdEnd',
		array( 
            'class' => 'editable.EditableColumn',
            'name' => 'JettyIdEnd',
            'header'=>'End',
			'filter'=>CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
            'editable' => array(
                'type'      => 'select',
				'source'    => Editable::source(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            )
          ),
		/*
        array( 
            'class' => 'editable.EditableColumn',
            'name' => 'typeway',
            'header'=>'Tipe Way', // required
            'filter'=>array('one way'=>'one way','pp'=>'pp'),
            'editable' => array(
                'type'      => 'select',
                'source'    => array('one way'=>'one way','pp'=>'pp'),
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            )
          ),

         array( 
            'class' => 'editable.EditableColumn',
            'name' => 'loaded',
            'header'=>'ballast/ loaded', // required
            'filter'=>array('loaded'=>'loaded','ballast'=>'ballast'),
            'editable' => array(
                'type'      => 'select',
                'source'    => array('loaded'=>'loaded','ballast'=>'ballast'),
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            )
          ),
		  */

		//'jarak',
		array( 
            'class' => 'editable.EditableColumn',
            'name' => 'jarak',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            )
          ),  
		
         
		//'speed_standard',
		array( 
            'class' => 'editable.EditableColumn',
            'name' => 'speed_standard',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            )
          ),  
		//'target_sailing_time',
		array( 
            'class' => 'editable.EditableColumn',
            'name' => 'target_sailing_time',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            )
          ),  
		/*
        array( 
            'class' => 'editable.EditableColumn',
            'name' => 'me_old',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            )
          ),  
		*/
        array( 
            'class' => 'editable.EditableColumn',
            'name' => 'me_new',
            'type'=>'raw',
            'value'=>'Yii::app()->numberFormatter->formatCurrency($data->me_new,"")',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            
            )
          ),  
		/*
         array( 
            'class' => 'editable.EditableColumn',
            'name' => 'ae_old',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            )
          ),  
		*/
        array( 
            'class' => 'editable.EditableColumn',
            'name' => 'ae_new',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            )
          ),  



		/*
        array( 
            'class' => 'editable.EditableColumn',
            'name' => 'shift_old',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            )
          ),  
		*/
        array( 
            'class' => 'editable.EditableColumn',
            'name' => 'shift_new',
             'type'=>'raw',
            'value'=>'Yii::app()->numberFormatter->formatCurrency($data->shift_new,"")',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            )
          ),  
		/*
         array( 
            'class' => 'editable.EditableColumn',
            'name' => 'outbond_old',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            )
          ),  
		
		*/
		
        array( 
            'class' => 'editable.EditableColumn',
            'name' => 'outbond_new',
            'type'=>'raw',
            'value'=>'Yii::app()->numberFormatter->formatCurrency($data->outbond_new,"")',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            )
          ),  

        //'sailing_time',
        array( 
            'class' => 'editable.EditableColumn',
            'name' => 'sailing_time',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            )
          ),  

		//'lay_time',
		array( 
            'class' => 'editable.EditableColumn',
            'name' => 'lay_time',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            )
          ),  
		//'cycle_time',
		array( 
            'class' => 'editable.EditableColumn',
            'name' => 'cycle_time',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            )
          ),  
		//'total_bbm',
		
		array( 
            'class' => 'editable.EditableColumn',
            'name' => 'total_bbm',
			 'value'=>'Yii::app()->numberFormatter->formatCurrency($data->total_bbm,"")',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            )
          ),  
		
		
        array( 
            'class' => 'editable.EditableColumn',
            'name' => 'total_bbm_new',
            'type'=>'raw',
            'value'=>'Yii::app()->numberFormatter->formatCurrency($data->total_bbm_new,"")',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            )
          ),  
        /*
		//'agency_rate',
		array( 
            'class' => 'editable.EditableColumn',
            'name' => 'agency_rate',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            )
          ),  
		//'agency_rate_id_currency',
		array( 
            'class' => 'editable.EditableColumn',
            'name' => 'agency_rate_id_currency',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            )
          ),  
		//'type',
		array( 
            'class' => 'editable.EditableColumn',
            'name' => 'type',
            'editable' => array(
                'type'      => 'text',
                'url'       => $this->createUrl('standardfuel/editable'),
                'placement' => 'top',
            )
          ),  
		*/
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
 'template'=>'{delete}',
					
),
),
)); 


?> 

<?php /*
$pre_html ='
<div class="grid-view" style="font-size:10px;padding-top:0px;">
<table class="items table table-striped table-bordered table-condensed">
<thead>

<tr>
<th rowspan=2 style="vertical-align:middle;text-align:center;">NO</th>
<th colspan=3 style="vertical-align:middle;text-align:center;">Route</th> 
<th rowspan=2 style="vertical-align:middle;text-align:center;">Jarak</th> 
<th rowspan=2 style="vertical-align:middle;text-align:center;">Speed Standard</th> 
<th rowspan=2 style="vertical-align:middle;text-align:center;">Target Sailing (Jam) </th> 
<th rowspan=2 style="vertical-align:middle;text-align:center;">Lazy Time (Day) </th>
<th rowspan=2 style="vertical-align:middle;text-align:center;">Sailing Time (Day)</th>
<th rowspan=2 style="vertical-align:middle;text-align:center;">Cycle Time (Day)</th> 
<th rowspan=2 style="vertical-align:middle;text-align:center;">Total BBM (Liter)</th> 
<th rowspan=2 style="vertical-align:middle;text-align:center;">Total Fuel (Amount)</th> 
<th rowspan=2 style="vertical-align:middle;text-align:center;">Agency</th> 
<th rowspan=2 style="vertical-align:middle;text-align:center;">Type</th>
<th rowspan=2 style="vertical-align:middle;text-align:center;"></th>
</tr>

<tr>
<th>Type Set </th> <th>Start</th> <th>End</th>
</tr>

<thead>
<tbody>
';


$post_html ='
</tbody>
</table>
</div>';

 
?>

<?php
$widget = $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$model->search(),
'id'=>'standard-fuel',
'itemView'=>'_view',
'template'   => "{summary}".$pre_html."{items}".$post_html."{pager}",
)); 
Editable::attachAjaxUpdateEvent($widget); 

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

