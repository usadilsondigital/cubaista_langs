<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'languages';

    /**
     * The primary key associated with the table.
     *
     * @var bigint
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'code',
        'english_name',
        'directionality',
        'local_name',
        'url_wiki',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'url_wiki' => 'https://meta.wikimedia.org/wiki/Template:List_of_language_names_ordered_by_code',
    ];

    
}
