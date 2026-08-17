<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function blog()
    {
        $blogs = DB::table('blogs')->get();
        return View('blogs', compact('blogs'));
    }
    function about()
    {
        $name = "เกษมณี ศรีเงิน";
        $studentCode = "68152310198-6";
        $branch = "เทคโนโลยีสารสนเทศ (IT)";
        $class = "IDI เทียบโอน";
        return View("abouts", compact("name", "studentCode", "branch", "class"));
    }

    function create()
    {
        return View("from");
    }
    function insert(Request $request)
    {
        $request->validate([
            'title' => 'required | max:50',
            'content' => 'required',
        ],
            [
                'title.required' => 'กรุณากรอกชื่อบทความ',
                'title.max' => 'ชื่อบทความต้องไม่เกิน 50 ตัวอักษร',
                'content.required' => 'กรุณากรอกเนื้อหา',
            ]
        );
        $data = ['title' => $request->title, 'content' => $request->content];
        DB::table('blogs')->insert($data);
        return redirect('/blogs');
    }
    function delete($id)
    {
        DB::table("blogs")->where('id', $id)->delete();
        return redirect('/blogs');
    }   
    
}
