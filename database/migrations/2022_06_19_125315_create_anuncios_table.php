<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create("anuncios", function (Blueprint $table) {
            $table->increments("id");
            $table->integer("id_usuario");
            $table->string("titulo", 256);
            $table->text("descricao");
            $table->boolean("ativo");
            $table->timestamp("data_criado")->default(DB::raw("CURRENT_TIMESTAMP"));
            $table->timestamp("data_atualizado")->default(DB::raw("CURRENT_TIMESTAMP"));
            $table->integer("id_tipo_anuncio");
            $table->string("cep", 256);
            $table->string("rua", 256);
            $table->string("numero", 256);
            $table->string("complemento", 256);
            $table->string("bairro", 256);
            $table->string("cidade", 256);
            $table->string("estado", 256);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("anuncios");
    }
};
