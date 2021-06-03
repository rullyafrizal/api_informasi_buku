<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function store (Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:255'
        ]);

        try {
            $author = Author::create([
                'name' => $request->name,
                'user_id' => auth()->id()
            ]);

            return redirect('/authors');

        } catch (Exception $ex) {
            report($ex);
            return response()->json([
                'error' => 'Error Inserting Authors'
            ], 400);
        }
    }

    public function edit (Request $request, $id) {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        try {
            $author = Author::find($id);

            $author->name = $request->name;

            $author->save();

            return redirect('/authors');
        } catch (Exception $ex) {
            report($ex);
            return response()->json([
                'error' => 'Error Updating Author'
            ], 400);
        }
    }

    public function destroy ($id) {
        try {
            $author = Author::findOrFail($id);

            $author->delete();

            return redirect('authors');
        } catch (Exception $ex) {
            report($ex);
            return response()->json([
                'error' => 'Error Deleting Author'
            ], 400);
        }
    }
}
