<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Cards;
use App\User;
use Auth;

class QuizController extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



	public function index() 
	{
		$card = User::find(Auth::user()->id)->cards()->first();
		return view('home', ['card' => $card, 'score' => $this->generateScore()]);
	}



	public function store() 
	{
		$data = request()->validate([
			'target' => 'required',
			'id' => 'required'
		]);

		$user = User::find(Auth::user()->id);
		$card = Cards::find(request("id"));
		
		
		// if it is correct
		if ($card->target == request("target")) { 		 	
     		$difficulty = $card->difficulty / 2;

	     		// get the next random card 
			 $randomCard = DB::table('cards')
		 				 ->where('difficulty', '>=', $card->difficulty)
		  				 ->inRandomOrder()
	            		 ->first(); 
		    $result	= "That was correct!"; 
		 
		} 
		//if it is incorrect	
		else {			
			$difficulty = $card->difficulty * 2;
				// get the next random card 
			$randomCard = DB::table('cards')
			  				 ->where('difficulty', '<=', $card->difficulty)
			  				 ->inRandomOrder()
		              		 ->first();
		   $result = "Oops, try again!";
				
		}
			// $rangemax = $card->rangemax + $card->difficulty;
			// $targetdifficulty = rand(0, $score);

			// foreach ($card->id as $value) {
			// 	if ($rangemax < $targetdifficulty)
			// 		$randomCard = DB::table('cards')
		 // 						 ->where('difficulty', '<', $card->rangemax)
		 // 						 ->inRandomOrder()
	  //            				 ->first(); 
	  //           else
			// 	$randomCard = DB::table('cards')
			// 				->inRandomOrder()
	  //            			 ->first(); 
			// }
			


 		// if the random card exists in the middle table
	 	 $userCard = $user->cards()->where('card_id', $randomCard->id)->first();
        
		// If the user is selected for the first time this card,
 		// then add it to the pivot table (card_user)
	 	if ($userCard == null) {
	 		$user->cards()->attach($randomCard->id);
	 	}  
	 	// determine the new card  
		$newCard = $user->cards()->where('card_id', $randomCard->id)->first(); 

		// update difficulty 
		$user->cards()->where('card_id', $card->id)->first()->update([
 			'difficulty' => $difficulty
 		]); 

		return view('home', ['card' => $newCard, 'score' => $this->generateScore(), 'result' => $result]); 
	
	} // </store>

	//think about changing max with score for the algorithm 
	private function getRandomCard($max) 
	{
		return Cards::where('id', rand(1, rand(1, $max)))->first();
	}

	private function getAnotherRandom() {
		$anotherRandom = rand(0,$score);
		return $anotherRandom;
		dd($anotherRandom);
	}

	private function generateScore() 
	{
		$score = 0;

		$userCards = User::find(Auth::user()->id)->cards()->get(); 

		foreach ($userCards as $card) {
			$score += $card->difficulty;
		}
		return $score;
	}

}