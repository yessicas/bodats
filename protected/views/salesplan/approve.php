<?php
$this->breadcrumbs=array(
	'Fuel Consumption Dailies'=>array('index'),
	'Manage',
);


$this->menu=array(

array('label'=>'Sales Plan','url'=>array('demand/salesplan'), 'active'=>false),
array('label'=>'Approve & Lock Sales Plan','url'=>array('salesplan/approve'), 'active'=>True),
array('label'=>'Copy To Monthly','url'=>array('salesplan/copytomonthly'), 'active'=>false),
);
?>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'action'=>Yii::app()->createUrl($this->route),
    'type' => 'horizontal',
    'id'=>'approvesalesplan',
    'method'=>'get',
)); ?>

<div class="view">

	

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="SalesPlan_Year"><?php echo "Year &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
        <?php if(isset($_GET['Year'])){
            $dataYear=$_GET['Year'];
        }else{
            $dataYear='';
        }
        ?>
		<?php echo CHtml::dropDownList('Year',$dataYear,Timeanddate::getlistyear(),
			array('prompt'=>Yii::t('strings','-- Select Year --'),'class'=>'span4'));?>
            <span class="help-block error" id="Year_message" ></span>
	</div>
	</div>

	<div class="form-actions" style="margin-top:10px; padding:10px 75px;">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'=>'primary',
            'label'=>'Display',
        )); ?>
    </div>

</div>

<?php
if(isset($_GET['Year'])) { ?>

<div class="userlistviewall" style="display:inline">

<?php 

}
else {
?>
    <div class="userlistviewall" style="display:none">
        <?php

}

?>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'reservation-inquiry-grid',
    'type' => 'striped bordered condensed',
    'summaryText'=>'',
    'dataProvider' => $arrayDataProvider,
    'columns' => array(
        array(
            'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),

        array( 
            'header'=>'Month',        
            'name' => 'Month',
            'type' => 'raw',
            'value' => 'CHtml::encode($data["Month"])'
        ),

        /*
         array( 
            'header'=>'Year',        
            'name' => 'Year',
            'type' => 'raw',
            'value' => 'CHtml::encode($data["Year"])'
        ),

        */

        array( 
            'header'=>'Total Voyage',     
            'name' => 'TotalVoyage',
            'type' => 'raw',
            'value' => 'SalesPlanDB::getcountSalesDBPerYear($data["id"], $data["Year"])', // id disini sama dengan month
            'htmlOptions'=>array('style'=>'text-align:right'),
        ),

        array( 
            'header'=>'Total Cost',      
            'name' => 'TotalCost',
            'type' => 'raw',
            'value' => 'NumberAndCurrency::formatCurrency(SalesPlanDB::getTotalSalesCostPerYear($data["id"], $data["Year"]))',
            'htmlOptions'=>array('style'=>'text-align:right'),
        ),

        array( 
            'header'=>'Total Revenue',     
            'name' => 'TotalRevenue',
            'type' => 'raw',
            'value' => 'NumberAndCurrency::formatCurrency(SalesPlanDB::getTotalRavenuePerYear($data["id"], $data["Year"]))',
            'htmlOptions'=>array('style'=>'text-align:right'),
        ),

        array(
            'header'=>'GP',
            'name' => 'GP',
            'type' => 'raw',
            'value' => 'NumberAndCurrency::formatCurrency(SalesPlanDB::getTotalGPCOGSPerYear($data["id"], $data["Year"]))',
            'htmlOptions'=>array('style'=>'text-align:right'),
           
        ),
    ),
));

?>

<div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'=>'primary',
            'label'=>'LOCK SALES PLAN YEAR 2015',
        )); ?>
    </div>


<?php $this->endWidget(); ?>



<script>
function reloaddata(id, data) {
     $('.userlistviewall').show(300);
}
</script>

<script>
$(document).ready(function(){

        $('#approvesalesplan').submit(function(){
        var year=$('#Year').val() ;
        var notblankmessage='You Must Select Year';

        if (year==''){
        //alert('no');
        $("#Year_message").html(notblankmessage);
        return false;
        }


        else{
        return true;    
        }


        });



});

</script>