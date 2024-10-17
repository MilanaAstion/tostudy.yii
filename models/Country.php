<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_countries".
 *
 * @property int $col_id
 * @property string|null $col_alias
 * @property int $col_language_id
 * @property string $col_title_en
 * @property string $col_title_es
 * @property string $col_title_ua
 * @property string $col_title_ru
 * @property string $col_title_cn
 * @property string $col_img
 * @property string $col_flag
 * @property string|null $col_meta_title
 * @property string|null $col_meta_description
 * @property string|null $col_meta_keywords
 */
class Country extends \yii\db\ActiveRecord
{
    public $country_img;
    public $flag_img;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_countries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_language_id', 'col_title_en', 'col_title_es', 'col_title_ua', 'col_title_ru', 'col_title_cn', 'col_img', 'col_flag'], 'required'],
            [['col_language_id'], 'integer'],
            [['col_alias', 'col_meta_title', 'col_meta_description', 'col_meta_keywords'], 'string', 'max' => 255],
            [['col_title_en', 'col_title_es', 'col_title_ua', 'col_title_ru', 'col_title_cn', 'col_img', 'col_flag'], 'string', 'max' => 100],
            [['country_img', 'flag_img'], 'file', 'extensions' => 'jpg, png, jpeg', 'skipOnEmpty' => true],
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
            'col_language_id' => 'Col Language ID',
            'col_title_en' => 'Col Title En',
            'col_title_es' => 'Col Title Es',
            'col_title_ua' => 'Col Title Ua',
            'col_title_ru' => 'Col Title Ru',
            'col_title_cn' => 'Col Title Cn',
            'col_img' => 'Col Img',
            'col_flag' => 'Col Flag',
            'col_meta_title' => 'Col Meta Title',
            'col_meta_description' => 'Col Meta Description',
            'col_meta_keywords' => 'Col Meta Keywords',
        ];
    }

    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['col_id' => 'col_language_id']);
    }
}
