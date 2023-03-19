@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-10  ">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-dark"><h3>Redaguoti:</h3></li>
                </ul>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <form action="{{route('betters.update', $better->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            Pasirinkite arklį:
                            <br>
                            <select class="form-control" name="horse_id">
                                @foreach($horses as $horse)
                                    <option value="{{$horse->id}}"
                                            @if($horse->id==$better->horse_id)selected="selected"@endif>{{$horse->name}} </option>
                                @endforeach
                            </select>
                            <br>
                            Vardas: <br>
                            <input type="text" value="{{$better->name}}" name="name"> <br>
                            Pavardė: <br>
                            <input type="text" value="{{$better->surname}}" name="surname"> <br>
                            Statoma suma eur.: <br>
                            <input type="number" value="{{$better->bet}}" name="bet"> <br>
                            <br>
                            <input class="btn btn-warning btn-sm" type="submit" value="Išsaugoti">
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
