<?php

namespace App\Http\Services;

use App\Models\Log;

class LogService
{
    public static function logCreateComment()
    {
        $log = new Log([
            'type' => 'C',
            'model' => 'C'
        ]);
        $log->save();
    }

    public static function logReadComment()
    {
        $log = new Log([
            'type' => 'R',
            'model' => 'C'
        ]);
        $log->save();
    }

    public static function logUpdateComment()
    {
        $log = new Log([
            'type' => 'U',
            'model' => 'C'
        ]);
        $log->save();
    }

    public static function logDeleteComment()
    {
        $log = new Log([
            'type' => 'D',
            'model' => 'C'
        ]);
        $log->save();
    }

    public static function logCreatePost()
    {
        $log = new Log([
            'type' => 'C',
            'model' => 'P'
        ]);
        $log->save();
    }

    public static function logReadPost()
    {
        $log = new Log([
            'type' => 'R',
            'model' => 'P'
        ]);
        $log->save();
    }

    public static function logUpdatePost()
    {
        $log = new Log([
            'type' => 'U',
            'model' => 'P'
        ]);
        $log->save();
    }

    public static function logDeletePost()
    {
        $log = new Log([
            'type' => 'D',
            'model' => 'P'
        ]);
        $log->save();
    }

}
