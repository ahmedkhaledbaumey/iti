<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // إضافة حقل جديد إلى الجدول 
            $table->unsignedBigInteger('category_id')->after('price'); 
            $table->foreign('category_id')->references('id')->on('categories');


        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // إلغاء الحقل إذا تم التنفيذ للأسفل
            $table->dropColumn('category_id');
        });
    }
}
