<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;

class VoteController extends Controller
{
		public function index() {
			$songs = Song::orderBy('elo', "DESC")->take(5)->get();
			return view('vote.vote', compact('songs'));
		}
		public function getSongs() {
			$song1 = Song::inRandomOrder()->first();
			$song2 = Song::inRandomOrder()->where('id', '!=', $song1->id)->first();
			// $numRec = count(Song::all());
			// $randNum = rand(1, $numRec);
			// $song1 = Song::find($randNum);
			// $numRec1 = count(Song::all());
			// $randNum1 = rand(1, $numRec1);
			// $song2 = Song::find($randNum1);
			return compact("song1", "song2");
		}

		public function updateElo(Request $request) {
			$song = Song::find($request["id"]);
			$song->elo = $request["elo"];
			$song->save();
		}
}
