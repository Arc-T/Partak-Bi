@extends('companies.layouts.master')

@section('title', 'داشبورد - شاخص مشتری ها')

@section('main_content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>نمایش کلی</h4>
                </div>
                <div class="card-body">
                    <div id="indicator-total">

                    </div>
                </div>
            </div>
        </div>
        @if (count($graphs['graph']) > 1)
            @foreach ($graphs['graph'] as $graph)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            @isset($graph['name'])
                            <h4>{{ $graph['name'] }}</h4>
                            @endisset
                        </div>
                        <div class="card-body">
                            <div id="indicator{{ $loop->iteration - 1 }}">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        {{-- <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>نتیجه نمودار</h4>
            </div>
            <div class="card-body">
                <div id="indicator"></div>
            </div>
        </div>
    </div> --}}
    @section('js_files')
        <script src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
        @include('companies.components.' . $graph_type . '_indicator');
    @endsection

@endsection
