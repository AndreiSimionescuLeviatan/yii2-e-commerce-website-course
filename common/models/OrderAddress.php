<?php

namespace common\models;
use \common\models\query\OrderAddressQuery;
use Yii;

/**
 * This is the model class for table "{{%order_addresses}}".
 *
 * @property int $order_id
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string|null $zipcode
 */
class OrderAddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%order_addresses}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'address', 'city', 'state', 'country'], 'required'],
            [['order_id'], 'integer'],
            [['address', 'city', 'state', 'country', 'zipcode'], 'string', 'max' => 255],
            [['order_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
            'zipcode' => 'Zipcode',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\OrderAddressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderAddressQuery(get_called_class());
    }
}
