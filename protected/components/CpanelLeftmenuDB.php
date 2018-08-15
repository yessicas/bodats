<?php
class CpanelLeftmenuDB {
	public static function getListLeftMenu($controler_curentpage,$action_curentpage){
		//UsersAccess::checkUserAccess(array('useradmin','super'));
		$lc = new CpanelLeftmenu;
		$LIST_DATA = '';
		$curentpage=$controler_curentpage."/".$action_curentpage;
		$datas = $lc->findAllByAttributes(array('id_parent_leftmenu'=>0, 'visible'=>1));
		$LIST_DATA .= '
			<ul class="accordion-menu">
		';
		foreach ($datas as $data)
		{
			//$TITLE = '';
			//if(Yii::app()->session['_lang'] == 'id')
				//$TITLE = $data->value_indo;
			//else{
				//if(Yii::app()->session['_lang'] == 'en'){
					$TITLE = $data->value_eng;
				//}else{
					//$TITLE = $data->value_indo;
				//}
			//}
			
			
			$auth = UsersAccess::stringToArray($data->auth);
			$access = UsersAccess::checkUserAccess($auth);
			if($access){
				$url = Yii::app()->createUrl($data->url);
				if($data->has_child == 0)
					//$LIST_DATA .= "<li>"."<a href='".$url."'><span>".$TITLE."</span>"."</a></li>";
					{
						
					if($data->url == $curentpage){
						$li_class_currentpage="level1 current active ";
						$div_class_currentpage="toggler active";
						}
					else{
						$li_class_currentpage="level1";
						$div_class_currentpage="toggler";
					    }
					$LIST_DATA .= "<li class='".$li_class_currentpage."'>
										<div class='".$div_class_currentpage."'>
										<span class='menu_icon icon-".$data->menu_icon."'></span>
										<a href='".$url."'>".Yii::t('strings',$TITLE)."</a>
										</div>
								   </li>";
					}
				else{
					//$LIST_DATA .= '<a class="menuitem submenuheader" href="'.$url.'">'.$TITLE.'</a>';
					//$LIST_DATA .= "<li class='has-sub'>"."<a href='".$url."'><span>".$TITLE."</span></a>";

					if($data->url == $controler_curentpage){
						$li_class_currentpage="level1 current active ";
						$div_class_currentpage="toggler active";
					}
					else{
						$li_class_currentpage="level1";
						$div_class_currentpage="toggler";
					}
					$LIST_DATA .="<li class='".$li_class_currentpage."'>";
					$LIST_DATA .="<div class='".$div_class_currentpage."'>
										<span class='menu_icon icon-".$data->menu_icon."'></span>
										<span class='arrow'></span><a>".Yii::t('strings',$TITLE)."</a>
								  </div>";
					$LIST_DATA .= CpanelLeftmenuDB::getChildMenu($data->id_leftmenu,$controler_curentpage,$action_curentpage);
					$LIST_DATA .= '</li>';
				}
			}
			
		}
		$LIST_DATA .= '
			</ul>
		';
		
		return $LIST_DATA;
	}	
	
	public static function getChildMenu($id_parent_leftmenu,$controler_curentpage,$action_curentpage){
		$lc = new CpanelLeftmenu;
		$LIST_DATA = '';
		$curentpage=$controler_curentpage."/".$action_curentpage;
		$datas = $lc->findAllByAttributes(array('id_parent_leftmenu'=>$id_parent_leftmenu, 'visible'=>1));
		$LIST_DATA .= '
			<ul class="level2">
		';
		foreach ($datas as $data)
		{
			//$TITLE = '';
			//if(Yii::app()->session['_lang'] == 'id')
				//$TITLE = $data->value_indo;
			//else{
				//if(Yii::app()->session['_lang'] == 'en'){
					$TITLE = $data->value_eng;
				//}else{
					//$TITLE = $data->value_indo;
				//}
			//}
			
			if($data->url == $curentpage){
			$li_class_currentpage="level2 active";
			}
			else{
			$li_class_currentpage="level2";
		    }

			$auth = UsersAccess::stringToArray($data->auth);
			$access = UsersAccess::checkUserAccess($auth);
			if($access){
				$url = Yii::app()->createUrl($data->url);
				//$LIST_DATA .= '<li><a href="'.$url.'">'.$TITLE.'</a></li>';
				//$LIST_DATA .= "<li >"."<a href='".$url."'><span>".$TITLE."</span>"."</a></li>"."\n";
				$LIST_DATA .= "<li class='".$li_class_currentpage."'><span class='menu_icon icon-".$data->menu_icon."'></span></span><a href='".$url."'>".Yii::t('strings',$TITLE)."</a></li>"."\n";
			}
		}
		
		$LIST_DATA .= '
			</ul>
		';
		
		return $LIST_DATA;
	}
}
?>