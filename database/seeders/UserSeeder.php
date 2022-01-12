<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =  [
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
                'id_number' => '01025019291',
                'name_surname' => 'სუპერ ადმინი',
                'photo' => '',
                'date' => '16/10/1992',
                'section' => 'ადმინისტრატორი',
                'sub_section' => 'პარ სამსახური',
                'position' => 'ტოპ მენეჯერი',
                'mobile' => '579044023',
                'paid_vacation' => '25',
                'unpaid_vacation' => '14',
                'day_Off' => '13',
                'family_circumstances' => '12',
                'bulletin' => '14',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'type_id' => 1
            ],
            [
                'name' => 'ირაკლი',
                'email' => 'iraklibandzeladze@gmail.com',
                'password' => Hash::make('admin'),
                'id_number' => '01025019291',
                'name_surname' => 'ირაკლი',
                'photo' => '',
                'date' => '26/09/1987',
                'section' => 'მარკეტინგი',
                'sub_section' => 'პარ სამსახური',
                'position' => 'მენეჯერი',
                'mobile' => '579044033',
                'paid_vacation' => '12',
                'unpaid_vacation' => '4',
                'day_Off' => '3',
                'family_circumstances' => '2',
                'bulletin' => '14',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'type_id' => 4
            ],
            [
                'name' => 'ჯერმიზა',
                'email' => 'jermiz@gmail.com',
                'password' => Hash::make('admin'),
                'id_number' => '01025239291',
                'name_surname' => 'ნიკა ჯერმიზაშივილი ',
                'photo' => '',
                'date' => '22/10/1996',
                'section' => 'მარკეტინგი',
                'sub_section' => 'პარ სამსახური',
                'position' => 'მენეჯერი',
                'mobile' => '579044111',
                'paid_vacation' => '12',
                'unpaid_vacation' => '4',
                'day_Off' => '3',
                'family_circumstances' => '2',
                'bulletin' => '14',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'type_id' => 4
            ],
            [
                'name' => 'დავით გორდაძე',
                'email' => 'davit@gmail.com',
                'password' => Hash::make('admin'),
                'id_number' => '01055559291',
                'name_surname' => 'დავით გორდაძე',
                'photo' => '',
                'date' => '2021-10-18',
                'section' => 'მარკეტინგი',
                'sub_section' => 'პარ სამსახური',
                'position' => 'მენეჯერი',
                'mobile' => '579044111',
                'paid_vacation' => '12',
                'unpaid_vacation' => '4',
                'day_Off' => '3',
                'family_circumstances' => '2',
                'bulletin' => '14',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'type_id' => 4
            ],
            [
                'name' => 'გვანცა გუგუნავა',
                'email' => 'gvanca@gmail.com',
                'password' => Hash::make('admin'),
                'id_number' => '01025011111',
                'name_surname' => 'გვანცა გუგუნავა',
                'photo' => '',
                'date' => '2021-10-12',
                'section' => 'მარკეტინგი',
                'sub_section' => 'პარ სამსახური',
                'position' => 'მენეჯერი',
                'mobile' => '579333111',
                'paid_vacation' => '12',
                'unpaid_vacation' => '4',
                'day_Off' => '3',
                'family_circumstances' => '2',
                'bulletin' => '14',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                'type_id' => 4
            ]
        ];

        DB::table('users')->insert($users);
    }
}
