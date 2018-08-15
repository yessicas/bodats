	<?php
	$this->breadcrumbs=array(
		'Reservation Inquiry'=>array('index'),
		'Create',
	);

	$this->menu=array(
	array('label'=>'Availability','url'=>array('checkavailable'), 'active'=>true),
	//array('label'=>'Step1','url'=>array('step1')),
	);
	?>
	<?php

	Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
	    $('.search-form').toggle();
	    return false;
	});
	$('.search-form form').submit(function(){
	    $.fn.yiiGridView.update('availability-grid', {
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
	
<div class="view">
	<div class="alert alert-block alert-info">
	Please Select Date
	</div>

	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'action'=>Yii::app()->createUrl($this->route),
    'type' => 'horizontal',
    'method'=>'get',
)); ?>


	<div class="form-horiz ">

	<label class="control-label required" for="DateFrom"><?php echo "Date From &nbsp"?> <span class="required">*</span></label> <!-- label -->

	<div class="controls">

	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'name'=>'DateFrom',
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

	<label class="control-label required" for="Dateuntil"><?php echo "Date Until &nbsp"?> <span class="required">*</span></label> <!-- label -->

	<div class="controls">

	<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	'name'=>'Dateuntil',
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


		<div class="form-actions" style="margin-top:10px; padding:10px 75px;">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'=>'primary',
            'label'=>'Search Availability',
        )); ?>
    </div>

    <?php
if(isset($_GET['DateFrom'])) { ?>

<div class="userlistviewall" style="display:inline">

<table class="tabel_border_o" style="width:210px; font-size:14px;">

	<tr>
		<td style="width:80px;vertical-align:top;text-align:left;padding: 2px 0px;" >
			Date From
		</td>
		<td style="width:20px;vertical-align:top;text-align:left;padding: 2px 0px;" >
			:
		</td>

		<td style="width:110px;vertical-align:top;text-align:left;padding: 2px 0px; color:#BD362F;" >
			<?php 
			$tanggalfrom= $_GET['DateFrom'];
			echo Timeanddate::getDateIndo($tanggalfrom) ?>
		</td>

		<tr>
		<td style="width:80px;vertical-align:top;text-align:left;padding: 2px 0px;" >
			Date Until
		</td>
		<td style="width:20px;vertical-align:top;text-align:left;padding: 2px 0px;" >
			:
		</td>

		<td style="width:110px;vertical-align:top;text-align:left;padding: 2px 0px; color:#BD362F;" >
			<?php $tanggaluntil= $_GET['Dateuntil'];
			echo Timeanddate::getDateIndo($tanggaluntil) 
			?>
		</td>

	</tr>
	</tr>
	</table>




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
			'header'=>'Vessel Type',		
			'name' => 'VesselType',
			'type' => 'raw',
			'value' => 'CHtml::encode($data["VesselType"])'
		),

		array( 
			'header'=>'Status',		
			'name' => 'Status',
			'type' => 'raw',
			'value' => 'CHtml::encode($data["Status"])'
		),

		array( 
			'header'=>'Next Schedule',		
			'name' => 'NextSchedule',
			'type' => 'raw',
			'value' => 'CHtml::encode($data["NextSchedule"])'
		),

		array( 
			'header'=>'Last Previous Schedule',		
			'name' => 'Last',
			'type' => 'raw',
			'value' => 'CHtml::encode($data["Last"])'
		),

		array(
			'header'=>'Inquiry',
			'name' => 'Inquiry',
			'type' => 'raw',
			'value' => 'CHtml::link(CHtml::encode($data["Inquiry"]),array("reservationinquiry/step1"))',
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
</script