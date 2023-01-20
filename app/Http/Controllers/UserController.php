<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Auth;

use App\DataTables\UserDataTable;

use App\Models\User;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

public function index(UserDataTable $dataTable)
{     
     $roles = Role::all();//Get all roles
     $permissions = Permission::all();//Get all roles
     return $dataTable->render('admin.user',compact('roles','permissions'));
 }

 public function dropdown(TripDropdownDataTable $dataTable)
 {     
     $roles = Role::all();//Get all roles
     $permissions = Permission::all();//Get all roles
     return $dataTable->render('admin.user',compact('roles','permissions'));
 }


 public function roles()
 {     
     $roles = Role::all();//Get all roles
     $permissions = Permission::all();//Get all roles
     return view('admin.roles',compact('roles','permissions'));
 }

 public function get_user($id)
 {
    $user = User::where('id',$id)->first();

    return $user;
}

public function update_user(Request $request)
{

        //return $request;

 $user = User::findorfail($request['id']);

 // $user->username = $request['username'];

 $user->save();

  $roles = $request['roles']; //Retreive all roles
 if (isset($roles)) {

       foreach ($roles as $role)
          {
             $rol = Role::where('name', '=', $role)->first();
             if(!empty($rol))
             {
                 $user->assignRole($role);
             }

         }
 }

 return back()->with('info','successfully done');
}

public function delete_user(Request $request)
{
 $user = User::findorfail($request['ids']);

 $user->delete();

 return back()->with('danger','successfully done');
}



public function roles_store(Request $request)
{
      //Get all users and pass it to the view
   $this->validate($request, [
    'name'=>'required|unique:roles|max:15',
    'permissions' =>'required',
]
);

   $name = $request['name'];
   $role = new Role();
   $role->name = $name;

   $permissions = $request['permissions'];

   $role->save();
    //Looping thru selected permissions
   foreach ($permissions as $permission) {
    $p = Permission::where('id', '=', $permission)->firstOrFail();
         //Fetch the newly created role and assign permission
    $role = Role::where('name', '=', $name)->first();
    $role->givePermissionTo($p);
}

return back()
->with('flash_message',
 'Role'. $role->name.' added!');
}


public function permissions_store(Request $request)
{
    $this->validate($request, [
        'name'=>'required|max:40',
    ]);

    $name = $request['name'];
    $permission = new Permission();
    $permission->name = $name;

    $roles = $request['roles'];

    $permission->save();

        if (!empty($request['roles'])) { //If one or more role is selected
            foreach ($roles as $role) {
                $r = Role::where('id', '=', $role)->firstOrFail(); //Match input role to db record

                $permission = Permission::where('name', '=', $name)->first(); //Match input //permission to db record
                $r->givePermissionTo($permission);
            }
        }

        return back()->with('status','Permission'. $permission->name.' added!');
    }
    public function user_destroy($id)
    {


          $user = User::findOrFail($id); //Get role specified by id
          $user->delete();


          return back()->with('status','User successfully dropped.');
      }

      public function user_store(Request $request)
      {




        $this->validate($request, [
            'name'=>'required|max:120',
            //'email'=>'required|regex:/(.*)?avrello.com$/|email|unique:users,email,',

        ],[
         'email.regex' => 'We appreciate your interest on using our System. However at the moment we offer this service only to avrello users only!']);
          $user = new User(); //Get role specified by id
          $input = $request->only(['name', 'email','password','pin']); //Retreive the name, email and password fields
          $roles = $request['roles']; //Retreive all roles
          $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            // 'pin' => $request['pin'],
            // 'username' => $request['username'],
            'password' => \Hash::make(12345678),
        ]);

 if (isset($roles)) {

       foreach ($roles as $role)
          {
             $rol = Role::where('name', '=', $role)->first();
             if(!empty($rol))
             {
                 $user->assignRole($role);
             }

         }
 }
        

        //   //



        //  $offerData = [
        //     'name' => 'BOGO',
        //     'body' => 'Your default password is 12345678 to change your passw.',
        //     'thanks' => 'Thank you',
        //     'offerText' => 'Check out the offer',
        //     'offerUrl' => url('/'),
        //     'offer_id' => 007
        // ];

        // Notification::send($user, new NewuserNotification($offerData));
        return back()->with('status',''.$user->name.' successfully Created.');
    }

}
