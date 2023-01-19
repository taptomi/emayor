<?php

namespace Database\Seeders;

use App\Models\OrganizationUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrganizationUser::factory()->create([
            'user_id' => 3,
            'organization_id' => 1,

        ]);
    }
}
