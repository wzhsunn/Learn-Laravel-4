<?php
/*
* author: zhangbin
* date: 2015年12月17日22:29:06
*/
class UpdateScoreEventHandler {
 
    CONST EVENT = 'score.update';
    CONST CHANNEL = 'score.update';
 
    public function handle($data)
    {
        $redis = Redis::connection();
        $redis->publish(self::CHANNEL, $data);
    }
}
