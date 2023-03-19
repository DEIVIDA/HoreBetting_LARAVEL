@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">STATYMAI</div>
                    <div class="card-body">
                        <div class="form-group">
                            <form class="container" action="{{route('betters.filter')}}" method="post">>
                                @csrf
                                <label>Filtruoti pagal šalį:</label>
                                <select name="horse_id" class="form-control">
                                    <option value="0" @if($horse_id==0)selected="selected"@endif>---</option>
                                    @foreach ($horses as $horse)
                                        <option value="{{ $horse->id }}"
                                                @if($horse->id==$horse_id)selected="selected"@endif>{{ $horse->name }}</option>
                                    @endforeach
                                </select>
                                <input type="submit" class="btn btn-success" value="Filtruoti">
                            </form>
                        </div>
                        <table class="table">
                            <tr>
                                <th>Vardas</th>
                                <th>Pavardė</th>
                                <th>Statoma suma eur.</th>
                                <th>Arklys</th>
                                <th>Veiksmai</th>
                            </tr>
                            @foreach($betters as $better)
                                <tr>
                                    <td>{{ $better->name }}</td>
                                    <td>{{ $better->surname }}</td>
                                    <td>{{ $better->bet }}</td>
                                    <td>{{ $better->horse->name}}</td>
                                    <td>
                                        <form action="{{route('betters.destroy', $better->id)}}" method="post">
                                            <a class="btn btn-success" href="{{route('betters.edit', $better->id)}}">Redaguoti</a>
                                            @csrf
                                            @method('delete')
                                            <input type="submit" class="btn btn-danger" value='Ištrinti'>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div>
                            <a class="btn btn-success" href="{{ route('betters.create')}}">Pridėti</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
