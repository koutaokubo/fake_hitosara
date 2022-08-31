<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Mypage.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //使わない
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //使わない
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //つかわない
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //更新画面
        return view('Mypage.edit');
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
        $request->validate([
            'name' => 'required|max:15',
        ]);
        $user = Auth::user();
        // 現在のパスワードを確認
        if (!password_verify($request->password, $user->password) && !password_verify($request->new_password, $request->confirm_password)) {
            return redirect('/mypage/0/edit')
            ->with('warning', 'パスワードが一致しません');
        }else{
            //更新保存
            if ($request->has('new_password')){
                $user->password = bcrypt($request->new_password);
            }else{
                $user->password = bcrypt($request->password);
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
        }
        return redirect('/mypage');
    }

    public function delete()
    {
        //退会処理確認画面
        return view('Mypage.confirm');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //退会処理
        Auth::find($id)->delete();
        return redirect()->route('Mypage.thanks');
    }
}
