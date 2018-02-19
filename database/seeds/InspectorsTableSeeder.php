<?php

use Illuminate\Database\Seeder;

class InspectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inspectors')->insert([
            ['lastname' => 'Акинфиев',      'firstname' => 'Константин',    'middlename' => 'Сергеевич',      'zone' => 'Правобережная',  'email' => 'akinfiev@gne.gov.spb.ru'],
            ['lastname' => 'Белецкий',      'firstname' => 'Игорь',         'middlename' => 'Вячеславович',   'zone' => 'Левобережная',   'email' => 'beleckiy@gne.gov.spb.ru'],
            ['lastname' => 'Бульба',        'firstname' => 'Татьяна',       'middlename' => 'Степановна',     'zone' => 'Левобережная',   'email' => 'bulba@gne.gov.spb.ru'],
            ['lastname' => 'Бурдаков',      'firstname' => 'Владимир',      'middlename' => 'Николаевич',     'zone' => 'Правобережная',  'email' => 'burdakov@gne.gov.spb.ru'],
            ['lastname' => 'Васильковский', 'firstname' => 'Вадим',         'middlename' => 'Михайлович',     'zone' => 'Правобережная',  'email' => 'vvm911@mail.ru'],
            ['lastname' => 'Верисоцкая',    'firstname' => 'Вера',          'middlename' => 'Викторовна',     'zone' => 'Правобережная',  'email' => 'verisockaya@gne.gov.spb.ru'],
            ['lastname' => 'Зайкин',        'firstname' => 'Павел',         'middlename' => 'Борисович',      'zone' => 'Правобережная',  'email' => 'zaikin@gne.gov.spb.ru'],
            ['lastname' => 'Иватьо',        'firstname' => 'Алексей',       'middlename' => 'Иванович',       'zone' => 'Левобережная',   'email' => 'ivatyo@gne.gov.spb.ru'],
            ['lastname' => 'Козев',         'firstname' => 'Игорь',         'middlename' => 'Валерьевич',     'zone' => 'Левобережная',   'email' => 'kozev@gne.gov.spb.ru'],
            ['lastname' => 'Короленок',     'firstname' => 'Сергей',        'middlename' => 'Леонидович',     'zone' => 'Правобережная',  'email' => 'korolenok@gne.gov.spb.ru'],
            ['lastname' => 'Коротич',       'firstname' => 'Сергей',        'middlename' => 'Владимирович',   'zone' => 'Левобережная',   'email' => 'korotich@gne.gov.spb.ru'],
            ['lastname' => 'Кузык',         'firstname' => 'Иван',          'middlename' => 'Иванович',       'zone' => 'Правобережная',  'email' => 'kuzyk@gne.gov.spb.ru'],
            ['lastname' => 'Ляхов',         'firstname' => 'Сергей',        'middlename' => 'Александрович',  'zone' => 'Левобережная',   'email' => 'lyahov@gne.gov.spb.ru'],
            ['lastname' => 'Маслов',        'firstname' => 'Алексей',       'middlename' => 'Леонидович',     'zone' => 'Левобережная',   'email' => 'maslov@gne.gov.spb.ru'],
            ['lastname' => 'Отчаянный',     'firstname' => 'Дмитрий',       'middlename' => 'Игоревич',       'zone' => 'Правобережная',  'email' => 'Otchayannyy@gne.gov.spb.ru'],
            ['lastname' => 'Первушкин',     'firstname' => 'Александр',     'middlename' => 'Викторович',     'zone' => 'Левобережная',   'email' => 'pervushkin@gne.gov.spb.ru'],
            ['lastname' => 'Попов',         'firstname' => 'Константин',    'middlename' => 'Юрьевич',        'zone' => 'Правобережная',  'email' => 'popov@gne.gov.spb.ru'],
            ['lastname' => 'Салычев',       'firstname' => 'Андрей',        'middlename' => 'Владимирович',   'zone' => 'Левобережная',   'email' => 'salyichev@gne.gov.spb.ru'],
            ['lastname' => 'Соколов',       'firstname' => 'Александр',     'middlename' => 'Юрьевич',        'zone' => 'Левобережная',   'email' => 'aprovaider@rambler.ru'],
            ['lastname' => 'Соловьев',      'firstname' => 'Андрей',        'middlename' => 'Владимирович',   'zone' => 'Правобережная',  'email' => 'soloviev@gne.gov.spb.ru'],
            ['lastname' => 'Строгов',       'firstname' => 'Вадим',         'middlename' => 'Викторович',     'zone' => 'Левобережная',   'email' => 'strogov@gne.gov.spb.ru'],
            ['lastname' => 'Титов',         'firstname' => 'Максим',        'middlename' => 'Николаевич',     'zone' => 'Правобережная',  'email' => 'titov@gne.gov.spb.ru'],
            ['lastname' => 'Филимонов',     'firstname' => 'Андрей',        'middlename' => 'Сергеевич',      'zone' => 'Левобережная',   'email' => 'Philimonov@gne.gov.spb.ru'],
            ['lastname' => 'Шмыков',        'firstname' => 'Кирилл',        'middlename' => 'Николаевич',     'zone' => 'Правобережная',  'email' => 'shmikov@gne.gov.spb.ru']
        ]);
    }
}
