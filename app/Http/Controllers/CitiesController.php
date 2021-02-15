<?php

namespace App\Http\Controllers;
use App\City;

use Illuminate\Http\Request;

class CitiesController extends Controller
{

    protected $imagePath='uploads/settings/';

    private function validateAccess(){
        if(!auth()->user()->hasRole('admin')){
            abort(404);
        }
    }

    private function getFields(){
        return [
            ['ftype'=>'image','name'=>__("Слика Од Градот ( 200x200 )"),'id'=>"image_up"],
            ['ftype'=>'input','name'=>"Име",'id'=>"name",'placeholder'=>"Додади Име На Град",'required'=>true],
            ['ftype'=>'input','name'=>"Кратко Име На Градот (2-3 Букви)",'id'=>"alias",'placeholder'=>"Внеси Кратко Име На Град -> ПР. NY",'required'=>true],
            ['ftype'=>'input','name'=>"Главен Наслов",'id'=>"header_title",'placeholder'=>"Главен Наслов",'required'=>true],
            ['ftype'=>'input','name'=>"Поднаслов",'id'=>"header_subtitle",'placeholder'=>"Поднаслов",'required'=>true],

        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->validateAccess();
        return view('cities.index', ['setup' => [
            'title'=>"Градови",
            'action_link'=>route('cities.create'),
            'action_name'=>"Додади Нов Град",
            'items'=>City::paginate(10),
            'item_names'=>"Градови"
        ]]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->validateAccess();
        return view('general.form', ['setup' => [
            'title'=>"Нов Град",
            'action_link'=>route('cities.index'),
            'action_name'=>__("Назад"),
            'iscontent'=>true,
            'action'=>route('cities.store'),
            'breadcrumbs'=>[
                [__('Градови'),route('cities.index')],
                [__('Нов'),null]
            ],
        ],
        'fields'=>$this->getFields()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateAccess();
        //Validate first
        $request->validate([
            'name' => ['required', 'string', 'unique:cities,name', 'max:255'],
            'alias' => ['required', 'string', 'unique:cities,alias','string', 'max:255']
        ]);




        $city = City::create([
            'name'=>$request->name,
            'alias'=>$request->alias,
            'image'=>"",
            'header_title'=>$request->header_title,
            'header_subtitle'=>$request->header_subtitle,

        ]);
        $city->save();

        if($request->hasFile('image_up')){
            $city->image=$this->saveImageVersions(
                $this->imagePath,
                $request->image_up,
                [
                    ['name'=>'large','w'=>590,'h'=>590],
                    ['name'=>'medium','w'=>300,'h'=>300],
                    ['name'=>'thumbnail','w'=>200,'h'=>200]
                ]
            );
            $city->update();
        }

        return redirect()->route('cities.index')->withStatus(__('Градот Е Успешно Додаден'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $this->validateAccess();
        $fields=$this->getFields();
        $fields[0]['value']=$city->logo;
        $fields[1]['value']=$city->name;
        $fields[2]['value']=$city->alias;
        $fields[3]['value']=$city->header_title;
        $fields[4]['value']=$city->header_subtitle;

        //dd($option);
        return view('general.form', ['setup' => [
            'title'=>__("Ажурнирај Град")." ".$city->name,
            'action_link'=>route('cities.index'),
            'action_name'=>__("Назад"),
            'iscontent'=>true,
            'isupdate'=>true,
            'action'=>route('cities.update',['city'=>$city->id]),
            'breadcrumbs'=>[
                [__('Градови'),route('cities.index')],
                [$city->name,null]
            ],
        ],
        'fields'=>$fields]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $this->validateAccess();
        $city->name=$request->name;
        $city->alias=$request->alias;
        $city->header_title=$request->header_title;
        $city->header_subtitle=$request->header_subtitle;

        if($request->hasFile('image_up')){
            $city->image=$this->saveImageVersions(
                $this->imagePath,
                $request->image_up,
                [
                    ['name'=>'large','w'=>590,'h'=>590],
                    ['name'=>'medium','w'=>300,'h'=>300],
                    ['name'=>'thumbnail','w'=>200,'h'=>200]
                ]
            );

        }

        $city->update();
        return redirect()->route('cities.index')->withStatus(__('Градот Е Успешно Ажурниран'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $this->validateAccess();
        $city->delete();
        return redirect()->route('cities.index')->withStatus(__('Успешно Избришано'));
    }
}