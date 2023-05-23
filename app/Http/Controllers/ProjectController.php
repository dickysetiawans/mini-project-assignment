<?php

namespace App\Http\Controllers;

use App\Models\Tb_m_project;
use App\Models\tb_m_client;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProjectImport;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = tb_m_client::all();
        $viewtable = DB::table('tb_m_projects')
            ->join('tb_m_clients', 'tb_m_projects.client_id', '=', 'tb_m_clients.id')
            ->select('tb_m_projects.*', 'tb_m_clients.client_name')
            ->get();
        return view('Project.index', [
            'viewtable'=> $viewtable,
            'client'=> $client
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = tb_m_client::all();
        return view('Project.create', ['client'=> $client]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date_now = date('Y-m-d');
        $dataRequest = $request -> validate([
			'name'=> ['required','max:300'],
			'client' =>['required'],
			'date_end'=>['required'],
		]);
        if($date_now == $dataRequest['date_end']){
            return back()->with('ErorTanggal','Tanggal tidak boleh hari ini');
        }else{
            $clientCheck = tb_m_client::where('client_name', $dataRequest['client'])->first();
            $status = 'Doing';
            $project_new_data = [
                'project_name'=> $dataRequest['name'],
                'client_id'=> $clientCheck['id'],
                'project_start'=> $date_now,
                'project_end'=> $dataRequest['date_end'],
                'project_status'=> $status,
            ];
            tb_m_project::create($project_new_data);
            return redirect('/project');
        }
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $project = Tb_m_project::find($request->id);
        $client = tb_m_client::where('id', $project->client_id)->first();
        $dc = tb_m_client::all();
        return view('Project.edit',  compact('project', 'client', 'dc'));
    }

    public function cari(Request $request)
    {
        $ProjectName = $request->input('search');
        $status = $request->input('status');
        $client = $request->input('client');
        $clientdata = tb_m_client::all();
        $viewtable = DB::table('tb_m_projects')
            ->join('tb_m_clients', 'tb_m_projects.client_id', '=', 'tb_m_clients.id')
            ->where('tb_m_projects.project_name', 'LIKE', '%' . $ProjectName . '%')
            ->where('project_status', 'LIKE', '%' . $status . '%')
            ->orWhere('tb_m_clients.client_name','LIKE', '%' . $client . '%')
            ->get();
        if($client == "All Client" && $status == 'All Status'){
            $viewtable = DB::table('tb_m_projects')->join('tb_m_clients', 'tb_m_projects.client_id', '=', 'tb_m_clients.id')
                ->select('tb_m_projects.*', 'tb_m_clients.client_name')
                ->get();
            return view('Project.cari', [
                'viewtable'=> $viewtable,
                'clientdata'=>$clientdata
            ]);
        }
       return view('Project.cari', [
            'viewtable'=>$viewtable,
            'clientdata'=>$clientdata
        ]);
      
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $dataRequest = $request -> validate([
			'name'=> ['required','max:300'],
			'date_start'=>['required'],
			'date_end'=>['required'],
            'status'=>['required'],
		]);
        $project_update = Tb_m_project::find($request->id);
        $project_update->project_name = $dataRequest['name'];
        $project_update->project_start = $dataRequest['date_start'];
        $project_update->project_end = $dataRequest['date_end'];
        $project_update->project_status = $dataRequest['status'];
        $project_update->update();
        return redirect('/project');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $project = Tb_m_project::find($request->id);
		$project->delete();
        return redirect('/project');
    }
    public function create_client(Request $request)
    {
        $dataRequest = $request -> validate([
			'client_name'=> ['required','max:300'],
			'client_address'=>['required'],
		]);
        tb_m_client::create($dataRequest);
        return redirect('/project/new');
    }
    public function exel(Request $request)
    {
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
        $file = $request->file('file');
        // membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
        		// upload ke folder file_siswa di dalam folder public
		$file->move('file',$nama_file);
        Excel::import(new ProjectImport, public_path('/file/'.$nama_file));

        // alihkan halaman kembali
		return redirect('/project');
    }
}
