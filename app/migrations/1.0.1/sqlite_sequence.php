<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

class SqliteSequenceMigration_101 extends Migration
{

    public function up()
    {
        $this->morphTable(
            'sqlite_sequence',
            array(
            'columns' => array(
                new Column(
                    'name',
                    array(
                        'type' => Column::TYPE_VARCHAR,
                        'size' => 1,
                        'first' => true
                    )
                ),
                new Column(
                    'seq',
                    array(
                        'type' => Column::TYPE_VARCHAR,
                        'size' => 1,
                        'after' => 'name'
                    )
                )
            ),        )
        );
    }
}
