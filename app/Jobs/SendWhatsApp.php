<?php

namespace App\Jobs;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWhatsApp implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $receiver;
    protected $message;
    /**
     * Create a new job instance.
     */
    public function __construct($receiver, $message)
    {

        $this->receiver = $receiver;
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'http://103.193.176.80:3000/api/sendMessage',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_POSTFIELDS => "apiKey=46e2e4e58d27d1e500ce8faa2442c5d4&phone='.$this->receiver.'&message='.$this->message.'",
        // ));

        // $response = curl_exec($curl);

        // curl_close($curl);
        $client = new Client();
        $options = [
            'form_params' => [
                'apiKey' => '46e2e4e58d27d1e500ce8faa2442c5d4',
                'phone' => $this->receiver,
                'message' => $this->message
            ]];
        $request = new Request('POST', 'http://103.193.176.80:3000/api/sendMessage');
        $res = $client->sendAsync($request, $options)->wait();

    }
}
