<?php

namespace app\models;

use app\models\Country; 
use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "tbl_cities".
 *
 * @property int $col_id
 * @property string|null $col_alias
 * @property int $col_country_id
 * @property string $col_title_en
 * @property string $col_title_es
 * @property string $col_title_ua
 * @property string $col_title_ru
 * @property string $col_title_cn
 * @property string $col_img
 * @property string|null $col_meta_title
 * @property string|null $col_meta_description
 * @property string|null $col_meta_keywords
 */
class City extends \yii\db\ActiveRecord
{
    public $country_img;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_cities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_country_id', 'col_title_en', 'col_title_es', 'col_title_ua', 'col_title_ru', 'col_title_cn', 'col_img'], 'required'],
            [['col_country_id'], 'integer'],
            [['col_alias', 'col_title_en', 'col_title_es', 'col_title_ua', 'col_title_ru', 'col_title_cn', 'col_meta_title', 'col_meta_description', 'col_meta_keywords'], 'string', 'max' => 255],
            [['col_img'], 'string', 'max' => 100],
            [['country_img'], 'file', 'extensions' => 'jpg, png, jpeg', 'skipOnEmpty' => true, 'maxSize' => 512000],
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
            'col_country_id' => 'Col Country ID',
            'col_title_en' => 'Col Title En',
            'col_title_es' => 'Col Title Es',
            'col_title_ua' => 'Col Title Ua',
            'col_title_ru' => 'Col Title Ru',
            'col_title_cn' => 'Col Title Cn',
            'col_img' => 'Col Img',
            'col_meta_title' => 'Col Meta Title',
            'col_meta_description' => 'Col Meta Description',
            'col_meta_keywords' => 'Col Meta Keywords',
        ];
    }

    public function getCountry()
    {
    //    return Country::findOne($this->col_country_id);
        return $this->hasOne(Country::className(), ['col_id' => 'col_country_id']);
    }


   
}
