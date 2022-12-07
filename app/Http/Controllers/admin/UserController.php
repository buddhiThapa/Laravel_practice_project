<?php

namespace App\Http\Controllers\admin;

use App\Exports\UserExport;
use App\Imports\Importdata;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\ImportUser;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class UserController extends Controller
{
   
    //USER LIST
    public function index(request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*')->where('id','!=',1)->latest('id');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function(User $user){
                           $btn = '<div class="row">
                           <div class="col-md-3">
                                <a href="'.route('Dark-Pan-theme.user.show',$user->id).'" class="edit text-warning" ><i class="fa fa-eye"></i></a>
                            </div>
                            <div class="col-md-3">
                                <a href="'.route('Dark-Pan-theme.user.edit',$user->id).'" class="edit text-info" ><i class="fa fa-edit"></i></a>
                           </div>
                           <div class="col-md-3">
                                <form method="post" action="'.route('Dark-Pan-theme.user.destroy',$user->id).'"> 
                                    '.csrf_field().'
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="delete text-primary"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                        ';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('darkpan_theme.user.list');
    }

    
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        
    }

    
    //USER VIEW
    public function show($id)
    {
        $UserData = User::find($id);
        return view('darkpan_theme.user.view',compact('UserData'));
    }

    
    public function edit($id)
    {
        $UserData = User::find($id);
        return view('darkpan_theme.user.edit',compact('UserData'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$id,
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        if($user){
            return redirect()->back()->with(['success'=>'Data Updated Successfully']);
        }else{
            return redirect()->back()->with(['error'=>'Somthing went Wrong']);
        }
    }

    
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->back()->with(['success'=>'Data Deleted Successfully']);
    }

    public function get_user_data(request $request){     
        
        return Excel::download(new UserExport($request), 'User.xlsx');
    }

    
    public function import(request $request){

        $data_check = Excel::toArray(new Importdata, $request->file('file'));
        if(isset($data_check[0][0]) && !empty($data_check[0][0])){
            $data_check[0][0] = array_filter($data_check[0][0]);
            if(count($data_check[0][0]) > 3){//no of column check
                return redirect()->back()->with(['error'=>'Column Mis-match please download the templete']);
            }

            $array_check = ['Name','Email','Password'];
            $header_check = 0;
            foreach ($data_check[0][0] as $key => $value) {
                if($array_check[$key] != $value){
                    echo $array_check[$key].'<br>';
                    $header_check++;
                }
            }
            
            if($header_check > 0 ){//column placing check
                return redirect()->back()->with(['error','Column Mis-match please download the templete']);
            }

            if(count($data_check[0]) == 1){
                return redirect()->back()->with(['error'=>'Thier Is not to Import']);
            }
        }

        try {
            $import = new ImportUser;
            $import->import($request->file('file'));
            if ($import->failures()->isNotEmpty()) {
                return back()->withFailures($import->failures());
            }
            return redirect()->back()->with(['success'=>'Data Imported Successfully']);
        } catch (\Exception $th) {
            return redirect()->back()->with(['error'=>$th->getMessage()]);
        }
    }
}
