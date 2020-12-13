<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use Validator;
use Hash;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
class UserController extends Controller {

    
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

  
        $user = DB::select('select * from EXECUTOR e, users u
        where u.executor_id=e.executor_id');
        $executor = DB::select('select e.*, p.executor_abbr as dep_abbr from EXECUTOR e, executor p
        where p.executor_id=e.executor_par order by report_no, ex_report_no');
        return view('user',compact('user', 'executor'));
    }

    public function store(Request $request) {

        $user = new User;
        $user->name = $request->name;   
        $user->executor_id = $request->executor_id;
        $user->email = $request->email; 
        $user->save();
        return Redirect('user');
    }

    public function update(Request $request)
    {
        
        $method = DB::table('users')
            ->where('id', $request->id)
            ->update(['name' => $request->name,'executor_id' => $request->executor_id,
            'email' => $request->email]);
        return Redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $method = DB::table('user')
            ->where('id', $request->id)
            ->update(['is_delete' => 1]);
        return Redirect('user');
    }
    public function profile()
    {
        return view('profile');
    }

    public function admin_credential_rules(array $data)
    {
        $messages = [
            'current-password.required' => 'Please enter current password',
            'password.required' => 'Please enter password',
        ];

        $validator = Validator::make($data, [
            'current-password' => 'required',
            'password' => 'required|same:password',
            'password_confirmation' => 'required|same:password',
        ], $messages);

        return $validator;
    }
    public function postCredentials(Request $request)
    {
        if(Auth::Check())
        {
            $request_data = $request->All();
            $validator = $this->admin_credential_rules($request_data);
            if($validator->fails())
            {
                Session::flash('message', 'Шинэ нууц үг хоорондоо таарахгүй байна!');
                Session::flash('alert-class', 'alert-danger');

                return Redirect::to(URL::previous() . "#tab_1_3");
            }
            else
            {
                $current_password = Auth::User()->password;
                if(Hash::check($request_data['current-password'], $current_password))
                {
                    $user_id = Auth::User()->id;
                    $obj_user = User::find($user_id);
                    $obj_user->password = Hash::make($request_data['password']);;
                    $obj_user->save();
                    Session::flash('message', 'Нууц үг солигдлоо!');
                    Session::flash('alert-class', 'alert-success');

                    return Redirect::to(URL::previous() . "#tab_1_3");
                }
                else
                {
                    Session::flash('message', 'Одоогийн нууц үг буруу байна!');
                    Session::flash('alert-class', 'alert-danger');
                    return Redirect::to(URL::previous() . "#tab_1_3");
                }
            }
        }
        else
        {
            return redirect()->to('/');
        }
    }
    
}
