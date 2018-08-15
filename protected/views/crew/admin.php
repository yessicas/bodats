<?php
	$this->breadcrumbs=array(
		'Crews'=>array('index'),
		'Manage',
	);

	$this->menu=array(
		
		array('label'=>'Manage Crew', 'url'=>array('cre/crew')),
		array('label'=>'Create Crew', 'url'=>array('cre/crewcreate')),
		
	);

	Yii::app()->clientScript->registerScript('search', "
	$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
	});
	$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('crew-grid', {
	data: $(this).serialize()
	});
	return false;
	});
	");
?>

	<div id="content">
	<h2>Manage Crews</h2>
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


	<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'crew-grid',
	'type' => 'striped bordered condensed',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		 array(
			'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
					),
			//'CrewId',

			 array('name'=>'Foto', 'type'=>'raw',
				'filter'=>false,
				'value'=>function($data) {
				return ($data->Photo == "") ? '<div id="foto" style="width:100px;">'.ImageDisplayer::displayDefaultFileforgrid("repository/crew/" , "defaultuser.jpg").'</div>' : '<div id="foto" style="width:100px;">'.ImageDisplayer::displaySmallFoto("repository/crew/" , $data->Photo).'</div>' ;
				},
				//'htmlOptions'=>array('style'=>'width:50px;'),
				),
			//'NIP',
			//'VesselId',
			'CrewName',
			 array(
				'name'=>'DateOfBirth',
				'value'=>'Yii::app()->dateFormatter->formatDateTime($data->DateOfBirth, "medium","")',
				),
			'PlaceOfBirth',
			'Address',
			//'PhoneNumber',
			'MobileNumber',
			'crewpos.crew_position',
			//'Email',
		
		  //  'CurrentResidence',
			 array(   
					'header'=>'Status',
					'name'=>'Status',
					'value'=>'$data->Status',

					'filter'=>array('candidate'=>'candidate', 'crew'=>'crew', 'retired'=>'retired'),
					),
			//'Status',
		   // 'StatusOwn',
			/*
			'Profession',
			'MaritalStatus',
			'NameOfSpouse',
			'NameOfChildren',
			'BankAccountNumber',
			'BankName',
			'AccountHolder',
			'GovernmentFileTaxNumber',
			'EmployeeRegisteredNumber',
			'AuditTime',
			'AuditActivity',
			'StatusRelief',
			'CertificateLevel',
			'Notes',
			'Photo',
			'LastMutationId',
			*/
	array(
	 'class'=>'bootstrap.widgets.TbButtonColumn',
	'buttons'=>array(
					'update'=>
						array(
							'url'=> 'Yii::app()->createUrl("cre/crewupdate",array("id"=>$data->CrewId))',
							'options'=>array(
								'class'=>'',
								'rel'=>'',
							),
						),

						 'view'=>
						array(

							'url'=> 'Yii::app()->createUrl("cre/crewview",array("id"=>$data->CrewId))',
							'options'=>array(
								'class'=>'',
								'rel'=>'',
							),
						),

						 'delete'=>
						array(

							'url'=> 'Yii::app()->createUrl("crew/delete",array("id"=>$data->CrewId))',
						   
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

