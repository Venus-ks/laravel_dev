<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// 사전등록 Models
use App\Models\Submit;
use App\Models\Lecture;

// 현재 날짜 사용
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        if (!Auth::check()) {
            return route('admin.login');
        }
    }
    public function listLectures(Request $req)
    {
        if(!Auth::check()) return redirect('admin');
        $expts = Excerpt::select('id','name','email','password','country','type','subject','title','author_info','excerpt','keywords','co_authors','created_at','updated_at','excerptfile')
            ->orderby('created_at','DESC')
            ->when(isset($req->t), function($que) use ($req){
                $que->where('type',$req->t);
            })
            ->when(isset($req->c), function($que) use ($req){
                $que->where('subject',$req->c);
            })
            ->when($req->sw, function($que) use ($req){
                $que->orWhere('name','LIKE','%'.$req->sw.'%')
                ->orWhere('email','LIKE','%'.$req->sw.'%')
                ->orWhere('title','LIKE','%'.$req->sw.'%');
            })
            ->paginate(8);
        $expts->withPath("?t={$req->t}&c={$req->c}&sw={$req->sw}");
        //dd(Excerpt::paginate());
        return view('admin.lectures',['expts'=>$expts, 'no'=>$expts->total()-$expts->perPage()*($expts->currentPage()-1)+1,'sw'=>$req->sw]);
    }


    // KS 20221109-------------------------------------------------------------------------------------------------
    // 로그인
    public function logIN(Request $request)
    {
        if(Auth::attempt(['email' => $request->id, 'password' => $request-> pw]))
        {
            return redirect()->route('admin.submit.list');
        }
        return redirect()->route('admin.login')->with('notice','비밀번호 혹은 아이디가 틀렸습니다.');
    }

    // 로그아웃
    public function logOut()
    {
        Auth::logout();
        return redirect()->route('home');
    }


    // KS 20221109 Submit Start-------------------------------------------------------------------------------------------------

    // 리스트화면
    public function submitList(Request $request)
    {
        if(!Auth::check())
            return redirect()->route('admin.login');
            $list = Submit::orwhere('name','like','%'.$request->sr.'%')
                    ->orwhere('email','like','%'.$request->sr.'%')
                    ->latest()
                    ->paginate(config('cm.submit')['rows']);
        return view('admin.submit.list',[
            'list'  => $list,
            'no'    => $list->total()-$list->perPage()*($list->currentPage()-1)+1
        ]);
    }

    // 사전등록 입금확인
    public function changeStatus(Request $request)
    {
        if(!Auth::check())
            return redirect()->route('admin.login');
        $submitStatus = Submit::find($request->id);
        $submitStatus->status = $request->status;
        $submitStatus->save();
        return redirect()->back()->with('notice','변경되었습니다.');

    }
    // 사전등록 삭제
    public function submitDelete($id)
    {
        if(!Auth::check())
            return redirect()->route('admin.login');
        $submitDelete = Submit::where('id',$id)->delete();
        return redirect()->back()->with('notice','삭제 되었습니다.');
    }
    // 사전등록 휴지통 목록
    public function submitTrash()
    {
        if(!Auth::check())
            return redirect()->route('admin.login');
        $list = Submit::onlyTrashed()->latest()->paginate(config('cm.submit')['rows']);
        return view('admin.submit.list',[
            'list'  => $list,
            'no'    => $list->total()-$list->perPage()*($list->currentPage()-1)+1
        ]);
    }

    // 사전등록 삭제된 데이터 복구
    public function submitDeleteRestore($id)
    {
        if(!Auth::check())
            return redirect()->route('admin.login');
        $submitRestore = Submit::where('id',$id)->restore();
        return redirect()->route('admin.submit.list')->with('notice','복원 되었습니다.');

    }
    // KS 20221109 Submit End-------------------------------------------------------------------------------------------------


    // KS 20221117 Lecuter Start-------------------------------------------------------------------------------------------------

    // 리스트화면
    public function lectureList(Request $request)
    {
        if(!Auth::check())
            return redirect()->route('admin.login');
        $list = Lecture::orwhere('name','like','%'.$request->sr.'%')
            ->orwhere('email','like','%'.$request->sr.'%')
            ->latest()
            ->paginate(config('cm.submit')['rows']);
        return view('admin.lecture.list',[
            'list'  => $list,
            'no'    => $list->total()-$list->perPage()*($list->currentPage()-1)+1
        ]);
    }
    //초록 등록 수정
    public function lectureModify($id)
    {
        // $author_info = json_decode($expt->author_info);
        // $expt->author_affiliation = $author_info->affiliation;
        // $expt->author_name = $author_info->name;
        return view('admin.lecture.modify',[
            'lecture'  => lecture::where('id',$id)->first(),
        ]);
    }

     // 초록등록 삭제
     public function lectureDelete($id)
     {
         if(!Auth::check())
             return redirect()->route('admin.login');
         $lectureDelete = Lecture::where('id',$id)->delete();
         return redirect()->back()->with('notice','삭제 되었습니다.');
     }
     // 초록 휴지통 목록
     public function lectureTrash()
     {
         if(!Auth::check())
             return redirect()->route('admin.login');
         $list = lecture::onlyTrashed()->latest()->paginate(config('cm.lecture')['rows']);
         return view('admin.lecture.list',[
             'list'  => $list,
             'no'    => $list->total()-$list->perPage()*($list->currentPage()-1)+1
         ]);
     }
     // 초록 삭제된 데이터 복구
     public function lectureDeleteRestore($id)
     {
         if(!Auth::check())
             return redirect()->route('admin.login');
         $lectureRestore = lecture::where('id',$id)->restore();
         return redirect()->route('admin.lecture.list')->with('notice','복원 되었습니다.');
     }

    // KS 20221117 Lecuter End-------------------------------------------------------------------------------------------------



}
