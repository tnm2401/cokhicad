@extends("frontend.layout.master-layout-detail")
@section('content')
    <style>
        html {
            scroll-behavior: smooth;
        }
        .table-of-contents {
            padding: 5%;
            margin-top: 8px;
            background-color: #eeeeee;
            margin: 1.5rem 0;
            position: relative;
            border-radius: 0.25rem;
        }

        .table-of-contents a {
            color: #212529;
            font-weight: 900;
        }

        .table-of-contents .toc-headline {
            font-size: 10px;
            color: var(--dark-grey);
            font-weight: 600;
            display: block;
            cursor: pointer;
        }

        .table-of-contents .toggle-toc {
            position: absolute;
            top: 0;
            right: 1rem;
            font-size: 10px;
            cursor: pointer;
            font-weight: 800;
            color: var(--main-color);
        }

        .table-of-contents ol {
            padding-left: 1rem;
            list-style-type: none;
            counter-reset: item;
            margin: 0;
            padding: 0;
        }

        .table-of-contents ol>li {
            display: table;
            counter-increment: item;
            margin-bottom: 0.6em;
        }

        .table-of-contents ol>li:before {
            content: counters(item, ".") ". ";
            display: table-cell;
            padding-right: 0.6em;
        }

        .table-of-contents li ol>li {
            margin: 0;
        }

        .table-of-contents li ol>li:before {
            content: counters(item, ".") " ";
        }

        .accordion > input[type="checkbox"] {
  position: absolute;
  left: -100vw;
}

.accordion .content {
  overflow-y: hidden;
  height: 0;
  transition: height 0.3s ease;
}

.accordion > input[type="checkbox"]:checked ~ .content {
  height: auto;
  overflow: visible;
}

.accordion label {
  display: block;
}


.accordion {
  margin-bottom: 1em;
}

.accordion > input[type="checkbox"]:checked ~ .content {
  padding: 15px;
  border: 1px solid #e8e8e8;
  border-top: 0;
}

.accordion .handle {
  margin: 0;
  font-size: 1.125em;
  line-height: 1.2em;
}

.accordion label {
  color: #333;
  cursor: pointer;
  font-weight: normal;
  padding: 15px;
  background: #e8e8e8;
}

.accordion label:hover,
.accordion label:focus {
  background: #d8d8d8;
}

.accordion .handle label:before {
  font-family: 'fontawesome';
  content: "\f054";
  display: inline-block;
  margin-right: 10px;
  font-size: .58em;
  line-height: 1.556em;
  vertical-align: middle;
}

.accordion > input[type="checkbox"]:checked ~ .handle label:before {
  content: "\f078";
}


/*
 Demo purposes only
*/
*,
*:before,
*:after {
  box-sizing: border-box;
}



a {
  color: #06c;
}

p {
  margin: 0 0 1em;
}

h1 {
  margin: 0 0 1.5em;
  font-weight: 600;
  font-size: 1.5em;
}

.accordion {
  max-width: 65em;
}

