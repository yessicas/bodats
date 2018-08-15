<?php
$this->breadcrumbs=array(
	'Add Schedule Repair AE'=>array('RepairAE'),
);

$this->menu=array(

//array('label'=>'Calculator','url'=>array('demand/caculat')),
//array('label'=>'Calculator Result','url'=>array('demand/result'), 'active'=>true),
);
?>

<?php

	Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
	    $('.search-form').toggle();
	    return false;
	});
	$('.search-form form').submit(function(){
	    $.fn.yiiGridView.update('repairae-grid', {
	        data: $(this).serialize()
	    });
	    return false;
	});
	");
	?>




<h3>Add Schedule - Repair AE</h3>
<hr>
<h5 style="color:#BD362F"> Current Date : <?php echo date("d-m-Y"); ?> </h5>


<div class="view">

	<?php /*$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>'demand/salesplan',
    'method'=>'post',
    'type'=>'horizontal',
));  */ ?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'RepairAE-form',
	'type' => 'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array('validateOnSubmit'=>true),
	'enableClientValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data')
));  ?>


<?php 
/*
$Load= $_POST['PortLoading'] ; 
$Unload= $_POST['PortUnLoading'] ;
$Tug= $_POST['Tug'] ;
$Barge= $_POST['Barge'] ;
$Quan= $_POST['quantity'];
*/
?>

<script>   
    $(function() {
         $( ".calendar" ).datepicker({ dateFormat: 'yy-mm-dd' }); 
         $( ".calendar1" ).datepicker({ dateFormat: 'yy-mm-dd' });   
    }); 
</script>



<div class="view">
		
		
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="RepairAE_Tug"><?php echo "Tug &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('Tug','',array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	</div>
	</div>


	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="RepairAE_Barge"><?php echo "Barge &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('Barge','',array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	</div>
	</div>

	
	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="RepairAE_Kategori"><?php echo "Kategori &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::dropDownList('Kategori','',array("REPAIR AE"=>"REPAIR AE"),
			array('class'=>'span3','disabled'=>'disabled'));?>
	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="RepairAE_Notes"><?php echo "Notes &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('Notes','',array('class'=>'span3', 'maxLength'=>10)); ?>
	</div>
	</div>

	<div class="form-horiz">
	<label class="control-label required" for="RepairAE_StartDate"><?php echo "Start Date &nbsp" ?> <span class="required">*</span></label> <!-- label -->

	<div class="controls">

	<?php echo CHtml::textField('StartDate','',array('class'=>'calendar', 'maxLength'=>10, 'style'=>'width:100px;')); ?>

	<?php /*$this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'name'=>'StartDate',
	//'language'=>Yii::app()->language='id',
	'attribute'=>'StartDate',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'class'=>'span2',
		),
	));  */?>	
	</div>
	</div>

	<div class="form-horiz">
	<label class="control-label required" for="RepairAE_EndDate"><?php echo "End Date &nbsp" ?> <span class="required">*</span></label> <!-- label -->

	<div class="controls">
	
	<?php echo CHtml::textField('EndDate','',array('class'=>'calendar1', 'maxLength'=>10, 'style'=>'width:100px;')); ?>

	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="RepairAE_Duration"><?php echo "Duration &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::textField('Duration','',array('class'=>'span3', 'maxLength'=>10,'readonly'=>'readonly')); ?> days
	</div>
	</div>

	<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Save',
		)); ?>
</div>


</div>

<?php $this->endWidget(); ?>
