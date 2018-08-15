<?php

/**
 * This is the model class for table "so_offhired_order".
 *
 * The followings are the available columns in table 'so_offhired_order':
 * @property string $id_so_offhired_order
 * @property string $id_quotation
 * @property string $id_customer
 * @property integer $VesselTug
 * @property integer $VesselBarge
 * @property string $OffhiredOrderNumber
 * @property integer $SONo
 * @property integer $SOMonth
 * @property integer $SOYear
 * @property integer $SODate
 * @property integer $period_year
 * @property integer $period_month
 * @property integer $period_quartal
 * @property string $TCStartDate
 * @property string $TCEndDate
 * @property double $TCPrice
 * @property integer $SOQuartal
 * @property string $Marks
 */
class SoOffhiredOrder extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'so_offhired_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('id_quotation, id_customer, VesselTug, VesselBarge, OffhiredOrderNumber, SONo, SOMonth, SOYear, SODate, period_year, period_month, period_quartal, TCStartDate, TCEndDate, TCPrice, SOQuartal, Marks', 'required'),
			array('id_quotation, id_customer, VesselTug, VesselBarge, SODate,  TCStartDate, TCEndDate, TCPrice', 'required'),
			
			array('VesselTug, VesselBarge, SONo, SOMonth, SOYear, period_year, period_month, period_quartal, SOQuartal', 'numerical', 'integerOnly'=>true),
			array('TCPrice', 'numerical'),
			array('id_quotation, id_customer, status', 'length', 'max'=>20),
			array('OffhiredOrderNumber', 'length', 'max'=>100),
			array('created_date, approval_date, ip_user_updated, ip_user_approved', 'length', 'max'=>50),
			array('created_user, approved_user', 'length', 'max'=>45),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_so_offhired_order, id_quotation, id_customer, VesselTug, VesselBarge, OffhiredOrderNumber, SONo, SOMonth, SOYear, SODate, period_year, period_month, period_quartal, TCStartDate, TCEndDate, TCPrice, SOQuartal, Marks', 'safe', 'on'=>'search'),
			array('id_so_offhired_order, id_quotation, id_customer, VesselTug, VesselBarge, OffhiredOrderNumber, SONo, SOMonth, SOYear, SODate, period_year, period_month, period_quartal, TCStartDate, TCEndDate, TCPrice, SOQuartal, Marks', 'safe', 'on'=>'searchapproved'),
			array('id_so_offhired_order, id_quotation, id_customer, VesselTug, VesselBarge, OffhiredOrderNumber, SONo, SOMonth, SOYear, SODate, period_year, period_month, period_quartal, TCStartDate, TCEndDate, TCPrice, SOQuartal, Marks', 'safe', 'on'=>'searcharejected'),
		
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'Customer' => array(self::BELONGS_TO, 'Customer', 'id_customer'),
			'VesselTugs' => array(self::BELONGS_TO, 'Vessel', 'VesselTug'),
			'VesselBarges' => array(self::BELONGS_TO, 'Vessel', 'VesselBarge'),
			'Quotation' => array(self::BELONGS_TO, 'Quotation', 'id_quotation'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_so_offhired_order' => 'ID So Offhired Order',
			'id_quotation' => 'Quotation',
			'id_customer' => 'ID Customer',
			'VesselTug' => 'Vessel Tug',
			'VesselBarge' => 'Vessel Barge',
			'OffhiredOrderNumber' => 'Offhired Order Number',
			'SONo' => 'Sono',
			'SOMonth' => 'Somonth',
			'SOYear' => 'Soyear',
			'SODate' => 'Date',
			'period_year' => 'Period Year',
			'period_month' => 'Period Month',
			'period_quartal' => 'Period Quartal',
			'TCStartDate' => 'Start Date',
			'TCEndDate' => 'End Date',
			'TCPrice' => 'Price',
			'SOQuartal' => 'Soquartal',
			'Marks' => 'Marks',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search() //yang status nya plan  (none) 
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'status=:status';
		$criteria->params = array(':status'=>'NONE');

		$criteria->compare('id_so_offhired_order',$this->id_so_offhired_order,true);
		$criteria->compare('id_quotation',$this->id_quotation,true);
		$criteria->compare('id_customer',$this->id_customer,true);
		$criteria->compare('VesselTug',$this->VesselTug);
		$criteria->compare('VesselBarge',$this->VesselBarge);
		$criteria->compare('OffhiredOrderNumber',$this->OffhiredOrderNumber,true);
		$criteria->compare('SONo',$this->SONo);
		$criteria->compare('SOMonth',$this->SOMonth);
		$criteria->compare('SOYear',$this->SOYear);
		$criteria->compare('SODate',$this->SODate);
		$criteria->compare('period_year',$this->period_year);
		$criteria->compare('period_month',$this->period_month);
		$criteria->compare('period_quartal',$this->period_quartal);
		$criteria->compare('TCStartDate',$this->TCStartDate,true);
		$criteria->compare('TCEndDate',$this->TCEndDate,true);
		$criteria->compare('TCPrice',$this->TCPrice);
		$criteria->compare('SOQuartal',$this->SOQuartal);
		$criteria->compare('Marks',$this->Marks,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchapproved() //yang status nya approve  
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'status=:status';
		$criteria->params = array(':status'=>'APPROVED');

		$criteria->compare('id_so_offhired_order',$this->id_so_offhired_order,true);
		$criteria->compare('id_quotation',$this->id_quotation,true);
		$criteria->compare('id_customer',$this->id_customer,true);
		$criteria->compare('VesselTug',$this->VesselTug);
		$criteria->compare('VesselBarge',$this->VesselBarge);
		$criteria->compare('OffhiredOrderNumber',$this->OffhiredOrderNumber,true);
		$criteria->compare('SONo',$this->SONo);
		$criteria->compare('SOMonth',$this->SOMonth);
		$criteria->compare('SOYear',$this->SOYear);
		$criteria->compare('SODate',$this->SODate);
		$criteria->compare('period_year',$this->period_year);
		$criteria->compare('period_month',$this->period_month);
		$criteria->compare('period_quartal',$this->period_quartal);
		$criteria->compare('TCStartDate',$this->TCStartDate,true);
		$criteria->compare('TCEndDate',$this->TCEndDate,true);
		$criteria->compare('TCPrice',$this->TCPrice);
		$criteria->compare('SOQuartal',$this->SOQuartal);
		$criteria->compare('Marks',$this->Marks,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searcharejected() //yang status nya reject  
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->condition = 'status=:status';
		$criteria->params = array(':status'=>'REJECTED');

		$criteria->compare('id_so_offhired_order',$this->id_so_offhired_order,true);
		$criteria->compare('id_quotation',$this->id_quotation,true);
		$criteria->compare('id_customer',$this->id_customer,true);
		$criteria->compare('VesselTug',$this->VesselTug);
		$criteria->compare('VesselBarge',$this->VesselBarge);
		$criteria->compare('OffhiredOrderNumber',$this->OffhiredOrderNumber,true);
		$criteria->compare('SONo',$this->SONo);
		$criteria->compare('SOMonth',$this->SOMonth);
		$criteria->compare('SOYear',$this->SOYear);
		$criteria->compare('SODate',$this->SODate);
		$criteria->compare('period_year',$this->period_year);
		$criteria->compare('period_month',$this->period_month);
		$criteria->compare('period_quartal',$this->period_quartal);
		$criteria->compare('TCStartDate',$this->TCStartDate,true);
		$criteria->compare('TCEndDate',$this->TCEndDate,true);
		$criteria->compare('TCPrice',$this->TCPrice);
		$criteria->compare('SOQuartal',$this->SOQuartal);
		$criteria->compare('Marks',$this->Marks,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SoOffhiredOrder the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
