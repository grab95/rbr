@extends('app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        <h4 id="group-header">
                            <b> Post details </b>
                            <br>


                        </h4>


                        <b>Author:</b>
                        <a style="color: black" href="{{ url('users', $post->user->id) }}">

                            {{$post->user->name}}
                        </a>
                        <br>


                        <br>


                        <div class="card-header">
                            <h5 id="group-header">


                            </h5>
                            <div>

                                <ul class="list-group">
                                    <li class="list-group-item">
                                 <b>Title: </b>       {{$post->title}}

                                    </li>
                                    <li class="list-group-item">
                                   <b>Body: </b>     {{$post->body}}

                                    </li>
                                    <li class="list-group-item">
                                  <b>Last modified</b>      {{$post->created_at->format('d-m-Y h:m')}}

                                    </li>

                                </ul>


                            </div>
                        </div>
                    </div>
                </div>
            </div>










@endsection