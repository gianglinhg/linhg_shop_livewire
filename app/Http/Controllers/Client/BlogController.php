<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;

class BlogController extends Controller
{
    public function index(Request $request){
        $title = 'Tin tức thời trang';
        $blogs = Blog::latest();
        if($request->has('category')){
            $category_slug = $request->category;
            $idCategory = BlogCategory::where('slug',$category_slug)->value('id');
            $blogs = $blogs->where('blog_category_id',$idCategory);
        }
        $blogs = $blogs->paginate(4);
        return view('client.blogs',compact('title','blogs'));
    }
    public function read($slug){
        $blog = Blog::where('slug',$slug)->first();
        request()->session()->put('idBlogDetail', $blog->id);
        $title = $blog->title;
        return view('client.blog-detail',compact('title','blog'));
    }
    // public function readCategory($slug){
    //     $blogCategory = BlogCategory::where('slug',$slug)->first();
    //     $blogCategories = Blog::where('blog_category_id',$blogCategory->id)->get();
    //     return view('client.blog-category',compact('blogCategories'),[
    //         'title' => $blogCategory->name
    //     ]);
    // }
}
