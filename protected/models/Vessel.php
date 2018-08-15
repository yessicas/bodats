<?php

/**
 * This is the model class for table "vessel".
 *
 * The followings are the available columns in table 'vessel':
 * @property integer $id_vessel
 * @property string $VesselName
 * @property string $VesselChecklist
 * @property string $Status
 * @property string $BargeSize
 * @property string $VesselType
 * @property integer $Capacity
 * @property string $VesselDate
 * @property integer $RunningHour
 * @property string $LastDateMaintenance
 * @property integer $LastRHMaintenance
 * @property integer $inventoryid
 */
class Vessel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Vessel the static model class
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
		return 'vessel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('VesselName, VesselChecklist, Status, BargeSize, VesselType, Capacity', 'required'),
			array('VesselName, Status, VesselType', 'required'),
			array('Capacity,Power, RunningHour, LastRHMaintenance, inventoryid, NumberOfDamage,NumberOfFinding', 'numerical', 'integerOnly'=>true),
			array('VesselName,foto_vessel', 'length', 'max'=>50),
			array('BargeSize, LastDateofDamage, LastDateofFinding', 'length', 'max'=>32),
			array('Capacity' , 'cekcapacity'),
			array('Power' , 'cekpower'),

			//array('foto_vessel', 'required','on'=>'insert'),
			array('foto_vessel', 'file','on'=>'insert',
				'types'=>'jpg,png',
				'allowEmpty' => true,
				'maxSize' => 1024 * 1024 * 1, // 10MB 
				'tooLarge' => 'file yang di pilih lebih dari  1 MB. Silahkan pilih file image yang lebih kecil.', 
			),
			
			array('foto_vessel', 'file','on'=>'update',
				'allowEmpty' => true,
				'types'=>'jpg,png',
				'maxSize' => 1024 * 1024 * 1, // 10MB 
				'tooLarge' => 'file yang di pilih lebih dari  1 MB. Silahkan pilih file image yang lebih kecil.', 
			),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_vessel, VesselName, VesselChecklist, Status, BargeSize, VesselType, Capacity,foto_vessel, VesselDate, RunningHour, LastDateMaintenance, LastRHMaintenance, inventoryid, Power', 'safe', 'on'=>'search'),
			array('id_vessel, VesselName, VesselChecklist, Status, BargeSize, VesselType, Capacity,foto_vessel, VesselDate, RunningHour, LastDateMaintenance, LastRHMaintenance, inventoryid, Power', 'safe', 'on'=>'searchActiveVessel'),
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
			'id_vessel' => 'ID Vessel',
			'VesselName' => 'Vessel Name',
			'VesselChecklist' => 'Condition',
			'Status' => 'Status Ownership',
			'BargeSize' => 'Barge Class',
			'VesselType' => 'Vessel Type',
			'Capacity' => 'Capacity',
			'foto_vessel'=>'Vessel Foto',
			'VesselDate' => 'Vessel Date',
			'RunningHour' => 'Running Hour',
			'LastDateMaintenance' => 'Last Date Maintenance',
			'LastRHMaintenance' => 'Last Rhmaintenance',
			'inventoryid' => 'Inventoryid',
			'Power'=>'Power',
			'LastDateofDamage'=> 'Last Damage Date',
			'NumberOfDamage'=>'Number Of Damage',
			'LastDateofFinding'=> 'Last Finding Date',
			'NumberOfFinding'=>'Number Of Finding',
			'LastROBDate'=>'Last ROB Date',
			'LastROBValue'=>'Last ROB Value'
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

		$criteria->compare('id_vessel',$this->id_vessel);
		$criteria->compare('VesselName',$this->VesselName,true);
		$criteria->compare('VesselChecklist',$this->VesselChecklist,true);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('BargeSize',$this->BargeSize,true);
		$criteria->compare('VesselType',$this->VesselType,true);
		$criteria->compare('Capacity',$this->Capacity);
		$criteria->compare('Power',$this->Power);
		$criteria->compare('foto_vessel',$this->foto_vessel);
		$criteria->compare('VesselDate',$this->VesselDate,true);
		$criteria->compare('RunningHour',$this->RunningHour);
		$criteria->compare('LastDateMaintenance',$this->LastDateMaintenance,true);
		$criteria->compare('LastRHMaintenance',$this->LastRHMaintenance);
		$criteria->compare('inventoryid',$this->inventoryid);
		$criteria->compare('LastDateofDamage',$this->LastDateofDamage,true);
		$criteria->compare('NumberOfDamage',$this->NumberOfDamage);
		$criteria->compare('LastDateofFinding',$this->LastDateofFinding,true);
		$criteria->compare('NumberOfFinding',$this->NumberOfFinding);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>15,
   			),
		));
	}
	
	public function searchActiveVessel()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		
		$criteria->addCondition('isActive = 1');
		$criteria->order = "VesselType ASC, Status ASC, VesselName ASC";
		
		$criteria->compare('id_vessel',$this->id_vessel);
		$criteria->compare('VesselName',$this->VesselName,true);
		$criteria->compare('VesselChecklist',$this->VesselChecklist,true);
		$criteria->compare('Status',$this->Status,true);
		$criteria->compare('BargeSize',$this->BargeSize,true);
		$criteria->compare('VesselType',$this->VesselType,true);
		$criteria->compare('Capacity',$this->Capacity);
		$criteria->compare('Power',$this->Power);
		$criteria->compare('foto_vessel',$this->foto_vessel);
		$criteria->compare('VesselDate',$this->VesselDate,true);
		$criteria->compare('RunningHour',$this->RunningHour);
		$criteria->compare('LastDateMaintenance',$this->LastDateMaintenance,true);
		$criteria->compare('LastRHMaintenance',$this->LastRHMaintenance);
		$criteria->compare('inventoryid',$this->inventoryid);
		$criteria->compare('LastDateofDamage',$this->LastDateofDamage,true);
		$criteria->compare('NumberOfDamage',$this->NumberOfDamage);
		$criteria->compare('LastDateofFinding',$this->LastDateofFinding,true);
		$criteria->compare('NumberOfFinding',$this->NumberOfFinding);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>false
		));
	}
	
	public function cekcapacity()
	{
	   if($this->VesselType=='BARGE'){
			if($this->Capacity==''){
				$this->addError('Capacity', "Capacity shouldn't be blank") ;// validasi model gagal sehingga perintah save() akan dibatalkan.
			}
		}        
	}
	
	public function cekpower()
	{
	   if($this->VesselType=='TUG'){
			if($this->Power==''){
				$this->addError('Power', "Power shouldn't be blank") ;// validasi model gagal sehingga perintah save() akan dibatalkan.

			}
		}        
	}

	public function beforeDelete(){

	  $existQuotation=Quotation::model()->find('BargingVesselTug = :tug OR BargingVesselBarge = :barge',array(':tug' =>$this->primaryKey,':barge' =>$this->primaryKey));
	  $existSalesPlan=SalesPlan::model()->find('id_vessel_tug = :tug OR id_vessel_barge = :barge',array(':tug' =>$this->primaryKey,':barge' =>$this->primaryKey));
	  $existSalesPlanMonth=SalesPlanMonth::model()->find('id_vessel_tug = :tug OR id_vessel_barge = :barge',array(':tug' =>$this->primaryKey,':barge' =>$this->primaryKey));
	  $existSalesPlanOutlook=SalesPlanOutlook::model()->find('id_vessel_tug = :tug OR id_vessel_barge = :barge',array(':tug' =>$this->primaryKey,':barge' =>$this->primaryKey));
	  $existSchedule=Schedule::model()->find('VesselTugId = :tug OR VesselBargeId = :barge',array(':tug' =>$this->primaryKey,':barge' =>$this->primaryKey));
	  
	  if($existQuotation || $existSalesPlan || $existSalesPlanMonth || $existSalesPlanOutlook || $existSchedule)
	    //throw new CDbException('Constraint violation');
	    throw new CHttpException(400,'Constraint violation. cant delete this Vessel cause has used in other transaction.');
	  return parent::beforeDelete();
	}

	

}