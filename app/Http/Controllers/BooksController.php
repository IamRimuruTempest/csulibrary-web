<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BooksController extends Controller
{
    public function index() {
        return DB::connection('mysql')
            ->table('books')
            ->leftJoin('ratings', 'ratings.isbn', '=', 'books.isbn')
            ->whereNull('books.deleted_at')
            ->orderBy('created_at', 'DESC')
            ->select([
                'books.*',
                'ratings.average'
            ])
            ->get();
    }


    public function get_highest_rating() {
         return DB::connection('mysql')
             ->table('ratings')
             ->join('books', 'books.isbn', '=', 'ratings.isbn')
             ->whereNull('books.deleted_at')
             ->orderByDesc('ratings.average')
             ->select(['books.*', 'ratings.average'])
             ->take(5)
             ->get();
    }

    public function getBookByID(Request $request) {
         return DB::connection('mysql')
            ->table('books')
            ->where('id', $request->id)
            ->get();
    }

    

    public function update_ratings(Request $request) {

            $rating = 'rating' . $request->rating;

            DB::connection('mysql')
            ->table('ratings')
            ->where('isbn', $request->isbn)
            ->update([
                 $rating => DB::raw($rating . '+' . $request->rating),
                'total_add' => DB::raw('rating1 + rating2 + rating3 + rating4 + rating5'),
                'total_mul' => DB::raw('(1 * rating1) + (2 * rating2) + (3 *rating3) + (4 * rating4) + (5 * rating5)'),
                'total_rated' => DB::raw('total_rated + 1'),
                'average' => DB::raw('total_mul / total_add')
            ]);

            DB::connection('mysql')
            ->table('returned_books')
            ->where('id', $request->rbid)
            ->where('isbn', $request->isbn)
            ->update([
                'rated' => 1,
                'total' =>  $request->rating
            ]);
    }

    public function edit_ratings(Request $request) {
          

          $rating = 'rating' . $request->oldrating;
          $newrating = 'rating' . $request->rating;
            
    
          DB::connection('mysql')
            ->table('returned_books')
            ->where('id', $request->rbid)
            ->where('isbn', $request->isbn)
            ->update([
                'total' =>  $request->rating
            ]);

        DB::connection('mysql')
            ->table('ratings')
            ->where('isbn', $request->isbn)
            ->update([
                 $rating => DB::raw($rating . '-' . $request->oldrating),
                 $newrating => DB::raw($newrating . '+' . $request->rating),
                'total_add' => DB::raw('rating1 + rating2 + rating3 + rating4 + rating5'),
                'total_mul' => DB::raw('(1 * rating1) + (2 * rating2) + (3 *rating3) + (4 * rating4) + (5 * rating5)'),
                'average' => DB::raw('total_mul / total_add')
            ]);

    }

    public function getReturnedBookByID(Request $request) {
         return DB::connection('mysql')
            ->table('returned_books')
            ->where('isbn', '=', $request->bookid)
            ->where('student_id', '=' ,$request->userid)
            ->get();
    }


    // public function getUserRating(Request $request) {
       
    //      return DB::connection('mysql')
    //         ->table('returned_books')
    //         ->where('isbn', '=', $request->isbn)
    //         ->where('student_id', '=' ,$request->userid)
    //         ->select([
    //             'total',
    //             'reviewed'
    //         ])
    //         ->get();
    // }

    public function getAllRatings(Request $request) {
         return DB::connection('mysql')
            ->table('ratings')
            ->where('isbn', '=', $request->isbn)
            ->select([
                'rating1',
                'rating2',
                'rating3',
                'rating4',
                'rating5',
                'average',
                'total_rated'
            ])
            ->get();
    }


    public function book_reviews(Request $request) {
     
        return DB::connection('mysql')
            ->table('reviews')
            ->join('accounts', 'reviews.student_id', '=', 'accounts.id')
            ->join('returned_books', 'reviews.student_id', '=', 'returned_books.student_id')   
            ->where('book_id', '=', $request->bookid)
            ->where('returned_books.isbn' , '=', $request->isbn)
            ->select([
                'accounts.first_name',
                'accounts.middle_name',
                'accounts.last_name',
                'accounts.suffix',
                'accounts.image',
                'returned_books.total',
                'reviews.id',
                'reviews.student_id',
                'reviews.review',
            ])
            ->get();
           
    }

    public function insert_review(Request $request) {
     
         DB::connection('mysql')
            ->table('reviews')
            ->insert([
                'book_id' => $request->bookid,
                'student_id' => $request->studentid,
                'review' => $request->review,
                'created_at' => new \Datetime,
             ]);

         DB::connection('mysql')
            ->table('ratings')
            ->where('isbn', '=', $request->isbn)
            ->update([
                'total_rated' => DB::raw('total_rated +' . 1),
             ]);

         DB::connection('mysql')
            ->table('returned_books')
            ->where('isbn', '=', $request->isbn)
            ->where('student_id', '=', $request->studentid)
            ->update([
                'reviewed' => 1,
             ]);
    }

    public function update_review(Request $request) {
     
         DB::connection('mysql')
            ->table('reviews')
            ->where('id', '=', $request->id)
            ->update([
                'review' => $request->review,
             ]);
    }



    public function book_reservations(Request $request) {
       return DB::connection('mysql')
            ->table('reservations')
            ->where('isbn', '=', $request->isbn)
            ->whereNull('student_id')
            ->get();
    }


    public function insert_reservations(Request $request) {

            DB::connection('mysql')
            ->table('reservations')
            ->where('isbn', '=', $request->isbn)
            ->update([
                'student_id' => $request->student_id,
                'created_at' => new \DateTime()
            ]);

    }

    public function update_user_reservation(Request $request) {

            DB::connection('mysql')
            ->table('reservations')
            ->where('isbn', '=', $request->isbn)
            ->update([
                'student_id' => NULL
            ]);
    }

    public function get_user_reservation(Request $request) {
       return DB::connection('mysql')
            ->table('reservations')
            ->join('books', 'books.isbn', '=', 'reservations.isbn')
            ->where('student_id', '=', $request->student_id)
            ->select([
                'books.*',
                'reservations.created_at as date_reserved',
                'reservations.id as uid'
            ])
            ->get();
    }
}
