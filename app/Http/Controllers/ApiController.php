<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getBlogs()
    {
        return DB::table('blogs')->select('*')->get();
    }

    public function getCategories()
    {
        return ['General', 'Travel', 'Movies', 'Fashion']; // POC categories
    }

    public function insertBlog(Request $request)
    {
        $this->validateBlog($request);
        DB::table('blogs')->insert(
            [
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'category' => $request->input('category'),
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
                'category' => $request->input('category'),
                'updated_at' => now()
            )
        );
        return redirect('/');
    }

    private function validateBlog(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required'
        ]);
    }
}
