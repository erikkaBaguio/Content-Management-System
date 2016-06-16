 <?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable=[
        'name',
        'description',
    ];


    public function items()
    {
        return $this->belongToMany(Item::class, 'item_categories', 'category_id', 'item_id');
    }
}
