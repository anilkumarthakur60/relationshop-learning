<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Enum\DynamicApiRequest;
use Illuminate\Support\Facades\Schema;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return Response
     */
    public function store(StoreProductRequest $request)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function show(Product $product)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function edit(Product $product)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductRequest $request
     * @param Product $product
     * @return Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return Response
     */
    public function destroy(Product $product)
    {
        //
    }


    public function dynamicTable(Request $request,DynamicApiRequest  $dynamicApiRequest)
    {

        $this->validate($request, [
            'page' => 'nullable|integer',
            'perPage' => 'nullable|integer',
            'sortBy' => 'nullable|string',
            'sortDesc' => 'nullable|boolean',
            'filter' => 'nullable|string',
            'columns'=>'nullable|string',
        ]);


        $columns=explode(',',$request->query('columns',"name"));
        $flatColumns=collect($columns)->flatten()->toArray();
        $this->checkFillable(app('App\\Models\\'.$dynamicApiRequest->name),$flatColumns,);

        return (app('App\\Models\\'.$dynamicApiRequest->name)::select($flatColumns))
            ->paginate($request->query('per_page',10));
    }
    private  function  checkFillable($model,$columns){
        $tcolumn = Schema::getColumnListing($this->tableName($model));
        $diff=array_diff($columns,$tcolumn);
        if (count($diff)>0){
            abort(400,'Invalid columns '.implode(',',$diff));
        }

    }

    private function tableName($model){
        return $model->getTable();
    }
}
