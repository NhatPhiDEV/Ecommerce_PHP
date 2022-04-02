<?php

namespace App\Http\Controllers\Api\Admin;

use Session;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\detail_role;
use App\Models\role;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{

    public function login()
    {     
        return view('admin.Authen.login_Admin');
    }

    public function home()
    {     
        return view('admin.Authen.home_Admin');
    }

  
    public function check(Request $request)
    {     
       
        $user = $request->user;
        $pass = md5($request->pass);

        $result = Admin::where('UserName',$user)->where('PassWord',$pass)->first();

        if($result){
            

                Session::put('name',$result->FullName);
                Session::put('idadmin',$result->id);
                $a = $result->id;
                $datas = detail_role::with('role')->where("idAdmin",$a)->where("Status",1)->get();

                foreach ($datas as $data) {
                    Session::put($data->role->RoleName,$data->role->RoleName);
                }

            return view('admin.Authen.home_Admin');
        }else{
                Session::put('message','Login name or password is incorrect. Please enter again !');
            return view('admin.Authen.login_Admin');
        }
        return view('admin.Authen.login_Admin');
    }

    public function logout($id)
    {    

        $datas = detail_role::with('role')->where("idAdmin",$id)->where("Status",1)->get();
        foreach ($datas as $data) {
            $dataid = $data->role->RoleName;
            Session::forget($dataid);
        }
        Session::forget('idadmin');
        Session::forget('name');
       
        
        return view('admin.Authen.login_Admin');
    }

    public function loadAdmin()
    {     
        $admins = Admin::all();

        return view('admin.role_admin.get_admin')->with(compact('admins'));
    }
    public function getRole($id)
    {
        $roles = detail_role::with('role')->where("idAdmin",$id)->get();
        $idAdmin = $id;
        return view('admin.role_admin.add_role')->with(compact('roles','idAdmin'));
    }  

    public function addRole(Request $request)
    {     
        $id = $request->id;
        
        if(isset($_POST['checkrole']) == true){
            $adroles = detail_role::where("idAdmin",$id)->get();
            foreach ($adroles as $adrole ){
                $adrole -> Status = 0;
                $adrole ->save();
                }
            foreach ($_POST['checkrole'] as $v){

                $rolesta = detail_role::find($v);
               $rolesta ->Status = 1;
               $rolesta -> save();
            }   
            }else{
                $adroles = detail_role::where("idAdmin",$id)->get();
                foreach ($adroles as $adrole ){
                $adrole -> Status = 0;
                $adrole ->save();
                }
                return redirect()->back();
            }
    return redirect()->back();
}
    
}