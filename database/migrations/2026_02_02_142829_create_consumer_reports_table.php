<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consumer_reports', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('contact_number')->nullable();
            $table->integer('privacy_consent')->default(1);
            $table->integer('marketing_consent')->default(1);
            $table->string('batch_number')->nullable();
            $table->string('store_name')->nullable();
            $table->date('purchase_date')->nullable();
            $table->string('country')->nullable();
            $table->decimal('amount_paid', 10, 2)->nullable();
            $table->text('proof_of_purchase')->nullable();
            $table->text('categories')->nullable();
            $table->text('other_category')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consumer_reports');
    }
};
