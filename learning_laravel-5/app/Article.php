<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	protected $fillable = [
    'title',
    'body',
    'published_at',
    'user_id'
  ];

  protected $dates = ['published_at'];

  public function scopePublished($query)
  {
    $query->where('published_at', '<=', Carbon::now());
  }

  public function scopeUnpublished($query)
  {
    $query->where('published_at', '>=', Carbon::now());
  }

  public function setPublishedAtAttribute($date)
  {
    $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
  }

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function tags()
  {
    return $this->belongsToMany('App\Tag')->withTimestamps();
  }

  public function getTagListAttribute()
  {
    return $this->tags->lists('id')->all();
  }

  public function setTags(array $tags)
  {
    $tagIds = $this->createNewTags($tags);
    $this->tags()->sync($tagIds);
  }

  public function createNewTags(array $tags)
  {
    $tagIds = [];
    foreach ($tags as $key => $value) {
        if (!is_numeric($value))
        {
          $newTag = $this->tags()->create(['name' => $value]);
          $value = $newTag->id;
        }
        $tagIds[] = $value;
    }
    return $tagIds;
  }

}
