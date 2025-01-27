<?php

namespace Database\Seeders;

use App\Models\SocialMediaAccount;
use Illuminate\Database\Seeder;
use RocketAPI\InstagramAPI;
class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (SocialMediaAccount::count() < 1) {
            $api = new InstagramAPI(config('services.rocket_api.key'));
            $data = $api->searchUsers('emixpat');

            if ($data['status'] == 'ok') {
                $accounts = $data['users'];
                foreach ($accounts as $index => $account) {
                    if ($index > 10) {
                        break;
                    }
                    SocialMediaAccount::create([
                        'account_id' => $account['id'],
                        'name' => $account['full_name'] ?? $account['username'], // some users' name are absent
                        'username' => $account['username'],
                    ]);
                }
            }
        }
    }
}
