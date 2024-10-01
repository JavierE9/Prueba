<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del documento
            $table->text('description'); // Descripción
            $table->enum('relevance', ['alta', 'media', 'baja']); // Relevancia
            $table->date('approval_date'); // Fecha de aprobación
            $table->date('upload_date'); // Fecha de subida
            $table->string('pdf_path'); // Ruta del documento PDF
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
