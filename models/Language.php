<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_languages".
 *
 * @property int $col_id
 * @property string|null $col_alias
 * @property string $col_title_en
 * @property string $col_title_es
 * @property string $col_title_ua
 * @property string $col_title_ru
 * @property string $col_title_cn
 * @property string $col_img
 */
class Language extends \yii\db\ActiveRecord
{
    public $file_img;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_languages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_title_en', 'col_title_es', 'col_title_ua', 'col_title_ru', 'col_title_cn', 'col_img'], 'required'],
            [['col_alias'], 'string', 'max' => 255],
            [['col_title_en', 'col_title_es', 'col_title_ua', 'col_title_ru', 'col_title_cn', 'col_img'], 'string', 'max' => 100],
            [['file_img'], 'file', 'extensions' => 'jpg, png, jpeg', 'skipOnEmpty' => true],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'Col ID',
            'col_alias' => 'Alias',
            'col_title_en' => 'Col Title En',
            'col_title_es' => 'Col Title Es',
            'col_title_ua' => 'Col Title Ua',
            'col_title_ru' => 'Title',
            'col_title_cn' => 'Col Title Cn',
            'col_img' => 'Img',
        ];
    }

    public function afterDelete()
    {
        parent::afterDelete();

        $filePath = Yii::getAlias('@webroot/img/lang/') . $this->col_img;

        if(file_exists($filePath)){
            unlink($filePath);
        }
    }
}
