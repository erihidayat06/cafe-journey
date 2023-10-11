<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;


class RatingController extends Controller
{



    public function store(Request $request,$masking = '*')
    {


        $validasiData = $request->validate([
            'rating' => 'required',
            'ulasan' => 'max:255',
            'cafe_id' => 'required',
            'user_id' => 'required'
        ]);

        $apa = json_encode(config('config'));


        $words = explode(' ', $request->ulasan);
        $bad_words = array_map('strtolower', config('config'));
        $new_words = [];

        foreach ($words as $word) {
            if (in_array(strtolower($word), $bad_words)) {
                return redirect()->back()->with('error', 'Gak Boleh Kata Kasar :(');

                $replaceString = str_ireplace(['a', 'i', 'u', 'e', 'o'], $masking, $word);

                if (!strpos($replaceString, $masking)) {
                    $new_words[] = substr_replace($word, $masking, -1);
                } else {
                    $new_words[] = $replaceString;
                }

            } else {
                $new_words[] = $word;
            }
        }


        // $validasiData['ulasan'] = implode(' ', $new_words);

        Ulasan::create($validasiData);

        return redirect()->back()->with('success', 'Terima Kasih Sudah Memberikan Ulasan');
    }
}
