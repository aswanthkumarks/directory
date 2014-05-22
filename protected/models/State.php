<?php

/**
 * This is the model class for table "dir_state".
 *
 * The followings are the available columns in table 'dir_state':
 * @property integer $state_id
 * @property integer $country_id
 * @property string $state_name
 *
 * The followings are the available model relations:
 * @property Singlefill[] $singlefills
 * @property Country $country
 */
class State extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dir_state';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('state_name', 'required'),
			array('country_id', 'numerical', 'integerOnly'=>true),
			array('state_name', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('state_id, country_id, state_name', 'safe', 'on'=>'search'),
				
			array('*', 'compositeUniqueKeysValidator'),
		);
	}
	/**
	 * @return array Unique Key validator.
	 */
	
	public function behaviors() {
		return array(
				'ECompositeUniqueKeyValidatable' => array(
						'class' => 'ECompositeUniqueKeyValidatable',
						'uniqueKeys' => array(
								'attributes' => 'country_id, state_name',
								'errorMessage' => 'State name is already added'
						)
				),
		);
	}
	
	/**
	 * Validates composite unique keys
	 *
	 * Validates composite unique keys declared in the
	 * ECompositeUniqueKeyValidatable bahavior
	 */
	public function compositeUniqueKeysValidator() {
		$this->validateCompositeUniqueKeys();
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'singlefills' => array(self::HAS_MANY, 'Singlefill', 'state_id'),
			'country' => array(self::BELONGS_TO, 'Country', 'country_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'state_id' => 'State',
			'country_id' => 'Country',
			'state_name' => 'State Name',
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

		$criteria->compare('state_id',$this->state_id);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('state_name',$this->state_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return State the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
