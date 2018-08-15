
<?php
$this->breadcrumbs=array(
	'Rating Volume'=>array('ratingvol'),
	'Customer Rating',
);

$this->menu=array(
array('label'=>'Customer Rating','url'=>array('demand/rating')),
array('label'=>'Volume Rating','url'=>array('demand/ratingpay')),
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


	<h3>Rating By <font color=#BD362F> Payment Performance  </font> - Year <font color=#BD362F> <?php //echo $_POST['Year']; ?> 2014 </font> </h3>
	<hr>


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
			'header'=>'Customer',		
			'name' => 'Customer',
			'type' => 'raw',
			'value' => 'CHtml::encode($data["Customer"])'
		),

		array( 
			'header'=>'Total Order',		
			'name' => 'TotalOrder',
			'type' => 'raw',
			'value' => 'CHtml::encode($data["TotalOrder"])'
		),

		array( 
			'header'=>'Total Late Payment',		
			'name' => 'TotalLate',
			'type' => 'raw',
			'value' => 'CHtml::encode($data["TotalLate"])'
		),

		array( 
			'header'=>'Total Ontime Payment',		
			'name' => 'TotalOntime',
			'type' => 'raw',
			'value' => 'CHtml::encode($data["TotalOntime"])'
		),



	/*	array(
			'header'=>'Inquiry',
			'name' => 'Inquiry',
			'type' => 'raw',
			'value' => 'CHtml::link(CHtml::encode($data["Inquiry"]),array("reservationinquiry/step1"))',
		), */
	),
));

?>