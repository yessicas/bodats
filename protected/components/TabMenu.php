<?php
class TabMenu{	
	public static function displayTabMenu($dataarrays){
		/*
		Example:
		<ul class="nav nav-tabs">
		  <li class="active"><a href="#">Semua Data</a></li>
		  <li><a href="">Tambah Data</a></li>
		</ul>
		*/
	
		$RES = '<ul class="nav nav-tabs">';
		foreach($dataarrays as $menu){
			$active = '';
			if($menu["active"]){
				$active = 'class="active"';
			}
			$url = Yii::app()->createUrl($menu["url"]);
			$RES .= ' <li '.$active.'><a href="'.$url.'">'.$menu["label"].'</a></li>';
		}
		$RES .= '</ul>';
		
		return $RES;
	}
	
	public static function displayTabMenuFromBasedMenu($basedmendu){
	
		$RES = '<ul class="nav nav-tabs">';
		foreach($basedmendu as $menu){
			$active = false;
			if(isset($menu["active"])){
				if($menu["active"]){
					$active = 'class="active"';
				}
			}
			//$url = Yii::app()->createUrl("wow",$menu["url"]);
			
			$url = Yii::app()->controller->id;
			if(is_array($menu["url"] )){
				foreach($menu["url"] as $ur=>$key){
					if($ur != "")
						$url .= '/'.$ur;
						
					$url .= '/'.$key;

				}
				
				$RES .= ' <li '.$active.'><a href="'.$url.'">'.$menu["label"].'</a></li>';
			}
			
			
			
		}
		$RES .= '</ul>';
		
		return $RES;
	}
	
}
?>