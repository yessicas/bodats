<?php
$this->breadcrumbs=array(
	'Vessel Maintenance Plans'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Work Order','url'=>array('repair/workorder')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('vessel-maintenance-plan-grid', {
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
<h2>Work Order</h2>
<hr>
</div>


<?php if(Yii::app()->user->hasFlash('success')):?>
<div class = "animated flash">
    <?
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
<?php
	/*Ini dibuat begini agar tahu mana yang akan di */
	function getVesselName($data){
		$MSG = "";
		if(isset($data->vesseltug)){
			$MSG .= $data->vesseltug->VesselName." (TUG)";
		}
		
		if(isset($data->vesselbarge)){
			$MSG .= $data->vesselbarge->VesselName." (BARGE)";
		}
		
		return $MSG;
	}
	function getIDVessel($data){
		if(isset($data->vesseltug)){
			return $data->vesseltug->id_vessel;
		}
		
		if(isset($data->vesselbarge)){
			return $data->vesselbarge->id_vessel;
		}
		
		return 0;
	}
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'vessel-maintenance-plan-grid',
	'dataProvider'=>$model->search($status),
	'type' => 'striped bordered condensed',
	//'summaryText'=>'',
	//'enableSorting' => false,
	//'htmlOptions'=>array('style'=>'font-size:12px;'),
	//'afterAjaxUpdate' => 'reinstallDatePicker', 
	'filter'=>$model,
	'columns'=>array(
		
		array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
        /*
		array(
            'header'=>'',
			'name'=>'',
            'type'=>'raw',
            'value'=> 'CHtml::image(Yii::app()->baseUrl."/images/".$data->atribute,"alt",array("width"=>100,"height"=>100))',
			'value'=>'CHtml::link($data->atribute, Yii::app()->controller->createUrl("controler/action",
                                                array("id"=>$data->atribute )))',
            'htmlOptions'=>array('width'=>'100px')
			'filter'=>CHtml::listData(MyModel::model()->findAll(),'value', 'view value'),
			'filter'=>array('array1'=>'array1'),
        ),
		
		array('header'=>'','type'=>'raw',
			'value'=>function($data) {
			return ($data->atribute == "0") ? "text" : $data->atribut." "."text";
			},
			),
		// untuk combo box ajax di grid 
		 array('header'=>'Status','name'=>'status',
        'filter'=>array('REGISTER'=>'REGISTER', 'OPEN'=>'OPEN','BANNED'=>'BANNED','CLOSED'=>'CLOSED'),
        'type'=>'raw',
        'value'=>'CHtml::dropDownlist("status".$data->id_forum_topic,"",  array("REGISTER"=>"REGISTER", "OPEN"=>"OPEN","BANNED"=>"BANNED","CLOSED"=>"CLOSED"),array("style"=>"width:120px", "options" => array($data->status=>array("selected"=>true)),
        "id" => "status".$data->id_forum_topic, "ajax" => array("type"=>"POST", "url"=>Yii::app()->request->baseUrl."/forumtopic/update_status/id_forum_topic/".$data->id_forum_topic, "success"=>"allFine")))',
          ),
		 
		  array(
            'name' => 'attribute',
            // 'value'=>'date("j F, Y \@\ h:i a",strtotime($data->attribute))',
             'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model, 
                'attribute'=>'attribute', 
                'language' => 'id',
                'i18nScriptFile' => 'jquery.ui.datepicker-ja.js', 
                'htmlOptions' => array(
                    'id' => 'datepicker_for_due_date',
                    'size' => '10',
                ),
                'defaultOptions' => array(  // (#3)
                    'showOn' => 'focus', 
                    'dateFormat' => 'yy-mm-dd',
                    'showOtherMonths' => true,
                    'selectOtherMonths' => true,
                    'changeMonth' => true,
                    'changeYear' => true,
                    //'showButtonPanel' => true,
                )
            ), 
            true), 
        ),
		
		array(
		'name' => 'hak_akses',
		'type' => 'raw',
		'header' => 'Hak akses',
		'value' => 'CHtml::encode($data->ubahAkses())',
		'filter'=>array('1'=>'1', '2'=>'2'),
		),
		*/
       // 'id_vessel',
	   
	   array(   
                'header'=>'No Work Order',
                'name'=>'SchNumber',
                ),
        array(   
                'header'=>'Vessel',
                //'name'=>'VesselName',
                'value'=>'getVesselName($data)',
                'filter'=>CHtml::listData(Vessel::model()->findAll(),'VesselName', 'VesselName'),
                ),
		//'id_vessel_maintenance_plan',
        /*array(   
                'header'=>'Maintenance Type',
                'name'=>'id_maintenance_type',
                'value'=>'$data->MstMaintenanceType->MaintenanceTypeName',
                //'filter'=>CHtml::listData(Vessel::model()->findAll(),'VesselName', 'VesselName'),
                ),
		//'id_maintenance_type',
        */
		array(
            'name' => 'StartDate',
             'value'=>'Yii::app()->dateFormatter->formatDateTime($data->StartDate, "medium","")',
            // 'value'=>'date("j F, Y \@\ h:i a",strtotime($data->attribute))',
             'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model, 
                'attribute'=>'StartDate', 
                'language' => 'id',
                'i18nScriptFile' => 'jquery.ui.datepicker-ja.js', 
                'htmlOptions' => array(
                    'id' => 'datepicker_start_date',
                    'size' => '10',
                ),
                'defaultOptions' => array(  // (#3)
                    'showOn' => 'focus', 
                    'dateFormat' => 'yy-mm-dd',
                    'showOtherMonths' => true,
                    'selectOtherMonths' => true,
                    'changeMonth' => true,
                    'changeYear' => true,
                    //'showButtonPanel' => true,
                )
            ), 
            true), 
        ),
		//'StartDate',
		array(
            'name' => 'EndDate',
             'value'=>'Yii::app()->dateFormatter->formatDateTime($data->EndDate, "medium","")',
            // 'value'=>'date("j F, Y \@\ h:i a",strtotime($data->attribute))',
             'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model, 
                'attribute'=>'EndDate', 
                'language' => 'id',
                'i18nScriptFile' => 'jquery.ui.datepicker-ja.js', 
                'htmlOptions' => array(
                    'id' => 'datepicker_end_date',
                    'size' => '10',
                ),
                'defaultOptions' => array(  // (#3)
                    'showOn' => 'focus', 
                    'dateFormat' => 'yy-mm-dd',
                    'showOtherMonths' => true,
                    'selectOtherMonths' => true,
                    'changeMonth' => true,
                    'changeYear' => true,
                    //'showButtonPanel' => true,
                )
            ), 
            true), 
        ),
		//'status_breakdown',

		array(
		'header'=>'PR',
		'type'=>'raw',
		'htmlOptions'=>array('style'=>'width:80px;'),
		'value'=>function($data) {
			return CHtml::link("PR Part", array('purchaserequest/prvessel',"mode"=>"consumable_stock", 'idv'=>getIDVessel($data), 'idvo'=>0, 'ids'=>$data->id_schedule))."<br>".
					CHtml::link("PR Service", array('purchaserequest/prvessel',"mode"=>"service", 'idv'=>getIDVessel($data), 'idvo'=>0, 'ids'=>$data->id_schedule))."<br>".
				   CHtml::link("PR Jasa Survey", array('purchaserequest/prvessel',"mode"=>"survey_class", 'idv'=>getIDVessel($data), 'idvo'=>0, 'ids'=>$data->id_schedule))."<br>";
				   //CHtml::link("PR Jasa", array('repair/xx'), array("title"=>"View Attachment"))."<br>";
			
			
		 },
		),
			
        /*
		'RunningHour',
		
		'created_date',
		'created_user',
		'ip_user_updated',
		*/
		/*
		array(
		'class'=>'bootstrap.widgets.TbButtonColumn',
		'visible'=>false,
		'buttons'=>array(
						'update'=>
							array(
								'url'=> 'Yii::app()->createUrl("repair/updateplan",array("id"=>$data->id_vessel_maintenance_plan))',
								'options'=>array(
									'class'=>'',
									'rel'=>'',
								),
							),

							 'view'=>
							array(

								'url'=> 'Yii::app()->createUrl("repair/viewplan",array("id"=>$data->id_vessel_maintenance_plan))',
								'options'=>array(
									'class'=>'',
									'rel'=>'',
								),
							),

							 'delete'=>
							array(

								'url'=> 'Yii::app()->createUrl("repair/deleteplan",array("id"=>$data->id_vessel_maintenance_plan))',
							   
							),
							),
						
						

		),
		*/
	),
)); 

/*
Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
    $('#datepicker_for_due_date').datepicker();
}
");
*/

?>

