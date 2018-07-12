<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'Message';

    /**
     * Run the migrations.
     * @table Message
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idMessage');
            $table->text('message');
            $table->dateTime('send_datetime');
            $table->integer('Messanger_idMessanger');
            $table->timestamps();

            $table->index(["Messanger_idMessanger"], 'fk_Message_Messanger1_idx');

            $table->unique(["idMessage"], 'idMessage_UNIQUE');


            $table->foreign('Messanger_idMessanger', 'fk_Message_Messanger1_idx')
                ->references('idMessanger')->on('Messanger')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->set_schema_table);
    }
}