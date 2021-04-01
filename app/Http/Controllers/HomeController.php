<?php

namespace App\Http\Controllers;
use App\Jobs\ProcessPodcast;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\User;
use App\Post;
use App\Comment;

use Illuminate\Http\Request;

class HomeController extends Controller {
    public $varArr = ['failed_jobs',  'migrations', 'users'];

    public function index() {
        $data['title'] = 'All Users List';
        $data['users'] = User::paginate( 10 );
        return view( 'index' )->with( $data );
    }


    # user has post display all users
    public function userHasPost(){
        $data['title'] = 'Users Has Post';
        $data['users'] = User::whereHas('posts')->paginate( 10 );
        return view( 'index' )->with( $data );
    }

    # users has ppost comment
    public function userHasPostComment(){
        $data['title'] = 'Users Post Has Post';
        //$data['users'] = User::whereHas('userPostComment')->paginate( 10 );
        $data['users'] = User::has('userPostComment')->paginate( 10 );
        //echo "<pre>";
        //print_r($data['users']);exit;
        return view( 'index' )->with( $data );
    }

    public function exportDatabase() {
        // return Excel::store( new UsersExport, 'users-collection.csv' );
        $jobs = ProcessPodcast::dispatch( $this->varArr )->delay( now()->addSeconds( 10 ) );
        ;
        //ProcessPodcast::dispatchAfterResponse();

    }

    public function destroy( $id ) {
        $user = User::find( $id );
        if ( $user != NULL ) {
            if ( $user->delete() ) {
                return redirect()->back()->with( ['msg'=>'Record delete successfully.'] );
            } else {
                return redirect()->back()->with( ['msg'=>'Something went wrong, please  try again.'] );
            }
        }
    }

    public function post( $id ) {
        $data['title'] = 'Post List';
        $data['userPost'] = User::with(['posts'])->find($id);
    //      echo '<pre>';
    //      print_r( $data['userPost'] );
    //   exit;
        return view( 'post.post' )->with( $data );
    }

    public function comment( $id ) {
        $data['title'] = 'Post List';
        $data['postComment'] = Post::with( ['postComments'] )->find( $id );
        //echo '<pre>';
        //print_r( $data['postComment'] );
       // exit;
        return view( 'post.comment' )->with( $data );
    }

    public function commentDetail( $id ) {
        $data['title'] = 'Comment Detail';
        $data['commentDetail'] = Comment::find($id);
        //echo "<pre>";
        //print_r($data['commentDetail']->post);exit;
        return view( 'post.comment-detail' )->with( $data );
    }

    public function commentStore( Request $request, $id ) {
        $validatedData = $request->validate( [
            'description' => ['required'],
        ] );
        $response = Comment::create( ['post_id'=>$id,
        'description'=>$request->description] );
        if ( $response ) {
            return redirect()->back()->with( ['success'=>'Record insert successfully.'] );
        } else {
            return redirect()->back()->with( ['success'=>'Something went wrong, please try again.'] );
        }
    }

    public function userComment( $id ) {
        //Has many Through relationship
        $data['title'] = 'User comments';
        $data['userData'] = User::with( ['userPostComment'] )->find( $id );
        //echo '<pre>';
        //print_r( $data['userData'] );
        //exit;
        return view( 'post.userComment' )->with( $data );
    }

}
