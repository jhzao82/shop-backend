<?php

namespace backend\models;

use yii\helpers\ArrayHelper;

class ShopWithCategories extends Shop
{
    /**
     * @var array IDs of the categories
     */
    var $category_ids = [];
 
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            // each category_id must exist in category table (*1)
            ['category_ids', 'each', 'rule' => [
                    'exist', 'targetClass' => Category::className(), 'targetAttribute' => 'id'
                ]
            ],
        ]);
    }
 
    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'category_ids' => 'Categories',
        ]);
    }
 
    /**
     * load the post's categories (*2)
     */
    public function loadCategories()
    {
        if (!empty($this->id)) {
            $scs = ShopCategory::find()
                ->select(['category_id'])
                ->where(['shop_id' => $this->id])
                ->asArray()
                ->all();
            $this->category_ids = ArrayHelper::getColumn($scs, 'category_id');
        } else {
            $this->category_ids = [];
        }
    }
 
    /**
     * save the post's categories (*3)
     */
    public function saveCategories()
    {
        /* clear the categories of the post before saving */
        ShopCategory::deleteAll(['shop_id' => $this->id]);
        if (is_array($this->category_ids)) {
            foreach($this->category_ids as $category_id) {
                $sc = new ShopCategory();
                $sc->shop_id = $this->id;
                $sc->category_id = $category_id;
                $sc->save();
            }
        }
        /* Be careful, $this->category_ids can be empty */
    }
}