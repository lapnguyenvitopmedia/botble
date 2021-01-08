<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(WidgetSeeder::class);
        $this->call(MemberSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(StaticBlockSeeder::class);
        $this->call(ThemeOptionSeeder::class);
    }
}
