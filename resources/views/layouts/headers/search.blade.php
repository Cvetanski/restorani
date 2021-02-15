<style>
    @media (max-width: 991.98px)
        .section-profile-cover {
            height: 150px !important;
        }

        element.style {
        }
        .mb-5, .my-5 {
            margin-bottom: 3rem!important;
        }
        .mt-5, .my-5 {
            margin-top: 5rem!important;
        }
</style>
<section class="section-profile-cover section-shaped my-0 d-md-none d-lg-block d-lx-block">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-7 my-5">

{{--        </div>--}}
{{--        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-5 my-5">--}}
            <!-- Circles background -->
            <img class="bg-image" src="{{ config('global.search') }}" style="width: 100%;">

        </div>
      </div>
</section>


{{--<section class="section" style="padding-bottom: 0rem;">--}}
{{--    <div class="container mt--350">--}}


{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}




{{--        </div>--}}
{{--    </div>--}}
{{--    </div>--}}
{{--</section>--}}
<div class="container" style="    padding-top: 2%;
    padding-bottom: 2%;">


<form>
    <div class="form-group row">
        <div class="input-group col-md-8">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-basket"></i></span>
            </div>
            <input name="q" class="form-control lg" value="{{ request()->get('q') }}" placeholder="Пребарај" type="text">
        </div>
        <div class="col-md-4">
            <button type="submit"  style="    background: #ed1c24;    border: #ed1c24; width: 100%;" class="btn btn-default">Пронајди го совршениот оброк</button>
        </div>
    </div>


</form>
<h1 class=" my-0 d-md-none d-lg-block d-lx-block d-none text-center"><?php echo config('global.header_title') ?></h1>
<p class=" my-0 d-md-none d-lg-block d-lx-block d-none text-center"><?php echo config('global.header_subtitle') ?></p>
</div>
