<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    //①（M）Product Modelを呼び出す
    //②（C）ContorollerからBladeに渡す
    //③（V）Bladeで表示する
    
    /**
     * 商品一覧を表示する
     * 
     * @return view
     */
    public function index(){
   
        $products = Product::all();

       
       

        //return view('product.list',['item_list'=> $item_list]);
       return view('product.list',['products' => $products]);
   } 
   //function creaate(){
      // echo 'create';
  // }

    /**
     * 商品詳細を表示する
     * @param int $id
     * @return view
     */
    public function detail($id){
   
        $product = Product::find($id);
        
       
        if (is_null($product)) {
            \Session::flash('err_msg','データがありません。');
            return redirect(route('index'));

        }

       return view('product.detail',
        ['product' => $product]);

   } 

    /**
     * 商品登録画面を表示する
     * 
     * @return view
     */


public function create() {

    return   view('product.form');
}

    /**
     * 商品を登録する
     * 
     * @return view
     */


    public function store(ProductRequest $request) {
        
        //商品のデータを受け取る
        $inputs=$request->all();

        \DB::beginTransaction();

        try{
         //商品を登録
         Product::create($inputs);
         \DB::commit();
        } catch(\Throwable $e){
            \DB::rollback();
            abort(500);

        }
       

        \Session::flash('err_msg','商品を登録しました');
        return redirect(route('index'));
        

    }


    /**
     * 商品編集フォームを表示する
     * @param int $id
     * @return view
     */
    public function edit($id){
   
        $product = Product::find($id);
        
       
        if (is_null($product)) {
            \Session::flash('err_msg','データがありません。');
            return redirect(route('index'));

        }

       return view('product.edit',
        ['product' => $product]);

   } 


     /**
     * 商品を更新する
     * 
     * @return view
     */


    public function update(ProductRequest $request) {
        
        //商品のデータを受け取る
        $inputs=$request->all();

        

        \DB::beginTransaction();

        try{
         //商品を登録
        $product =  Product::find($inputs ['id']);
         \DB::commit();
        } catch(\Throwable $e){
            \DB::rollback();
            abort(500);

        }
       

        \Session::flash('err_msg','商品を登録しました');
        return redirect(route('index'));
        

    }


   }





    