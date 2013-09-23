<?php

/**
 * This is the model class for table "test".
 *
 * The followings are the available columns in table 'test':
 * @property integer $id
 * @property string $title
 * @property string $code
 * @property integer $tester_id
 * @property string $start
 * @property string $end
 */
class Test extends CActiveRecord
{
    public $click_num;
    public $fill_num;
    public $complete_num;
    public $tester_fl;

    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Test the static model class
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
		return 'test';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, code, tester_id, start, end', 'required', 'message'=>'Полето {attribute} не може да биде празно'),
			array('tester_id, click_num, fill_num, complete_num', 'numerical', 'integerOnly'=>true, 'message'=>'Полето {attribute} може да биде само цел број'),
			array('title', 'length', 'max'=>256),
			array('code', 'length', 'max'=>40),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, code, tester_id, start, end, average_grade', 'safe', 'on'=>'search'),
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
                    'testers' => array(self:: BELONGS_TO, 'Tester', 'tester_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ИД',
			'title' => 'Наслов на тестот',
			'code' => 'Пристапна шифра',
			'tester_id' => 'Тестер ид',
			'start' => 'Почеток',
			'end' => 'Крај',
                        'click_num' => 'Избор на 1 од 3 понудени одговори',
                        'fill_num' => 'Дополнување на збор или фраза',
                        'complete_num' => 'Давање целосен одговор',
                        'average_grade' => 'Просечна оцена',
                        'tester_fl'=> 'Тестер'
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
		$criteria->compare('code',$this->code,true);
//		$criteria->compare('tester_id',$this->tester_id);
		$criteria->compare('start',$this->start,true);
		$criteria->compare('end',$this->end,true);
                $criteria->compare('average_grade',$this->average_grade,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function beforeSave()
        {
            if(trim($this->code) != "")
            {
                $this->code = $this->code;                
            }
            else
            {
                unset($this->code);
                unset($this->code);
            }

            return parent::beforeSave();
        }

}