@extends('app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        <h5 id="group-header">
                            <b> {{$user->name}} </b>
                            <br>


                        </h5>


                        <b>Email:</b> {{$user->email}} <br>

                        <b>City:</b> {{$user->address['city']}} <br>
                        <b>Works for: </b> {{$user->company['name']}} <br>

                        <br>



                    <div class="card-header">
                        <h5 id="group-header">
                            All posts by {{$user->name}}




                        </h5>
                        <div>

                            <ul class="list-group">

                                @foreach($user->posts as $post)

                                    <li class="list-group-item">
                                        <a style="color: black" href="{{ url('posts', $post->id) }}">

                                            {{--   <i class="far fa-address-card fa-lg" style="color: black"></i>--}}
                                            {{$post->title}}
                                        </a>
                                    </li>


                                @endforeach
                            </ul>


                        </div>
                    </div>
                </div>
            </div>
        </div>










@endsection