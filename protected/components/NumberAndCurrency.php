<?php

class NumberAndCurrency {
	public static function formatCurrency($value)
	{
		return Yii::app()->numberFormatter->formatCurrency($value,"");
	}

	public static function formatNumber($value)
	{
		return Yii::app()->format->formatNumber($value);
	}

	public static function formatNumberTwoDigitDec($value)
	{
		return round($value,3); 
	}

	public static function getZeroFillNumber($number, $fill=3){
		$len = strlen($number);
		$added = "";
		for($i=1;$i<=$fill-$len;$i++){
			$added .= "0";
		}

		return $added.$number;
	}

	public static function getCurrency($id_currency){
		$model = Currency::model()->findByAttributes(array("id_currency"=>$id_currency));
		if($model!= null){
			return $model->currency;
		}

		return "";
	}
}
