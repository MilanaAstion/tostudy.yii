<?php

namespace app\models;

use Yii;
/**
 * This is the model class for table "tbl_schools".
 *
 * @property int $col_id
 * @property string|null $col_alias
 * @property int $col_city_id
 * @property string $col_meta_title
 * @property string $col_meta_description
 * @property string $col_meta_keywords
 * @property string $col_title
 * @property string $col_url
 * @property string $col_img_mini
 * @property string $col_img
 * @property string $col_description_en
 * @property string $col_description_es
 * @property string $col_description_ua
 * @property string $col_description_ru
 * @property string $col_description_cn
 * @property string $col_about_us_en
 * @property string $col_about_us_es
 * @property string $col_about_us_ua
 * @property string $col_about_us_ru
 * @property string $col_about_us_cn
 * @property string $col_residence_en
 * @property string $col_residence_es
 * @property string $col_residence_ua
 * @property string $col_residence_ru
 * @property string $col_residence_cn
 * @property string $col_registration_fee
 * @property int $col_home_page
 * @property int $col_currency
 * @property string|null $col_pdf
 */
class School extends \yii\db\ActiveRecord
{
    const HOME_PAGE = 1;
    public $school_img;
    public $country_id;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_schools';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_city_id', 'col_meta_title', 'col_meta_description', 'col_meta_keywords', 'col_title', 'col_url', 'col_img_mini', 'col_img', 'col_description_en', 'col_description_es', 'col_description_ua', 'col_description_ru', 'col_description_cn', 'col_about_us_en', 'col_about_us_es', 'col_about_us_ua', 'col_about_us_ru', 'col_about_us_cn', 'col_residence_en', 'col_residence_es', 'col_residence_ua', 'col_residence_ru', 'col_residence_cn', 'col_registration_fee', 'col_home_page', 'col_currency'], 'required'],
            [['col_city_id', 'col_home_page', 'col_currency'], 'integer'],
            [['col_description_en', 'col_description_es', 'col_description_ua', 'col_description_ru', 'col_description_cn', 'col_about_us_en', 'col_about_us_es', 'col_about_us_ua', 'col_about_us_ru', 'col_about_us_cn', 'col_residence_en', 'col_residence_es', 'col_residence_ua', 'col_residence_ru', 'col_residence_cn'], 'string'],
            [['col_alias', 'col_meta_title', 'col_meta_description', 'col_meta_keywords', 'col_title', 'col_url', 'col_pdf'], 'string', 'max' => 255],
            [['col_img_mini', 'col_img'], 'string', 'max' => 100],
            [['col_registration_fee'], 'string', 'max' => 10],
            [['school_img'], 'file', 'extensions' => 'jpg, png, jpeg', 'skipOnEmpty' => true, 'maxSize' => 512000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'Col ID',
            'col_alias' => 'Col Alias',
            'col_city_id' => 'City',
            'col_meta_title' => 'Col Meta Title',
            'col_meta_description' => 'Col Meta Description',
            'col_meta_keywords' => 'Col Meta Keywords',
            'col_title' => 'Col Title',
            'col_url' => 'Col Url',
            'col_img_mini' => 'Col Img Mini',
            'col_img' => 'Col Img',
            'col_description_en' => 'Col Description En',
            'col_description_es' => 'Col Description Es',
            'col_description_ua' => 'Col Description Ua',
            'col_description_ru' => 'Col Description Ru',
            'col_description_cn' => 'Col Description Cn',
            'col_about_us_en' => 'Col About Us En',
            'col_about_us_es' => 'Col About Us Es',
            'col_about_us_ua' => 'Col About Us Ua',
            'col_about_us_ru' => 'Col About Us Ru',
            'col_about_us_cn' => 'Col About Us Cn',
            'col_residence_en' => 'Col Residence En',
            'col_residence_es' => 'Col Residence Es',
            'col_residence_ua' => 'Col Residence Ua',
            'col_residence_ru' => 'Col Residence Ru',
            'col_residence_cn' => 'Col Residence Cn',
            'col_registration_fee' => 'Col Registration Fee',
            'col_home_page' => 'Col Home Page',
            'col_currency' => 'Col Currency',
            'col_pdf' => 'Col Pdf',
        ];
    }

    public function getCity()
    {
        return City::findOne(['col_id' => $this->col_city_id]);
    }

    
    public function getCourses()
    {
        // return Course::find()->where(['col_school_id' => $this->col_id])->all();
        // return Course::find()->where(['col_school_id' => $this->col_id])->all();
        return $this->hasMany(Course::className(), ['col_school_id' => 'col_id']);
    }

    public function getAccommodation()
    {
        return Accommodation::findAll(['col_school_id' => $this->col_id]);
    }

}