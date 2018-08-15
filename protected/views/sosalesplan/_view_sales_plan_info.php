<div class="view">
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$modelSalesPlan,
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
					if(isset($data->Tug)){
                        return $data->Tug->VesselName;
					}else{
						return " -- VesselTug NOT FOUND -- (".$data->id_vessel_tug.")";
					}
                },                           
        ),
		array(
			'label'=>'Barge',
            //'name'=>'id_vessel_tug',
				'value'=>function($data) {
					if(isset($data->Barge)){
                        return $data->Barge->VesselName;
					}else{
						return " -- VesselBarge NOT FOUND -- (".$data->id_vessel_barge.")";
					}
                },                           
        ),
		array(
			'label'=>'Port Of Loading',
			'value'=>function($data) {
				if(isset($data->LoadingPort)){
					return $data->LoadingPort->JettyName;
				}else{
					return " -- Port/Jetty NOT FOUND -- (".$data->JettyIdStart.")";
				}
			},                           
        ),
		array(
			'label'=>'Port Of Unloading',
			'value'=>function($data) {
				if(isset($data->UnloadingPort)){
					return $data->UnloadingPort->JettyName;
				}else{
					return " -- Port/Jetty NOT FOUND -- (".$data->JettyIdEnd.")";
				}
			},                           
        ),
),
)); ?>
</div>