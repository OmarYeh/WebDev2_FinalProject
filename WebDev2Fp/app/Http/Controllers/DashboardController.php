<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\offer;
use App\Models\offerfood;
use App\Models\order;
use App\Models\User;
use App\Models\role;
use App\Models\userroles;
use App\Models\store;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function menu(){
        $userid = Auth::id();
        $store = store::where(['user_id'=>$userid])->first();
        $category = category::all();
        $category = category::All();
        $cuisine = cuisine::all();
        $diet = diet::all();
        return view('Dashborad.SDmenu')->with(['store'=>$store,'cuisine'=>$cuisine,'diet'=>$diet,'category'=>$category]);
    }
    public function getStores(){
        $stores=store::all();
        return view('Dashborad.SDAdminControl')->with('stores',$stores);
    }
      public function approveStatus(Request $request, $id){

           $store = store::find($id);
           $store->status = 'approved';
           $store->approved_at = Carbon::now();
           $store->save();

        return redirect()->back();
      }

      public function rejectStatus(Request $request){
        $store_id = $request->input('id');
        $store = store::find($store_id);
        $store->status = 'Rejected';
        $store->save();

     return redirect()->back();
      }

      public function deleteStore($id){

        $data= store::find($id);
        $data->delete();
        return redirect()->route('controls');

      }

      public function userControls(){
        $users = User::All();
        return view('Dashborad.SDAdminUserControl')->with('users',$users);
      }
      public function deleteUser($id){

        $data= user::find($id);
        $data->delete();
        return redirect()->route('userControls');

      }
      public function editpage($id){
        $user = User::find($id);
        $allroles = role::All();
        return view('Dashborad.SDAdminUserDetails')->with('user' , $user)->with('allroles' , $allroles);
      }
     public function editUser(Request $request, $id){

         $user = User::find($id);
         $user->fill($request->all());
         if($user->isClean()){
             return ('userControls');
         }
         $user->name = $request->input('name');
         $user->email = $request->input('mail');
         $user->gender = $request->input('gender');
         $user->password = $request->input('password');

         $userrole = new userroles();
         $userrole->user_id = $id;
         $userrole->role_id = $request->input('role');

         $user->save();
         $userrole->save();
         return redirect()->route('userControls');
     }
}
