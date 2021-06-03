<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function store (Request $request) {
        $this->validate($request, [
            'title' => 'required|max:100',
            'cover' => 'file|image|mimes:jpeg,png,jpg',
            'content' => 'required',
            'page' => 'required|integer',
            'author' => 'required',
            'release_date' => 'required|date|before:today'
        ]);

        try {
            $authors = $request->author;
            $authorId = [];
            foreach ($authors as $authorName) {
                $author = Author::firstOrCreate(['name' => $authorName, 'user_id' => auth()->id()]);
                $authorId[] = $author->id;
            }

            $fileCover = $request->file('cover');
            $data = $request->all();

            $data['cover'] = $fileCover->store('/assets/cover', 'public');

            $user = Auth::user();

            $buku = $user->books()->create([
                'title' => $data['title'],
                'cover' => $data['cover'],
                'content' => $data['content'],
                'page' => $data['page'],
                'release_date' => $data['release_date']
            ]);

            $buku->authors()->sync($authorId);

            return redirect('/books');

        } catch (Exception $ex) {
            report($ex);
            return response()->json([
                'error' => 'Error Inserting Book'
            ], 400);
        }
    }

    public function edit ($id, Request $request) {
        $this->validate($request, [
            'title' => 'required|max:100',
            'cover' => 'file|image|mimes:jpeg,png,jpg',
            'content' => 'required',
            'page' => 'required|integer',
            'author' => 'required',
            'release_date' => 'required|date|before:today'
        ]);

        try {
            $authors = $request->author;
            $authorId = [];
            foreach ($authors as $authorName) {
                $author = Author::firstOrCreate(['name' => $authorName, 'user_id' => auth()->id()]);
                $authorId[] = $author->id;
            }


            $fileCover = $request->file('cover');
            $data = $request->all();

            if(!empty($fileCover)) {
                $data['cover'] = $fileCover->store('/assets/cover', 'public');
            }

            $books = Book::findOrFail($id);
            $books['title'] = $data['title'];
            $books['content'] = $data['content'];
            $books['page'] = $data['page'];
            $books['release_date'] = $data['release_date'];
            if (!empty($fileCover)) {
                $books['cover'] = $data['cover'];
            }

            $books->save();
            $books->authors()->sync($authorId);

            return redirect('/books');

        } catch (Exception $ex) {
            report($ex);
            return response()->json([
                'error' => 'Error Updating Book'
            ], 400);
        }

    }

    public function destroy ($id) {
        try {
            $book = Book::findOrFail($id);
            $book->delete();

            return redirect('/books');
        } catch (Exception $ex) {
            report($ex);
            return response()->json([
                'error' => 'Error Deleting Book'
            ], 400);
        }
    }
}
