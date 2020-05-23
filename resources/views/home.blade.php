@extends('layouts.app')

<title>ApexGMAT</title>

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/flatly/bootstrap.min.css">

<div class="container">
    <div class="row justify-content-center" >
        <h1 class="title" style="font-family: Montserrat">Flashcards from ApexGMAT</h1>       
    </div>
      
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mx-auto" style="width: 400px;">                 
                <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">             
                    <div class="card-header text-center" align="center" style="font-family: Montserrat">
                        <span class="badge badge-primary" align = "center" >Ranking: {{ $score }}</span>
                        <h3>{{ $card->original }}</h3>
                        <div>                                                                
                            @switch(true)
                                @case($card->difficulty <= 0.0625): 
                                    <span class="badge badge-success">Simple </span>
                                    @break
                                @case($card->difficulty > 0.0625 && $card->difficulty <= 0.25)
                                    <span class="badge badge-success">Easy </span>
                                    @break
                                @case($card->difficulty > 0.25 && $card->difficulty <= 1)
                                    <span class="badge badge-success">Medium </span>
                                    @break
                                @case($card->difficulty > 1 && $card->difficulty <= 8 )
                                    <span class="badge badge-success">Difficult </span>
                                    @break
                                @case($card->difficulty > 8)
                                    <span class="badge badge-success">Excruciating </span>
                                    @break
                                @default
                                    {{-- Default case... --}}
                            @endswitch
                        </div>   
                        
                        
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="col-md-12" method="POST" action="/">
                            @csrf
                            
                            <input type="hidden" name="id" value="{{  $card->id }}">
                            <div class="form-group">
                                 <input type="text" name="target" autocomplete="off" class="form-control" required /> 
                            </div>
                            <div class="form-group text-center">                                 
                                 <button type="submit" value="check" class="btn btn-outline-success">Next</button> 
                                {{--  <button type="submit" value="next" class="btn btn-outline-success">Next</button> --}}
                            
           {{--                 @if (isset($_POST['check']))
                                    <button type="submit" value="next" class="btn btn-outline-success" disabled="false">Next</button>
                                    <button type="submit" value="check" class="btn btn-outline-success" disabled="true">Check</button> 
                                @elseif (isset($_POST['next']))
                                    <button type="submit" value="next" class="btn btn-outline-success" disabled="true">Next</button>
                                    <button type="submit" value="check" class="btn btn-outline-success" disabled="false">Check</button> 
                                @endif     --}}

                                {{-- <button type="button" class="btn btn-outline-success" action="{{ route('endview') }}" method="GET">End</button>  --}}
                            </div>   
                        </form>
                      
                        <!-- errors go here -->
                        <div class="text-center"> 
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <p class="badge badge-danger">{{ $error }}</p>
                                @endforeach
                            @endif
                        </div>
                    </div> <!-- </card-body> -->
                </div> <!-- </card> -->
            </div>  <!-- mx-auto -->
                <div class="mx-auto" style="width: 200px;">
                    <h5>{{$result ?? ''}}</h5>
                </div>
        </div> <!-- </col> -->
    </div> <!-- </row> -->
</div>
@endsection
