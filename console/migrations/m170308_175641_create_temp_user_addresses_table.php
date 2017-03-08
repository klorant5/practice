<?php

use yii\db\Migration;

/**
 * Handles the creation of table `temp_user_addresses`.
 * Has foreign keys to the tables:
 *
 * - `temp_user`
 */
class m170308_175641_create_temp_user_addresses_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('temp_user_addresses', [
            'id' => $this->primaryKey(),
            'temp_user_id' => $this->integer(),
            'country_id' => $this->integer()->defaultValue(0),
            'city' => $this->string(30)->defaultValue(""),
            'street' => $this->string(40)->defaultValue(""),
            'street_section' => $this->string(80)->defaultValue(""),
            'building_number' => $this->string(10)->defaultValue(""),
            'floor' => $this->string(10)->defaultValue(""),
            'door' => $this->string(10)->defaultValue(""),
            'name_of_venue' => $this->string(100)->defaultValue(""),
            'district' => $this->string(100)->defaultValue(""),
            'zipcode' => $this->string(20)->defaultValue(""),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()->defaultValue("0000-00-00 00:00:00"),
        ]);

        // creates index for column `temp_user_id`
        $this->createIndex(
            'idx-temp_user_addresses-temp_user_id',
            'temp_user_addresses',
            'temp_user_id'
        );

        // add foreign key for table `temp_user`
        $this->addForeignKey(
            'fk-temp_user_addresses-temp_user_id',
            'temp_user_addresses',
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
            'fk-temp_user_addresses-temp_user_id',
            'temp_user_addresses'
        );

        // drops index for column `temp_user_id`
        $this->dropIndex(
            'idx-temp_user_addresses-temp_user_id',
            'temp_user_addresses'
        );

        $this->dropTable('temp_user_addresses');
    }
}
