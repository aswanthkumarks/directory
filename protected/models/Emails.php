<?php

/**
 * This is the model class for table "dir_emails".
 *
 * The followings are the available columns in table 'dir_emails':
 * @property integer $email_id
 * @property string $email
 * @property string $email_label
 * @property integer $fiter_id
 *
 * The followings are the available model relations:
 * @property Singlefill $fiter
 */
class Emails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dir_emails';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, fiter_id', 'required'),
			array('fiter_id', 'numerical', 'integerOnly'=>true),
			array('email, email_label', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('email_id, email, email_label, fiter_id', 'safe', 'on'=>'search'),
			array('*', 'compositeUniqueKeysValidator'),
		);
	}
	public function behaviors() {
		return array(
				'ECompositeUniqueKeyValidatable' => array(
						'class' => 'ECompositeUniqueKeyValidatable',
						'uniqueKeys' => array(
								'attributes' => 'email,fiter_id',
								'errorMessage' => 'This Email Id is already added'
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
			'fiter' => array(self::BELONGS_TO, 'Singlefill', 'fiter_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'email_id' => 'Email',
			'email' => 'Email',
			'email_label' => 'Email Label',
			'fiter_id' => 'Fiter',
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

		$criteria->compare('email_id',$this->email_id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('email_label',$this->email_label,true);
		$criteria->compare('fiter_id',$this->fiter_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Emails the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function get_emails($id){
		$criteria=new CDbCriteria;
		$criteria->select=array('email_id,email,email_label');
		$criteria->addCondition('fiter_id = "'.$id.'"');
		
		return $dataProvider=new CActiveDataProvider($this,array(
				'criteria'=>$criteria,)
		);
		
		
	}
}
