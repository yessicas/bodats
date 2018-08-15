


	<?php 

	$id= $_GET['id'];
	$model=new PurchaseRequest;
	$model=PurchaseRequest::model()->findByPk($id);

	$this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
			//'id_purchase_request',
			//'PRNumber',
		array(
            'name'=>'PRDate',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->PRDate, "medium",""),
           ),
		//	'PRDate',
			//'PRNo',
			//'PRMonth',
			//'PRYear',
			//'id_po_category',
			array('label'=>'PO Category','value'=>$model->PoCategory->category_name),
			array('label'=>'Amount',
			'value'=>$model->amount),
			//'metric',
			//array('label'=>'Metric PR','value'=>$model->MetricPr->metric_name),
			//'dedicated_to',
			//'id_vessel',
			//array('label'=>'Vessel/Tug','value'=>$model->Vessel->VesselName),
			//'id_voyage_order',
			//'notes',
			//'is_mutliple_item',
			//'requested_user',
			//'requested_date',
			//'ip_user_requested',
			//'Status',
			//'approved_user',
			//'approval_date',
			//'ip_user_approved',
	),
	)); ?>