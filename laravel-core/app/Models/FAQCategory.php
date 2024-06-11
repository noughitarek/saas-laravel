<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQCategory extends Model
{
    use HasFactory;
    protected $fillable = ["title", "width", "width_lg"];
    
    public function FAQ_admins()
    {
        return FAQ::where('type', 'admins')->where('faqs_category_id', $this->id)->get();
    }
    public function FAQ_investors()
    {
        return FAQ::where('type', 'investors')->where('faqs_category_id', $this->id)->get();
    }
}
