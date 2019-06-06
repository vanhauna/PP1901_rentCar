<div class="col-lg-9">
    <div class="row">
        @foreach($vehicles as $vehicle)
            <div id="card" class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top"
                                     src="https://forgiato.com/wp-content/uploads/2015/03/bentley-flying-forgiato-32015-8-300x300.jpg"
                                     alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="#">{!! $vehicle->name !!}</a>
                        </h4>
                        <h5><strong>{{ trans('messages.ve_status') }}
                                : </strong>{!! $vehicle->ve_status_id !!}</h5>
                        <h5><strong>{{ trans('messages.status') }}: </strong>{!! $vehicle->status_id !!}
                        </h5>
                        <h5><strong>{{ trans('messages.price') }}: </strong>{!! $vehicle->price !!}
                            VND/1h</h5>
                        <h5><strong>{{ trans('messages.rating') }}:
                                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;
                                </small></h5>
                        <a class="btn btn-info" href="">{{ trans('messages.book') }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>