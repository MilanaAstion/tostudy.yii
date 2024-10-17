<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_courses".
 *
 * @property int $col_id
 * @property int $col_school_id
 * @property int $col_prog_id
 * @property string $col_title_en
 * @property string $col_title_es
 * @property string $col_title_ua
 * @property string $col_title_ru
 * @property string $col_title_cn
 * @property string $col_description_en
 * @property string $col_description_es
 * @property string $col_description_ua
 * @property string $col_description_ru
 * @property string $col_description_cn
 * @property string $col_price
 */
class Course extends \yii\db\ActiveRecord
{
    public $prices;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_school_id', 'col_prog_id', 'col_title_en', 'col_title_es', 'col_title_ua', 'col_title_ru', 'col_title_cn', 'col_description_en', 'col_description_es', 'col_description_ua', 'col_description_ru', 'col_description_cn', 'col_price'], 'required'],
            [['col_school_id', 'col_prog_id'], 'integer'],
            [['col_description_en', 'col_description_es', 'col_description_ua', 'col_description_ru', 'col_description_cn', 'col_price'], 'string'],
            [['col_title_en', 'col_title_es', 'col_title_ua', 'col_title_ru', 'col_title_cn'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'Col ID',
            'col_school_id' => 'School',
            'col_prog_id' => 'Program',
            'col_title_en' => 'Col Title En',
            'col_title_es' => 'Col Title Es',
            'col_title_ua' => 'Col Title Ua',
            'col_title_ru' => 'Col Title Ru',
            'col_title_cn' => 'Col Title Cn',
            'col_description_en' => 'Col Description En',
            'col_description_es' => 'Col Description Es',
            'col_description_ua' => 'Col Description Ua',
            'col_description_ru' => 'Col Description Ru',
            'col_description_cn' => 'Col Description Cn',
            'col_price' => 'Col Price',
        ];
    }

    public function getSchool()
    {
        return $this->hasOne(School::className(), ['col_id' => 'col_school_id']);
    }

    public function getProgram()
    {
        return $this->hasOne(Program::className(), ['col_id' => 'col_prog_id']);
    }

    // public function courseCost($arr) {
    //     $options = ''; //список недель для калькулятора
    //     $price = array_reverse(explode(',', $arr['col_price']));
    //     $i = 1;
    
    //     while ($value = current($price)) {
    //         $value .= ':'. $arr['col_id'];
    //         $options .= templateWeeksOption($value);
    //         $i ++;
    //         next($price);
    //     }
        
    //     return $options;
    // }

    // public static function getCourseCost($courses)
    // {
    //     foreach($courses as $course){
    //         $prices = array_reverse(explode(',', $course->col_price));
    //         $course->prices = self::getWeekOption($prices);
    //         dd($course->prices);
    //     }
    //     return  $courses;
    // }

    public function getWeeks()
    {
        $items = array_reverse(explode(',', $this->col_price));
        $weeks = [];
        
        foreach($items as $item){
            $arr = explode(':', $item);
            $week["num"] = $arr[0];
            $week["price"] = $arr[1];
            $weeks[] = $week;
        }
        return $weeks;
    }

}
