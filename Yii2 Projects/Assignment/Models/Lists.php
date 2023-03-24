<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lists".
 *
 * @property int $id
 * @property string $name
 * @property string $information
 * @property string $category
 * @property string $remark
 */
class Lists extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lists';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'information', 'category', 'remark'], 'required'],
            [['information', 'remark'], 'string'],
            [['name', 'category'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'information' => 'Information',
            'category' => 'Category',
            'remark' => 'Remark',
        ];
    }
}
