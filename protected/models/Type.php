<?php

/**
 * This is the model class for table "dir_type".
 *
 * The followings are the available columns in table 'dir_type':
 * @property integer $type_id
 * @property string $name
 *
 * The followings are the available model relations:
 * @property Matter[] $matters
 */
class Type extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dir_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'length', 'max'=>100),
			array('type_id','safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('type_id, name', 'safe', 'on'=>'search'),
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
								'attributes' => 'name',
								'errorMessage' => 'Directory type is already added'
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
			'matters' => array(self::HAS_MANY, 'Matter', 'dir_type'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'type_id' => 'Type',
			'name' => 'Name',
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

		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Type the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
