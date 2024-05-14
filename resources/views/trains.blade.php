@extends('layout.main')

@section('content')


    <h1>I miei Treni</h1>

<table class="table container">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Train Code</th>
        <th scope="col">Departure</th>
        <th scope="col">Departure Time</th>
        <th scope="col">Arrival</th>
        <th scope="col">Arrival Time</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($trains as $train)
            <tr>
                <th scope="row">{{ $train->id }}</th>
                <td>{{ $train->train_code }}</td>
                <td>{{ $train->departure_station }}</td>
                <td>{{ $train->departure_time }}</td>
                <td>{{ $train->arrival_station }}</td>
                <td>{{ $train->arrival_time }}</td>
          </tr>
        @endforeach

    </tbody>
  </table>

  <div class="container">
    {{$trains->links()}}
  </div>

@endsection

@section('title')
    Trains
@endsection
