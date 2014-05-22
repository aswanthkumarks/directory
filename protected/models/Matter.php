<?php

/**
 * This is the model class for table "dir_matter".
 *
 * The followings are the available columns in table 'dir_matter':
 * @property integer $id
 * @property string $name
 * @property string $desc
 * @property integer $dir_type
 *
 * The followings are the available model relations:
 * @property Images[] $images
 * @property Type $dirType
 * @property Singlefill[] $singlefills
 */
class Matter extends CActiveRecord
{
	public $typ;
	public $search='';
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dir_matter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, dir_type', 'required'),
			array('search', 'safe'),
			array('dir_type', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>200),
			array('desc', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, desc, dir_type', 'safe', 'on'=>'search'),
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
			'images' => array(self::HAS_MANY, 'Images', 'imgof'),
			'dirType' => array(self::BELONGS_TO, 'Type', 'dir_type'),
			'singlefills' => array(self::HAS_MANY, 'Singlefill', 'mat_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'desc' => 'Desc',
			'dir_type' => 'Dir Type',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('dir_type',$this->dir_type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Matter the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getmaterlist(){
		$criteria=new CDbCriteria;		
		$criteria->alias='t';
		$criteria->select=array('t.*','i.name as typ');
		$criteria->join='LEFT JOIN dir_type i ON i.type_id=t.dir_type';
		if($this->search!=''){			
			$criteria->addCondition('t.dir_type = "'.$this->search.'"');
		}		
		
		return $dataProvider=new CActiveDataProvider($this,array(
				'pagination'=>array(
						'pageSize'=>20,
				),
				'criteria'=>$criteria,)
				);
		
	}
	
}
