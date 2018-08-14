<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\FeedItem;
use Spatie\Feed\Feedable;

class Test extends Model implements Feedable
{
    public function toFeedItem()
    {
    	return FeedItem::create()
    		->id($this->id)
    		->title($this->name)
    		->summary($this->description)
    		->link($this->link)
            ->author($this->name)
    		->updated($this->updated_at);

    }

    public static function getFeedItems()
    {
    	return static::all();
    }

    public function getLinkAttribute()
    {
        return route('test.show', $this);
    }
}
