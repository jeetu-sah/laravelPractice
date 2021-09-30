<?php

namespace App\Http\Controllers\Relationship;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Products;
use App\Image;

class PolymorphicController extends Controller {
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index() {
        $data['title'] = 'Products List | Polymorphic Relationship';
        $data['products'] = Products::paginate( 20 );
        // echo '<pre>';
        // print_r($data['products'] );
        // exit;
        return view( 'polymorphic.product-list' )->with( $data );
    }

    public function image( $id ) {
        $data['title'] = 'Upload Image | Polymorphic Relationship';
        $data['id'] = $id;
        return view( 'polymorphic.image' )->with( $data );
    }

    /***
    *
    * upload image script start
    *
    */

    public function uploadImage( Request $request, $id ) {
        $file = request()->file( 'image' );
        $extension = $file->getClientOriginalExtension();
        $file_name = md5( rand( 99, 999999 ).'-'.time() ).'.'.$extension;
        $file_path   = $file->storeAs( 'files', $file_name );
        $image =    Image::create( ['imageable_id'=>$id,
                                    'imageable_type'=>'App\Products',
                                    'name'=>$file_path] );
        return redirect()->back()->with( ['msg'=>'Image uppload successfully.'] );
        
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function create() {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

    public function store( Request $request ) {
        //
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function show( $id ) {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function edit( $id ) {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function update( Request $request, $id ) {
        //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

    public function destroy( $id ) {
        //
    }
}
