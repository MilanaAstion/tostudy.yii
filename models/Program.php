<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_programs".
 *
 * @property int $col_id
 * @property string $col_name
 * @property string $col_alias
 * @property int $col_rating
 * @property int|null $col_key
 * @property int $col_status
 * @property string|null $col_text_top
 * @property string|null $col_text_bottom
 */
class Program extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_programs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['col_name', 'col_alias', 'col_rating'], 'required'],
            [['col_rating', 'col_key', 'col_status'], 'integer'],
            [['col_text_top', 'col_text_bottom'], 'string'],
            [['col_name', 'col_alias'], 'string', 'max' => 255],
            [['col_name'], 'unique'],
            [['col_alias'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'col_id' => 'Col ID',
            'col_name' => 'Col Name',
            'col_alias' => 'Col Alias',
            'col_rating' => 'Col Rating',
            'col_key' => 'Col Key',
            'col_status' => 'Col Status',
            'col_text_top' => 'Col Text Top',
            'col_text_bottom' => 'Col Text Bottom',
        ];
    }
}
