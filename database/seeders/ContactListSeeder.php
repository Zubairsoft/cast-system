<?php

namespace Database\Seeders;

use App\Models\ContactList;
use Domains\Contact\Traits\DefaultContactList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactListSeeder extends Seeder
{
    use DefaultContactList;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $contactList = collect($this->ContactList())->map(fn ($list) =>
        [
            'id' => $list['id'],
            'purpose' => $list['purpose'],
            'problem' => json_encode($list['problem']),
        ])->toArray();

        DB::table('contact_lists')->insert($contactList);
    }
}
