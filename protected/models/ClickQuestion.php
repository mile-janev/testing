<?php

/**
 * This is the model class for table "click_question".
 *
 * The followings are the available columns in table 'click_question':
 * @property integer $id
 * @property integer $test_id
 * @property string $question
 * @property string $answer1
 * @property string $answer2
 * @property string $answer3
 * @property string $correct
 */
class ClickQuestion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ClickQuestion the static model class
	 */
        public $answer;
        public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'click_question';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('test_id, question, answer1, answer2, answer3, correct', 'required', 'message'=>'Полето {attribute} не може да биде празно'),
			array('test_id', 'numerical', 'integerOnly'=>true, 'message'=>'Полето {attribute} може да биде само цел број'),
			array('answer1, answer2, answer3', 'length', 'max'=>256),
			array('correct', 'length', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, test_id, question, answer1, answer2, answer3, correct', 'safe', 'on'=>'search'),
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
			'test_id' => 'Тест',
			'question' => 'Прашање',
			'answer1' => 'Одговор1',
			'answer2' => 'Одговор2',
			'answer3' => 'Одговор3',
			'correct' => 'Точен одговор',
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
		$criteria->compare('test_id',$this->test_id);
		$criteria->compare('question',$this->question,true);
		$criteria->compare('answer1',$this->answer1,true);
		$criteria->compare('answer2',$this->answer2,true);
		$criteria->compare('answer3',$this->answer3,true);
		$criteria->compare('correct',$this->correct,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}