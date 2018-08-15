<?php
class CustomerUsersDB {
	public static function getCompanyFromUser($userid){
		//$company = new Company();
		$company = CustomerUsers::model()->findByAttributes(array('userid'=>$userid));
		if($company != null)
			return $company;
		else
			return new Company();
	}
	
	public static function displayCustomerUser($userid, $width="100%"){
		$cususer = CustomerUsersDB::getCompanyFromUser($userid);
		$customer = Customer::model()->findByPk($cususer->id_customer);
		
		$DISP = "";
		$DISP .= '<div class="view" style="padding:2px; margin:0px; width:'.$width.';">';
		//$DISP .= '<h3>Company Info</h3>';
		$DISP .= '<table cellspacing="0" cellpadding="0">';
		if($customer != null){
			$DISP .= '<tr>';
			$DISP .= '<td width="100px">Company Name</td>';
			$DISP .= '<td width="10px">:</td>';
			$DISP .= '<td>'.CHtml::encode($customer->CompanyName).'</td>';
			$DISP .= '</tr>';
			
			$DISP .= '<tr>';
			$DISP .= '<td width="100px">Address</td>';
			$DISP .= '<td width="10px">:</td>';
			$DISP .= '<td>'.CHtml::encode($customer->Address).'</td>';
			$DISP .= '</tr>';
		}
		$DISP .= '</table>';
		$DISP .= '</div>';
		
		return $DISP;
	}
}
?>