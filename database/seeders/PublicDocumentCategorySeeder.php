<?php

namespace Database\Seeders;

use App\Models\PublicDocumentCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublicDocumentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $defaultCategories=['Egyéb Dokumentumok','Jegyzőkönyvek','Rendeletek','Szabályzatok','Nyilvántartások','Nyomtatványok','Hirdetmények'];

    public function run()
    {
        foreach($this->defaultCategories as $category){

            PublicDocumentCategory::firstOrCreate(['title'=>$category]);

        }
    }
}
