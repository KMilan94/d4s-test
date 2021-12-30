<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function getBlogs() {
        $blogs = DB::table('blogs')->select('*')->get();
        return $blogs;
    }

    public static function getBlogById($id) {
        $blog = DB::table('blogs')->select('*')->where('id', '=', $id)->get(); 
        return $blog;
    }

    public function insertBlog(Request $request) {
        echo($request);
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

    

    public static function deleteBlogById($id) {
        DB::table('blogs')->delete($id);
        return redirect('/');
    }
}
