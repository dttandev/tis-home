<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use stdClass;

class Product extends Model
{
    use CrudTrait, SoftDeletes;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'status',
        'description',
        'product_type_id',
        'sizes'
    ];
    protected $appends = ['sizes'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function product_type()
    {
        return $this->belongsTo(ProductType::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function getSizesAttribute() {
        $objects = ProductSize::where('product_id', $this->id)->get();
        $array = [];

        foreach ($objects as $items) {
            $obj = new stdClass;
            $obj->id = $items->id;
            $obj->name = $items->name;
            $obj->description = $items->description;
            $obj->price = $items->price;
            $array[] = $obj;
        }
        
        return json_encode($array);
    }

    public function setSizesAttribute($value) {
        $objects = json_decode($value);
        $array = [];

        foreach ($objects as $items) {
            $obj = new stdClass;
            $obj->id = $items->id;
            $obj->name = $items->name;
            $obj->description = $items->description;
            $obj->price = $items->price;
            $array[] = $obj;
        }
        
        return json_encode($array);
    }
}
