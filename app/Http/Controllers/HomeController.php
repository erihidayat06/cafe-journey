<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;


class HomeController extends Controller
{

    // Home Page
    public function index()
    {
        // Menghitung Performa cafe
        $performa = [];

        foreach (Cafe::latest()->where('konfirmasi', 'konfirmasi')->get() as $cafe) {
            $performa[] = [
                ($cafe->ulasan->sum('rating') + $cafe->beli->where('no_pesanan', '!==', null)->sum('jumlah')),
                $cafe->nama_cafe
            ];
        }

        // Sortir Terbesar
        arsort($performa);

        // Ambil Data
        $topPerformers = array_slice($performa, 0, 4);

        // Data Cafe (retrieve only 4 records)
        $cafes = Cafe::latest()->where('konfirmasi', 'konfirmasi')->take(4)->get();

        // Return View
        return view('index', [
            'cafes' => $cafes,
            'lencana' => Cafe::latest()->where('konfirmasi', 'konfirmasi')->get(),
            'performa' => $topPerformers,
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

        // Paginate the sorted cafes 
        $page = request('page') ? request('page') : 1;
        $perPage = 6;

        $cafes = new Collection($sortedCafes);
        $currentPage = $page;

        $currentPageSearchResults = $cafes->slice(($currentPage - 1) * $perPage, $perPage)->all();

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

        // Return View with paginated sorted cafes
        return view('pages/cafes', [
            'cafes' => $sortedCafesPaginated,
            'lencana' => $lencana,
        ]);
    }
}
