<?php

/**
 * This is the model class for table "damage_report".
 *
 * The followings are the available columns in table 'damage_report':
 * @property string $id_damage_report
 * @property integer $id_vessel
 * @property string $Date
 * @property string $Description
 * @property string $PIC
 * @property string $Status
 * @property string $DamageTime
 * @property string $CausedDamage
 * @property string $DamagePhoto
 * @property string $Suggestion
 * @property string $Master
 * @property string $ChiefEngineer
 *
 * The followings are the available model relations:
 * @property Vessel $idVessel
 */
class DamageReport extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DamageReport the static model class
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
		return 'damage_report';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_vessel, Date, Description, PIC, DamageTime, CausedDamage,Suggestion, Master, ChiefEngineer', 'required'),
			array('id_vessel, NoReport, NoMonth, NoYear, id_request_for_schedule ', 'numerical', 'integerOnly'=>true),
			array('DamageReportNumber, PIC, DamagePhoto, Master, ChiefEngineer', 'length', 'max'=>256),
			array('Status', 'safe'),

			array('DamagePhoto', 'required','on'=>'insert'),
			array('DamagePhoto', 'file','on'=>'insert',
				'types'=>'jpg',
				'allowEmpty' => false,
				'maxSize' => 1024 * 1024 * 1, // 10MB 
				'tooLarge' => 'file to large max file is 1mb', 
			),
			
			array('DamagePhoto', 'file','on'=>'update',
			'allowEmpty' => true,
			'types'=>'jpg',
			'maxSize' => 1024 * 1024 * 1, // 10MB 
			'tooLarge' => 'file to Large max file is 1mb',
			),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_damage_report, id_vessel, Date, Description, PIC, Status, DamageTime, CausedDamage, DamagePhoto, Suggestion, Master, ChiefEngineer, DamageReportNumber', 'safe', 'on'=>'search'),
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
			'idVessel' => array(self::BELONGS_TO, 'Vessel','id_vessel'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_damage_report' => 'ID Damage Report',
			'id_vessel' => 'Vessel Name',
			'Date' => 'Date',
			'Description' => 'Damage Description',
			'PIC' => 'Pic',
			'Status' => 'Status',
			'DamageTime' => 'Damage Time',
			'CausedDamage' => 'Caused Damage',
			'DamagePhoto' => 'Damage Photo',
			'Suggestion' => 'Suggestion',
			'Master' => 'Master',
			'ChiefEngineer' => 'Chief Engineer',
			'DamageReportNumber'=>'Damage Report Number',
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

		$criteria->compare('id_damage_report',$this->id_damage_report,true);
		$criteria->compare('id_vessel',$this->id_vessel);
		$criteria->compare('Date',$this->Date,true);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('PIC',$this->PIC,true);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('DamageTime',$this->DamageTime,true);
		$criteria->compare('CausedDamage',$this->CausedDamage,true);
		$criteria->compare('DamagePhoto',$this->DamagePhoto,true);
		$criteria->compare('Suggestion',$this->Suggestion,true);
		$criteria->compare('Master',$this->Master,true);
		$criteria->compare('ChiefEngineer',$this->ChiefEngineer,true);
		$criteria->compare('DamageReportNumber',$this->DamageReportNumber,true);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
			'defaultOrder'=>'DamageTime DESC',
        				),
			'pagination'=>array(
        	'pageSize'=>15,
   								 ),
		));
	}
}