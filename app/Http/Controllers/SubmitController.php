<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubmitRequest;
use App\Http\Requests\UpdateSubmitRequest;
use Illuminate\Http\Request;
use App\Models\Submit;

class SubmitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('submit.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubmitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubmitRequest $request)
    {
        Submit::create($request->all());
        return redirect()->route('submit.login')->with('status','등록이 완료되었습니다.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Submit  $submit
     * @return \Illuminate\Http\Response
     */
    protected function show(Submit $submit)
    {
        if(session('checked')) return view('submit.show', $submit);
        abort(401);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Submit  $submit
     * @return \Illuminate\Http\Response
     */
    public function edit(Submit $submit)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubmitRequest  $request
     * @param  \App\Models\Submit  $submit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubmitRequest $request, Submit $submit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Submit  $submit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Submit $submit)
    {
        //
    }

    public function checkApplier(Request $req)
    {
        $submit = Submit::where(['name'=>$req->name,'email'=>$req->email])->first();
        if(is_null($submit)) 
            return back()->with('status','회원정보가 없습니다.');
        return redirect()->route('submit.show',$submit->id)->with('checked',TRUE);
    }
}
