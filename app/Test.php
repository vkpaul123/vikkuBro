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
    		->name($this->name)
    		->description($this->description)
    		->created_at($this->created_at)
    		->updated_at($this->updated_at);

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
