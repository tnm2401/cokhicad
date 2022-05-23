<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use Cache;
use Image;
use Validate;
use Validator;
use Translation;
use Stepwork;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class StepworkController extends ShareController
{
    public function index()
    {
        $steps = Stepwork::orderBy('stt','asc')->get();
        return view('backend.stepwork.index', compact('steps'));
    }
    public function create()
    {
        return view('backend.stepwork.create');
    }

    public function edit(Request $request, $id)
    {
        $steps = Stepwork::find($id);
        return view('backend.stepwork.edit', compact('steps'));
    }

    public function store(Request $request)
    {
        $lang = [
            'vi.content.required' => 'Vui lòng nhập nội dung Tiếng Việt !',
            'en.content.required' => 'Vui lòng nhập nội dung Tiếng Anh !',
        ];
        $validator = Validator::make(request()->translation, [
            '*.content' => 'required',
        ],$lang);
        $validated = $validator->validated();


        $stepwork = new Stepwork();
        $stepwork->stt = $request->stt ?? true;
        $stepwork->hide_show = $request->hide_show ?? true;
        $stepwork->color = $request->color ?? '';
        $stepwork->save();
        $stepwork->translations()->createMany($request->translation);
        if ($stepwork) {
            alert()->success("Thành công !", "Đã thêm quy trình làm việc !");
            return redirect()->route('backend.stepwork.index');
        }
            alert()->danger("Lỗi !", "Thêm quy trình thất bại !");
            return redirect()->route('backend.stepwork.index');
    }

    public function update(Request $request, $id)
    {
        $id_unique_skip = Translation::where('trans_id',$id)->where('trans_type','App\Models\Stepwork')->where('locale',session('locale'))->first()->id;
        $step = Stepwork::find($id);
        if (session()->get('locale') == 'vi') {
            $lang = [
                'content.required' => 'Vui lòng nhập tên Tiếng Việt !',
            ];
        } else {
            $lang = [
                'content.required' => 'Vui lòng nhập tên Tiếng Anh !',
            ];
        }
        $validator = Validator::make(request()->translation, [
            'content' => 'required',
        ],$lang);
        $validated = $validator->validated();

        $step->stt             = $request->stt;
        $step->hide_show       = $request->hide_show;
        $step->color       = $request->color;
        $step->translations()->update($request->translation);
        $step->save();
        if($request->changelang){
            session()->put('locale',$request->changelang);
            return redirect()->back();
        }
        session()->forget('locale');
        alert()->success("Thành công !","Đã cập nhật quy trình làm việc !");
        return redirect()->route('backend.stepwork.index');
    }

    public function destroy(Request $request, $id)
    {
        $step = Stepwork::find($id);
            $step->delete();
            $step->delete_trans()->delete();
            alert()->success("Thành công !",'Đã xóa quy trình làm việc !');
            return redirect()->route('backend.stepwork.index');
    }


    public function hideShow(Request $request){
        $step = Stepwork::find($request->stepwork_id);
        $step->hide_show = $request->hide_show;
        $step->save();
        return response()->json(['success'=>'Stepwork Hide Show change successfully.']);
    }

    public function changeStt(Request $request){
        $step = Stepwork::find($request->stepwork_id);
        $step->stt = $request->stt;
        $step->save();
        return response()->json(['success'=>'Stepwork STT change successfully.']);
    }
}
