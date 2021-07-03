<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class blogs extends Model
{
    use HasFactory;
    use SoftDeletes;

    public static function allBlogs(){
        $query = DB::table('blogs');
        $query->where('is_active', '1');
        $query->where('start_date', '<=', date('d/m/Y'));
        
        if(!empty(Auth::user()->id) && (Auth::user()->role == 'user')){
            $query->where('created_by', Auth::user()->id);
        }
        return $query->get();
    }
}
