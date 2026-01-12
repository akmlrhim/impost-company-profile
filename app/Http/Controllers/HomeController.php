<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\JobPosting;
use App\Models\Leads;
use App\Models\Portfolio;
use App\Models\StudyCase;
use App\Models\Testimonial;
use App\Services\ArticleService;
use App\Services\ClientService;
use App\Services\ServiceService;
use App\Services\StudyCaseService;
use App\Services\TeamService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
	public function index()
	{
		$title = 'Home';

		$servicesForDesktop = ServiceService::paginate(6);
		$servicesForMobile = ServiceService::all();
		$studyCaseForDesktop = StudyCaseService::paginate(6);
		$studyCaseForMobile = StudyCaseService::all();

		$articles = ArticleService::paginateHome(3);
		$clients = ClientService::all();
		$testimonials = Testimonial::select('name', 'company_name', 'content')->latest()->get();

		$comproUrl = base64_encode(config('app.compro_video_url'));

		return view('public.home', compact(
			'title',
			'servicesForDesktop',
			'servicesForMobile',
			'articles',
			'clients',
			'comproUrl',
			'studyCaseForDesktop',
			'studyCaseForMobile',
			'testimonials'
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

	public function articleAll()
	{
		$title = 'Semua Artikel';
		$articles = ArticleService::paginateAll(6);

		return view('public.article.articles', compact('title', 'articles'));
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

	public function portfolio()
	{
		$title = 'Portfolio';
		$portfolio = Portfolio::paginate(8);

		return view('public.portfolio.index', compact('title', 'portfolio'));
	}

	public function portfolioDetail(Portfolio $portfolio)
	{
		$title = 'Portfolio';

		return view('public.portfolio.detail', compact('title', 'portfolio'));
	}

	public function studyCase()
	{
		$title = 'Study Case';
		$studyCase = StudyCase::paginate(8);

		return view('public.study-case.index', compact('title', 'studyCase'));
	}

	public function studyCaseDetail(StudyCase $studyCase)
	{
		$title = 'Study Case';

		return view('public.study-case.detail', compact('title', 'studyCase'));
	}

	public function optIn()
	{
		$title = 'OPT-IN';

		return view('public.opt-in', compact('title'));
	}

	public function job()
	{
		$title = 'Karir';
		$jobs = JobPosting::latest()->paginate(6);

		return view('public.career.jobs', compact('title', 'jobs'));
	}

	public function jobDetail($slug)
	{
		$title = 'Detail';
		$job = JobPosting::where('slug', $slug)->firstOrFail();

		return view('public.career.jobs-detail', compact('title', 'job'));
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

			$message = urlencode('Halo, saya tertarik dengan layanan Anda.');
			return redirect("https://wa.me/6283147802761?text={$message}");
		} catch (\Throwable $e) {
			DB::rollBack();

			dd($e->getMessage());
			return back()->withInput();
		}
	}
}
