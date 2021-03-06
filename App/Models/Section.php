<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\Config;
use App\Models\Slug;

use App\Models\Post;

class Section extends Model
{
    use HasFactory;
    use Translatable;

    protected $casts = [
        'additional' => 'collection'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order',
        'additional',
        'parent_id',
        'type_id',
        'admin_menu'
    ];

    protected $hidden = [
        '_token',
    ];

    public $translatedAttributes = [
        'title',
        'keywords',
        'slug',
        'desc',
        'icon',
        'locale_additional',
        'active',
        'file'
    ];


    /**
     * tgis function gets Type of the section
     * you can use it with just "->type"
     *
     * @return void
     */
    public function getTypeAttribute() {


        return collect(Config::get('sectionTypes'))->where('id', $this->type_id)->first();
    }
    /**
     * tgis function gets Type of the section
     * you can use it with just "->fields"
     *
     * @return void
     */
    public function getFieldsAttribute() {
        return collect(Config::get('sectionTypes'))->where('id', $this->type_id)->first()['fields'];
    }


    public function getFullSlug() {
        $slug = Slug::where('slugable_type', 'App\Models\Section')->where('slugable_id', $this->id)->where('locale', app()->getlocale())->first();
        if($slug !==null){

            return $slug->fullSlug;
        }
        return null;
    }




    /**
     * isMenuType can section o
     *
     * @param  mixed $type
     * @return void
     */
    public function scopeMenuType($query, $type){

        $sections_id = MenuSection::where('menu_type_id', array_search($type, menuTypes()))->pluck('section_id')->toArray();

        return $query->where('id', $sections_id) ;
    }

    public function post(){
        return Post::where('section_id', $this->id)->with('submissions', 'translations')->first();

    }


    /**
     * Get the user associated with the Section
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */




    public function posts()
    {
        return $this->hasMany(Post::class, 'id', 'section_id')->with(['translations' => function($query){
            $query->where('locale', app()->getLocale());
          }])->orderBy('order', 'asc');;
    }


    public function menuTypes()
    {
        return $this->hasMany(MenuSection::class, 'section_id', 'id');
    }

    public function children() {
        return $this->hasMany('App\Models\Section', 'parent_id')->with(['translations' => function($query){
          $query->where('locale', app()->getLocale());
        }])->with('parent')->with('children')->orderBy('order', 'asc');
    }



    public function parent() {
        return $this->belongsTo('App\Models\Section', 'parent_id')->with('parent.translations');
    }



    public function slugs(){
        return $this->morphMany(Slug::class, 'slugable');
    }


    public static function rearrange($array) {
        self::_rearrange($array, 0);

        \App\Models\Section::all()->each(function($item) {
            $item->save();
        });
      }

	private static function _rearrange($array,$count, $parent = null) {
	foreach($array as $a) {
		$count++;
		self::where('id', $a['id'])->update(['parent_id'=> $parent, 'order' => $count]);

		if(isset($a['children'])) {
		$count = self::_rearrange($a['children'], $count, $a['id']);
		}
	}

	return $count;
	}

 /**
     * Get all of the files for the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files($type = null)    {
		if ($type !== null) {
			return $this->hasMany(Files::class, 'section_id', 'id')->where('type', $type);
		}
        return $this->hasMany(Files::class, 'section_id', 'id');
    }

}
