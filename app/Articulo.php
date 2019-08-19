<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table ='articulo';

    protected $primarykey='idarticulo';

    public $timestamps=false;

    protected $fillable =[
        'idarticulo',
        'codigo',
        'nombre',
        'stock',
        'descripcion',
        'imagen',
        'estado'
    ];

    protected $guarded =[

    ];
}
