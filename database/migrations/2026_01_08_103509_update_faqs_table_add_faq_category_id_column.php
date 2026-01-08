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
        Schema::table('faqs', function (Blueprint $table) {
            if (!Schema::hasColumn('faqs', 'faq_category_id')) {
                $table->foreignId('faq_category_id')->nullable()->after('id')->constrained('faq_categories')->onDelete('set null');
            }
        });

        // Migrate existing data
        $faqs = \Illuminate\Support\Facades\DB::table('faqs')->get();
        foreach ($faqs as $faq) {
            if ($faq->category) {
                $category = \App\Models\FaqCategory::firstOrCreate(
                    ['name' => $faq->category],
                    ['slug' => \Illuminate\Support\Str::slug($faq->category)]
                );
                
                \Illuminate\Support\Facades\DB::table('faqs')
                    ->where('id', $faq->id)
                    ->update(['faq_category_id' => $category->id]);
            }
        }

        Schema::table('faqs', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faqs', function (Blueprint $table) {
            $table->string('category')->nullable()->after('answer');
        });

        // Restore data
        $faqs = \Illuminate\Support\Facades\DB::table('faqs')->get();
        foreach ($faqs as $faq) {
            if ($faq->faq_category_id) {
                $category = \Illuminate\Support\Facades\DB::table('faq_categories')->find($faq->faq_category_id);
                if ($category) {
                    \Illuminate\Support\Facades\DB::table('faqs')
                        ->where('id', $faq->id)
                        ->update(['category' => $category->name]);
                }
            }
        }

        Schema::table('faqs', function (Blueprint $table) {
            $table->dropForeign(['faq_category_id']);
            $table->dropColumn('faq_category_id');
        });
    }
};