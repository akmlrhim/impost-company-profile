<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

  <url>
    <loc>{{ route('home') }}</loc>
    <changefreq>daily</changefreq>
    <priority>1.0</priority>
  </url>

  <url>
    <loc>{{ route('about') }}</loc>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
  </url>
  <url>
    <loc>{{ route('contact') }}</loc>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
  </url>

  <url>
    <loc>{{ route('portfolio') }}</loc>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
  </url>

  <url>
    <loc>{{ route('study-case') }}</loc>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
  </url>

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

  @foreach ($jobs as $job)
    <url>
      <loc>{{ route('career.detail', $job->slug) }}</loc>
      <lastmod>{{ $job->updated_at->tz('UTC')->toAtomString() }}</lastmod>
      <changefreq>monthly</changefreq>
      <priority>0.6</priority>
    </url>
  @endforeach

</urlset>
