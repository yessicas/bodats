<div class="tambah" id="detail_quotation">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => Yii::t('strings', 'Add Purchase Item'),
        'icon' => 'plus white',
        'type' => 'danger', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
        //'url'=>array('create'),   
        'url' => array('purchaserequest/createitemprvessel', 'id' => $model->id_purchase_request, 'mode' => $label),
        'htmlOptions' => array(
            'class' => 'various fancybox.ajax',
        ),
    ));
    ?> 
</div>

<?php
$modeldetail = new PurchaseRequestDetail('search');
$modeldetail->unsetAttributes();  // clear any default values
if (isset($_GET['PurchaseRequestDetail']))
    $modeldetail->attributes = $_GET['PurchaseRequestDetail'];

//$modeldetail->id_voyage_order = $modelpr->id_voyage_order; 
$modeldetail->id_purchase_request = $model->id_purchase_request;
if ($mode == "consumable_stock") {
    $visibleAction = true;
    $this->widget('SpecialTbGridView', array(
        'id' => 'purchase-request-detail-grid',
        'type' => 'bordered striped condensed',
        'dataProvider' => $modeldetail->search(),
        'param1' => $mode,
        //'filter'=>$modeldetail,
        'columns' => array(
            array(
                'header' => 'No', 'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
            //'id_purchase_request_detail',
            //'id_purchase_request',
            //'purchase_item_table',
            //'id_item',
            'consumablestockitem.consumable_stock_item',
            'consumablestockitem.impa',
            'consumablestockitem.serial_number',
            'consumablestockitem.description',
            'quantity',
            'metric',
            'status',
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                //'visible'=>$visibleAction,
                'template' => '{update}{delete}',
                'buttons' => array(
                    'update' =>
                    array(
                        'url' => 'Yii::app()->createUrl("purchaserequest/updateitemprvessel",array("id_purchase_request_detail"=>$data->id_purchase_request_detail,"mode"=>$_GET["mode"],"action"=>"create"))',
                        'options' => array(
                            'class' => 'various fancybox.ajax',
                            'rel' => '',
                        ),
                    ),
                    'delete' =>
                    array(
                        'url' => 'Yii::app()->createUrl("purchaserequest/deleteitemprvessel",array("id_purchase_request_detail"=>$data->id_purchase_request_detail,"mode"=>$_GET["mode"]))',
                    ),
                ),
            ),
        ),
    ));
}

if ($mode == "ehs") {
    $visibleAction = true;
    $this->widget('SpecialTbGridView', array(
        'id' => 'purchase-request-detail-grid',
        'type' => 'bordered striped condensed',
        'dataProvider' => $modeldetail->search(),
        'param1' => $mode,
        //'filter'=>$modeldetail,
        'columns' => array(
            array(
                'header' => 'No', 'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
            //'id_purchase_request_detail',
            //'id_purchase_request',
            //'purchase_item_table',
            //'id_item',
            'ehsitem.ehs_item',
            'ehsitem.impa',
            'ehsitem.serial_number',
            'ehsitem.description',
            'quantity',
            'metric',
            'status',
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                //'visible'=>$visibleAction,
                'template' => '{update}{delete}',
                'buttons' => array(
                    'update' =>
                    array(
                        'url' => 'Yii::app()->createUrl("purchaserequest/updateitemprvessel",array("id_purchase_request_detail"=>$data->id_purchase_request_detail,"mode"=>$_GET["mode"],"action"=>"create"))',
                        'options' => array(
                            'class' => 'various fancybox.ajax',
                            'rel' => '',
                        ),
                    ),
                    'delete' =>
                    array(
                        'url' => 'Yii::app()->createUrl("purchaserequest/deleteitemprvessel",array("id_purchase_request_detail"=>$data->id_purchase_request_detail,"mode"=>$_GET["mode"]))',
                    ),
                ),
            ),
        ),
    ));
}
if ($mode == "survey_class") {
    $visibleAction = true;
    $this->widget('SpecialTbGridView', array(
        'id' => 'purchase-request-detail-grid',
        'type' => 'bordered striped condensed',
        'dataProvider' => $modeldetail->search(),
        'param1' => $mode,
        //'filter'=>$modeldetail,
        'columns' => array(
            array(
                'header' => 'No', 'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
            //'id_purchase_request_detail',
            //'id_purchase_request',
            //'purchase_item_table',
            //'id_item',
            'surveyitem.survey_item_name',
            'quantity',
            'metric',
            'status',
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                //'visible'=>$visibleAction,
                'template' => '{update}{delete}',
                'buttons' => array(
                    'update' =>
                    array(
                        'url' => 'Yii::app()->createUrl("purchaserequest/updateitemprvessel",array("id_purchase_request_detail"=>$data->id_purchase_request_detail,"mode"=>$_GET["mode"],"action"=>"create"))',
                        'options' => array(
                            'class' => 'various fancybox.ajax',
                            'rel' => '',
                        ),
                    ),
                    'delete' =>
                    array(
                        'url' => 'Yii::app()->createUrl("purchaserequest/deleteitemprvessel",array("id_purchase_request_detail"=>$data->id_purchase_request_detail,"mode"=>$_GET["mode"]))',
                    ),
                ),
            ),
        ),
    ));
}


