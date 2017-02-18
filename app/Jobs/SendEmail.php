<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;//без него dispatch выполниться сразу
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\ListModel;
use App\Mail\Test as TestMail;
use App\Models\EmailSendSetting as EmailSendSettingModel;
use App\Models\EmailSendType as EmailSendTypeModel;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $listId;
    private $message;
    private $subject;
    private $userId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($listId,$message,$subject,$userId)
    {
        $this->listId=$listId;
        $this->message=$message;
        $this->subject=$subject;
        $this->userId=$userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()//
    {
        //изменяем MailDriver 
        \Config::set('mail.driver',$this->getMailDriver());
        (new \Illuminate\Mail\MailServiceProvider(app()))->register();//начинаем со скобки,чтобы не вводить новую переменную
        $listSubscribers=ListModel::findOrFail($this->listId)->subscribers()->get();
        foreach ($listSubscribers as $subscriber) {
            $mail=new TestMail($this->message,$this->subject);
            \Mail::to($subscriber->email)->send($mail);
        }
    }

    private function getMailDriver(){
        return 'log';
        /*$typeId=EmailSendSettingModel::where('user_id', $this->userId)->value('type_send_id');
        if(!empty($typeId)){
            return EmailSendSettingModel::find($typeId)->type;
        }
        else{
            return EmailSendSettingModel::first()->type;
        }*/
    }
}
