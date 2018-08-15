<?php
class JettyDB {
	public static function getJetty($JettyId){
        $model=Jetty::model()->findByAttributes(array('JettyId'=>$JettyId));
		return $model;

	}
	
}
?>