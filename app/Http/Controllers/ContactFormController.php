<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //送信完了画面
        $contacts = Contact::where('user_id', auth()->id())->orderBy('created_at','desc')->take(1)->get();
        $categories = [];
        foreach ($contacts as $key => $value) {
            $categories[] = $value->category;
        }
        return view('HomeForm.send', compact('contacts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $category = Category::All();
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
        $request->validate([
            'text' => 'required|max:255',
        ]);
        //フォームの保存
        $contact = new Contact;
        $contact->user_id = auth()->id();
        $contact->category_id = $request->category_id;
        $contact->text = $request->text;
        if(Auth::user()->role != 0 && $request->category_id == 2){
            $contact->done = True;
        }
        $contact->save();
        //完了画面
        return redirect('/contacts');
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
        if($id == 0){
            $contacts = Contact::all();
        }else if($id>1){
            $contacts = Contact::where('category_id', $id)->get();
        }else{
            $contacts = Contact::all();
        }
        return view('ContactForm.list',compact('contacts'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category;
        //管理者が店舗用に変更するためのページ
        if($id){
            $contacts = Contact::where('id', $id)->get();
            foreach($contacts as $contact){
            $send_user = DB::table('users')->where('id', $contact->user_id)->first();
                $category = $contact->category;
            }
            return view('ContactForm.edit',compact('contacts', 'send_user', 'category'));
        }else{
            return redirect('/contacts/0');
        }

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
        if( $request->has('send_user_id') && $request->shop == 0){
            //店舗管理者承認
            $article = Contact::where('id', $id)->first();
            $article->done = True;
            $article->save();
            DB::table('users')
                ->where('id',  $request->send_user_id)
                ->update(['role' => 3]);
        }
        elseif( $request->has('send_article_id') ){
            //対応済に変更
            $article = Contact::find($id);
            $article->done = True;
            $article->save();
        }
        else{
            // return redirect(route('posts.index'))->with('error', '許可されていない操作です');
        }
        return redirect('/contacts/0');

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
