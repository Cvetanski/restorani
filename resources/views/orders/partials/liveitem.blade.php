<div class="row align-items-center" v-cloak>
    <div :class="item.pulse"></div>
    <div class="col ml--2">
        <small> @{{ item.last_status }}</small><br />
        <small> @{{ item.time }}</small>
        <h4 class="mb-0">
            <a href="#!">#@{{ item.id }} @{{ item.restaurant_name }}</a>
        </h4>
{{--        <small>@{{ item.client }}</small><br />--}}
{{--        <small>@{{ item.price }}</small><br />--}}
    </div>
    <div class="col-auto">
{{--        @{{ item.link }}--}}

{{--        @{{ item.operator_id }}--}}

{{--                 @{{ item.operator_status }}--}}

{{--                @{{ item.operator_status }}--}}

{{--        <a class="btn btn-sm btn-danger" style="color: white" :href="item.link" >Види Нарачка </a>--}}


        <a class="btn btn-sm btn-warning" style="color: white" :href="item.link" >Превземи нарачка </a>




    <!--<button type='button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-default">
{{--      {{ __('Details')}}--}}
    </button> -->

    </div>
  </div>



