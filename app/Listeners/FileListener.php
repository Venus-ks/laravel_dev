<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\FileEvent;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;



class Filelistener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *`
     * @param  object  $event
     * @return void
     */
    public function handle(FileEvent $event)
    {
        //
        if($event){
            $allTempFile = Storage::allFiles('tmp');
            foreach($allTempFile as $v){
                // unixTime
                $UnixFileTime = Storage::lastModified($v);
                // 현재시간에서 하루를뺌
                $ThisTime = Carbon::now()->timestamp - 86400;
                if($ThisTime > $UnixFileTime){
                    Storage::delete($v);
                }
            }
        }
    }
}
