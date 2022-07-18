<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\view;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function get()
    {
        return view(  'welcome', ['categories' => Category::all()]);
    }


    public function save(Request $request)
    {
        DB::beginTransaction();
        try{
            $category = new Category($request->all());
            $category->save();
            DB::commit();
            return response()->json([
                'saved' => true,
                'errors' => null,
                'category' => $category,
                'categories' => Category::all()
            ], status: 200);
            
        } catch(\Exception $e){
           DB::rollBack(); 
           return response()->json([
            'saved' => false,
            'errors' => $e->getMessage(),
            'category' => null
           ], status: 500);
            
        }
    }


    public function update(Category $category, Request $request)
    {
        DB::beginTransaction();
        try{
            
            $category->update($request->all());

            DB::commit();
            return response()->json([
                'updated' => true,
                'errors' => null,
                'categories' => Category::all()
            ], status: 200);
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json([
                'updated' => false,
                'errors' => $e->getMessage(),
                'categories' => null
            ], status: 500);
        }
    }


    public function Delete(Category $category)
    {
        $category->delete();
        return response()->json([
            'deleted' => true,
            'errors' => null,
            'categories' => Category::all()
        ], status:200);

    }
};
