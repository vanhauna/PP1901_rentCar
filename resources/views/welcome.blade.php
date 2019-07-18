@extends('layouts.app')
@section('content')
    <!-- Page Content -->
    <div class="container">
        <form class="row" action="" method="get">
            <div class="col-md-10">
                <input class="form-control" type="text" placeholder="{{ trans('messages.search placeholder') }}" aria-label="Search">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-success">{{ trans('messages.search') }}</button>
            </div>
        </form>
        <div class="row">
            <div class="col-md-3">
                <h3>{{ trans('messages.menu') }}</h3>
                <div class="list-group">
                    @foreach($types as $type)
                        <a href="javascript:;" class="list-group-item"
                           id="{!! $type->id !!}">{!! $type->name !!}</a>
                    @endforeach
                </div>
            </div>
            <div id="showinfo">
                <br><br><br>
                <div class="col-md-9">
                    <div class="row">
                        @foreach($vehicles as $vehicle)
                            <div id="card" class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100">
                                    <a href="{!! route('vehicleDetail', $vehicle['id']) !!}"><img class="card-img-top"
                                                     src="https://forgiato.com/wp-content/uploads/2015/03/bentley-flying-forgiato-32015-8-300x300.jpg"
                                                     alt=""></a>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="{!! route('vehicleDetail', $vehicle['id']) !!}">{!! $vehicle['name'] !!}</a>
                                        </h4>
                                        <h5><strong>{{ trans('messages.ve_status') }}
                                                : </strong>{!! $vehicle['ve_status']['name'] !!}</h5>
                                        <h5><strong>{{ trans('messages.status') }}
                                                : </strong>{!! $vehicle['status']['name'] !!}
                                        </h5>
                                        <h5><strong>{{ trans('messages.price') }}: </strong>{!! $vehicle['price'] !!}
                                            VND</h5>
                                        <h5><strong>{{ trans('messages.rating') }}:</strong>
                                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;
                                            </small>
                                        </h5>
                                        <form action="{!! route('addCart') !!}" method="post">
                                            <input type="hidden" name="vehicle_id" value="{!! $vehicle['id'] !!}">
                                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                            <input type="submit" value="{{ trans('messages.book') }}"
                                                   class="btn btn-info">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $vehicles->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.list-group-item').click(function () {
                var id_type = $(this).attr('id');
                $.ajax({
                    type: "GET",
                    url: "/ajax",
                    data: {id: id_type},
                    dataType: "html",
                    success: function (data) {
                    }
                }).done(function (data) {
                    $('#showinfo').html(data);
                });
            });
        })
    </script>
@endsection
