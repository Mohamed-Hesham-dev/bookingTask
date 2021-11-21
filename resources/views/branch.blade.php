@extends('App.app')
@section('content')

<nav class="navbar bg-light">


    <h1>All Branch</h1>
          <ul>
              @foreach ($branches as $branch)
              <li class="nav-item">
                  <a class="nav-link" href="{{url('branch/'.$branch->id)}}"><i  class="fa fa-tshirt"></i>{{$branch->name}}</a>
              </li>
              @endforeach
          </ul>

      </nav>
    </div>
@endsection