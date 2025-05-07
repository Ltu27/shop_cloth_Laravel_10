<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'product_id', 'comment'
    ];

    public function reply() 
    {
        return $this->hasMany(CommentReply::class, 'comment_id', 'id');
    }

    public function customer() 
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
 
    public function product() 
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
