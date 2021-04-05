<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;
use App\Model\Role;
use DB;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'All Users List';
        $data['users'] = User::paginate( 10 );
        return view( 'role.index' )->with( $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create Role';
        //$data['users'] = User::paginate( 10 );
        return view( 'role.create-role' )->with( $data );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate( [
            'role_name' => ['required'],
            'description' => ['required'],
        ] );
        $slug = Str::slug( $request->role_name, '-');
        $response = Role::create(['slug_name'=>$slug, 
                    'name'=>$request->role_name,
                    'description'=>$request->description,
                    ]);
        if ( $response ) {
            return redirect()->back()->with( ['success'=>'Record insert successfully.'] );
        } else {
            return redirect()->back()->with( ['success'=>'Something went wrong, please try again.'] );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userRoles($id)
    {
        $data['title'] = 'Users roles';
        $data['roles'] = Role::all();
        $data['userRoles'] = User::find($id);
        $userRole = $data['userRoles']->roles->pluck('id');
        //$data['userDoesNotHaveRole'] = User::whereDoesntHave('roles')->get();
        $data['userNotHaveRole'] = $data['roles']->whereNotIn('id',$userRole);
        // echo "<pre>";
        // print_r($data['userNotHaveRole']);exit;
        $data['user_id'] = $id;
        return view( 'role.assign-user-role' )->with( $data );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function roleList()
    {
        $data['title'] = 'Role List';
        $data['roleList'] = Role::paginate(10);
        //echo "<pre>";
        //print_r($data['roleList']);exit;
        return view( 'role.role-list' )->with( $data );
    }


    public function roleUser($id){
        $data['title'] = 'Role List';
        $data['roleUser'] = Role::find($id)->users;
        //echo "<pre>";
        //print_r($data['roleUser']);exit;
        //echo $id;exit;
        return view( 'role.role-users' )->with( $data );
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assignUserRole(Request $request, $id)
    {
        
        if($request->has('role')){
            foreach ($request->role as $key => $value) {
                DB::table('user_role')->insert(['user_id'=>$id,
                                                'roll_id'=>$value]);
            }
        }
        return redirect()->back()->with( ['success'=>'<div class="alert alert-info"> Record insert successfully.</a>'] );

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
