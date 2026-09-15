<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

  <url>
    <loc>{{ route('home') }}</loc>
    <lastmod>{{ $now->tz('UTC')->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>1.0</priority>
  </url>

  <url>
    <loc>{{ route('about') }}</loc>
    <lastmod>{{ $now->tz('UTC')->toAtomString() }}</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
  </url>

  <url>
    <loc>{{ route('contact') }}</loc>
    <lastmod>{{ $now->tz('UTC')->toAtomString() }}</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.8</priority>
  </url>

  {{-- Portfolio temporarily hidden --}}

  <url>
    <loc>{{ route('study-case') }}</loc>
    <lastmod>{{ $now->tz('UTC')->toAtomString() }}</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
  </url>

  <url>
    <loc>{{ route('article.all') }}</loc>
    <lastmod>{{ $now->tz('UTC')->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.9</priority>
  </url>

  <url>
    <loc>{{ route('careers') }}</loc>
    <lastmod>{{ $now->tz('UTC')->toAtomString() }}</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.7</priority>
  </url>

  <url>
    <loc>{{ route('docs') }}</loc>
    <lastmod>{{ $now->tz('UTC')->toAtomString() }}</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.6</priority>
  </url>

  @foreach ($articleCategories as $category)
    <url>
      <loc>{{ route('article.all', ['category' => $category->slug]) }}</loc>
      <lastmod>{{ $category->updated_at->tz('UTC')->toAtomString() }}</lastmod>
      <changefreq>weekly</changefreq>
      <priority>0.6</priority>
    </url>
  @endforeach

  @foreach ($articles as $article)
    <url>
      <loc>{{ route('article.detail', $article->slug) }}</loc>
      <lastmod>{{ $article->updated_at->tz('UTC')->toAtomString() }}</lastmod>
      <changefreq>weekly</changefreq>
      <priority>0.8</priority>
    </url>
  @endforeach

  @foreach ($studyCases as $case)
    <url>
      <loc>{{ route('detail-study-case', $case->slug) }}</loc>
      <lastmod>{{ $case->updated_at->tz('UTC')->toAtomString() }}</lastmod>
      <changefreq>weekly</changefreq>
      <priority>0.8</priority>
    </url>
  @endforeach

  @foreach ($jobVacancies as $job)
    <url>
      <loc>{{ route('job.details', $job) }}</loc>
      <lastmod>{{ $job->updated_at->tz('UTC')->toAtomString() }}</lastmod>
      <changefreq>weekly</changefreq>
      <priority>0.7</priority>
    </url>
  @endforeach

</urlset>
