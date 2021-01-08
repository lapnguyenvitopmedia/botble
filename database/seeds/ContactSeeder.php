<?php

use Botble\Contact\Enums\ContactStatusEnum;
use Botble\Contact\Models\Contact;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Artisan::call('cms:plugin:activate', ['name' => 'contact']);

        $faker = Factory::create();

        Contact::truncate();

        for ($i = 0; $i < 10; $i++) {
            Contact::create([
                'name'    => $faker->name,
                'email'   => $faker->safeEmail,
                'phone'   => $faker->phoneNumber,
                'address' => $faker->address,
                'subject' => $faker->text(50),
                'content' => $faker->text(500),
                'status'  => $faker->randomElement([ContactStatusEnum::READ, ContactStatusEnum::UNREAD]),
            ]);
        }
    }
}
