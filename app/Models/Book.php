<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Book
 *
 * @property $id
 * @property $nama
 * @property $kategori
 * @property $keterangan
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Book extends Model
{
    
    public $timestamps = false;
    
    static $rules = [
		'nama' => 'required',
		'kategori' => 'required',
		'keterangan' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nama','kategori','keterangan'];



}
