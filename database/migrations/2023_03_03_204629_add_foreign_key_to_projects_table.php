<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            //1 - CREO LA COLONNA
            $table->unsignedBigInteger('type_id') //QUESTO COINCIDE CON->
            ->nullable()
            ->after('id');

            //2 - CREO LA FOREIGN KEY
            $table->foreign('type_id') //<-QUESTO
            ->references('id') // NOME DELLA COLONNA A CUI FA RIFERIMENTO
            ->on('types') //... E DI QUALE TABELLA APPARTIENE
            ->onDelete('set null'); // SETTA NULL ALLA COLONNA SE ELIMINIAMO LA CATEGORIA
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //1 - ELIMINO LA FOREIGN KEY
            $table->dropForeign('projects_type_id_foreign');
            
            //2 - ELIMINO LA COLONNA
            $table->dropColumn('type_id');
        });
    }
};
