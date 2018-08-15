<?php
$this->breadcrumbs=array(
	'Good Receives'=>array('index'),
	'Manage',
);



	$this->menu=array(
	array('label'=>'Consumable Stock GR/GI','url'=>array('goodReceive/admingrcs')),
	array('label'=>'Cons.Stock Good Issue - Detail','url'=>array('goodIssue/gics/id/'.$id_purchase_order_detail), 'active'=>true),
	//array('label'=>'Create GoodReceive','url'=>array('create')),
	);

?>

<div id="content">
<h2>Cons.Stock Good Issue - Detail</h2>
<hr>
</div>
<?php 
$modelpo=PurchaseOrderDetail::model()->findByPk($model->id_purchase_order_detail);
$this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$modelpo,
'attributes'=>array(
		'PO.PONumber',
		'PO.PODate',
		'quantity',
		'metric'
),
)); 


?>
<?php
    $this->widget('bootstrap.widgets.TbButton', array(      
                'label' =>Yii::t('strings','Add Detail Good Issue'),
                'icon'=>'plus white',
                'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('goodIssue/creategics','id'=>$model->id_purchase_order_detail),
                'htmlOptions' => array(
                                        'class'=>''
                                        ),
    ));
?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
		'id'=>'good-receive-grid',
		'dataProvider'=>$model->search(),
		'type' => 'striped bordered condensed',
		'filter'=>$model,
		'columns'=>array(
				//'id_good_issue',
				//'id_purchase_order',
				//'id_purchase_order_detail',
				//'id_po_category',
				'receive_number',
                array(
                'name'=>'received_date',
                'value'=>'Yii::app()->dateFormatter->formatDateTime($data->received_date, "medium","")',
                //'filter'=> CHtml::activeTextField($model, 'posting_date', array('id'=>'posting_date_grid')),
                ),
			//	'received_date',
				'receive_by',
				'Vessel.VesselName',
                array(
                'name'=>'quantity',
                'value'=>'NumberAndCurrency::formatNumber($data->quantity)',
                     ),
			//	'quantity',
                //'amount',
				'metric',
				'condition',
				//'status_receive',
                //'notes',
				/*
				'purchase_item_table',
				'id_item',
				'item_add_info',
				'quantity',
				'metric',
				'receive_number',
				'status_receive',
				'created_user',
				'created_date',
				'ip_user_updated',
				*/
			array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}',
			'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("goodIssue/update",array("id"=>$data->id_good_issue))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("goodIssue/view",array("id"=>$data->id_good_issue))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("goodIssue/delete",array("id"=>$data->id_good_issue))',
                       
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


