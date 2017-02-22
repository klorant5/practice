<?php

use yii\db\Migration;

/**
 * Handles the creation of table `temp_user`.
 */
class m170222_212939_create_temp_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('temp_user', [
            'id' => $this->primaryKey(),
            'email' => $this->string(100)->defaultValue(''),
            'type' => $this->smallInteger()->defaultValue(0),
            'status' => $this->smallInteger()->defaultValue(0),
            'reference_type' => $this->smallInteger()->defaultValue(0),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('temp_user');
    }
}
