<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_articles".
 *
 * @property int $col_id
 * @property string|null $col_alias
 * @property string $col_title_en
 * @property string $col_title_es
 * @property string $col_title_ua
 * @property string $col_title_ru
 * @property string $col_title_cn
 * @property string $col_text_en
 * @property string $col_text_es
 * @property string $col_text_ua
 * @property string $col_text_ru
 * @property string $col_text_cn
 * @property string $col_img
 * @property string $col_img_big
 * @property int $col_status
 * @property string|null $col_meta_title
 * @property string|null $col_meta_description
 * @property string|null $col_meta_keywords
 */
class Article extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 3;
    const STATUS_IN_ACTIVE = 2;
    const STATUS_DELETE = 1;

    public $img;
    public $img_big;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_title_en', 'col_title_es', 'col_title_ua', 'col_title_ru', 'col_title_cn', 'col_text_en', 'col_text_es', 'col_text_ua', 'col_text_ru', 'col_text_cn', 'col_img', 'col_img_big', 'col_status'], 'safe'],
            [['col_text_en', 'col_text_es', 'col_text_ua', 'col_text_ru', 'col_text_cn'], 'string'],
            [['col_status'], 'integer'],
            [['col_alias', 'col_title_en', 'col_title_es', 'col_title_ua', 'col_title_ru', 'col_title_cn', 'col_meta_title', 'col_meta_description', 'col_meta_keywords'], 'string', 'max' => 255],
            [['col_img', 'col_img_big'], 'string', 'max' => 100],
            [['img', 'img_big'], 'file', 'extensions' => 'jpg, png, jpeg', 'skipOnEmpty' => true],
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
            'col_title_en' => 'Col Title En',
            'col_title_es' => 'Col Title Es',
            'col_title_ua' => 'Col Title Ua',
            'col_title_ru' => 'Col Title Ru',
            'col_title_cn' => 'Col Title Cn',
            'col_text_en' => 'Col Text En',
            'col_text_es' => 'Col Text Es',
            'col_text_ua' => 'Col Text Ua',
            'col_text_ru' => 'Col Text Ru',
            'col_text_cn' => 'Col Text Cn',
            'col_img' => 'Col Img',
            'col_img_big' => 'Col Img Big',
            'col_status' => 'Col Status',
            'col_meta_title' => 'Col Meta Title',
            'col_meta_description' => 'Col Meta Description',
            'col_meta_keywords' => 'Col Meta Keywords',
        ];
    }

    public function getStatus(){
        // if($this->col_status == self::STATUS_DELETE){
        //     return 'удалено';
        // }
        // if($this->col_status == self::STATUS_IN_ACTIVE){
        //     return 'не активно';
        // }
        // if($this->col_status == self::STATUS_ACTIVE){
        //     return 'активно';
        // }

        $status_arr = [self::STATUS_DELETE => 'удалено', self::STATUS_IN_ACTIVE => 'не активно', self::STATUS_ACTIVE => 'активно'];
        return $status_arr[$this->col_status];
    }
}
