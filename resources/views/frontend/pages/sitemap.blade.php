<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @php
        $lang = App::getLocale();
        if ($lang == 'vi') {
            $lang = "";
        } else {
            $lang = '.' . $lang;
        }
    @endphp
        <url>
            <loc>{{ route('home') }}</loc>
            <lastmod>2023-10-23T00:59:04+00:00</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
        {{-- <url>
            <loc>{{ makeLinkToLanguage('contact', null, null, App::getLocale()) }}</loc>
            <lastmod>2022-07-25T10:13:35+00:00</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url> --}}

        @php
            $keys = App\Models\Key::all();
        @endphp
        @if(count($keys)>0)
            @foreach ($keys as $item)
                @php
                    $link = route('post.checkDetailOrCategory',['slug' => $item->slug ]);
                @endphp
                <url>
                    <loc>{{ $link }}</loc>
                    <lastmod>{{ $item->created_at->tz('UTC')->toAtomString() }}</lastmod>
                    <changefreq>daily</changefreq>
                    <priority>0.8</priority>
                </url>
            @endforeach
        @endif
        
</urlset>