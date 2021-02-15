@extends('layouts.app', ['title' => __('Подесувања')])

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
</div>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Подесувања') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <!--<a href="{{ route('restorants.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>-->
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!--<h6 class="heading-small text-muted mb-4">{{ __('Settings information') }}</h6>-->
                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                        <form method="post" action="{{ route('settings.update', $settings->id) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="nav-wrapper">
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-bullet-list-67 mr-2"></i>{{ __ ('Информации На Сајтот') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-image mr-2"></i>{{ __ ('Слики') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-ui-04 mr-2"></i>{{ __ ('Линкови') }}</a>
                                    </li>


                                </ul>
                            </div>
                            <br/>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                        @include('partials.input',['id'=>'site_name','name'=>'Име На Сајтот','placeholder'=>'Site Name here ...','value'=>$settings->site_name, 'required'=>true])
                                        @include('partials.input',['id'=>'site_description','name'=>'Дескрипција На Сајтот','placeholder'=>'Site Description here ...','value'=>$settings->description, 'required'=>true])
                                        @include('partials.input',['id'=>'header_title','name'=>'Главен Наслов','placeholder'=>'Header Title here ...','value'=>$settings->header_title, 'required'=>true])
                                        @include('partials.input',['id'=>'header_subtitle','name'=>'Под Наслов','placeholder'=>'Header Subtitle here ...','value'=>$settings->header_subtitle, 'required'=>true])
                                        <br/>
                                        <!--@include('partials.input',['id'=>'typeform','name'=>'Register Link','placeholder'=>'Link to typeform ...','value'=>$settings->typeform, 'required'=>false])-->
                                        @include('partials.input',['id'=>'delivery','name'=>'Цена На Достава - Фиксна','placeholder'=>'Fixed delivery','value'=>$settings->delivery, 'required'=>false])
                                    </div>
                                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                        <div class="row">
                                            <?php
                                                $images=[
                                                    ['name'=>'site_logo','label'=>__('Лого'),'value'=>config('global.site_logo'),'style'=>'width: 200px;'],
                                                    ['name'=>'search','label'=>__('Ковер'),'value'=>config('global.search'),'style'=>'width: 200px;'],
                                                    ['name'=>'restorant_details_image','label'=>__('Стандард Слика'),'value'=>config('global.restorant_details_image'),'style'=>'width: 200px;'],
                                                    ['name'=>'restorant_details_cover_image','label'=>__('Детали На Ковер Сликата'),'value'=>config('global.restorant_details_cover_image'),'style'=>'width: 200px;']
                                                ]
                                            ?>
                                            @foreach ($images as $image)
                                                <div class="col-md-4">
                                                    @include('partials.images',$image)
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                                        <h6 class="heading-small text-muted mb-4">{{ __('Линкови На Социјални Мрежи') }}</h6>
                                        @include('partials.input',['id'=>'facebook','name'=>'Facebook','placeholder'=>'Внесете Facebook Линк Овде ...','value'=>$settings->facebook, 'required'=>false])
                                        @include('partials.input',['id'=>'instagram','name'=>'Instagram','placeholder'=>'Внесете Instagram Линк Овде ...','value'=>$settings->instagram, 'required'=>false])
                                        <br/>
                                        <h6 class="heading-small text-muted mb-4">{{ __('Мобилна Апликација') }}</h6>
                                        @include('partials.input',['id'=>'mobile_info_title','name'=>'Инфо Наслов','placeholder'=>'Внесете Наслов Овде ...','value'=>$settings->mobile_info_title, 'required'=>false])
                                        @include('partials.input',['id'=>'mobile_info_subtitle','name'=>'Инфо Поднаслов','placeholder'=>'Внесете Поднаслов Овде ...','value'=>$settings->mobile_info_subtitle, 'required'=>false])
                                        <br/>
                                        @include('partials.input',['id'=>'playstore','name'=>'Play Store','placeholder'=>'Внесете Play Store Линк Овде ...','value'=>$settings->playstore, 'required'=>false])
                                        @include('partials.input',['id'=>'appstore','name'=>'App Store','placeholder'=>'Внесете App Store Линк Овде ...','value'=>$settings->appstore, 'required'=>false])
                                    </div>


                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">{{ __('Зачувај') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br/><br/>
</div>
@endsection
