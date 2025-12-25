<?php

use App\Jobs\v1\posts\DeleteExpiredPostsJob;
use Illuminate\Support\Facades\Schedule;

Schedule::job(new DeleteExpiredPostsJob())
    ->everyMinute()
    ->onOneServer();
