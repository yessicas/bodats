<?php
class UploadFileImage {	
	public static function displayUploadFoto($model, $fieldName, $fotoName, $imgpath="", $title = "Foto" ){
		$RES = '<br><div class="form">';
		if($model->$fieldName != ""){
			$RES .= '<h3>Display Foto '.$fotoName.'</b></h3><hr>';
			if($imgpath == "")
				$RES .= RepositoryFoto::getFotoFile($model, $fieldName);
			else
				$RES .= $imgpath;
		}

		$RES .= CHtml::form('','post',array('enctype'=>'multipart/form-data')); 
		$RES .='
			<br>
			<h3>Upload Foto</b></h3>
			<hr>';
		$RES .= CHtml::errorSummary($model); 
		$RES .='<div class="info">
			<div class="row">
				<label>Silakan pilih foto yang akan diupload :</label>
				File yang diperbolehkan adalah : '.RepositoryFoto::getFotoFileTypeToString().'<br>
				'.CHtml::activeFileField($model, $fieldName, array('size'=>'50'));
		$RES .= CHtml::error($model, $fieldName); 
		$RES .= '
		</div>
			<div class="row buttons">
				'.CHtml::submitButton($model->isNewRecord ? 'Upload' : 'Upload').'
			</div></div>';

		$RES .= CHtml::endForm();
		$RES .= '</div> ';
		
		return $RES;
	}
	
	public static function displayFotoOnly($model, $fieldName, $fotoName, $imgpath="", $title = "Foto" ){
		$RES = '';
		if($model->$fieldName != ""){
			//$RES .= '<h3>Display Foto '.$fotoName.'</b></h3><hr>';
			if($imgpath == "")
				$RES .= RepositoryFoto::getFotoFile($model, $fieldName);
			else
				$RES .= $imgpath;
		}
		
		return $RES;
	}
	
	
}
?>