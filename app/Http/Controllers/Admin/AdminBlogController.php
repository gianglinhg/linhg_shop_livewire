<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class AdminBlogController extends Controller
{
    public function index(){
        $title = 'Danh sách tin tức';
        $blogs = Blog::paginate(config('admin.paginate'));
        return view('admin.blogs.index',compact('blogs','title'));
    }
    public function create(){
        $title = 'Thêm mới tin tức';
        return view('admin.blogs.add',compact('title'));
    }
    public function store(Request $request){
        $request->validate([
            'blog_image' => 'required',
            'blog_category_id' => 'required',
            'title' => 'required',
            'summary' => 'required',
            'content' => 'required'
        ],[

        ]);
        $slug = \Str::slug($request->title,'-');
        $image_file = $request->file('blog_image');
        $extension = $image_file->getClientOriginalExtension();
        $nameImage = $slug.'.'.$extension;
        $image = $image_file->storeAs('/public/blogs',$nameImage);

        Blog::create([
            'image' => $nameImage,
            'blog_category_id' => $request->blog_category_id,
            'title' => $request->title,
            'slug' => $slug,
            'summary' => $request->summary,
            'content' => $request->content,
        ]);
        return to_route('admin.blog.index')->with('messgae','Thêm sản phẩm thành công');
    }
    public function edit($id){
        $title = 'Sửa tin tức';
        if(Blog::where('id',$id)->exists()){
            $blog = Blog::findOrFail($id);
            request()->session()->put('blog_id', $id);
            return view('admin.blogs.edit', compact('blog','title'));
        }else return redirect()->route('admin.blog.index');
    }
    public function update(Request $request){
        $request->validate([
            'blog_category_id' => 'required',
            'title' => 'required',
            'summary' => 'required',
            'content' => 'required'
        ],[

        ]);
        $id = session()->get('blog_id');
        $blog_update = Blog::findOrFail($id);
        $slug = \Str::slug($request->title,'-');
        if($request->hasFile('blog_image')){
            \Storage::delete('/public/blogs/'.$blog_update->image);
            $image_file = $request->file('blog_image');
            $extension = $image_file->getClientOriginalExtension();
            $nameImage = $slug.'.'.$extension;
            $image = $image_file->storeAs('/public/blogs',$nameImage);
            $blog_update->image = $nameImage;
            $blog_update->save();
        }
        $blog_update->update([
            'blog_category_id' => $request->blog_category_id,
            'title' => $request->title,
            'slug' => $slug,
            'summary' => $request->summary,
            'content' => $request->content,
        ]);
        return back()->with('message','Cập nhật tin tức thành công');
    }
    public function destroy($id){
        if(Blog::where('id',$id)->exists()){
            Blog::findOrFail($id)->delete();
            \Storage::delete('/public/blogs/'.$blog_delete->image);
            $msg = 'Xóa tin tức thành công';
        }else $msg = 'Tin tức không tồn tại';
        return to_route('admin.blog.index')->with('message', $msg);
    }
}
