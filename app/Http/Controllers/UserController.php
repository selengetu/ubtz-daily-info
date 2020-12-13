<?php

namespace App\Http\Controllers;
use App\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;

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
        
        $method = DB::table('user')
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
    
}
