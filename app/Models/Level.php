<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    public function setImageAttribute( $image ){
        if( $image ){
            $ext = $image->getClientOriginalExtension();
            $file_name = time().mt_rand( 1000, 9000 ) . '.' . $ext;
            $image->move( public_path( 'imgs/levels/' ), $file_name );
            $this->attributes['image'] = 'imgs/levels/'. $file_name;
        }
    }

    public function setImage2Attribute( $image ){
        if( $image ){
            $ext = $image->getClientOriginalExtension();
            $file_name = time().mt_rand( 1000, 9000 ) . '.' . $ext;
            $image->move( public_path( 'imgs/levels/' ), $file_name );
            $this->attributes['image2'] = 'imgs/levels/'. $file_name;
        }
    }

    public function points(){
        return $this->hasMany(Point::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
