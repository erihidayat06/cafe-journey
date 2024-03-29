<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Minum;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;


class HomeController extends Controller
{

    // Home Page
    public function index()
    {
        // Panggil method sortedCafesByRating dari model cafe
        $sortedCafes = (new Cafe())->sortedCafesByRating();
        $lencana = Cafe::latest()->where('konfirmasi', 'konfirmasi')->get();

        // Ambil Atribut Cafe berdasarkan SortedCafes
        $sortedCafes = array_map(function ($cafe) {
            return Cafe::where('nama_cafe', $cafe[1])->first();
        }, $sortedCafes);

        // Tampilkan 4 Cafe Terbaik berdasarkan Rating dan urutkan berdasarkan Rating
        $sortedCafes = array_slice($sortedCafes, 0, 4);

        // Return View
        return view('index', [
            'cafes' => $sortedCafes,
            'lencana' => $lencana,
        ]);
    }

    // Help Page
    public function help()
    {
        return view('pages/help');
    }

    // About Page
    public function about()
    {
        return view('pages/about');
    }

    // All Cafes with Pagination
    public function cafes()
    {
        // Panggil method sortedCafesByRating dari model cafe
        $sortedCafes = (new Cafe())->sortedCafesByRating();
        $lencana = Cafe::latest()->where('konfirmasi', 'konfirmasi')->get();

        // Ambil Atribut Cafe berdasarkan SortedCafes
        $sortedCafes = array_map(function ($cafe) {
            return Cafe::where('nama_cafe', $cafe[1])->first();
        }, $sortedCafes);

        // Konfigurasi Pagination
        $page = request('page') ? request('page') : 1;
        $perPage = 6;
        $cafes = new Collection($sortedCafes);
        $currentPage = $page;
        $currentPageSearchResults = $cafes->slice(($currentPage - 1) * $perPage, $perPage)->all();

        // Buat LengthAwarePaginator
        $sortedCafesPaginated = new LengthAwarePaginator(
            $currentPageSearchResults,
            count($cafes),
            $perPage,
            $currentPage,
            [
                'path' => Paginator::resolveCurrentPath(),
                'pageName' => 'page',
            ]
        );

        // Kembalikan View
        return view('pages/cafes', [
            'cafes' => $sortedCafesPaginated,
            'lencana' => $lencana,
        ]);
    }

    // Favorite Drinks
}
