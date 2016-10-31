<?php

use yii\db\Migration;

/**
 * Handles the creation for table `shop_category`.
 */
class m160926_090435_create_shop_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('shop_category', [
            'shop_id' => $this->integer(),
            'category_id' => $this->integer(),
            'PRIMARY KEY(shop_id, category_id)',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('shop_category');
    }
}
