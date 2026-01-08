<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Article;
use App\Models\Doctor;
use App\Models\Career;
use App\Models\Faq;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        if (!$query) {
            return response()->json([]);
        }

        $results = [];

        // Static Pages
        $staticPages = [
            ['title' => 'Beranda', 'url' => url('/'), 'type' => 'Page'],
            ['title' => 'Jadwal Dokter', 'url' => url('/doctors'), 'type' => 'Page'],
            ['title' => 'Layanan', 'url' => url('/services'), 'type' => 'Page'],
            ['title' => 'Kemitraan dan Karir', 'url' => url('/careers'), 'type' => 'Page'],
            ['title' => 'Berita', 'url' => url('/news'), 'type' => 'Page'],
            ['title' => 'Tentang Kami', 'url' => url('/about'), 'type' => 'Page'],
            ['title' => 'Buat Janji', 'url' => 'http://tritya.id/DaftarOnline', 'type' => 'External Link'],
        ];

        foreach ($staticPages as $page) {
            if (stripos($page['title'], $query) !== false) {
                $results[] = $page;
            }
        }

        // Services
        $services = Service::where('title', 'like', "%{$query}%")
                           ->orWhere('excerpt', 'like', "%{$query}%")
                           ->limit(5)->get();
        foreach ($services as $service) {
            // Check if a route exists for the slug, common practice for this project seems to be /slug for services
            $url = url('/' . $service->slug); 
            $results[] = [
                'title' => $service->title,
                'url' => $url,
                'type' => 'Layanan'
            ];
        }

        // Articles
        $articles = Article::where('title', 'like', "%{$query}%")
                           ->orWhere('excerpt', 'like', "%{$query}%")
                           ->limit(5)->get();
        foreach ($articles as $article) {
            $results[] = [
                'title' => $article->title,
                'url' => route('fe.news.detail', $article->slug),
                'type' => 'Berita'
            ];
        }

         // Doctors
        $doctors = Doctor::where('name', 'like', "%{$query}%")
                           ->orWhere('specialty', 'like', "%{$query}%")
                           ->limit(5)->get();
        foreach ($doctors as $doctor) {
            $results[] = [
                'title' => $doctor->name . ' (' . $doctor->specialty . ')',
                'url' => url('/doctors'),
                'type' => 'Dokter'
            ];
        }

        // FAQs
        $faqs = Faq::where('question', 'like', "%{$query}%")
                    ->where('is_active', true)
                    ->limit(5)->get();
        foreach ($faqs as $faq) {
            $results[] = [
                'title' => $faq->question,
                'url' => url('/#faq-' . $faq->id),
                'type' => 'FAQ'
            ];
        }

        // Careers
         $careers = Career::where('title', 'like', "%{$query}%")
                    ->where('is_active', true)
                    ->limit(5)->get();
        foreach ($careers as $career) {
            $results[] = [
                'title' => $career->title,
                'url' => route('fe.carier.show', $career->slug),
                'type' => 'Karir'
            ];
        }

        return response()->json($results);
    }

    public function search_news(Request $request)
    {
        $query = $request->input('query');
        if (!$query) {
            return response()->json([]);
        }

        $results = [];

        // Static Pages
        $staticPages = [
            ['title' => 'Beranda', 'url' => url('/'), 'type' => 'Page'],
            ['title' => 'Jadwal Dokter', 'url' => url('/doctors'), 'type' => 'Page'],
            ['title' => 'Layanan', 'url' => url('/services'), 'type' => 'Page'],
            ['title' => 'Kemitraan dan Karir', 'url' => url('/careers'), 'type' => 'Page'],
            ['title' => 'Berita', 'url' => url('/news'), 'type' => 'Page'],
            ['title' => 'Tentang Kami', 'url' => url('/about'), 'type' => 'Page'],
            ['title' => 'Buat Janji', 'url' => 'http://tritya.id/DaftarOnline', 'type' => 'External Link'],
        ];

        foreach ($staticPages as $page) {
            if (stripos($page['title'], $query) !== false) {
                $results[] = $page;
            }
        }

    
        // Articles
        $articles = Article::where('title', 'like', "%{$query}%")
                           ->orWhere('excerpt', 'like', "%{$query}%")
                           ->limit(5)->get();
        foreach ($articles as $article) {
            $results[] = [
                'title' => $article->title,
                'url' => route('fe.news.detail', $article->slug),
                'type' => 'Berita'
            ];
        }

        

        return response()->json($results);
    }
}