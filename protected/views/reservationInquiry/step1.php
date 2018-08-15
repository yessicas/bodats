	<?php
	$this->breadcrumbs=array(
		'Reservation Inquiry'=>array('step1'),
		'Create',
	);

	$this->menu=array(
	 array('label'=>'Availability', 'url'=>array('checkavailable')),
    array('label'=>'Step1', 'url'=>array('step1'),'active'=>true),
   // array('label'=>'Step2', 'url'=>array('step2')),
	);
	?>
	<?php

	Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
	    $('.search-form').toggle();
	    return false;
	});
	$('.search-form form').submit(function(){
	    $.fn.yiiGridView.update('Step1-grid', {
	        data: $(this).serialize()
	    });
	    return false;
	});
	");
	?>

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
	
	<div id="content">
	<h2>Reservation Inquiry</h2>
	<hr>
	</div>

	<div class="alert alert-block alert-info">
	Step 1 Inquiry Selection
	</div>

<div class="view">
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'action'=>Yii::app()->createUrl($this->route),
    'type' => 'horizontal',
    'method'=>'get',
)); ?>



	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_CompanyName"><?php echo "Company Name &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('CompanyName','',array('class'=>'span4', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	</div>
	</div>

	<div class="form-horiz ">

	<label class="control-label required" for="LoadingDate"><?php echo "Loading Date &nbsp"?> <span class="required">*</span></label> <!-- label -->

	<div class="controls">

	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'name'=>'LoadingDate',
	//'language'=>Yii::app()->language='id',
	//'attribute'=>'DateFrom',
	'options'=>array(
						'showAnim'=>'slideDown',
						'dateFormat'=>'yy-mm-dd',          
						'changeMonth'=>true,
						'changeYear'=>true,
						'showOn'=>'focus',
						'showButtonPanel' => true,
					),
	'htmlOptions'=>array(
	'style'=>'width:100px;'),
	)); ?>	

	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_PortLoading"><?php echo "Port Of Loading &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::dropDownList('PortLoading','',CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
			array('prompt'=>Yii::t('strings','-- Select Port Of Loading --'),'class'=>'span4'));?>
	</div>
	</div>


	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_PortUnloading"><?php echo "Port Of Unloading &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
	<?php echo CHtml::dropDownList('PortUnLoading','',CHtml::listData(Jetty::model()->findAll(), 'JettyId', 'JettyName'),
			array('prompt'=>Yii::t('strings','-- Select Port Of Unloading --'),'class'=>'span4'));?>
	</div>
	</div>


	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_TUG"><?php echo "TUG &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('TUG','',array('class'=>'span2', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_BARGE"><?php echo "BARGE &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('BARGE','',array('class'=>'span2', 'maxLength'=>10,'readonly'=>'readonly')); ?>
	</div>
	</div>

	<div class="form-horiz ">
	<?php //echo $form->labelEx($model,'customername'); ?>
	<label class="control-label required" for="freightCalculator_Quantity"><?php echo "Quantity &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

	<div class="controls">
		<?php echo CHtml::textField('Quantity','',array('class'=>'span2', 'maxLength'=>10)); ?>
		<?php //echo CHtml::dropDownList('MT','',array("MT"=>"MT"),
			echo CHtml::textField('MT','MT',
			array('style'=>'width:18px; margin-left:-25px;','disabled'=>'disabled'));?>
	</div>
	</div>



		<div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'=>'primary',
            'label'=>'Calculate Price & Extimation',
        )); ?>
    </div>

    <?php
if(isset($_GET['LoadingDate'])) { ?>

<div class="userlistviewall" style="display:inline">

<?php echo '<h4 style="font-family:calibri;">'. "Date From:" .'&nbsp'. '<font color=#BD362F>'. $_GET['LoadingDate'];

echo '</font>';
echo '</h4>';

?> 


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
			'header'=>'Company Name',		
			'name' => 'CompanyName',
			'type' => 'raw',
			'value' => 'CHtml::encode($data["CompanyName"])'
		),

		array( 
			'header'=>'Loading Date',		
			'name' => 'LoadingDate',
			'type' => 'raw',
			'value' => 'CHtml::encode($data["LoadingDate"])'
		),

		array( 
			'header'=>'Port Of Loading',		
			'name' => 'PortLoading',
			'type' => 'raw',
			'value' => 'CHtml::encode($data["PortLoading"])'
		),

		array( 
			'header'=>'Port Of Loading',		
			'name' => 'PortUnloading',
			'type' => 'raw',
			'value' => 'CHtml::encode($data["PortUnloading"])'
		),


		array(
			'header'=>'Calculate',
			'name' => 'Calculate',
			'type' => 'raw',
			'value' => 'CHtml::link(CHtml::encode($data["Calculate"]),array("reservationinquiry/step2"))',
		),
	),
));

?>

</div>

<?php $this->endWidget(); ?>



<script>
function reloaddata(id, data) {
     $('.userlistviewall').show(300);
}
</script>