<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property integer $level
 *
 * @property ShopCategory[] $shopCategories
 * @property Shop[] $shops
 */
 
use yii\helpers\ArrayHelper;
 
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'level'], 'required'],
            [['level'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'level' => 'Level',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopCategories()
    {
        return $this->hasMany(ShopCategory::className(), ['category_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShops()
    {
        return $this->hasMany(Shop::className(), ['id' => 'shop_id'])->viaTable('shop_category', ['category_id' => 'id']);
    }
	
	public static function getAvailableCategories($level=0)
	{
		$categories = self::find()->where(['level' => $level])->orderBy('name')->asArray()->all();
		$items = ArrayHelper::map($categories, 'id', 'name');
		return $items;
	}
}
