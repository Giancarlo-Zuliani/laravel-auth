@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">user icon update</div>

                <div class="card-body">
                    @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{session('status')}}
                    </div>
                    @endif
                   <form action="{{route('update-icon')}}" method="POST" enctype="multipart/form-data">
                       
                    @csrf
                    @method('POST')
                        <input name="icon" type="file">
                        <br>
                        <input  type="submit" value="submit">            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
