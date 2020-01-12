<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "send".
 *
 * @property int $id
 * @property string|null $name
 * @property float|null $sumBYN
 * @property float|null $sumUSD
 * @property string|null $image
 */
class Send extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'send';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sumBYN', 'sumUSD'], 'number'],
            [['name'], 'string', 'max' => 30],
            [['image'], 'string', 'max' => 255],
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
            'sumBYN' => 'Sum BYN',
            'sumUSD' => 'Sum USD',
            'image' => 'Image',
        ];
    }
}
