<div class="view">
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$modelSo,
'attributes'=>array(
		//'id_schedule',
		'ShippingOrderNumber',
		'SI_Number',
		array(
			'label'=>'SI Attachment',
			'type'=>'raw',
			'value'=>function($data) {
				if($data->SI_Attachment != ""){
					$path='repository/so/';
					return '<a href="'.$path.$data->SI_Attachment.'">Download SI Attachment</a>';
				}
			},                           
        ),
),
)); ?>
</div>