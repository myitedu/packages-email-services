<?php
namespace Myitedu\EmailServices;

use Illuminate\Support\Facades\Mail;
use Myitedu\EmailServices\FormData;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $uuid;

    public function __construct($uuid)
    {
        $this->uuid = $uuid;
    }

    public function handle()
    {
        $formDatas = FormData::where('uuid', $this->uuid)->get();
        foreach ($formDatas as $formData) {
            $formData->email_sent = now();
            $formData->save();
        }
        $this->sendEmail();
    }
    protected function sendEmail()
    {
        $emailData = [
            'to' => 'jontoshmatov@yahoo.com',
            'subject' => 'Email from MYITEDU.US guests',
            'url' => 'https://myitedu.us/admin/mailbox/message/' . $this->uuid,
        ];

        Mail::send('emailservices::email', ['url' => $emailData['url']], function ($message) use ($emailData) {
            $message->to($emailData['to'])
                ->subject($emailData['subject']);
        });
    }
}

