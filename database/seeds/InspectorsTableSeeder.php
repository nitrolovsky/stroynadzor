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
            ['lastname' => 'Акинфиев',      'firstname' => 'Константин',    'middlename' => 'Сергеевич'],
            ['lastname' => 'Белецкий',      'firstname' => 'Игорь',         'middlename' => 'Вячеславович'],
            ['lastname' => 'Бульба',        'firstname' => 'Татьяна',       'middlename' => 'Степановна'],
            ['lastname' => 'Бурдаков',      'firstname' => 'Владимир',      'middlename' => 'Николаевич'],
            ['lastname' => 'Васильковский', 'firstname' => 'Вадим',         'middlename' => 'Михайлович'],
            ['lastname' => 'Верисоцкая',    'firstname' => 'Вера',          'middlename' => 'Викторовна'],
            ['lastname' => 'Зайкин',        'firstname' => 'Павел',         'middlename' => 'Борисович'],
            ['lastname' => 'Иватьо',        'firstname' => 'Алексей',       'middlename' => 'Иванович'],
            ['lastname' => 'Козев',         'firstname' => 'Игорь',         'middlename' => 'Валерьевич'],
            ['lastname' => 'Короленок',     'firstname' => 'Сергей',        'middlename' => 'Леонидович'],
            ['lastname' => 'Коротич',       'firstname' => 'Сергей',        'middlename' => 'Владимирович'],
            ['lastname' => 'Кузык',         'firstname' => 'Иван',          'middlename' => 'Иванович'],
            ['lastname' => 'Ляхов',         'firstname' => 'Сергей',        'middlename' => 'Александрович'],
            ['lastname' => 'Маслов',        'firstname' => 'Алексей',       'middlename' => 'Леонидович'],
            ['lastname' => 'Отчаянный',     'firstname' => 'Дмитрий',       'middlename' => 'Игоревич'],
            ['lastname' => 'Первушкин',     'firstname' => 'Александр',     'middlename' => 'Викторович'],
            ['lastname' => 'Попов',         'firstname' => 'Константин',    'middlename' => 'Юрьевич'],
            ['lastname' => 'Салычев',       'firstname' => 'Андрей',        'middlename' => 'Владимирович'],
            ['lastname' => 'Соколов',       'firstname' => 'Александр',     'middlename' => 'Юрьевич'],
            ['lastname' => 'Соловьев',      'firstname' => 'Андрей',        'middlename' => 'Владимирович'],
            ['lastname' => 'Строгов',       'firstname' => 'Вадим',         'middlename' => 'Викторович'],
            ['lastname' => 'Титов',         'firstname' => 'Максим',        'middlename' => 'Николаевич'],
            ['lastname' => 'Филимонов',     'firstname' => 'Андрей',        'middlename' => 'Сергеевич'],
            ['lastname' => 'Шмыков',        'firstname' => 'Кирилл',        'middlename' => 'Николаевич']
        ]);
    }
    /*
    ['lastname' => 'Акинфиев',      'firstname' => 'Константин',    'middlename' => 'Сергеевич',       'email' => 'akinfiev@gne.gov.spb.ru'],
    ['lastname' => 'Белецкий',      'firstname' => 'Игорь',         'middlename' => 'Вячеславович',    'email' => 'beleckiy@gne.gov.spb.ru'],
    ['lastname' => 'Бульба',        'firstname' => 'Татьяна',       'middlename' => 'Степановна',      'email' => 'bulba@gne.gov.spb.ru'],
    ['lastname' => 'Бурдаков',      'firstname' => 'Владимир',      'middlename' => 'Николаевич',      'email' => 'burdakov@gne.gov.spb.ru'],
    ['lastname' => 'Васильковский', 'firstname' => 'Вадим',         'middlename' => 'Михайлович',      'email' => 'vvm911@mail.ru'],
    ['lastname' => 'Верисоцкая',    'firstname' => 'Вера',          'middlename' => 'Викторовна',      'email' => 'verisockaya@gne.gov.spb.ru'],
    ['lastname' => 'Зайкин',        'firstname' => 'Павел',         'middlename' => 'Борисович',       'email' => 'zaikin@gne.gov.spb.ru'],
    ['lastname' => 'Иватьо',        'firstname' => 'Алексей',       'middlename' => 'Иванович',        'email' => 'ivatyo@gne.gov.spb.ru'],
    ['lastname' => 'Козев',         'firstname' => 'Игорь',         'middlename' => 'Валерьевич',      'email' => 'kozev@gne.gov.spb.ru'],
    ['lastname' => 'Короленок',     'firstname' => 'Сергей',        'middlename' => 'Леонидович',      'email' => 'korolenok@gne.gov.spb.ru'],
    ['lastname' => 'Коротич',       'firstname' => 'Сергей',        'middlename' => 'Владимирович',    'email' => 'korotich@gne.gov.spb.ru'],
    ['lastname' => 'Кузык',         'firstname' => 'Иван',          'middlename' => 'Иванович',        'email' => 'kuzyk@gne.gov.spb.ru'],
    ['lastname' => 'Ляхов',         'firstname' => 'Сергей',        'middlename' => 'Александрович',   'email' => 'lyahov@gne.gov.spb.ru'],
    ['lastname' => 'Маслов',        'firstname' => 'Алексей',       'middlename' => 'Леонидович',      'email' => 'maslov@gne.gov.spb.ru'],
    ['lastname' => 'Отчаянный',     'firstname' => 'Дмитрий',       'middlename' => 'Игоревич',        'email' => 'Otchayannyy@gne.gov.spb.ru'],
    ['lastname' => 'Первушкин',     'firstname' => 'Александр',     'middlename' => 'Викторович',      'email' => 'pervushkin@gne.gov.spb.ru'],
    ['lastname' => 'Попов',         'firstname' => 'Константин',    'middlename' => 'Юрьевич',         'email' => 'popov@gne.gov.spb.ru'],
    ['lastname' => 'Салычев',       'firstname' => 'Андрей',        'middlename' => 'Владимирович',    'email' => 'salyichev@gne.gov.spb.ru'],
    ['lastname' => 'Соколов',       'firstname' => 'Александр',     'middlename' => 'Юрьевич',         'email' => 'aprovaider@rambler.ru'],
    ['lastname' => 'Соловьев',      'firstname' => 'Андрей',        'middlename' => 'Владимирович',    'email' => 'soloviev@gne.gov.spb.ru'],
    ['lastname' => 'Строгов',       'firstname' => 'Вадим',         'middlename' => 'Викторович',      'email' => 'strogov@gne.gov.spb.ru'],
    ['lastname' => 'Титов',         'firstname' => 'Максим',        'middlename' => 'Николаевич',      'email' => 'titov@gne.gov.spb.ru'],
    ['lastname' => 'Филимонов',     'firstname' => 'Андрей',        'middlename' => 'Сергеевич',       'email' => 'Philimonov@gne.gov.spb.ru'],
    ['lastname' => 'Шмыков',        'firstname' => 'Кирилл',        'middlename' => 'Николаевич',      'email' => 'shmikov@gne.gov.spb.ru']
    */
}