.accordion p:last-child {
  margin-bottom: 0;
}

    </style>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 main-content">
                <nav aria-label="breadcrumb" style="margin-top: 88px">
                    <ol class="breadcrumb shadow-sm">
                        <li class="breadcrumb-item"><a href="{{ route('frontend.home.index') }}"
                                title="{{ __('home') }}"><i class="ti-home"></i> {{ __('home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('frontend.all_post.index') }}"
                                title="{{ __('new') }}">{{ __('new') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ URL::current() }}"
                                title="{{ $post->{'name_' . $lang} }}">{{ $post->{'name_' . $lang} }}</a></li>
                    </ol>
                </nav>




<section class="accordion">
  <input type="checkbox" name="collapse2" id="handle2">
  <h2 class="handle">
    <label for="handle2">Mục lục bài viết</label>
  </h2>
  <div class="content">
    <nav class="table-of-contents">
        <ol id="toc" data-toc="content" data-toc-headings="headings"></ol>
    </nav>
  </div>
</section>

                <article class="card shadow post mb-5">
                    <div class="post-content shadow mb-5">
                        <h2 class="d-none">{{ $post->{'name_' . $lang} }}</h2>
                        <h3 class="d-none">{{ $post->{'name_' . $lang} }}</h3>
                        <div id="post_content" class="post_content">

                            <div class="main-title">
                                <h1 class="title text-center">
                                    <a href="{{ $post->slug . '.html' }}" title="{{ $post->{'name_' . $lang} }}"
                                        style="font-weight: bold;">{{ $post->{'name_' . $lang} }}</a>
                                </h1>
                            </div>
                            {!! $post->{'content_' . $lang} !!}
                        </div>
                    </div>


                    <div class="main-title mb-4">
                        <h3 class="text-center">{{ __('other_news') }}</h3>
                    </div>
                    <section class="services posts">
                        <div class="row">
                            <!-- Article -->
                            @foreach ($post_related as $item)
                                <div class="col-md-6 mb-5">
                                    <div class="article animate delayed" data-transition="fadeInUp">
                                        <div class="article-headline clearfix">
                                            <div class="article-date">{{ date('d/m/Y', strtotime($item->updated_at)) }}
                                            </div>
                                        </div>
                                        <a href="{{ route('frontend.dtpost.index', $item->slug) }}"
                                            title="{{ $item->{'name_' . $lang} }}">
                                            <div class="img-main">
                                                <div class="img-main-over bg-white animate delayed on"
                                                    data-transition="heightNone"></div>
                                                <div class="animate delayed" data-transition="imagePadd">
                                                    <img width="568" height="330" class="img"
                                                        src="{{ imageUrl('/storage/uploads/' . $item->img, '568', '330', '100', '1') }}"
                                                        alt="{{ $item->{'name_' . $lang} }}">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="article-info">
                                            <div class="article-title">
                                                <h3 class="ellipsis_two_row">
                                                    <a href="{{ route('frontend.dtpost.index', $item->slug) }}"
                                                        title="{{ $item->{'name_' . $lang} }}">{{ $item->{'name_' . $lang} }}</a>
                                                </h3>
                                            </div>
                                            <div class="article-more"><a
                                                    href="{{ route('frontend.dtpost.index', $item->slug) }}"
                                                    title="{{ $item->{'name_' . $lang} }}">{{ __('view_more') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- / Article -->
                        </div>
                    </section>
            </div>
            </article>
        @endsection
        @push('style')
        @endpush
        @push('script')
            <script type='text/javascript' src="{{ asset('frontend') }}/bower_components/jquery/dist/jquery-migrate-3.3.2.js">
            </script>
            <script type='text/javascript' src='{{ asset('frontend') }}/assets/js/waypoints.min.js'></script>
            <script>
                $('.delayed').waypoint(function() {
                    $(this).waypoint('disable').removeClass('delayed').addClass('animated ' + $(this).data('transition'));
                }, {
                    offset: '85%'
                });
            </script>
            <script type="application/ld+json">
                {
                    "@context": "https://schema.org",
                    "@graph": [{
                            "@type": "Organization",
                            "@id": "{{ url('/#organization') }}",
                            "name": "{{ $setting->{'nameindex_' . $lang} }}",
                            "url": "{{ url('/') }}/",
                            "sameAs": ["{{ $setting->facebook }}", "{{ $setting->twitter }}",
                                "{{ $setting->youtube }}"
                            ],
                            "logo": {
                                "@type": "ImageObject",
                                "@id": "{{ url('/#logo') }}",
                                "inLanguage": "{{ $setting->{'locale_' . $lang} }}",
                                "url": "{{ url('/storage/uploads/' . $setting->logoindex) }}",
                                "contentUrl": "{{ url('/storage/uploads/' . $setting->logoindex) }}",
                                "width": {{ [$width] = getimagesize(url('/storage/uploads/' . $setting->logoindex))[0] }},
                                "height": {{ [$height] = getimagesize(url('/storage/uploads/' . $setting->logoindex))[1] }},
                                "caption": "{{ $setting->{'nameindex_' . $lang} }}"
                            },
                            "image": {
                                "@id": "{{ url('/#logo') }}"
                            },
                            "slogan": "{{ $setting->{'nameindex_' . $lang} }}",
                            "description": "{{ $setting->{'description_' . $lang} }}",
                            "legalName": "{{ $setting->{'nameindex_' . $lang} }}"
                        },
                        {
                            "@type": "WebSite",
                            "@id": "{{ url('/#website') }}",
                            "url": "{{ url('/') }}/",
                            "name": "{{ $setting->{'nameindex_' . $lang} }}",
                            "description": "{{ $setting->{'description_' . $lang} }}",
                            "publisher": {
                                "@id": "{{ url('/#organization') }}"
                            },
                            "inLanguage": "{{ $setting->{'locale_' . $lang} }}",
                            "copyrightHolder": {
                                "@id": "{{ url('/#organization') }}"
                            }
                        },
                        {
                            "@type": "ImageObject",
                            "@id": "{{ URL::current() }}/#primaryimage",
                            "url": "{{ url('/storage/uploads/' . $master['img']) }}",
                            "width": {{ [$width] = getimagesize(url('/storage/uploads/' . $master['img']))[0] }},
                            "height": {{ [$height] = getimagesize(url('/storage/uploads/' . $master['img']))[1] }},
                            "caption": "{{ $master['name'] }}"
                        },
                        {
                            "@type": ["WebPage"],
                            "@id": "{{ URL::current() }}/#webpage",
                            "url": "{{ URL::current() }}",
                            "name": "{{ $master['name'] }}",
                            "isPartOf": {
                                "@id": "{{ url('/#website') }}"
                            },
                            "primaryImageOfPage": {
                                "@id": "{{ URL::current() }}/#primaryimage"
                            },
                            "datePublished": "{{ $master['created_at'] }}",
                            "dateModified": "{{ $master['updated_at'] }}",
                            "breadcrumb": {
                                "@id": "{{ URL::current() }}/#breadcrumb"
                            },
                            "inLanguage": "{{ $setting->{'locale_' . $lang} }}",
                            "potentialAction": [{
                                "@type": "ReadAction",
                                "target": ["{{ URL::current() }}"]
                            }]
                        },
                        {
                            "@type": "BreadcrumbList",
                            "@id": "{{ URL::current() }}/#breadcrumb",
                            "itemListElement": [{
                                    "@type": "ListItem",
                                    "position": 1,
                                    "name": "{{ __('home') }}",
                                    "item": "{{ url('/') }}/"
                                },
                                {
                                    "@type": "ListItem",
                                    "position": 2,
                                    "name": "{{ __('new') }}",
                                    "item": "{{ route('frontend.all_post.index') }}"
                                },
                                {
                                    "@type": "ListItem",
                                    "position": 3,
                                    "name": "{{ $master['name'] }}"
                                }
                            ]
                        },
                        {
                            "@type": "Article",
                            "@id": "{{ URL::current() }}/#article",
                            "isPartOf": {
                                "@id": "{{ URL::current() }}/#webpage"
                            },
                            "author": {
                                "@id": "{{ route('frontend.author.index') }}",
                                "name": "{{ $author->{'name_' . $lang} }}"
                            },
                            "headline": "{{ $master['name'] }}",
                            "datePublished": "{{ $master['created_at'] }}",
                            "dateModified": "{{ $master['updated_at'] }}",
                            "mainEntityOfPage": {
                                "@id": "{{ URL::current() }}/#webpage"
                            },
                            "publisher": {
                                "@id": "{{ url('/#organization') }}"
                            },
                            "image": {
                                "@id": "{{ URL::current() }}/#primaryimage"
                            },
                            "thumbnailUrl": "{{ url('/storage/uploads/' . $master['img']) }}",
                            "keywords": "{{ $master['keywords'] }}",
                            "inLanguage": "{{ $setting->{'locale_' . $lang} }}",
                            "copyrightYear": "{{ Carbon::createFromFormat('Y-m-d H:i:s', $master['created_at'])->year }}",
                            "copyrightHolder": {
                                "@id": "{{ url('/#organization') }}"
                            }
                        },
                        {
                            "@type": ["Person"],
                            "@id": "{{ route('frontend.author.index') }}",
                            "name": "{{ $author->{'name_' . $lang} }}",
                            "image": {
                                "@type": "ImageObject",
                                "@id": "{{ url('/#authorlogo') }}",
                                "url": "{{ url('/storage/uploads/' . $author->img) }}",
                                "caption": "{{ $author->{'name_' . $lang} }}"
                            },
                            "description": "{{ $author->{'description_' . $lang} }}",
                            "sameAs": ["{{ url('/') }}/,{{ route('frontend.author.index') }}"]
                        }
                    ]
                }
            </script>


            <script type="text/javascript">
                $('#toc').toc({
                    content: "div#post_content",
                    headings: "h2,h3,h4"
                });
            </script>
        @endpush
