@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">PRIDĖTI ARKLĮ</div>
                    <div class="card-body">
                        <form method="post" action="{{route('horses.store')}}">
                            @csrf
                            <div class="form-group">
                                <label>Vardas</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Laimėtų rungtynių skaičius</label>
                                <input type="number" name="runs" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Dalyvauta rungtynių skaičius</label>
                                <input type="number" name="wins" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Aprašymas</label>
                                <input type="text" name="about" class="form-control tinyMce">
                            </div>
                            <button type="submit" class="btn btn-primary">Pridėti</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
