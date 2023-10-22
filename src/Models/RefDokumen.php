<?php

namespace Kanekescom\Siasn\Referensi\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefDokumen extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'siasn_referensi_ref_dokumen';

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
    // protected $fillable = [
    //     'id',
    //     'layanan_id',
    //     'layanan_nama',
    //     'sub_layanan_id',
    //     'sub_layanan_nama',
    //     'detail_layanan_id',
    //     'detail_layanan_nama',
    //     'document',
    //     'jenis_dokumen',
    //     'file_type',
    //     'link_proses',
    //     'mandatory',
    // ];
}
