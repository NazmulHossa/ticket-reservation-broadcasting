@extends('frontend.layout.app')

@section('title', 'Simpleshop-Home')


@section('content')


    <div class="container">

            <h1 class="text-center my-4"> Laravel Session </h1>         
            
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                 {{ session('success') }}
            </div>
            @endif

            @if(session('warning'))
            <div class="alert alert-warning" role="alert">
                 {{ session('warning') }}
            </div>
            @endif

            @if(count($allSessionData) > 0)

                @php 
                    $sl = 1
                @endphp
                <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Session Key</th>
                                <th scope="col">Session Value</th>
                            </tr>
                        </thead>
                        <tbody>

                @foreach($allSessionData as $key=>$value)

                    
                            <tr>
                                <th scope="row">{{ $sl++ }}</th>
                                <td>{{ $key }}</td>
                                <td>{{ is_array($value) ? json_encode($value) : $value }}</td>
                            </tr>
                        

                @endforeach

                </tbody>
                        </table>

            @endif
        
    </div>




@endsection