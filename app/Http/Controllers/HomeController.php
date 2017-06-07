<?php

namespace App\Http\Controllers;


use Hash;
use Auth;
use App\Department, App\User, App\Complaint;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();

        return view('main.dashboard', compact('departments'));
    }

    public function update()
    {
        $this->validate(request(),[
            'name' => 'required',
            'card_id' => 'required|min:2',
            'tel_no' => 'required|numeric',
            'department' => 'required'
            ]);

        $user = User::find(Auth::user()->id);
        $user->name = request('name');
        $user->id_card = request('card_id');
        $user->tel_no = request('tel_no');
        $user->department = request('department');
        $user->save();

        session()->flash('message', 'Profile has been successfully updated.');

        return redirect()->back();
    }

    public function makeComplaint()
    {
        return view('main.create');
    }

    public function storeComplaint()
    {
        $this->validate(request(),[
            'complaint' => 'required|min:2'
            ]);

        $complaint = Complaint::create([
            'complaint' => request('complaint'),
            'user_id' => Auth::user()->id
            ]);

        session()->flash('message', 'Complaint has been successfully submit.');

        return redirect()->back();
    }

    public function listComplaint()
    {
        if(Auth::user()->roles == "admin")
        {
            $complaints = Complaint::all();
        }
        else
        {
            $complaints = Complaint::where('user_id','=',Auth::user()->id)->get();
        }
        return view('main.show', compact('complaints'));
    }

    public function editComplaint($id)
    {
        $complaint = Complaint::findorFail($id);

        return view('main.edit', compact('complaint'));
    }

    public function updateComplaint($id)
    {
        $this->validate(request(),[
            'complaint' => 'required|min:2'
            ]);

        $complaint = Complaint::find($id);
        $complaint->complaint = request('complaint');
        $complaint->save();

        session()->flash('message', 'Complaint has been successfully updated.');

        return redirect()->back();
    }

    public function destroyComplaint($id)
    {

        $complaint = Complaint::find($id);
        $complaint->delete();

        session()->flash('message','Successfully deleted the complaint!');

        return redirect()->back();
    }

    public function editPassword()
    {
        return view('user.show');
    }

    public function updatePassword()
    {
        $this->validate(request(),[
            'currentpassword' => 'required|min:6',
            'password' => 'required|confirmed|min:6'
            ]);

        $current_password = Auth::User()->password;
        if(Hash::check(request('currentpassword'), $current_password))
        {
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make(request('password'));
            $user->save();

            return redirect()->back()->with('message','Password had been updated.');
        }
        else
        {
            return redirect()->back()->withErrors('Please enter correct current password.');
        }
    }

    public function createDepartment()
    {
        return view('department.create');
    }

    public function storeDepartment()
    {
        $this->validate(request(),[
            'department_name' => 'required|min:2'
            ]);

        $department = Department::create([
            'department_name' => request('department_name')
            ]);

        return redirect()->back()->with('message','Department had been successfully added');
    }

    public function listDepartment()
    {
        $departments = Department::all();

        return view('department.show', compact('departments'));
    }

    public function editDepartment($id)
    {
        $department = Department::findorFail($id);

        return view('department.edit', compact('department'));
    }

    public function updateDepartment($id)
    {
        $this->validate(request(),[
            'department_name' => 'required|min:2'
            ]);

        $department = Department::find($id);
        $department->department_name = request('department_name');
        $department->save();

        return redirect()->back()->with('message','Department had been updated.');
    }

    public function deleteDepartment($id)
    {
        $department = Department::find($id);
        $department->delete();

        session()->flash('message','Successfully deleted the department!');

        return redirect()->back();
    }
}

