@extends('app')
@section('content')


    <div class="container">
        <div class="row justify-content-center">

            <div class="card">
                <div class="card-header">
                    <h5>
                        <b>
                            Posts
                        </b>

                    </h5>

                </div>

                <div class="card-body justify-content-center">
                    <div>
                        <div class="alert alert-success alert-block" id="success-info" style="display: none">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>
                                <p id="info">
                                </p>
                            </strong>
                        </div>

                    </div>




                    <table class="table table-bordered  table-sm ">
                        <thead>
                        <tr>

                            <th scope="col">Title</th>
                            <th scope="col">Body</th>
                            <th scope="col">Author</th>
                            <th scope="col">Last modified</th>


                            </th>

                        </tr>
                        </thead>
                        <tbody>


                        @foreach($posts as $post)

                            <tr>

                                <td> {{$post->title}}</td>
                                <td style="max-width: 3004px"> {{$post->body}}</td>
                                {{--<td> {{$post->user->name}} </td>--}}
                                <td><a style="color: black" href="{{ url('users', $post->user->id) }}">

                                        {{--   <i class="far fa-address-card fa-lg" style="color: black"></i>--}}
                                        {{$post->user->name}}
                                    </a>
                                </td>

                                <td>
                                    {{$post->created_at->format('d-m-Y h:m')}}


                                </td>


                            </tr>

                        @endforeach


                        </tbody>
                    </table>
                    <br>
                    {{$posts->links()}}

                </div>
            </div>
        </div>
    </div>


    <style>

        .w-5 {
            display: none;
        }

        .leading-5 {
            margin-top: 10px;
            margin-left: 75%;

        }

        .z-0 {
            display: inline;
            padding: 10px;
            display: none;
        }
    </style>

    {{-- <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">--}}

@endsection