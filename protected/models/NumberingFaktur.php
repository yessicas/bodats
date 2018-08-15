<?php

	/**
	 * This is the model class for table "numbering_faktur".
	 *
	 * The followings are the available columns in table 'numbering_faktur':
	 * @property string $id_numbering_faktur
	 * @property string $prefix_number
	 * @property string $last_number
	 * @property string $status
	 * @property string $notes
	 * @property string $taken_date
	 * @property string $user_taken
	 * @property string $ip_user_taken
	 */
	class NumberingFaktur extends CActiveRecord
	{
		/**
		 * @return string the associated database table name
		 */
		public function tableName()
		{
			return 'numbering_faktur';
		}

		/**
		 * @return array validation rules for model attributes.
		 */
		public function rules()
		{
			// NOTE: you should only define rules for those attributes that
			// will receive user inputs.
			return array(
				array('prefix_number, last_number', 'required'),
				array('prefix_number', 'length', 'max'=>150),
				array('last_number', 'length', 'max'=>20),
				array('notes', 'length', 'max'=>250),
				array('user_taken, taken_date', 'length', 'max'=>45),
				array('ip_user_taken', 'length', 'max'=>50),
				array('status', 'safe'),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array('id_numbering_faktur, id_numbering_faktur_allocation, prefix_number, last_number, number_faktur_complete, status, notes, taken_date, user_taken, ip_user_taken', 'safe', 'on'=>'search'),
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
				'NumberAllocation' => array(self::BELONGS_TO, 'NumberingFakturAllocation', 'id_numbering_faktur_allocation'),
			);
		}

		/**
		 * @return array customized attribute labels (name=>label)
		 */
		public function attributeLabels()
		{
			return array(
				'id_numbering_faktur' => 'Id Numbering Faktur',
				'id_numbering_faktur_allocation' => 'Id Numbering Faktur Allocation',
				'prefix_number' => 'Prefix Number',
				'last_number' => 'Last Number',
				'number_faktur_complete'=> 'Number Faktur Complete',
				'status' => 'Status',
				'notes' => 'Notes',
				'taken_date' => 'Taken Date',
				'user_taken' => 'User Taken',
				'ip_user_taken' => 'Ip Address User Taken',
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
		public function search()
		{
			// @todo Please modify the following code to remove attributes that should not be searched.

			$criteria=new CDbCriteria;

			$criteria->compare('id_numbering_faktur',$this->id_numbering_faktur,true);
			$criteria->compare('prefix_number',$this->prefix_number,true);
			$criteria->compare('last_number',$this->last_number,true);
			$criteria->compare('status',$this->status,true);
			$criteria->compare('notes',$this->notes,true);
			$criteria->compare('taken_date',$this->taken_date,true);
			$criteria->compare('user_taken',$this->user_taken,true);
			$criteria->compare('ip_user_taken',$this->ip_user_taken,true);

			return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>array(
					'pageSize'=>100,
				),
				'sort'=>array(
					'defaultOrder'=>'number_faktur_complete ASC',
				),
			));
		}
		
		public function searchActive()
		{
			// @todo Please modify the following code to remove attributes that should not be searched.

			$criteria=new CDbCriteria;
			$criteria->join='LEFT JOIN numbering_faktur_allocation ON t.id_numbering_faktur_allocation=numbering_faktur_allocation.id_numbering_faktur_allocation';
            $criteria->condition=' numbering_faktur_allocation.is_active = 1';

			$criteria->compare('id_numbering_faktur',$this->id_numbering_faktur,true);
			$criteria->compare('prefix_number',$this->prefix_number,true);
			$criteria->compare('last_number',$this->last_number,true);
			$criteria->compare('status',$this->status,true);
			$criteria->compare('notes',$this->notes,true);
			$criteria->compare('taken_date',$this->taken_date,true);
			$criteria->compare('user_taken',$this->user_taken,true);
			$criteria->compare('ip_user_taken',$this->ip_user_taken,true);

			return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
				'pagination'=>array(
					'pageSize'=>100,
				),
				'sort'=>array(
					'defaultOrder'=>'number_faktur_complete ASC',
				),
			));
		}

		/**
		 * Returns the static model of the specified AR class.
		 * Please note that you should have this exact method in all your CActiveRecord descendants!
		 * @param string $className active record class name.
		 * @return NumberingFaktur the static model class
		 */
		public static function model($className=__CLASS__)
		{
			return parent::model($className);
		}
	}
