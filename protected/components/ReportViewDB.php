<?php
class ReportViewDB {
	
	
	public static function getlogoheader(){
		
		$data='<table class="tabel_border_o" width="100%">

		<tr>
			<td style="vertical-align:top;text-align:left;width:80%;" >
			<img src ="'.Yii::app()->request->baseUrl.'/repository/icon/PML.png" style="width:150px;height:54px;">
			</td>
			<td style="vertical-align:top;text-align:right;width:20%;">
			<img src ="'.Yii::app()->request->baseUrl.'/repository/icon/garis.png" style="width:23px;">
			</td>
		</tr>
		</table>

		';
		return $data;

	}



	
}
?>