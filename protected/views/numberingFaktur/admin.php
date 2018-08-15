<?php
	$this->breadcrumbs=array(
		'Numbering Fakturs'=>array('index'),
		'Manage',
	);

	$this->menu=array(
	array('label'=>'List Numbering Faktur','url'=>array('admin'), 'active'=>true),
	//array('label'=>'Create Numbering Faktur','url'=>array('create')),
	);

	Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
	});
	$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('numbering-faktur-grid', {
	data: $(this).serialize()
	});
	return false;
	});
	");
?>

<div id="content">
<h2>Manage Numbering Faktur</h2>
</div>

<div class="alert alert-infoz">


	<?php 	
	$image = CHtml::image(Yii::app()->request->baseUrl.'/repository/image/create2.png', 'this is alt tag of image');
	$fna = FakturNumbering::getActiveNumberingFakturAllocation(); 
	if($fna != null){
		echo "Active list VAT Number allocation is the release date of ".Timeanddate::getDisplayStandardDate($fna->allocation_date).'
		<br>VAT number allocated start from <b>'.$fna->first_number."</b> until <b>".$fna->last_number.'</b>';
		$model->id_numbering_faktur_allocation = $fna->id_numbering_faktur_allocation;
		
		echo '<br><br>';
		echo 'If you want to make new allocation, please click button beside!'; echo '<br><a class="btn btn-primary" href="numberingFakturAllocation/Create" role="button" style="margin:-40px 0px 0px 380px">Create New Allocation</a>';
			
		echo CHtml::link($image,'numberingFakturAllocation/admin',array(
						  'readonly'=>'readonly',
						  'style'=>' margin-left:100%;', 
					));			
	}else{
		echo "Allocation of VAT numbers does not exist or has not been created. Please make allocations of VAT numbers";
		echo '<br><a class="btn btn-primary" href="numberingFakturAllocation/create" role="button">Create Faktur Number Allocation</a>';
		
	}
	?>

</div>
<?php 
$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'numbering-faktur-grid',
	'type'=> 'striped bordered condensed',
	'dataProvider'=>$model->searchActive(),
	//'filter'=>$model,
	'columns'=>array(
			array(
				'header'=>'No',    
				'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
			//'id_numbering_faktur',
			'number_faktur_complete',
			//'last_number',
			'status',
			'notes',
			array(  
				'header'=>'Status',
				'value'=>function($data) {
					if(isset($data->NumberAllocation)){
                        if( $data->NumberAllocation->is_active == 1){
							return "ACTIVE";
						}else{
							return "IN-ACTIVE";
						}
					}else{
						return " -";
					}
                },
             ),
			'taken_date',
			'user_taken',
			'ip_user_taken',
			
	array(
	'class'=>'bootstrap.widgets.TbButtonColumn',
	),
	),
	)); 
?>
