<?php
$this->breadcrumbs=array(
	'Standard Agency Items'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Manage Standard Agency','url'=>array('standardagency/admin')),
array('label'=>'Detail Standard Agency','url'=>array('standardagencyitem/viewdetail','id'=>$_GET['id'])),
//array('label'=>'Create StandardAgencyItem','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('standard-agency-item-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
<h2>View Detail -  Standard Agency </h2>
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
    'id'=>'standard-agency-form',
    'enableAjaxValidation'=>false,
    'type' => 'horizontal',
    'clientOptions'=>array('validateOnSubmit'=>true),
    'enableClientValidation'=>true,
)); ?>


<?php //echo $form->errorSummary($modelAgency); ?>

    <?php //echo $form->textFieldRow($model,'JettyIdStart',array('class'=>'span5')); ?>

    <?php //echo $form->textFieldRow($model,'JettyIdEnd',array('class'=>'span5')); ?>
    
    <?php echo $form->dropDownListRow($modelAgency,'JettyIdStart',CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span4','disabled'=>'disabled'));?>


    <?php //echo $form->textFieldRow($model,'IdJettyDestination',array('class'=>'span5')); ?>

    <?php echo $form->dropDownListRow($modelAgency,'JettyIdEnd',CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
    array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span4','disabled'=>'disabled'));?>


    <?php echo $form->textFieldRow($modelAgency,'agency_fix_cost',array('class'=>'span4', 'maxlength'=>14)); ?>

    <?php echo $form->textFieldRow($modelAgency,'agency_var_cost',array('class'=>'span4', 'maxlength'=>14)); ?>

    <?php //echo $form->textFieldRow($model,'description',array('class'=>'span5')); ?>

    <?php //echo $form->textFieldRow($model,'other',array('class'=>'span5')); ?>

    <?php //echo $form->textFieldRow($model,'id_currency',array('class'=>'span5')); ?>
    <?php //echo $form->dropDownListRow($modelAgency,'id_currency',CHtml::listData(Currency::model()->findAll(), 'id_currency', 'currency'),
    //array('prompt'=>Yii::t('strings','-- Select --'),'class'=>'span2'));?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>$model->isNewRecord ? 'Save' : 'Save',
        )); ?>
</div>

<?php $this->endWidget(); ?>
</div>




<div class="tambah">
<?php      $this->widget('bootstrap.widgets.TbButton', array(      

                'label' =>Yii::t('strings','Add item Agency'),
                'icon'=>'plus white',
                'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('standardagencyitem/create','id'=>$modelAgency->id_standard_agency),
                'htmlOptions' => array(
                                        //'class'=>'various fancybox.ajax',
                                        ),
            
                )); 
?> 
</div>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'standard-agency-item-grid',
'type' => 'striped bordered condensed',
'enableSorting'=>false,
'ajaxUpdate'=>false,
'summaryText'=>'',
'dataProvider'=>$model->searchbyagency($modelAgency->id_standard_agency),
//'filter'=>$model,
'columns'=>array(
         array(
        'header'=>'No',    'value'=>'$row+1',
                    'htmlOptions'=>array('style'=>'text-align:center'),
            ),
		//'id_standard_agency_item',
		//'id_standard_agency',
        'AgencyItem.agency_item',
		'description',
		'type',
		//'amount',
		'quantity',
		'metric',
        array('header'=>'Amount','value'=>'Yii::app()->numberFormatter->formatCurrency($data->unit_price,"")'),
        array('header'=>'Total','value'=>'Yii::app()->numberFormatter->formatCurrency( $data->quantity * $data->unit_price ,"")'),
        
        /*
        array(
            'class'=>'ext.gridcolumns.TotalColumn',
            'name'=>'unit_price',
            'htmlOptions'=>array('style'=>'text-align:right'),
            'output'=>'Yii::app()->numberFormatter->formatCurrency($value,"")',
            'type'=>'raw',
            'footer'=>true,
            'footerHtmlOptions'=>array(
                'style'=>'text-align: right; padding-right: 5px;font-weight:bold;'
            ),
        ),
        */

		//'agency_fix_cost',
		/*
        array(
            'class'=>'ext.gridcolumns.TotalColumn',
            'name'=>'agency_fix_cost',
            'htmlOptions'=>array('style'=>'text-align:right'),
            'output'=>'Yii::app()->numberFormatter->formatCurrency($value,"")',
            'type'=>'raw',
            'footer'=>true,
            'footerHtmlOptions'=>array(
                'style'=>'text-align: right; padding-right: 5px;font-weight:bold;'
            ),
            ),
		//'agency_var_cost',
        array(
            'class'=>'ext.gridcolumns.TotalColumn',
            'name'=>'agency_var_cost',
            'htmlOptions'=>array('style'=>'text-align:right'),
            'output'=>'Yii::app()->numberFormatter->formatCurrency($value,"")',
            'type'=>'raw',
            'footer'=>true,
            'footerHtmlOptions'=>array(
                'style'=>'text-align: right; padding-right: 5px;font-weight:bold;'
            ),
            ),
		*/
        //'Currency.currency',
       
		/*
		'id_currency',
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

                        'url'=> 'Yii::app()->createUrl("standardagencyitem/delete",array("id"=>$data->id_standard_agency_item,"id_standard_agency"=>$data->id_standard_agency))',
                       
                    ),
                    ),
),
),
)); ?> 



    <?php 
    $sqlFix ="SELECT SUM( quantity * unit_price ) AS total
                FROM  `standard_agency_item` 
                WHERE id_standard_agency =$modelAgency->id_standard_agency
                AND TYPE =  'FIX'"; 

    $commandFix =Yii::app()->db->createCommand($sqlFix); 
    $totalFix =$commandFix->queryRow(); 


    $sqlVar ="SELECT SUM( quantity * unit_price ) AS total
                FROM  `standard_agency_item` 
                WHERE id_standard_agency =$modelAgency->id_standard_agency
                AND TYPE =  'VARIABLE'";

    $commandVar =Yii::app()->db->createCommand($sqlVar); 
    $totalVar =$commandVar->queryRow(); 

    $totalStarndardCostFix=$totalFix['total'];
    $totalStarndardCostVar=$totalVar['total'];
    $allTotal=$totalStarndardCostFix + $totalStarndardCostVar;


    //echo 'Total Amount FIX : '.NumberAndCurrency::formatCurrency($totalStarndardCostFix).'<br>';
    //echo 'Total Amount VARIABLE : '.NumberAndCurrency::formatCurrency($totalStarndardCostVar).'<br>';
    //echo 'Total Amount  : '.NumberAndCurrency::formatCurrency($allTotal).'<br>';

    ?>

<div class="grid-view" style="font-size:10px;padding-top:0px;">
<table class="items table table-striped table-bordered table-condensed" style = 'width:250px;'>
<thead>

<tr class="even">
<td style="vertical-align:middle;text-align:left;"> Total Amount FIX </td>
<td style="vertical-align:middle;text-align:right;"> <?php echo NumberAndCurrency::formatCurrency($totalStarndardCostFix) ?> </td>
</tr>

<tr class="even">
<td style="vertical-align:middle;text-align:left;"> Total Amount VARIABLE </td>
<td style="vertical-align:middle;text-align:right;"> <?php echo NumberAndCurrency::formatCurrency($totalStarndardCostVar) ?> </td>
</tr>

<tr class="even">
<td style="vertical-align:middle;text-align:left;"> Total Amount  </td>
<td style="vertical-align:middle;text-align:right;"> <?php echo NumberAndCurrency::formatCurrency($allTotal) ?> </td>
</tr>

</tbody>
</table>
</div>


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

