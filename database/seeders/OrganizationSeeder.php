<?php

namespace Database\Seeders;

use App\Models\Catalog;
use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organization::factory()->times(10)->create()->each(function ($organization) {
            factory(Catalog::class, 1)->create([
                'name' => 'default',
                'organization_id' => $organization->id
            ]);

        });
    }
}
