<?php

/**
 * This is the model class for table "so".
 *
 * The followings are the available columns in table 'so':
 * @property string $id_so
 * @property string $id_quotation
 * @property string $ShippingOrderNumber
 * @property integer $SONo
 * @property integer $SOMonth
 * @property integer $SOYear
 * @property integer $period_year
 * @property integer $period_month
 * @property integer $period_quartal
 * @property string $VoyageDate
 * @property integer $SOQuartal
 * @property string $SI_Number
 * @property string $Consignee
 * @property string $NotifyAddress
 * @property string $Marks
 * @property string $DocumentsRequired
 */
class So extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'so';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_quotation, SODate, SI_Number, SI_is_attach, Consignee, NotifyAddress, Marks, DocumentsRequired', 'required', 'on'=>'step2'),
			array('id_quotation, SODate, SI_Number, SI_is_attach, Consignee, NotifyAddress, Marks, DocumentsRequired', 'required', 'on'=>'step2update'),
			array('id_quotation', 'required', 'on'=>'step1'),
			array('id_sales_plan', 'required', 'on'=>'stepAddSalesPlan'),
			array('SONo, SOMonth, SOYear, period_year, period_month, period_quartal, SOQuartal, id_sales_plan ', 'numerical', 'integerOnly'=>true),
			array('id_quotation', 'length', 'max'=>20),
			array('ShippingOrderNumber', 'length', 'max'=>100),
			array('SI_Number', 'length', 'max'=>200),
			array('Consignee', 'length', 'max'=>250),

			//array('SI_Attachment', 'required','on'=>'step2'),
			array('SI_Attachment', 'file','on'=>'step2',
			'types'=>'pdf,jpg,jpeg,JPG,JPEG,png,PNG',
			'allowEmpty' => true,
			'maxSize' => 1024 * 1024 * 20, // 20MB 
			//'tooLarge' => 'file yang di pilih lebih dari  20MB. Silahkan pilih file  yang lebih kecil.', 
					),

			array('SI_Attachment', 'required','on'=>'updateattachment'),
			array('SI_Attachment', 'file','on'=>'updateattachment',
			'types'=>'pdf,jpg,jpeg,JPG,JPEG,png,PNG',
			'allowEmpty' => false,
			'maxSize' => 1024 * 1024 * 20, // 20MB 
			//'tooLarge' => 'file yang di pilih lebih dari  20MB. Silahkan pilih file  yang lebih kecil.', 
					),


			array('SI_Attachment', 'file','on'=>'step2update',
			'allowEmpty' => true,
			'types'=>'pdf,jpg,jpeg,JPG,JPEG,png,PNG',
			'maxSize' => 1024 * 1024 * 20, // 20MB 
			//'tooLarge' => 'file yang di pilih lebih dari  20MB. Silahkan pilih file  yang lebih kecil.', 
			),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_so, id_quotation, ShippingOrderNumber, SODate, SONo, SOMonth, SOYear, VoyageDate, period_year, period_month, period_quartal, SOQuartal, SI_Number, Consignee, NotifyAddress, Marks, DocumentsRequired', 'safe', 'on'=>'search'),
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
			'Quotation' => array(self::BELONGS_TO, 'Quotation', 'id_quotation'),
			'SalesPlanMonth' => array(self::BELONGS_TO, 'SalesPlanMonth', 'id_sales_plan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_so' => 'Id So',
			'id_quotation' => 'Quotation',

			'id_sales_plan' => 'Sales Plan',

			'ShippingOrderNumber' => 'Shipping Order Number',
			'SODate'=>'Date Voyage',
			'SONo' => 'SO.No',
			'SOMonth' => 'SO Month',
			'SOYear' => 'SO Year',
			'period_year' => 'Period Year',
			'period_month' => 'Period Month',
			'period_quartal' => 'Period Quartal',
			'SOQuartal' => 'SO Quartal',
			'SI_Number' => 'Shipping Intruction Number',
			'Consignee' => 'Consignee',
			'NotifyAddress' => 'Notify Address',
			'Marks' => 'Marks',
			'DocumentsRequired' => 'Documents Required',
			'SI_Attachment' => 'SI Attachment',
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
	public function search($page=25)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		
		$criteria->together=true;
		$criteria->with=array('Quotation');

		$criteria->compare('id_so',$this->id_so,true);
		$criteria->compare('id_quotation',$this->id_quotation,true);
		$criteria->compare('ShippingOrderNumber',$this->ShippingOrderNumber,true);
		$criteria->compare('SODate',$this->SODate);
		$criteria->compare('SONo',$this->SONo);
		$criteria->compare('SOMonth',$this->SOMonth);
		$criteria->compare('SOYear',$this->SOYear);
		$criteria->compare('period_year',$this->period_year);
		$criteria->compare('period_month',$this->period_month);
		$criteria->compare('period_quartal',$this->period_quartal);
		$criteria->compare('VoyageDate',$this->VoyageDate);
		$criteria->compare('SOQuartal',$this->SOQuartal);
		$criteria->compare('SI_Number',$this->SI_Number,true);
		$criteria->compare('Consignee',$this->Consignee,true);
		$criteria->compare('NotifyAddress',$this->NotifyAddress,true);
		$criteria->compare('Marks',$this->Marks,true);
		$criteria->compare('DocumentsRequired',$this->DocumentsRequired,true);

		$pagination = array('pageSize'=>$page);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>$pagination,
			'sort'=>array(
				'defaultOrder'=>'Quotation.LoadingDate DESC',
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return So the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function cssReason() {
		if ($this->SI_Attachment == "-") { //or any condition
			return "highlight"; //
		}
		else
			return "white";
	}

	public function beforeDelete(){

	  $existVoyageOrder=VoyageOrder::model()->find('id_so = :id_so',array(':id_so' =>$this->primaryKey));
	  
	  if($existVoyageOrder)
	    //throw new CDbException('Constraint violation');
	    throw new CHttpException(400,'Constraint violation. cant delete this Shipping Order  cause has used in other transaction.');
	  return parent::beforeDelete();
	}

}
