<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //使用しない
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $category = Category::all();
        //フォーム画面表示
        return view('ContactForm.create',compact('user', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //フォームの保存
        $contact = new Contact;
        $contact->user_id = auth()->id();
        $contact->category_id = $request->category_id;
        $contact->text = $request->text;
        $contact->save();

        $user = Auth::user();
        $route = 'ContactForm.send';
        $article = Contact::where('user_id', auth()->id())->orderBy('created_at','desc')->take(1)->get();
        return redirect()->route($route)->with(compact('user', 'article'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //管理者のみ閲覧可能お問い合わせ一覧
        $contacts = Contact::all();
        return view('ContactForm.list', compact('contacts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //管理者が店舗用に変更するためのページ

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
        //編集の更新の保存
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //使用しない
    }
}
