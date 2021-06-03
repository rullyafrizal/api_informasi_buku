<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function login () {
        return view ('admin.login');
    }

    public function register () {
        return view('admin.register');
    }

    public function books () {
        $books = Book::all();
        return view('admin.books', compact('books'));
    }

    public function authors () {
        $authors = Author::all();
        return view('admin.authors', compact('authors'));
    }

    public function createBook () {
        $authors = Author::all();
        return view('admin.create_books', compact('authors'));
    }

    public function createAuthor () {
        return view('admin.create_authors');
    }

    public function editAuthor ($id) {

        try {
            $author = Author::findOrFail($id);
            return view('admin.edit_authors', compact('author'));
        } catch (Exception $ex) {
            report($ex);
        }

    }

    public function showAuthor ($id) {
        try {
            $author = Author::findOrFail($id);
            return view('admin.detail_authors', compact('author'));
        } catch (Exception $ex) {
            report($ex);
        }
    }

    public function editBook ($id) {
        try {
            $book = Book::with('authors')->findOrFail($id);
            $authors = Author::all();

            $bookAuthor = $book['authors'];
            return view('admin.edit_books', compact('book', 'authors', 'bookAuthor'));
        } catch (Exception $ex) {
            report($ex);
        }
    }

    public function showBook ($id) {
        try {
            $book = Book::with('authors')->findOrFail($id);
            $authors = $book['authors'];
            $cover = Storage::url($book->cover);
            return view('admin.detail_books', compact('book', 'authors', 'cover'));
        } catch (Exception $ex) {
            report($ex);
        }
    }
}
