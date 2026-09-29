<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return BookResource::collection(Book::all());
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0'],
            'is_published' => ['sometimes', 'boolean'],
        ]);

        $book = Book::create($validatedData);

        return response()->json([
            'message' => 'Thêm sách thành công!',
            'data' => new BookResource($book),
        ], 201);
    }

    public function show(string $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Không tìm thấy sách'], 404);
        }

        return new BookResource($book);
    }

    public function update(Request $request, string $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Không tìm thấy sách'], 404);
        }

        $validatedData = $request->validate([
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'author' => ['sometimes', 'required', 'string', 'max:255'],
            'price' => ['sometimes', 'required', 'integer', 'min:0'],
            'is_published' => ['sometimes', 'boolean'],
        ]);

        $book->update($validatedData);

        return response()->json([
            'message' => 'Cập nhật thành công!',
            'data' => new BookResource($book),
        ]);
    }

    public function destroy(string $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Không tìm thấy sách'], 404);
        }

        $book->delete();

        return response()->json(['message' => 'Xóa sách thành công!']);
    }
}
