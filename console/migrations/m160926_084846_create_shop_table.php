<?php

use yii\db\Migration;

/**
 * Handles the creation for table `shop`.
 */
class m160926_084846_create_shop_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('shop', [
            'id' => $this->primaryKey(),
			'title' => $this->string()->notNull(),
            'content' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('shop');
    }
}
