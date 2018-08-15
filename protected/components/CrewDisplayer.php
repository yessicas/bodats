<?php
class CrewDisplayer {
	public static function displayCustomerInfo($CrewId){
		$crew = Crew::model()->findByAttributes(array('CrewId'=>$CrewId));
		$cerlevel = isset($cr->crew->certificate_level)? $cr->crew->certificate_level->certiface_level : "-";
		$VIEW = '
		<div class="view">
			<h4 style="color:#BD362F;"> Crew Info </h4>
			<div class="control-group ">
				<label class="control-label" for="CrewAssignment_id_crew_position">Crew Name</label>
				<div class="controls">
					'.CHtml::textField('Vessel',$crew->CrewName,array('class'=>'span5', 'maxLength'=>10,'readonly'=>'readonly')).'
				</div>
			</div>
			<div class="control-group ">
				<label class="control-label" for="CrewAssignment_id_crew_position">Status</label>
				<div class="controls">
					'.CHtml::textField('Vessel',$crew->StatusOwn,array('class'=>'span4', 'maxLength'=>10,'readonly'=>'readonly')).'
				</div>
			</div>
			<div class="control-group ">
				<label class="control-label" for="CrewAssignment_id_crew_position">Certificate</label>
				<div class="controls">
					'.CHtml::textField('Vessel',$cerlevel,array('class'=>'span4', 'maxLength'=>10,'readonly'=>'readonly')).'
				</div>
			</div>
		</div>
		';
		return $VIEW;

	}
}
?>