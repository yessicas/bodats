<?php
class SecurityGenerator {	


	public static function CodeIdGenerate($phrase){
		$data=md5($phrase);
		return $data;
	}

	public static function SecurityDisplay($phrase){
		$data= substr($phrase,5,10);
		return $data;
	}


	public static function FooterPrintGenerator(){
		
	$LIST_DATA = '<table width="100%" height:80px; style="vertical-align: bottom; font-family: serif; font-size: 6pt; 
    color: #000000; font-weight: bold; font-style: italic; position:absolute; bottom:0;"><tr>
    <td width="33%"><span style="font-weight: bold; font-style: italic;"> </span></td>
    <td width="33%" align="center" style="font-weight: bold; font-style: italic;"></td>
    <td width="33%" style="text-align: right; ">Generated From <br> www.careerln.com <br>'.'at '.Yii::app()->dateFormatter->formatDateTime(time(), 'long', false).'</td>
    </tr></table>';

    return $LIST_DATA;
	}

	
}




?>