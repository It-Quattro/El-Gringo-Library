<?php

namespace App\Http\Controllers;

use App\Books;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use App\Quotation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class BooksController extends Controller
{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index()
		{
			if (Auth::check()) {
				$books = DB::table('books')->distinct()->get();
				return view('library/books', [
						'booksBDD' => $books
				]);
			}else{
				return view('welcome');
			}

			
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create()
		{
			if($_POST['name'] != "" && $_POST['description'] != "" &&  $_POST['author'] != ""){
				if($_POST['available'] == "true" || $_POST['available'] == "1"){
					Books::create([
						'name' => $_POST['name'],
						'description' =>  $_POST['description'],
						'author' =>  $_POST['author'],
						'available' =>  true,
					]);
				}else if($_POST['available'] == "false" || $_POST['available'] == "0"){
					Books::create([
						'name' => $_POST['name'],
						'description' =>  $_POST['description'],
						'author' =>  $_POST['author'],
						'available' =>  false,
					]);
				}
			}

			$books = DB::table('books')->distinct()->get();

			return view('library/books', [
					'booksBDD' => $books
			]);
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function update($id)
		{
			var_dump($_POST);
			die;
			DB::table('books')->where('id', $book)->update();
			$books = DB::table('books')->distinct()->get();

			return view('books', [
					'booksBDD' => $books
			]);
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int  $id
		 * @return \Illuminate\Http\Response
		 */
		public function destroy($book)
		{
			DB::table('books')->where('id', $book)->delete();
			$books = DB::table('books')->distinct()->get();

			return view('library/books', [
					'booksBDD' => $books
			]);

		}
}