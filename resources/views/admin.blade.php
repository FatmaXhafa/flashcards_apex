@extends('layouts.app')

<title>ApexGMAT</title>

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/flatly/bootstrap.min.css">

<div class="container">
    <div class="row justify-content-center" >
        <h4 class="title" style="font-family: Montserrat">Flashcards from ApexGMAT</h4>       
    </div>
      
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>     
                @can ('add_card')     
                <li>
                    <a href="#">Add Card</a>
                </li>
                @endcan
            </div>  <!-- mx-auto -->
        </div> <!-- </col> -->
    </div> <!-- </row> -->
</div>
@endsection
