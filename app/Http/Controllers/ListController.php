<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListModel;
use App\Http\Requests\Lists\Create as CreateRequest;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lists.index',['lists'=>ListModel::all()]);//передаем все листы
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)//валидация идет через CreateRequest
    {
        $list=ListModel::create([
            'user_id'=>\Auth::user()->id,
            'name'=>$request->get('name')
        ]);
        return redirect('/lists')->with(['flash_message'=>'List'.$list->name.'successfully created']);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list=ListModel::findOrFail($id);
        $list->delete();
        //возвращаемся назад с выводом сообщения
        return redirect()->back()->with(['flash_message'=>'List'.$list->name.'successfully deleted']);
    }
}
