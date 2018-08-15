<?php

/**
 * This is the model class for table "fuel_consumption_daily".
 *
 * The followings are the available columns in table 'fuel_consumption_daily':
 * @property string $id_fuel_consumption_daily
 * @property string $log_date
 * @property integer $id_vessel
 * @property double $last_fuel_remain
 * @property string $status_remain
 * @property string $last_longitude
 * @property string $last_latitude
 * @property string $pic
 * @property integer $NearestJettyId
 * @property double $NearestDistancePoint
 * @property string $file_attachment
 * @property string $created_date
 * @property string $created_user
 * @property string $ip_user_updated
 */
class FuelConsumptionDaily extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FuelConsumptionDaily the static model class
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
		return 'fuel_consumption_daily';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('log_date, id_vessel, last_fuel_remain, status_remain, NearestJettyId, NearestDistancePoint', 'required'),
			array('id_vessel, NearestJettyId', 'numerical', 'integerOnly'=>true),
			array('last_fuel_remain, NearestDistancePoint', 'numerical'),
			array('file_attachment','length','max'=>100),
			array('last_longitude, last_latitude', 'length', 'max'=>30),
			array('created_user', 'length', 'max'=>45),
			array('ip_user_updated', 'length', 'max'=>50),

			array('file_attachment', 'file','on'=>'insert',
			'types'=>'jpg,pdf,png',
			'allowEmpty' => true,
			'maxSize' => 1024 * 1024 * 1, // 10MB 
			'tooLarge' => 'file yang di pilih lebih dari  1 MB. Silahkan pilih file image yang lebih kecil.', 
					),
			
			array('file_attachment', 'file','on'=>'update',
			'allowEmpty' => true,
			'types'=>'jpg,pdf,png',
			'maxSize' => 1024 * 1024 * 1, // 10MB 
			'tooLarge' => 'file yang di pilih lebih dari  1 MB. Silahkan pilih file image yang lebih kecil.', 
			),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_fuel_consumption_daily, log_date, id_vessel, last_fuel_remain, status_remain, last_longitude, last_latitude, NearestJettyId, NearestDistancePoint,file_attachment, created_date, created_user, ip_user_updated, pic', 'safe', 'on'=>'search'),
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
			'idVessel' => array(self::BELONGS_TO, 'Vessel', 'id_vessel'),
			'idJetty' => array(self::BELONGS_TO, 'Jetty', 'NearestJettyId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_fuel_consumption_daily' => 'ID Fuel Consumption Daily',
			'log_date' => 'Log Date',
			'id_vessel' => 'TUG Vessel',
			'last_fuel_remain' => 'Value',
			'status_remain' => 'Status',
			'last_longitude' => 'Last Longitude',
			'last_latitude' => 'Last Latitude',
			'pic' => 'Reported By',
			'NearestJettyId' => 'Vessel Position : Near',
			'NearestDistancePoint' => 'For About',
			'file_attachment'=>'File Attachment',
			'created_date' => 'Created Date',
			'created_user' => 'Created User',
			'ip_user_updated' => 'IP User Updated',
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

		$criteria->compare('id_fuel_consumption_daily',$this->id_fuel_consumption_daily,true);
		$criteria->compare('log_date',$this->log_date,true);
		$criteria->compare('id_vessel',$this->id_vessel);
		$criteria->compare('last_fuel_remain',$this->last_fuel_remain);
		$criteria->compare('status_remain',$this->status_remain,true);
		$criteria->compare('last_longitude',$this->last_longitude,true);
		$criteria->compare('last_latitude',$this->last_latitude,true);
		$criteria->compare('NearestJettyId',$this->NearestJettyId);
		$criteria->compare('NearestDistancePoint',$this->NearestDistancePoint);
		$criteria->compare('file_attachment',$this->file_attachment,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'log_date DESC',
			),
			'pagination'=>array(
				'pageSize'=>30,
   			),
		));
	}
	
	public function searchCurrent()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->order = "log_date DESC";
		$criteria->limit = 7;
		
		$criteria->compare('id_fuel_consumption_daily',$this->id_fuel_consumption_daily,true);
		$criteria->compare('log_date',$this->log_date,true);
		$criteria->compare('id_vessel',$this->id_vessel);
		$criteria->compare('last_fuel_remain',$this->last_fuel_remain);
		$criteria->compare('status_remain',$this->status_remain,true);
		$criteria->compare('last_longitude',$this->last_longitude,true);
		$criteria->compare('last_latitude',$this->last_latitude,true);
		$criteria->compare('NearestJettyId',$this->NearestJettyId);
		$criteria->compare('NearestDistancePoint',$this->NearestDistancePoint);
		$criteria->compare('file_attachment',$this->file_attachment,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('created_user',$this->created_user,true);
		$criteria->compare('ip_user_updated',$this->ip_user_updated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'log_date DESC',
			),
			'pagination'=>array(
				'pageSize'=>30,
   			),
		));
	}
}