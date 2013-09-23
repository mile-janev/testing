<?php

/**
 * This is the model class for table "complete_question".
 *
 * The followings are the available columns in table 'complete_question':
 * @property integer $id
 * @property string $question
 * @property integer $test_id
 */
class CompleteQuestion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CompleteQuestion the static model class
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
		return 'complete_question';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question, correct, test_id', 'required', 'message'=>'Полето {attribute} не може да биде празно'),
			array('test_id', 'numerical', 'integerOnly'=>true, 'message'=>'Полето {attribute} може да биде само цел број'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, question, correct, test_id', 'safe', 'on'=>'search'),
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
			'id' => 'ИД',
			'question' => 'Прашање',
                        'correct' => 'Точен одговор',
			'test_id' => 'Тест',
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
		$criteria->compare('question',$this->question,true);
                $criteria->compare('correct',$this->correct,true);
		$criteria->compare('test_id',$this->test_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}