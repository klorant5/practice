<?php

use yii\db\Migration;

/**
 * Handles the creation of table `temp_user_phones`.
 * Has foreign keys to the tables:
 *
 * - `temp_user`
 */
class m170308_180157_create_temp_user_phones_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('temp_user_phones', [
            'id' => $this->primaryKey(),
            'temp_user_id' => $this->integer(),
            'country_code' => $this->integer()->defaultValue(0),
            'phone_number' => $this->string(20)->defaultValue(''),
            'phone_type' => $this->smallInteger()->defaultValue(0),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()->defaultValue('0000-00-00 00:00:00'),
        ]);

        // creates index for column `temp_user_id`
        $this->createIndex(
            'idx-temp_user_phones-temp_user_id',
            'temp_user_phones',
            'temp_user_id'
        );

        // add foreign key for table `temp_user`
        $this->addForeignKey(
            'fk-temp_user_phones-temp_user_id',
            'temp_user_phones',
            'temp_user_id',
            'temp_user',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `temp_user`
        $this->dropForeignKey(
            'fk-temp_user_phones-temp_user_id',
            'temp_user_phones'
        );

        // drops index for column `temp_user_id`
        $this->dropIndex(
            'idx-temp_user_phones-temp_user_id',
            'temp_user_phones'
        );

        $this->dropTable('temp_user_phones');
    }
}
