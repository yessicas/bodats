<div class="view">
<?php 
$modelpo=PurchaseOrderDetail::model()->findByPk($id_purchase_order_detail);
if($modelpo != null){
$this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$modelpo,
'attributes'=>array(
		//'PO.PONumber',
		array(
			'label'=>'PO Number',
			//'value'=>'Timeanddate::getDisplayStandardDate($data->Quotation->LoadingDate)',
			'value'=>function($data) {
					if(isset($data->PO)){
						return $data->PO->PONumber;
					}else{
						return "-- PO Not Found --";
					}
                },
		),
		//'PO.PODate',
		array(
			'label'=>'PO Date',
			//'value'=>'Timeanddate::getDisplayStandardDate($data->Quotation->LoadingDate)',
			'value'=>function($data) {
					if(isset($data->PO)){
						return Timeanddate::getDisplayStandardDate($data->PO->PODate);
					}else{
						return "-- PO Not Found --";
					}
                },
		),
		array(
			'label'=>'Quantity',
			//'value'=>'Timeanddate::getDisplayStandardDate($data->Quotation->LoadingDate)',
			'value'=>function($data) {
					return $data->quantity." ".$data->metric;
                },
		),
		//'quantity',
		//'metric'
),
)); 
}

?>
</div>