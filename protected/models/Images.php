<?php

/**
 * This is the model class for table "dir_images".
 *
 * The followings are the available columns in table 'dir_images':
 * @property integer $img_id
 * @property string $img_url
 * @property string $alt
 * @property integer $imgof
 *
 * The followings are the available model relations:
 * @property Singlefill $imgof0
 * @property Singlefill[] $singlefills
 */
class Images extends CActiveRecord
{
	public $image;
	public $matfil_id;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dir_images';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('img_url, imgof', 'required'),
			array('img_url', 'safe'),
			array('image', 'file', 'types'=>'jpg, gif, png'),
			array('imgof', 'numerical', 'integerOnly'=>true),
			array('img_url, alt', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('img_id, img_url, alt, imgof', 'safe', 'on'=>'search'),
	array('*', 'compositeUniqueKeysValidator'),
		);
	}
	public function behaviors() {
		return array(
				'ECompositeUniqueKeyValidatable' => array(
						'class' => 'ECompositeUniqueKeyValidatable',
						'uniqueKeys' => array(
								'attributes' => 'img_url,imgof',
								'errorMessage' => 'This image is already added'
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
			'imgof0' => array(self::BELONGS_TO, 'Singlefill', 'imgof'),
			'singlefills' => array(self::HAS_MANY, 'Singlefill', 'pro_pic'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'img_id' => 'Img',
			'img_url' => 'Img Url',
			'alt' => 'Alt',
			'imgof' => 'Imgof',
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

		$criteria->compare('img_id',$this->img_id);
		$criteria->compare('img_url',$this->img_url,true);
		$criteria->compare('alt',$this->alt,true);
		$criteria->compare('imgof',$this->imgof);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Images the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function get_images($id){
		
		$criteria=new CDbCriteria;
		$criteria->alias='t';
		$criteria->select=array('t.img_id,t.img_url,t.alt,i.matfil_id');
		$criteria->join='LEFT JOIN dir_singlefill i ON t.imgof=i.matfil_id';
		$criteria->addCondition('imgof = "'.$id.'"');
		
		return $dataProvider=new CActiveDataProvider($this,array(
				'criteria'=>$criteria,)
		);
	}
	
	public function get_profile_pic($id){
		$criteria=new CDbCriteria;
		$criteria->alias='t';
		$criteria->select=array('t.img_url,t.alt');		
		$criteria->join='RIGHT JOIN dir_singlefill i ON t.img_id=i.pro_pic';
		$criteria->addCondition('matfil_id = "'.$id.'"');
		return $this->find($criteria);
		 
	}
}
