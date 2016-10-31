<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "shop_category".
 *
 * @property integer $shop_id
 * @property integer $category_id
 */
class ShopCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_id', 'category_id'], 'required'],
            [['shop_id', 'category_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'shop_id' => 'Shop ID',
            'category_id' => 'Category ID',
        ];
    }
}
