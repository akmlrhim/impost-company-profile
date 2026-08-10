<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Client;
use App\Models\JobVacancy;
use App\Models\Lead;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\Service;
use App\Models\StudyCase;
use App\Models\Testimonial;
use App\Services\RecaptchaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
	public function index()
	{
		$title = 'Agensi Digital Marketing di Kalimantan Selatan';
		$meta_description = 'Solusi digital marketing all-in-one profesional di Banjarmasin & Banjarbaru. Tingkatkan bisnis Anda bersama Impost Media.';

		$services = Service::select(
			'id',
			'service_name',
			'slug',
			'description',
			'cover_path',
			'sort',
			'category'
		)->orderBy('sort', 'ASC')->get();

		$clients = Client::select('id', 'filename', 'client_logo')->get();

		$testimonials = Testimonial::select(
			'name',
			'company_name',
			'content',
			'media_path',
			'media_type'
		)->latest()->get();

		$portfolios = Portfolio::latest()->get();

		$portfolioCategories = PortfolioCategory::select('id', 'name', 'slug')
			->withCount('portfolios')
			->has('portfolios')
			->orderBy('portfolios_count', 'DESC')
			->get();

		return view('public.home', compact(
			'title',
			'meta_description',
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

		$breadcrumbItems = [
			['name' => 'Artikel', 'url' => route('article.all')],
			['name' => $article->title, 'url' => url()->current()],
		];

		return view('public.articles.detail', compact('title', 'article', 'latestArticle', 'breadcrumbItems'));
	}

	public function portfolio(Request $request)
	{
		$title = 'Portfolio';
		$meta_description = 'Lihat berbagai proyek sukses yang telah kami kerjakan untuk klien kami di berbagai industri.';
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

		return view('public.portfolio', compact('title', 'meta_description', 'portfolios', 'category', 'activeCategory'));
	}

	public function articleAll(Request $request)
	{
		$title = 'Artikel';
		$meta_description = 'Jelajahi artikel seputar strategi digital marketing, data, dan pertumbuhan bisnis dari Impost Media.';
		$articles = Article::select(
			'id',
			'title',
			'slug',
			'content',
			'cover_path',
			'created_at'
		)
			->where('status', 'published')
			->when($request->filled('search'), function ($q) use ($request) {
				$q->where('title', 'like', '%' . $request->search . '%');
			})
			->when($request->filled('month'), function ($q) use ($request) {
				$q->whereMonth('created_at', $request->month);
			})
			->when($request->filled('year'), function ($q) use ($request) {
				$q->whereYear('created_at', $request->year);
			})
			->latest()
			->paginate(6)
			->onEachSide(1)
			->withQueryString();

		$years = Article::where('status', 'published')
			->selectRaw('DISTINCT YEAR(created_at) as year')
			->orderByDesc('year')
			->pluck('year');

		$months = [
			1 => 'Januari',
			2 => 'Februari',
			3 => 'Maret',
			4 => 'April',
			5 => 'Mei',
			6 => 'Juni',
			7 => 'Juli',
			8 => 'Agustus',
			9 => 'September',
			10 => 'Oktober',
			11 => 'November',
			12 => 'Desember',
		];

		return view('public.articles.index', [
			'title' => $title,
			'meta_description' => $meta_description,
			'articles' => $articles,
			'years' => $years,
			'months' => $months,
			'filters' => [
				'search' => $request->search,
				'month' => $request->month,
				'year' => $request->year,
			],
		]);
	}

	public function studyCase(Request $request)
	{
		$title = 'Study Case';
		$meta_description = 'Lihat studi kasus nyata klien Impost Media — bagaimana kami membantu bisnis tumbuh melalui strategi digital marketing yang terukur.';
		$studyCase = StudyCase::select(
			'name',
			'slug',
			'situation',
			'solution',
			'result',
			'cover_path',
			'category'
		)
			->when($request->filled('search'), function ($q) use ($request) {
				$q->where('name', 'like', '%' . $request->search . '%');
			})
			->when($request->filled('category'), function ($q) use ($request) {
				$q->where('category', $request->category);
			})
			->latest()
			->paginate(12)
			->onEachSide(1)
			->withQueryString();

		$categories = StudyCase::whereNotNull('category')
			->distinct()
			->orderBy('category')
			->pluck('category');

		return view('public.study-cases.index', [
			'title' => $title,
			'meta_description' => $meta_description,
			'studyCase' => $studyCase,
			'categories' => $categories,
			'filters' => [
				'search' => $request->search,
				'category' => $request->category,
			],
		]);
	}

	public function studyCaseDetail(string $slug)
	{
		$studyCase = StudyCase::where('slug', $slug)->firstOrFail();
		$title = $studyCase->name;
		$meta_description = 'Studi kasus ' . $studyCase->name . ' — lihat bagaimana Impost Media memberikan solusi ' . $studyCase->category . ' yang berdampak nyata.';

		$breadcrumbItems = [
			['name' => 'Study Case', 'url' => route('study-case')],
			['name' => $studyCase->name, 'url' => url()->current()],
		];

		return view('public.study-cases.detail', compact('title', 'meta_description', 'studyCase', 'breadcrumbItems'));
	}

	public function about()
	{
		$title = 'Tentang Kami';
		$meta_description = 'Kenali lebih dekat Impost Media, agensi digital marketing yang berfokus pada pertumbuhan bisnis Anda.';

		return view('public.about', compact('title', 'meta_description'));
	}

	public function contact()
	{
		$title = 'Hubungi Kami';
		$meta_description = 'Siap untuk meningkatkan bisnis Anda? Hubungi Impost Media sekarang untuk konsultasi sekarang.';
		return view('public.contact', compact('title', 'meta_description'));
	}

	public function optIn()
	{
		$title = 'OPT-IN';

		return view('public.opt-in', compact('title'));
	}

	public function job(Request $request)
	{
		$title = 'Karir';
		$meta_description = 'Bergabunglah bersama tim Impost Media. Lihat lowongan karir terbaru dan jadilah bagian dari agensi digital marketing terkemuka di Kalimantan Selatan.';
		$search = $request->search;
		$type = $request->type;
		$arrangement = $request->arrangement;

		$activeJobs = JobVacancy::where('status', 'Active');

		$job = (clone $activeJobs)
			->when($search, function ($q) use ($search) {
				$q->where(function ($query) use ($search) {
					$query->where('title', 'like', "%{$search}%")
						->orWhere('employment_type', 'like', "%{$search}%");
				});
			})
			->when($type, function ($q) use ($type) {
				$q->where('employment_type', $type);
			})
			->when($arrangement, function ($q) use ($arrangement) {
				$q->whereJsonContains('work_arrangements', $arrangement);
			})
			->latest()
			->paginate(12)
			->withQueryString();

		// Pull filter options only from Active jobs
		$employmentTypes = (clone $activeJobs)
			->whereNotNull('employment_type')
			->distinct()
			->pluck('employment_type')
			->sort()
			->values();

		$workArrangements = (clone $activeJobs)
			->whereNotNull('work_arrangements')
			->pluck('work_arrangements')
			->flatten()
			->unique()
			->sort()
			->values();

		return view('public.jobs.index', compact('title', 'meta_description', 'job', 'search', 'type', 'arrangement', 'employmentTypes', 'workArrangements'));
	}

	public function jobDetail(JobVacancy $job)
	{
		abort_if($job->status !== 'Active', 404);

		$job->load('details');
		$title = $job->title;
		$meta_description = 'Lowongan kerja ' . $job->title . ' di Impost Media. Lihat detail pekerjaan, kualifikasi, dan cara melamar.';

		$breadcrumbItems = [
			['name' => 'Karir', 'url' => route('careers')],
			['name' => $job->title, 'url' => url()->current()],
		];

		return view('public.jobs.detail', compact('title', 'meta_description', 'job', 'breadcrumbItems'));
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

		$captcha = RecaptchaService::verify($request->input('g-recaptcha-response'));
		if (!$captcha) {
			return back()->with('error', 'Verifikasi Keamanan/Recaptcha gagal, silakan coba lagi.')->withInput();
		}

		try {
			DB::beginTransaction();

			Lead::create([
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
			$waUrl = 'https://wa.me/' . config('contact.whatsapp.customer.number') . "?text={$message}";

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

	public function tnc()
	{
		$title = 'Syarat & Ketentuan';

		return view('public.tnc', compact('title'));
	}

	public function verifyId()
	{
		$title = 'Verifikasi ID';

		return view('verify-id', compact('title'));
	}
}
