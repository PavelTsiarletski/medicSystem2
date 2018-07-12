<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorTypeTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'Doctor_type';

    /**
     * Run the migrations.
     * @table Doctor_type
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idDoctor_type');
            $table->string('type_name', 60);
            $table->timestamps();

            $table->unique(["type_name"], 'type_name_UNIQUE');

            $table->unique(["idDoctor_type"], 'idDoctor_type_UNIQUE');
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
