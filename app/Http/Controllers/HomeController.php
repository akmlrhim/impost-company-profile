<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\JobVacancy;
use App\Models\Leads;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\StudyCase;
use App\Models\Testimonial;
use App\Services\ClientService;
use App\Services\ServiceService;
use App\Services\TeamService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
	public function index()
	{
		$title = 'Home';

		$services = ServiceService::all();

		$clients = ClientService::all();
		$testimonials = Testimonial::select('name', 'company_name', 'content', 'media_path', 'media_type')->latest()->get();
		$portfolios = Portfolio::latest()->get();
		$portfolioCategories = PortfolioCategory::select('id', 'name', 'slug')
			->withCount('portfolios')
			->has('portfolios')
			->orderBy('portfolios_count', 'DESC')
			->get();

		return view('public.home', compact(
			'title',
			'services',
			'clients',
			'testimonials',
			'portfolios',
			'portfolioCategories'
		));
	}

	public function article(Article $article)
	{
		$title = 'Artikel';
		$latestArticle = $article->where('id', '!=', $article->id)
			->latest()
			->take(4)
			->get();

		return view('public.article.article-detail', compact('title', 'article', 'latestArticle'));
	}

	public function portfolio(Request $request)
	{
		$title = 'Portfolio';
		$portfolios = Portfolio::select(
			'id',
			'title',
			'category_id',
			'media_path',
			'media_type'
		)
			->with('category')
			->when($request->category, function ($q) use ($request) {
				$q->whereHas('category', function ($c) use ($request) {
					$c->where('slug', $request->category);
				});
			})
			->latest()
			->paginate(12)
			->onEachSide(1)
			->withQueryString();

		$category = PortfolioCategory::select('id', 'name', 'slug')
			->withCount('portfolios')
			->has('portfolios')
			->orderBy('portfolios_count', 'DESC')
			->get();

		$activeCategory = $request->category;

		return view('public.portfolio', compact('title', 'portfolios', 'category', 'activeCategory'));
	}

	public function articleAll(Request $request)
	{
		$title = 'Artikel';
		$category = ArticleCategory::select('id', 'name', 'slug')->get();
		$articles = Article::select(
			'id',
			'title',
			'slug',
			'content',
			'category_id',
			'cover_path',
			'created_at'
		)
			->with('category')
			->where('status', 'published')
			->when($request->category, function ($q) use ($request) {
				$q->whereHas('category', function ($c) use ($request) {
					$c->where('slug', $request->category);
				});
			})
			->latest()
			->paginate(9)
			->onEachSide(1)
			->withQueryString();

		return view('public.article.articles', [
			'title' => $title,
			'articles' => $articles,
			'category' => $category,
			'activeCategory' => $request->category
		]);
	}

	public function studyCase()
	{
		$title = 'Study Case';
		$studyCase = StudyCase::select(
			'name',
			'slug',
			'situation',
			'solution',
			'result',
			'cover_path',
			'category'
		)->latest()->paginate(12);

		return view('public.studycase.studycases', compact('title', 'studyCase'));
	}

	public function studyCaseDetail(string $slug)
	{
		$studyCase = StudyCase::where('slug', $slug)->firstOrFail();
		$title = 'Detail ' . $studyCase->name;

		return view('public.studycase.studycase-detail', compact('title', 'studyCase'));
	}

	public function about()
	{
		$title = 'About';

		$team = TeamService::allCached();

		return view('public.about', compact('title', 'team'));
	}

	public function contact()
	{
		$title = 'Kontak';
		return view('public.contact', compact('title'));
	}

	public function optIn()
	{
		$title = 'OPT-IN';

		return view('public.opt-in', compact('title'));
	}

	public function job()
	{
		$job = JobVacancy::paginate(12);

		return view('public.job.jobs', compact('job'));
	}

	public function jobDetail(JobVacancy $job)
	{
		$job->load('details');
		return view('public.job.job-detail', compact('job'));
	}

	public function vslForm()
	{
		$title = 'Form VSL';

		return view('public.vsl-form', compact('title'));
	}

	public function saveLeads(Request $request)
	{
		$request->validate(
			[
				'fullname'       => 'required|string|max:160',
				'email'          => 'nullable|email|max:160',
				'phone'          => 'required|digits_between:10,15',
				'business_name'  => 'required|string|max:160',
				'income'         => 'required|in:<10jt,10-50jt,50-100jt,>100jt',
				'note'           => 'nullable|string',
				'objective'      => 'required|array|min:1',
				'objective.*'    => 'string|max:50',
			],
			[
				'required' => ':attribute wajib diisi.',
				'email' => ':attribute tidak valid.',
				'digits_between' => ':attribute harus berisi :min–:max digit angka.',
				'string' => ':attribute harus berupa teks.',
				'max' => ':attribute maksimal :max karakter.',
				'array' => ':attribute tidak valid.',
				'min' => 'Minimal pilih 1 :attribute.',
				'in' => ':attribute tidak valid.',
			],
			[
				'fullname' => 'Nama Lengkap',
				'email' => 'Email',
				'phone' => 'Nomor HP',
				'business_name' => 'Nama Bisnis',
				'income' => 'Omzet Per Bulan',
				'note' => 'Catatan',
				'objective' => 'Tujuan Bisnis',
			]
		);

		try {
			DB::beginTransaction();

			Leads::create([
				'fullname' => $request->fullname,
				'email' => $request->email,
				'phone' => $request->phone,
				'business_name' => $request->business_name,
				'income' => $request->income,
				'note' => $request->note,
				'objective' => implode(',', $request->objective),
			]);

			DB::commit();

			$objectiveString = implode(', ', $request->objective);

			$text  = "Hai kak, saya sudah mengisi form dengan data sebagai berikut:\n\n";
			$text .= "Nama lengkap: " . $request->fullname . "\n";
			$text .= "No. HP: " . $request->phone . "\n";
			$text .= "Email: " . ($request->email ?? '-') . "\n";
			$text .= "Nama bisnis: " . $request->business_name . "\n";
			$text .= "Omzet per bulan: " . $request->income . "\n";
			$text .= "Tujuan: " . $objectiveString . "\n\n";
			$text .= "Mohon info langkah selanjutnya untuk bisa lanjut ke tahap konsultasi atau pembahasan strategi.";

			$message = urlencode($text);
			$waUrl = "https://wa.me/6283147802761?text={$message}";

			return redirect()->back()
				->with('success', 'Data berhasil terkirim! Mengalihkan ke WhatsApp...')
				->with('wa_url', $waUrl);
		} catch (\Throwable $e) {
			DB::rollBack();

			// dd($e->getMessage());
			return back()->withInput();
		}
	}

	public function docs()
	{
		$title = 'Document';

		return view('public.docs', compact('title'));
	}

	public function legal()
	{
		$title = 'Legalitas';

		return view('public.legal', compact('title'));
	}
}
