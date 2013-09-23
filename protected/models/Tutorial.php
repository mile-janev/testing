<?php

/**
 * This is the model class for table "tutorial".
 *
 * The followings are the available columns in table 'tutorial':
 * @property integer $id
 * @property string $title
 * @property string $location
 * @property string $explination
 * @property integer $test_id
 */
class Tutorial extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tutorial the static model class
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
		return 'tutorial';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, location, explination, test_id', 'required', 'message'=>'Полето {attribute} не може да биде празно'),
			array('test_id', 'numerical', 'integerOnly'=>true, 'message'=>'Полето {attribute} може да биде само цел број'),
			array('title, location', 'length', 'max'=>256),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, location, explination, test_id', 'safe', 'on'=>'search'),
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
                    'tests' => array(self:: BELONGS_TO, 'Test', 'test_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'location' => 'Location',
			'explination' => 'Explination',
			'test_id' => 'Test',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('explination',$this->explination,true);
		$criteria->compare('test_id',$this->test_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}