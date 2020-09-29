<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Zipcode extends Model
{

    use Searchable;

    /* primary key */
    protected $primaryKey = 'id';

    /* table to be search */
    protected $table = 'postal_codes';

    /*  */
    public function toSearchableArray()
    {
        
        $array = $this->toArray();

        // Customize array...

        return $array;
        
        //return 'postal_codes';
    }

}
