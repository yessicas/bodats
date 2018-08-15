<?php
class FormCommonDisplayer {
	public static function displayRowInput($firstcol, $secondcol){
		$DISP = '
		<div class="control-group">
			<label class="control-label required">'.$firstcol.'</label> 

			<div class="controls">
			'.$secondcol.'
			</div>
		</div>
		';
		
		return $DISP;
	}
	
	public static function displayRowInputReadonly($firstcol, $secondcol, $size="span4"){
		$DISP = '
		<div class="control-group">
			<label class="control-label required">'.$firstcol.'</label> 

			<div class="controls">
			'.CHtml::textField($firstcol,$secondcol,array('class'=>$size,'readonly'=>'readonly')).'
			</div>
		</div>
		';
		
		return $DISP;
	}
	
	public static function displayRowInputReadonlyAndHidden($form, $model, $fieldName, $label, $displayValue, $size="span4"){
		$DISP = '
		<div class="control-group">
			<label class="control-label required">'.$label.'</label> 

			<div class="controls">
			'.CHtml::textField($label,$displayValue,array('class'=>$size,'readonly'=>'readonly')).'
			'.$form->hiddenField($model,$fieldName,array('class'=>$size,'readonly'=>'readonly')).'
			</div>
		</div>
		';
		
		return $DISP;
	}
	
	public static function displayInputReadonlyAndHidden($form, $model, $fieldName, $label, $displayValue, $size="span4"){
		$DISP = '
			'.CHtml::textField($label,$displayValue,array('class'=>$size,'readonly'=>'readonly')).'
			'.$form->hiddenField($model,$fieldName,array('class'=>$size,'readonly'=>'readonly')).'
		';
		
		return $DISP;
	}
	
	public static function displayRowVessel($form, $model, $id_vessel, $fieldName, $label, $size="span4"){
		$vessel = VesselDB::getVessel($id_vessel);
		$model->$fieldName = $id_vessel;
		$vesselName = "--";
		if($vesselName != null)
			$vesselName  = $vessel->VesselName;
			
		$DISP = '
		<div class="control-group">
			<label class="control-label required">'.$label.'</label> 

			<div class="controls">
			'.CHtml::textField($label,$vesselName,array('class'=>$size,'readonly'=>'readonly')).'
			'.$form->hiddenField($model,$fieldName,array('class'=>$size,'readonly'=>'readonly')).'
			</div>
		</div>
		';
		
		return $DISP;
	}
}
?>