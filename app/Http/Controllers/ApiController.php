<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

// use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getBlogs()
    {
        $blogs = DB::table('blogs')->select('*')->get();
        return $blogs;
    }

    public function insertBlog(Request $request)
    {
        $this->validateBlog($request);
        
        DB::table('blogs')->insert(
            [
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'category' => 'IT',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        return redirect('/');
    }

    public function deleteBlog(Request $request)
    {
        DB::table('blogs')->where('id', '=', $request->input('blog-id'))->delete();
        return redirect('/');
    }

    public function updateBlog(Request $request)
    {
        $this->validateBlog($request);

        DB::table('blogs')->where('id', '=', $request->input('blog-id'))->update(
            array(
                'title' => $request->input('title'),
                'content' => $request->input('content'),
            )
        );
        return redirect('/');
    }

    private function validateBlog(Request $request) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);
    }
}
