<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rules;
use App\Models\Teacher;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:manage role'])->only(['role']);
        $this->middleware(['permission:add role'])->only(['createRole'],['storeRole']);
        $this->middleware(['permission:edit role'])->only(['edit'],['update']);
        $this->middleware(['permission:delete role'])->only(['delete']);
        $this->middleware(['permission:teacher role'])->only(['roleAssignTeacher']);
        $this->middleware(['permission:add teacher role'])->only(['storeUser']);
        $this->middleware(['permission:view teacher role'])->only(['viewTeacherRole']);
        $this->middleware(['permission:delete teacher role'])->only(['deleteTeaceherRole']);
         
    }
    public function role(){
    
        $role= Role::with('permissions')->orderBy('id', 'desc')->get();
        return view('admin.role',compact('role'));
    }
    public function createRole(){
        
        $permissions = Permission::latest()->get();
        return view('admin.createRole',compact('permissions'));
    }   
    public function storeRole(Request $request){
                            $request->validate([
                               'name' => 'required|unique:roles'
                        ]);

                        $role =Role::create($request->only('name'));
                        $role->syncPermissions($request->permission);
                        return redirect()->back()->with('massage', "Role is Added");
    }



    public function edit($id){
       
        $permissions = Permission::all();
        $role = Role::with('permissions')->find($id);
        $data =$role->permissions()->pluck("id")->toArray();
        return view('admin.roleEdit',compact('permissions','role','data'));

    }

    public function update($id,Request $request){
        $request->validate([
            'name' => 'required'  ]);
            $role = Role::find($id);
              $role->update(['name'=> $request->name,
              'guard_name'=> 'web']);
              $role->syncPermissions($request->permission);
              return redirect()->route('role')->with('massage', "Role is Updated");

    }
    public function delete($id){
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('role')->with('massage', "Role is Deleted Success fully");
    }

    public function roleAssignTeacher(){
     
        $roless = Role::latest()->get();
        $teacher = Teacher::with('roles')->latest()->get();
        return view('admin.roleAssignTeacher',compact('teacher','roless'));
    }
    public function storeUser(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'teacher_id' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed',  Rules\Password::defaults()],
            'role' => ['required'],
        ]);
        $user = User::create([
            'teacher_id' => $request->teacher_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $role= $request->role; 
        $user->syncRoles($role);
        $user->sendEmailVerificationNotification();
        event(new Registered($user));
    return redirect()->route('viewTeacherRole')->with('massage', "Teacher Role is Added Success fully");
    }

    public function  viewTeacherRole(){
   
        $users= User::with('roles')->latest()->get();
        return view('admin.viewTeacherRole',compact('users'));
    }
    public function deleteTeaceherRole($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('viewTeacherRole')->with('message', "Role is Deleted Success fully");
    }


}
