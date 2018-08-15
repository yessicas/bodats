<?php

/**
 * This is the model class for table "jetty".
 *
 * The followings are the available columns in table 'jetty':
 * @property integer $JettyId
 * @property string $JettyName
 * @property string $JettyPosition
 * @property string $Acronym
 */
class Jetty extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Jetty the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'jetty';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('JettyName, JettyPosition, Acronym', 'required'),
			array('JettyName, JettyPosition, Acronym', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('JettyId, JettyName, JettyPosition, Acronym', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'JettyId' => 'Jetty',
			'JettyName' => 'Jetty Name',
			'JettyPosition' => 'Jetty Position',
			'Acronym' => 'Acronym',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('JettyId',$this->JettyId);
		$criteria->compare('JettyName',$this->JettyName,true);
		$criteria->compare('JettyPosition',$this->JettyPosition,true);
		$criteria->compare('Acronym',$this->Acronym,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
        	'pageSize'=>15,
   								 ),
		));
	}


	public function beforeDelete(){

	  $existQuotation=Quotation::model()->find('BargingJettyIdStart = :start OR BargingJettyIdEnd = :end',array(':start' =>$this->primaryKey,':end' =>$this->primaryKey));
	  $existQuotationDetailVessel=QuotationDetailVessel::model()->find('IdJettyOrigin = :start OR IdJettyDestination = :end',array(':start' =>$this->primaryKey,':end' =>$this->primaryKey));
	  $existSalesPlan=SalesPlan::model()->find('JettyIdStart = :start OR JettyIdEnd = :end',array(':start' =>$this->primaryKey,':end' =>$this->primaryKey));
	  $existSalesPlanMonth=SalesPlanMonth::model()->find('JettyIdStart = :start OR JettyIdEnd = :end',array(':start' =>$this->primaryKey,':end' =>$this->primaryKey));
	  $existSalesPlanOutlook=SalesPlanOutlook::model()->find('JettyIdStart = :start OR JettyIdEnd = :end',array(':start' =>$this->primaryKey,':end' =>$this->primaryKey));
	  
	  if($existQuotation || $existQuotationDetailVessel || $existSalesPlan || $existSalesPlanMonth || $existSalesPlanOutlook)
	    //throw new CDbException('Constraint violation');
	    throw new CHttpException(400,'Constraint violation. cant delete this Port  cause has used in other transaction.');
	  return parent::beforeDelete();
	}


}