@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

             <div class="card-header">USER ICON UPDATE</div>

                <div class="card-body">
                    @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{session('status')}}
                    </div>
                    @endif
                   <form action="{{route('update-icon')}}" method="POST" enctype="multipart/form-data">
                       
                    @csrf
                    @method('POST')
                        <input name="icon" type="file" class="mb-4 form-control btn-primary">
                        <br>
                        <input  type="submit" class="btn btn-primary float-left" value="upload your avatar">            
                    </form>
                    <a href="{{route('clear-icon')}}" class="btn btn-danger float-right">Remove yuor avatar</a>
                </div>
            </div>
            <br><br>
            <div class="card">

                <div class="card-header">user icon </div>
                @if (Auth::user() -> icon)
                   <div class="card-body">
                      <img class="img-thumbnail" src="{{asset('storage/icon/' . Auth::user() -> icon )}}" style="width:150px;height:150px" alt="">
                   </div>
               </div>
               @else
                <div class="card-body">
                    <img class="img-thumbnail" src="{{asset('storage/imgs/unknow.jpg')}}" style="width:150px;height:150px" alt="">
                </div>
               @endif
        </div>
    </div>
</div>
@endsection
