<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use App\User;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session('permission') == "superadmin") {
            $role = DB::table('role')->get();
            return view('role.index', compact('role'));
        } else if (session('permission') != "guest") {
            return view('home');
        } else {
            $company = DB::table('company')->count('name');
            $employee = User::count('name');
            return view('welcome')->with([
                'company' => $company,
                'employee' => $employee
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => ['required', 'string', 'min:2'],
            'name' => ['required', 'string', 'min:2'],
        ], [
            'id.required' => 'ID tidak boleh kosong',
            'name.required' => 'Nama Role tidak boleh kosong'
        ]);

        DB::table('role')->insert([
            'id' => $request->id,
            'name' => $request->name,
            'is_admin' => $request->is_admin,
            'is_superadmin' => $request->is_superadmin
        ]);

        return redirect('role')->with('status', 'Role Platform berhasil ditambah!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = DB::table('role')->where('id', $id)->get()->first();
        return view('role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = DB::table('role')->where('id', $id)->first();
        return view('role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id' => ['required', 'string', 'min:2'],
            'name' => ['required', 'string', 'min:2'],
        ], [
            'id.required' => 'ID tidak boleh kosong',
            'name.required' => 'Nama Role tidak boleh kosong'
        ]);

        DB::table('role')->where('id',$id)->update([
            'id' => $request->id,
            'name' => $request->name,
            'is_admin' => $request->is_admin,
            'is_superadmin' => $request->is_superadmin
        ]);

        return redirect('role')->with('status', 'Role Platform berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('role')->where('id', $id)->delete();
        return redirect('role')->with('status', 'Role Platform berhasil dihapus!');
    }
}
