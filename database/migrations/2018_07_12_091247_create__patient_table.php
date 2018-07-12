<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'Patient';

    /**
     * Run the migrations.
     * @table Patient
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idPatient');
            $table->integer('users_idUsers');
            $table->timestamps();

            $table->index(["users_idUsers"], 'fk_Patient_users1_idx');

            $table->unique(["idPatient"], 'idPatient_UNIQUE');


            $table->foreign('users_idUsers', 'fk_Patient_users1_idx')
                ->references('idUsers')->on('users')
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