<?php

namespace Kanekescom\Siasn\Referensi\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class RefJenjangJf extends Model implements Transformable
{
    use HasFactory;
    use SoftDeletes;
    use TransformableTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'siasn_referensi_ref_jenjang_jf';

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'deskripsi',
        'peraturan',
    ];
}