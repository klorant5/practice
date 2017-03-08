<?php

use yii\db\Migration;

/**
 * Handles the creation of table `phones`.
 * Has foreign keys to the tables:
 *
 * - `user`
 */
class m170223_210043_create_phones_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_phones', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'country_code' => $this->integer()->defaultValue(0),
            'phone_number' => $this->string(20)->defaultValue(''),
            'phone_type' => $this->smallInteger()->defaultValue(0),
            'verified' => $this->smallInteger()->defaultValue(0),
            'verification_code' => $this->string(10)->defaultValue(''),
            'send_count' => $this->smallInteger()->defaultValue(0),
            'try_count' => $this->smallInteger()->defaultValue(0),
            'verified_at' => $this->dateTime()->defaultValue("0000-00-00 00:00:00"),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()->defaultValue("0000-00-00 00:00:00"),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-phones-user_id',
            'user_phones',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-phones-user_id',
            'user_phones',
            'user_id',
            'user',
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
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-phones-user_id',
            'user_phones'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-phones-user_id',
            'user_phones'
        );

        $this->dropTable('user_phones');
    }
}
