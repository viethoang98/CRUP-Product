<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
class ProductController extends Controller
{
    public function index(){ //funcion index để lấy dữ liệu hiển thị lên index
        $product = DB::table('products')->latest()->paginate(3);//????Số product hiển thị
        //tạo biến product Lấy dữ liệu trong DB
        return view('product.index',compact('product'));
    }

    public function search(Request $request){
        $search = $request->get('search');
        $posts = DB::table('products')->where('product_name','like','%'.$search.'%')->pagination();
        return view('index', ['products'=>$posts]);
    }

    public function create(){
        return view('product.create');//dẫn file create và button add product
    }

    public function Store(Request $request){ //Cần được giải thích chỗ này thêm
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['details'] = $request->details;

        $image = $request->file('logo');//Cần đc giải thích thêm
        if ($image) {
            $image_name = date('dmy_H-s_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'pulic/media/';  //thư mục chứa ảnh
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

        $data['logo'] = $image_url;
        $product = DB::table('products')->insert($data);
        return redirect()->route('product.index')
        ->with('success','Product Create Successfully');
        }
    
    }
    public function Edit($id){
        $product = DB::table('products')->where('id',$id)->first();//Cần được giải thích thêm
        return view('product.edit',compact('product'));
    }

    public function Update(Request $request, $id){ //Cần được giải thích chỗ này khi update product 
       $oldlogo = $request->old_logo; //Cần được giải thích thêm
       
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['details'] = $request->details;

        $image = $request->file('logo');//Cần đc giải thích thêm
        if ($image) {
            unlink($oldlogo); //????
            $image_name = date('dmy_H-s_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'pulic/media/';  //thư mục chứa ảnh
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

        $data['logo'] = $image_url;
        $product = DB::table('products')->where('id',$id)->update($data);//???? ??
        return redirect()->route('product.index')
        ->with('success','Product Edit Successfully');
        } 
    }
    public function Delete($id){
        $data = DB::table('products')->where('id',$id)->first();//Cần được giải thích thêm
        $image = $data->logo;
        unlink($image);
        $product = DB::table('products')->where('id',$id)->delete();//???? ??
        return redirect()->route('product.index')
        ->with('success','Product Delete Successfully');
    }
    public function Show($id){
        $data = DB::table('products')->where('id',$id)->first();//Cần được giải thích thêm
        return view('product.show',compact('data'));
    }
}