if ($mode == "service") {
    $visibleAction = true;
    $this->widget('SpecialTbGridView', array(
        'id' => 'purchase-request-detail-grid',
        'type' => 'bordered striped condensed',
        'dataProvider' => $modeldetail->search(),
        'param1' => $mode,
        //'filter'=>$modeldetail,
        'columns' => array(
            array(
                'header' => 'No', 'value' => '$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
            //'id_purchase_request_detail',
            //'id_purchase_request',
            //'purchase_item_table',
            //'id_item',
            'serviceitem.service_item',
            'quantity',
            'metric',
            'status',
            array(
                'class' => 'bootstrap.widgets.TbButtonColumn',
                //'visible'=>$visibleAction,
                'template' => '{update}{delete}',
                'buttons' => array(
                    'update' =>
                    array(
                        'url' => 'Yii::app()->createUrl("purchaserequest/updateitemprvessel",array("id_purchase_request_detail"=>$data->id_purchase_request_detail,"mode"=>$_GET["mode"],"action"=>"create"))',
                        'options' => array(
                            'class' => 'various fancybox.ajax',
                            'rel' => '',
                        ),
                    ),
                    'delete' =>
                    array(
                        'url' => 'Yii::app()->createUrl("purchaserequest/deleteitemprvessel",array("id_purchase_request_detail"=>$data->id_purchase_request_detail,"mode"=>$_GET["mode"]))',
                    ),
                ),
            ),
        ),
    ));
}
	
	if($mode == "ehs"){
		$visibleAction = true;
		$this->widget('SpecialTbGridView',array(
			'id'=>'purchase-request-detail-grid',
			'type'=> 'bordered striped condensed',
			'dataProvider'=>$modeldetail->search(),
			'param1'   => $mode,
			//'filter'=>$modeldetail,
			'columns'=>array(
				array(
					'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
				),
				//'id_purchase_request_detail',
				//'id_purchase_request',
				//'purchase_item_table',
				//'id_item',
				
				'consumablestockitem.consumable_stock_item',
				'consumablestockitem.impa',
				'consumablestockitem.serial_number',
				'consumablestockitem.description',
				'quantity',
				'metric',
				'status',

				array(
					'class'=>'bootstrap.widgets.TbButtonColumn',
					//'visible'=>$visibleAction,
					'template'=>'{update}{delete}',
					'buttons'=>array(
		                'update'=>
		                    array(
		                        'url'=> 'Yii::app()->createUrl("purchaserequest/updateitemprvessel",array("id_purchase_request_detail"=>$data->id_purchase_request_detail,"mode"=>$_GET["mode"],"action"=>"create"))',
		                        'options'=>array(
		                             'class'=>'various fancybox.ajax',
		                            'rel'=>'',
		                        ),
		                    ),

		                     'delete'=>
		                    array(

		                        'url'=> 'Yii::app()->createUrl("purchaserequest/deleteitemprvessel",array("id_purchase_request_detail"=>$data->id_purchase_request_detail,"mode"=>$_GET["mode"]))',
		                       
		                    ),
		                ),
				),
			),
		)); 
	}
?>


<?php

function getItemName($mode, $data) {
    if ($mode == "consumable_stock") {
        return $data->consumablestockitem->consumable_stock_item;
    }

    if ($mode == "ehs") {
        return $data->ehsitem->ehs_item;
    }
}
?>

<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target' => '.various',
    'config' => array(
        'maxWidth' => 800,
        'maxHeight' => 600,
        'fitToView' => false,
        'width' => 500,
        'height' => 'auto',
        'autoSize' => false,
        'closeClick' => false,
        'closeBtn' => true,
        //'title'=>'dfsf',
        'helpers' => array(
            'title' => false, // inside or outside
            'overlay' => array('closeClick' => false),
        ),
        'openEffect' => 'elastic',
        'closeEffect' => 'elastic',
        //'type'=> 'iframe',
        'iframe' => array(
            'preload' => false // fixes issue with iframe and IE
        ),
    ),
));
?>