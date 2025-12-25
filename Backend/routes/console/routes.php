<?php

use App\Jobs\v1\posts\DeleteExpiredPostsJob;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Schedule::job(new DeleteExpiredPostsJob())
    ->everyMinute()
    ->onOneServer();
