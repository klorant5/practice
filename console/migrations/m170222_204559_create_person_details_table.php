<?php

use yii\db\Migration;

/**
 * Handles the creation of table `person_details`.
 * Has foreign keys to the tables:
 *
 * - `user`
 */
class m170222_204559_create_person_details_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('person_details', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'title' => $this->smallInteger()->defaultValue(0),
            'first_name' => $this->string(30),
            'last_name' => $this->string(30),
            'unique_number' => $this->string(30),
            'passport_number' => $this->string(30),
            'contact_email' => $this->string(50),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-person_details-user_id',
            'person_details',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-person_details-user_id',
            'person_details',
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
            'fk-person_details-user_id',
            'person_details'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            'idx-person_details-user_id',
            'person_details'
        );

        $this->dropTable('person_details');
    }
}
