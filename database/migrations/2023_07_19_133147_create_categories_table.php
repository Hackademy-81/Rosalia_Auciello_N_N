<?php

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();

           
        });

        $names=['abbigliamento', 'elettrodomestrici', 'libri', 'trucchi', 'alimentari', 'giardinaggio', 'animali']; 

        foreach($names as $name){
            Category::create(
                ['name'=>$name], 
            ); 
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
