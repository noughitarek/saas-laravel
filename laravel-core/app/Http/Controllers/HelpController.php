<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\FAQCategory;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function categories()
    {
        $categories = FAQCategory::all();
        return view('dashboard.help-settings-categories')->with('categories', $categories);
    }
    public function create_category()
    {
        return view('dashboard.help-settings-category-create');
    }
    public function store_category(Request $request)
    {
        FAQCategory::create([
            "title" => $request->input('categoryTitle'),
            "width" => $request->input('categoryWidth'),
            "width_lg" => $request->input('categoryWidthLg'),
        ]);
        return redirect()->route('settings.help.categories');
    }
    public function edit_category(FAQCategory $category)
    {
        return view('dashboard.help-settings-category-edit')->with('category', $category);
    }
    public function update_category(Request $request, FAQCategory $category)
    {
        $category->update([
            "title" => $request->input('categoryTitle'),
            "width" => $request->input('categoryWidth'),
            "width_lg" => $request->input('categoryWidthLg'),
        ]);
        return redirect()->route('settings.help.categories');
    }
    public function delete_category(FAQCategory $category)
    {
        $category->delete();
        return redirect()->route('settings.help.categories');
    }

    public function create_faq()
    {
        $categories = FAQCategory::all();
        return view('dashboard.help-settings-faq-create')->with('categories', $categories);
    }
    public function store_faq(Request $request)
    {
        FAQ::create([
            "title" => $request->input('faqTitle'),
            "content" => $request->input('faqContent'),
            "type" => $request->input('faqType'),
            "faqs_category_id" => $request->input('faqCategory')
        ]);
        return redirect()->route('settings.help.categories');
    }
    public function edit_faq(FAQ $faq)
    {
        $categories = FAQCategory::all();
        return view('dashboard.help-settings-faq-edit')->with('faq', $faq)->with('categories', $categories);
    }
    public function update_faq(Request $request, FAQ $faq)
    {

        $faq->update([
            "title" => $request->input('faqTitle'),
            "content" => $request->input('faqContent'),
            "type" => $request->input('faqType'),
            "faqs_category_id" => $request->input('faqCategory')
        ]);
        return redirect()->route('settings.help.categories');
    }
    public function delete_faq(FAQ $faq)
    {
        $faq->delete();
        return redirect()->route('settings.help.categories');
    }
}
