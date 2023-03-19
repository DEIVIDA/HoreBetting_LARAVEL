@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">REDAGUOTI ARKLĮ</div>
                    <div class="card-body">
                        <form method="post" action="{{route('horses.update', $horse->id)}}">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label>Vardas</label>
                                <input type="text" name="name" class="form-control" value="{{$horse->name}}">
                            </div>
                            <div class="form-group">
                                <label>Dalyvauta rungtynių skaičius</label>
                                <input type="number" name="runs" class="form-control" value="{{$horse->runs}}">
                            </div>
                            <div class="form-group">
                                <label>Laimėtų rungtynių skaičius</label>
                                <input type="number" name="wins" class="form-control" value="{{$horse->wins}}">
                            </div>
                            <div class="form-group">
                                <label>Aprašymas</label>
                                <textarea name="about" rows="10" cols="100" class="form-control tinyMce">{{$horse->about}}
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Išsaugoti</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
