<?php
class Alert {
	public static function displayTooltipAlert($message){
		//Di bagian view harus panggil : $this->widget('ext.tooltipster.tooltipster');
		
		$msg = ' <img src="repository/icon/notif.png" class="tooltipster" title="'.$message.'">';
		
		return $msg;
	}
	
	public static function displayTooltipLink($message, $link='#'){
		//Di bagian view harus panggil : $this->widget('ext.tooltipster.tooltipster');
		
		$msg = '<a href="'.$link.'" class="tooltipster" title="'.$message.'"><img src="repository/icon/notif.png" width="15"></a>';
		
		return $msg;
	}
}
?>