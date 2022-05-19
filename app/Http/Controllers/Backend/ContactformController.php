<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\ShareController;
use Contactform;
use Validate;
use Mail;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;


class ContactformController extends ShareController
{
    public function index(){
        $contactforms = Contactform::orderBy('stt','asc')->orderBy('id','desc')->get();
        return view('backend.contactforms.index', compact('contactforms'));
    }

    public function edit(Request $request, $id)
    {
        $contactform = Contactform::find($id);
        return view('backend.contactforms.edit', compact('contactform'));
    }

    public function store(Request $request)
    {
        $lang = [
            'name.required' => trans('validation_lang.name'),
            'phone.required' => trans('validation_lang.phone'),
            'captcha.required' => trans('validation_lang.captcha'),
            'captcha.captcha' => trans('validation_lang.captcha.captcha')
        ];
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'captcha' => 'required|captcha',

        ], $lang);
        $data = [
            'type' => $request->type,
            'stt' => $request->true ?? true,
            'name' => $request->name,
            // 'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'subject' => $request->subject,
            'contactcontent' => $request->contactcontent,
            'read' => $request->read,
            'note' => $request->note
        ];
        $contactform = Contactform::create($data);
        $setting = Setting::get()->first();
        $web = $setting->website;
        $emailadmin = $setting->email;
        // if(isset($request->email) && !empty($request->email)){
        //     Mail::send('frontend.email.contact',[
        //         'name' => $request->name,
        //         'address' => $request->address,
        //         'phone' => $request->phone,
        //         'email' => $request->email,
        //         'subject' => $request->subject,
        //         'contactcontent' => $request->contactcontent
        //     ], function($mail) use($request,$web,$emailadmin){
        //         $mail->to($emailadmin,$request->name);
        //         $mail->from($request->email);
        //         $mail->subject('Thư liên hệ từ Website: '.$web);
        //     });
        // }
        if ($contactform) {
            alert()->success('Đã gửi thư','Chúng tôi sẽ phản hồi lại cho bạn ngay');
            return redirect()->route('frontend.home.index');
        }
            return redirect()->route('frontend.contact.index')->with('success','Có lỗi xảy ra !');
    }
    public function update(Request $request, $id)
    {
        $lang = [
            'name.required' => 'Vui lòng nhập Tên danh mục !',
            'name.max'     => 'Vui lòng nhập tối đa :max ký tự !',
        ];
        $request->validate([
            'name'  => 'required|max:120',
        ], $lang);
        $contactform          = Contactform::find($id);
        $contactform->type    = $request->type;
        $contactform->stt     = $request->stt;
        $contactform->name    = $request->name;
        $contactform->address = $request->address;
        $contactform->phone   = $request->phone;
        $contactform->email   = $request->email;
        $contactform->subject = $request->subject;
        $contactform->contactcontent = $request->contactcontent;
        $contactform->note    = $request->note;
        $contactform->read    = $request->read;
        $contactform->save();
        return redirect()->route('backend.contactform.index')->with('success','Cập nhật thông tin liên hệ thành công !');
    }

    public function destroy(Request $request, $id)
    {
        $contactform = Contactform::find($id);
        if ($contactform) {
            $contactform->delete();
            return redirect()->route('backend.contactform.index')->with('success','Xóa thông tin liên hệ thành công !');
        }
            return redirect()->route('backend.contactform.index')->with('success','Thông tin liên hệ không tồn tại !');
    }
    public function deletemultiple(Request $request)
    {
        $ids = $request->ids;
        Contactform::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>'Xoá thành công các mục đã chọn !']);
    }
    public function refereshCapcha(){
        return captcha_img('flat');
    }
    public function Read(Request $request){
        $contactform = Contactform::find($request->contactform_id);
        $contactform->read = $request->read;
        $contactform->save();
        return response()->json(['success'=>'Contactform Read change successfully.']);
    }
    public function changeStt(Request $request){
        $contactform = Contactform::find($request->contactform_id);
        $contactform->stt = $request->stt;
        $contactform->save();
        return response()->json(['success'=>'Contactform STT change successfully.']);
    }


}
