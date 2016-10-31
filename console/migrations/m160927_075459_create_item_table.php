<?php

use yii\db\Migration;

/**
 * Handles the creation for table `item`.
 */
class m160927_075459_create_item_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('item', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
			'title' => $this->string()->notNull(),
            'content' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('item');
    }
}
