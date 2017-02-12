<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListModel;
use App\Http\Requests\Lists\Create as CreateRequest;
use App\User as UserModel;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists=UserModel::find(\Auth::user()->id)->lists()->paginate(5);//постраничный вывод paginate
        return view('lists.index',['lists'=>$lists]);
        //return view('lists.index',['lists'=>ListModel::all()]);//передаем все листы
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lists.create',['list'=>new ListModel()]);//добавляем пустую переменнуб list
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
        $lis=\Lang::get('listindex.List');
        $create=\Lang::get('listindex.create');
        return redirect('/lists')->with(['flash_message'=> $lis.' '.$list->name.' '.$create]);

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
        $list=ListModel::findOrFail($id);
        return view('lists.create',['list'=>$list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateRequest $request, $id)
    {
        $list=ListModel::findOrFail($id);
        $list->fill($request->only(['name']));
        $list->save();
        $lis=\Lang::get('listindex.List');
        $up=\Lang::get('listindex.update');
        return redirect('/lists')->with(['flash_message'=>$lis.' '.$list->name.' '.$up]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListModel $list)//($id)
    {
        //$list=ListModel::findOrFail($id);
        $list->delete();
        //возвращаемся назад с выводом сообщения
        $lis=\Lang::get('listindex.List');
        $removed=\Lang::get('listindex.removed');
        return redirect()->back()->with(['flash_message'=>$lis.' '.$list->name.' '.$removed]);
    }
}
