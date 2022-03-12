<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\crypt;

class CrudController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    // pages -------------------

    function page1(){
        return view('index');
    }

    function page2(){

        $data = array(
            'list' => DB::table('users')->select('id','username','email', 'date_of_birth', 'city', 'country')->get()
        );
        return view('view', $data);
    }



    // database -------------------

    function add(Request $request){
        // return $request->input();
        $request->validate([
            'username'=>'required',
            'email'=>'required',
            'date'=>'required',
            'city'=>'required',
            'country'=>'required',
            'password'=>'required',
        ]);

        $query = DB::table('users')->insert([
            'username'=>$request->input('username'),
            'email'=>$request->input('email'),
            'date_of_birth'=>$request->input('date'),
            'city'=>$request->input('city'),
            'country'=>$request->input('country'),
            'password'=>Crypt::encryptString($request->input('password')),
            'status'=>$request->input('radiobtn')
        ]);

        if($query){
            return back()->with('success', 'Data have been successfully inserted.');
        }else{
            return back()->with('fail', 'Something went wrong.');
        }
    }

    function edit($id){
        $row = DB::table('users')->where('id', $id)->first();
        $data = [
            'info' => $row
        ];
        return view('update', $data);
    }

    function update(Request $request){

        $decrypt = Crypt::decryptString($request->input('oldPasswordHidden'));

        if(($request->input('newPassword')) == NULL && ($request->input('oldPassword')) == NULL){
            DB::table('users')->where('id', $request->input('id'))->update([
                'username'=>$request->input('username'),
                'email'=>$request->input('email'),
                'date_of_birth'=>$request->input('date'),
                'city'=>$request->input('city'),
                'country'=>$request->input('country'),
                'status'=>$request->input('radiobtn')
            ]);
            return redirect('view');
        }elseif(($decrypt == ($request->input('oldPassword'))) && ($request->input('newPassword')) != NULL ){
            DB::table('users')->where('id', $request->input('id'))->update([
                'username'=>$request->input('username'),
                'email'=>$request->input('email'),
                'date_of_birth'=>$request->input('date'),
                'city'=>$request->input('city'),
                'country'=>$request->input('country'),
                'password'=>Crypt::encryptString($request->input('newPassword')),
                'status'=>$request->input('radiobtn')
            ]);
            return redirect('view');
        }else{
            return back()->with('fail', 'Password do not match.');
        }
    }

    function delete($id){
        DB::table('users')->where('id', $id)->delete();

        return redirect('view');
    }
}
