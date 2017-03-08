<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user_addresses`.
 * Has foreign keys to the tables:
 *
 * - `user`
 */
class m170223_211108_create_user_addresses_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user_addresses', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'address_type' => $this->smallInteger()->defaultValue(0),
            'country_id' => $this->integer()->defaultValue(0),
            'city' => $this->string(30)->defaultValue(''),
            'street' => $this->string(40)->defaultValue(''),
            'street_section' => $this->string(80)->defaultValue(''),
            'building_number' => $this->string(10)->defaultValue(''),
            'floor' => $this->string(10)->defaultValue(''),
            'door' => $this->string(10)->defaultValue(''),
            'name_of_venue' => $this->string(100)->defaultValue(''),
            'district' => $this->string(100)->defaultValue(''),
            'zipcode' => $this->string(20)->defaultValue(''),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime()->defaultValue("0000-00-00 00:00:00"),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-user_addresses-user_id',
            'user_addresses',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user_addresses-user_id',
            'user_addresses',
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
            'fk-user_addresses-user_id',
            'user_addresses'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-user_addresses-user_id',
            'user_addresses'
        );

        $this->dropTable('user_addresses');
    }
}
