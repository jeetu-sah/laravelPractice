<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Users post';
        $data['users'] = User::whereHas('posts')->paginate( 10 );
        return view( 'post.index' )->with( $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$userid)
    {
        $validatedData = $request->validate( [
            'title'=>['required'],
            'description' => ['required'],
        ] );
        $title_slug = Str::slug($request->title, '-');
        $response = Post::create( ['user_id'=>$userid,
                                    'title_slug'=>$title_slug,
                                    'title'=>$request->title,
                                    'description'=>$request->description] );
        if ( $response ) {
            return redirect()->back()->with( ['success'=>'Record insert successfully.'] );
        } else {
            return redirect()->back()->with( ['success'=>'Something went wrong, please try again.'] );
        }
        echo "<pre>";
        print_r($request->all());exit;
    }

 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
