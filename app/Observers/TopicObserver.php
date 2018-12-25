<?php

namespace App\Observers;

use App\Models\Topic;

use Overtrue\Pinyin\Pinyin;
// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
	public function saving(Topic $topic)
    {
    	$topic->body = clean($topic->body, 'user_topic_body');
        $topic->excerpt = make_excerpt($topic->body);
        
        if ( ! $topic->slug) {
            $pinyin = new Pinyin(); // 默认
            $topic->slug = $pinyin->permalink($topic->title);
        }
    }

    public function creating(Topic $topic)
    {
        //
    }

    public function updating(Topic $topic)
    {
        //
    }
}