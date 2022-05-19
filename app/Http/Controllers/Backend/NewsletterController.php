<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use Newsletter;
use Validate;
use Cache;
use Translation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use SendMail;
use Mail;
use Setting;

class NewsletterController extends ShareController
{
    public function index(){
        $newsletters =  Newsletter::orderBy('stt', 'asc')->orderBy('read','asc')->limit(500)->get();
        $chunknewsletters = $newsletters->chunk(50);
            return view('backend.newsletters.index', compact('chunknewsletters'));



    }
    public function edit(Request $request, $id){
        $newsletter = Newsletter::find($id);
        return view('backend.newsletters.edit', compact('newsletter'));
    }
    public function store(Request $request){ // Đăng ký mới
        $request->validate(
            [
            'email' => 'required|email|unique:newsletters',
            ],
            [
            'email.required' => 'Vui lòng nhập địa chỉ email !',
            'email.email' => 'Email không đúng định dạng !',
            'email.unique' => 'Email đã tồn tại trên hệ thống !',
        ]);
        $data = [
            'stt' => $request->stt ?? true,
            'read' => $request->read ?? false,
            'email' => $request->email,
        ];
        $newsletter = Newsletter::create($data);
        if ($newsletter) {
            alert()->success("Thành công",'Cảm ơn bạn đã đăng kí !');
            return redirect()->back();
        }
            return redirect()->back();
    }
    public function update(Request $request, $id){
        $newsletter = Newsletter::find($id);
        $request->validate(
            [
            'email' => 'required|email|unique:newsletters,email,'.$id,
            ],
            [
            'email.required' => 'Vui lòng nhập địa chỉ email !',
            'email.email' => 'Email không đúng định dạng !',
            'email.unique' => 'Email đã tồn tại trên hệ thống !',
        ]);
        $newsletter->stt   = $request->stt;
        $newsletter->read  = $request->read;
        $newsletter->email = $request->email;
        $newsletter->note  = $request->note;
        $newsletter->save();
        if ($newsletter->save()) {
            alert()->success("Thành công",'Đã cập nhật thư điện tử');
            return redirect()->route('newsletter.index');
        }
            alert()->error("Thất bại",'Đã có lỗi xảy ra !');
            return redirect()->route('newsletter.index');
    }
    public function destroy(Request $request, $id){
        $newsletter = Newsletter::find($id);
        if ($newsletter){
            $newsletter->delete();
            alert()->successs("Thành công",'Đã xóa thư điện tử');
            return redirect()->route('newsletter.index');
        }
            alert()->error("Thất bại",'Đã có lỗi xảy ra');
            return redirect()->route('newsletter.index');
    }
    public function deletemultiple(Request $request){
        $ids = $request->ids;
        Newsletter::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>'Xoá thành công các email đã chọn !']);
    }

    public function sendmultiple(Request $request){
        $data=[
            'title' => $request->title,
            'content' => $request->content,
            'file' =>$request->file,
        ];
        $ids = $request->ids;
        foreach(explode(",",$ids) as $id){
            $email = Newsletter::find($id);
            $email->read =1;
            $email->save();
            Mail::to($email->email)->send(
            (new SendMail($data))->afterCommit());
        }
        return response()->json(['status'=>true,'message'=>'Gửi thành công các email đã chọn !']);
    }

    public function sendall(Request $request) {
        $data=[
            'title' => $request->title,
            'content' => $request->content,
            'file' =>$request->file,
        ];
        $emails = Newsletter::whereRead(0)->get();

        foreach($emails as $email){
            $email->read =1;
            $email->save();
            Mail::to($email->email)->send(
            (new SendMail($data))->afterCommit());
        }
            if($emails->count()>0){
                alert()->success("Thành công",'Đã gửi mail đến ' .$emails->count(). ' người mới');
            }
            else{
                alert()->warning("Chưa gửi",'Không có địa chỉ email mới');
            }
            return redirect()->back();
    }
}
