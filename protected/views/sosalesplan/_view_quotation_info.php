<div class="view">
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$modelQuotation,
'attributes'=>array(
		//'id_schedule',
		array(
			'label'=>'Customer',
			'value'=>function($data) {
				if(isset($data->Customer)){
					return $data->Customer->CompanyName;
				}else{
					return " -- Customer NOT FOUND -- (".$data->id_customer.")";
				}
			},                           
        ),
		array(
			'label'=>'Tug',
            //'name'=>'id_vessel_tug',
				'value'=>function($data) {
					if(isset($data->VesselTug)){
                        return $data->VesselTug->VesselName;
					}else{
						return " -- VesselTug NOT FOUND -- (".$data->BargingVesselTug.")";
					}
                },                           
        ),
		array(
			'label'=>'Barge',
            //'name'=>'id_vessel_tug',
				'value'=>function($data) {
					if(isset($data->VesselBarge)){
                        return $data->VesselBarge->VesselName;
					}else{
						return " -- VesselBarge NOT FOUND -- (".$data->BargingVesselBarge.")";
					}
                },                           
        ),
		array(
			'label'=>'Port Of Loading',
			'value'=>function($data) {
				if(isset($data->JettyOrigin)){
					return $data->JettyOrigin->JettyName;
				}else{
					return " -- Port/Jetty NOT FOUND -- (".$data->BargingJettyIdStart.")";
				}
			},                           
        ),
		array(
			'label'=>'Port Of Unloading',
			'value'=>function($data) {
				if(isset($data->JettyDestination)){
					return $data->JettyDestination->JettyName;
				}else{
					return " -- Port/Jetty NOT FOUND -- (".$data->BargingJettyIdEnd.")";
				}
			},                           
        ),
		'LoadingDate',
		
		array(
			'label'=>'Total Quantity',
			'value'=>function($data) {
				return $data->TotalQuantity." ".$data->QuantityUnit;
			},                           
        ),
		//'QuantityPrice',
		array(
			'label'=>'Price Unit',
			'value'=>function($data) {
				if(isset($data->Currency)){
					return $data->QuantityPrice." ".$data->Currency->currency;
				}else{
					return $data->QuantityPrice." (UNKNOWN CURRENCY ".$data->QuantityPriceCurency.")";
				}
			},                           
        ),
),
)); ?>
</div>