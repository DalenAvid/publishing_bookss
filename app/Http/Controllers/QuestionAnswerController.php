<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionAnswer; 

class QuestionAnswerController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        QuestionAnswer::create([
            'question' => $validatedData['question'],
            'answer' => $validatedData['answer'],
        ]);

        return redirect()->route('questions.index')->with('success', 'Запитання та відповідь успішно додано.');
    }
}
