@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">PRIDĖTI STATYMĄ</div>
                    <div class="card-body">
                        <form method="post" action="{{route('betters.store')}}">
                            @csrf
                            <div class="form-group">
                                <label>Vardas</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Pavardė</label>
                                <input type="text" name="surname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Statoma suma</label>
                                <input type="number" name="bet" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Arklys</label>
                                <select class="form-control" name="horse_id">
                                    <option value="0">Pasirinkite</option>
                                    @foreach($horses as $horse)
                                        <option value="{{$horse->id}}">{{$horse->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Pridėti</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
