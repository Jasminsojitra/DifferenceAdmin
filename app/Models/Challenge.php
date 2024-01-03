<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    public function setImageAttribute( $image ){
        if( $image ){
            $ext = $image->getClientOriginalExtension();
            $file_name = time().mt_rand( 1000, 9000 ) . '.' . $ext;
            $image->move( public_path( 'imgs/challenges/' ), $file_name );
            $this->attributes['image'] = 'imgs/challenges/'. $file_name;
        }
    }
}
