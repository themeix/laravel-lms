<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'category.index']);
        Permission::create(['name' => 'category.create']);
        Permission::create(['name' => 'category.store']);
        Permission::create(['name' => 'category.edit']);
        Permission::create(['name' => 'category.update']);
        Permission::create(['name' => 'category.delete']);

        Permission::create(['name' => 'subCategory.index']);
        Permission::create(['name' => 'subCategory.create']);
        Permission::create(['name' => 'subCategory.store']);
        Permission::create(['name' => 'subCategory.edit']);
        Permission::create(['name' => 'subCategory.update']);
        Permission::create(['name' => 'subCategory.delete']);

        Permission::create(['name' => 'tag.index']);
        Permission::create(['name' => 'tag.create']);
        Permission::create(['name' => 'tag.store']);
        Permission::create(['name' => 'tag.edit']);
        Permission::create(['name' => 'tag.update']);
        Permission::create(['name' => 'tag.delete']);

        Permission::create(['name' => 'tag.index']);
        Permission::create(['name' => 'tag.create']);
        Permission::create(['name' => 'tag.store']);
        Permission::create(['name' => 'tag.edit']);
        Permission::create(['name' => 'tag.update']);
        Permission::create(['name' => 'tag.delete']);

        Permission::create(['name' => 'language.index']);
        Permission::create(['name' => 'language.create']);
        Permission::create(['name' => 'language.store']);
        Permission::create(['name' => 'language.edit']);
        Permission::create(['name' => 'language.update']);
        Permission::create(['name' => 'language.delete']);

        Permission::create(['name' => 'difficultyLevel.index']);
        Permission::create(['name' => 'difficultyLevel.create']);
        Permission::create(['name' => 'difficultyLevel.store']);
        Permission::create(['name' => 'difficultyLevel.edit']);
        Permission::create(['name' => 'difficultyLevel.update']);
        Permission::create(['name' => 'difficultyLevel.delete']);

        Permission::create(['name' => 'promotionalTag.index']);
        Permission::create(['name' => 'promotionalTag.create']);
        Permission::create(['name' => 'promotionalTag.store']);
        Permission::create(['name' => 'promotionalTag.edit']);
        Permission::create(['name' => 'promotionalTag.update']);
        Permission::create(['name' => 'promotionalTag.delete']);

        Permission::create(['name' => 'rulesBenefits.index']);
        Permission::create(['name' => 'rulesBenefits.create']);
        Permission::create(['name' => 'rulesBenefits.store']);
        Permission::create(['name' => 'rulesBenefits.edit']);
        Permission::create(['name' => 'rulesBenefits.update']);
        Permission::create(['name' => 'rulesBenefits.delete']);
    }
}
