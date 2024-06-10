<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQCategory extends Model
{
    use HasFactory;
    public function FAQ_admins()
    {
        return FAQ::where('type', 'admins')->where('faqs_category_id', $this->id)->get();
    }
}
