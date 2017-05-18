<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Teamspeak;
use App\User;
use Illuminate\Support\Facades\DB;

class TeamspeakUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'teamspeak:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update client TeamSpeak permissions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $teamspeak = new Teamspeak(config('app.teamspeak_host'), config('app.teamspeak_query'));
        if ($teamspeak->getElement('success', $teamspeak->connect())) {
            $teamspeak->login(config('app.teamspeak_username'), config('app.teamspeak_password'));
            $teamspeak->selectServer(config('app.teamspeak_port'));
            $teamspeak->setName('TSA Agent');
            $clients = $teamspeak->clientList($params = '-ip -groups -uid');
            foreach ($clients['data'] as $client) {
                $ip = $client['connection_client_ip'];
                $uid = $client['client_unique_identifier'];
                if (!empty($ip)) {
                    $user = User::where('ip', $ip)->first();

                    if (!empty($user)) {
                        $rating = $user->rating;
                        $ts3_groups = $client['client_servergroups'];
                        $ts3_groups = explode(',', $ts3_groups);

                        foreach ($ts3_groups as $ts3_group) {
                            if ($rating == "S1") {
                                if ($ts3_group != 14) {
                                    $teamspeak->serverGroupAddClient(14, $client['client_database_id']);
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
