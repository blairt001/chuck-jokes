<?php

namespace Blairt\Chuck;

use Illuminate\Console\Command;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

class ChuckCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'display:joke';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve a random Chucknorris joke';

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
     * @throws \GuzzleHttp\Exception\GuzzleException
     */

    public function handle()
    {
        /*$this->info('Fetching remote data................. ');
        echo "\n";
        echo "\n";

        $this->info('Found');
        */
        echo "\n";
        $client = new Client();
        $response = $client->request('GET', 'https://api.chucknorris.io/jokes/random');

        $response = $response->getBody();

        $response_data = json_decode($response);
        $result = $response_data->value;

        if($response)
        {
            $this->info($result);
        }
        else
        {
            $this->error('Error processing request');
        }


        echo PHP_EOL;


    }
}
