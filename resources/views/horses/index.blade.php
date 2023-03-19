@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">ARKLIAI</div>
                    <div class="card-body">
                        <table class="table">
                            <form method="post" action="{{ route('horses.index') }}">
                                @csrf
                            </form>
                            <tr>
                                <th>Vardas</th>
                                <th>Dalyvauta rungtynių skaičius</th>
                                <th>Laimėtų rungtynių skaičius</th>
                                <th>Aprašymas</th>
                                <th>Veiksmai</th>
                            </tr>
                            @foreach($horses as $horse)
                                <tr>
                                    <td>{{ $horse->name }}</td>
                                    <td>{{ $horse->runs }}</td>
                                    <td>{{ $horse->wins }}</td>
                                    <td>{!!$horse->about!!}</td>
                                    <td>
                                        <form action="{{route('horses.destroy', $horse->id)}}" method="post">
                                            <a class="btn btn-success" href="{{route('horses.edit', $horse->id)}}">Redaguoti</a>
                                            @csrf
                                            @method('delete')
                                            <input type="submit" class="btn btn-danger" value='Ištrinti'>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div>
                            <a class="btn btn-success" href="{{ route('horses.create')}}">Pridėti</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
