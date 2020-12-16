<?php

namespace App\Http\Controllers;
use App\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use Carbon\Carbon;
class HomeController extends Controller {

    
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $query = "";
        
        $startdate= Input::get('sdate');
        $enddate = Input::get('fdate');
        $sexecutor = Input::get('sexecutor_id');
     
        if (Auth::user()->is_admin == 1) {
            $query.="";

        }
        else
        {
            $type =DB::select('select t.executor_type from EXECUTOR t where t.executor_id =  '. Auth::user()->executor_id.'');
            if ($type[0]->executor_type ==2){
                $query.=" and t.executor_id = '".Auth::user()->executor_id."' ";
    
            }  
            else{
                $query.=" and  t.executor_id in (select executor_id from EXECUTOR t
                where t.executor_par='".Auth::user()->executor_id."')";
            }

        }
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.="and date between '".$startdate."' and '".$enddate." 23:59:59'";

        }
        else
        {
            $query.=" and date between current_date and current_date";
            $startdate= Carbon::today()->toDateString();
            $enddate=  Carbon::today()->toDateString();


        }

        if ($sexecutor!=NULL && $sexecutor !=0) {
            $type =DB::select('select t.executor_type from EXECUTOR t where t.executor_id =  '. $sexecutor.'');
            if ($type[0]->executor_type ==1){
                $dep =DB::select('select executor_par from EXECUTOR t where t.executor_id =  '. $sexecutor.'');

                $query.=" and t.executor_id in (select executor_id from EXECUTOR t where t.executor_par='".$dep[0]->executor_par."')";
            }
            else{
                $query.=" and t.executor_id = '".$sexecutor."'";
            }
        }
        else
        {
            $sexecutor=0;
            $query.=" ";

            
        }
      
        $executor = DB::select('select e.*, p.executor_abbr as dep_abbr from EXECUTOR e, executor p
        where p.executor_id=e.executor_par order by report_no, ex_report_no');
        $dep = DB::select('select * from EXECUTOR t where t.executor_type!=2 order by executor_abbr ');
        $info = DB::select('select t.* , e.*, p.executor_name as dep_name , p.executor_abbr as dep_abbr from daily_info t ,
         executor e, executor p where e.executor_id=t.executor_id and p.executor_id=e.executor_par '.$query.' order by e.report_no, e.ex_report_no, date');
        return view('home',compact('info', 'executor', 'dep','startdate', 'enddate'));
    }

    public function store(Request $request) {

        $info = new Info;
        $info->date = $request->date1;
        if($request->executor_id == NULL){
            $info->executor_id = $request->dep_id;
        }
        else{
            $info->executor_id = $request->executor_id;
        }
       
        $info->self_room = $request->self_room;
        $info->self_plot = $request->self_plot;
        $info->ex_room = $request->ex_room;
        $info->ex_plot = $request->ex_plot;
        $info->ex_train= $request->ex_train;
        $info->ex_container = $request->ex_container;
        $info->loc_z = $request->loc_z;
        $info->loc_a = $request->loc_a;
        $info->loc_s = $request->loc_s;
        $info->pas_vag = $request->pas_vag;
        $info->pas_teesh = $request->pas_teesh;
        $info->company_car = $request->company_car;
        $info->autobus = $request->autobus;
        $info->food_car = $request->food_car;
        $info->description = $request->description;
        $info->added_id = Auth::user()->id;
        $info->save();
        return Redirect('home');
    }

    public function update(Request $request)
    {
        
        $method = DB::table('daily_info')
            ->where('info_id', $request->info_id)
            ->update(['date' => $request->date1,'self_room' => $request->self_room,
            'self_plot' => $request->self_plot,'ex_room' => $request->ex_room,'ex_plot' => $request->ex_plot,
            'ex_train' => $request->ex_train,'ex_container' => $request->ex_container,'loc_z' => $request->loc_z,
            'loc_a' => $request->loc_a,'loc_s' => $request->loc_s,'description' => $request->description ,'pas_vag' => $request->pas_vag,
            'pas_teesh' => $request->pas_teesh,'company_car' => $request->company_car,'autobus' => $request->autobus,'food_car' => $request->food_car]);
        return Redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Info::where('info_id', '=', $id)->delete();
        return Redirect('home');
    }
    public function report() {
        $query = "";
        
        $startdate= Input::get('sdate');
        $enddate = Input::get('fdate');
        $sexecutor = Input::get('sexecutor_id');
     
        if (Auth::user()->is_admin == 1) {
            $query.="";

        }
        else
        {
            $type =DB::select('select t.executor_type from EXECUTOR t where t.executor_id =  '. Auth::user()->executor_id.'');
            if ($type[0]->executor_type ==2){
                $query.=" and t.executor_id = '".Auth::user()->executor_id."' ";
    
            }  
            else{
                $query.=" and  t.executor_id in (select executor_id from EXECUTOR t
                where t.executor_par='".Auth::user()->executor_id."')";
            }

        }
        if ($startdate !=0 && $startdate && $enddate !=0 && $enddate !=NULL) {
            $query.="and date between '".$startdate."' and '".$enddate." 23:59:59'";

        }
        else
        {
            $query.=" and date between current_date and current_date";
            $startdate= Carbon::today()->toDateString();
            $enddate=  Carbon::today()->toDateString();

        }

        if ($sexecutor!=NULL && $sexecutor !=0) {
            $type =DB::select('select t.executor_type from EXECUTOR t where t.executor_id =  '. $sexecutor.'');
            if ($type[0]->executor_type ==1){
                $dep =DB::select('select executor_par from EXECUTOR t where t.executor_id =  '. $sexecutor.'');

                $query.=" and t.executor_id in (select executor_id from EXECUTOR t where t.executor_par='".$dep[0]->executor_par."')";
            }
            else{
                $query.=" and t.executor_id = '".$sexecutor."'";
            }
        }
        else
        {
            $sexecutor=0;
            $query.=" ";

            
        }
  
        $executor = DB::select('select e.*, p.executor_abbr as dep_abbr from EXECUTOR e, executor p
        where p.executor_id=e.executor_par order by report_no, ex_report_no');
        $dep = DB::select('select * from EXECUTOR t where t.executor_type!=2 order by executor_abbr ');
        $info = DB::select('select t.* , e.*, p.executor_name as dep_name , p.executor_abbr as dep_abbr from daily_info t ,
         executor e, executor p where e.executor_id=t.executor_id and p.executor_id=e.executor_par '.$query.' order by e.report_no, e.ex_report_no, date');
        return view('report',compact('info', 'executor', 'dep','startdate', 'enddate'));
    }
}
