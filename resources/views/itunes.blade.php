@extends('layout')

@section('content')
    <script>
        function changeUrl () {
            var newArtist = document.getElementById('artist').value;
            location.href = newArtist;
        }
    </script>
<div class="container">
    {{--<form class="form-group">--}}
        <input id="artist" type="text" class="form-control" placeholder="Seach for artists... ex. jackjohnson">
        <div  style="text-align: center; margin: 2px;">
            <button class="btn btn-primary" onclick="changeUrl()">Search</button>
        </div>
    {{--</form>--}}
    <ul class="list-group">
        @foreach($artists as $artist)
            <li class="list-group-item">
                <div style="width: 100%; height: 100px;">
                    <div class="col-lg-10">
                        Artist Name: {{$artist->artistName}}
                        <br>
                        Song Title: {{$artist->trackName}}
                        <br>
                        Genre: {{$artist->primaryGenreName}}
                    </div>
                    <div class="col-lg-2"><img src="{{$artist->artworkUrl100}}"></div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection


