<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::paginate(5);
        return view('Dashboard_Admin.pengguna.index', compact('user'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Dashboard_Admin.pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'tipe' => 'required'
        ]);

        if($request->input('password')){
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'tipe' => $request->tipe,
                'password' => bcrypt($request->password)
            ]);
        }else{
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'tipe' => $request->tipe,
                'password' => bcrypt('12345135')
            ]);
        }

        

        return redirect()->back()->with('success', 'Pengguna Berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorfail($id);
        return view('Dashboard_Admin.pengguna.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|min:3',
            'tipe' => 'required'
        ]);


        if($request->input('password')){
            $data_user = [
                'name' => $request->name,
                'tipe' => $request->tipe,
                'password' => bcrypt($request->password)
            ];
        }else{
            $data_user = [
                'name' => $request->name,
                'tipe' => $request->tipe
            ];
        }
        
        $user = User::findorfail($id);
        $user->update($data_user);

        return redirect()->route('user.index')->with('success', 'Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Pengguna Telah Terhapus');
    }
}
