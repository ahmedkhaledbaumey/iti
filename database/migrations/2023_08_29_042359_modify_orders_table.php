<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyOrdersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // إضافة حقل جديد إلى الجدول 
            $table->enum('status', ['pending', 'processing', 'completed'])->after('user_id'); 
            $table->decimal('total', 8, 2)->after('status'); 

    });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // إلغاء الحقل إذا تم التنفيذ للأسفل
            $table->dropColumn('status');
            $table->dropColumn('total');
        });    }
};
