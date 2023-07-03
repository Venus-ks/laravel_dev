<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLectureRequest;
use App\Http\Requests\UpdateLectureRequest;
use Illuminate\Http\Request;
use App\Models\Lecture;
use Illuminate\Support\Facades\Auth;
use App\Events\fileEvent;

class LectureController extends Controller
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
        return view('lecture.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLectureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLectureRequest $request)
    {
        $abstract_file = $request->abstract_file;
        event(new fileEvent($abstract_file));
        Lecture::create($request->all());
        return redirect()->route('lecture.login')->with('status',__('messages.abs-reg-done'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function show(Lecture $lecture)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecture $lecture)
    {
        //
        return view('lecture.modify',[
            'lecture'  => lecture::where('id',$lecture->id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLectureRequest  $request
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLectureRequest $request, $id)
    {
        $lecture = Lecture::find($id);
        $lecture->fill($request->all())->save();
        if(!Auth::check()){
            return redirect()->route('lecture.login')->with('status',__('messages.abs-reg-done'));
        }else{    
            return redirect()->route('admin.lecture.list')->with('notice','변경 되었습니다.');
        }
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture)
    {
        //
    }

    /**
     * 저장된 정보로 임시로그인 체크
     */
    public function checkApplier(Request $request)
    {
        $lecture = Lecture::where(['email'=>$request->email,'password'=>$request->password])->first();
        if(is_null($lecture)) return back()->with('status',__('messages.abs-reg-none'));
        return redirect()->route('lecture.edit',$lecture->id)->with('checked',TRUE);
    }
}
