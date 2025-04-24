<x-videos-app-layout>
    <div class="container">
        <div class="series-header mb-4">
            <div class="row">
                <div class="col-md-4">
                    @if($serie->image)
                        <img src="{{ asset('storage/' . $serie->image) }}" class="img-fluid rounded" alt="{{ $serie->title }}">
                    @else
                        <div class="no-image-series">
                            <i class="fas fa-film"></i>
                        </div>
                    @endif
                </div>
                <div class="col-md-8">
                    <h1>{{ $serie->title }}</h1>
                    <p class="lead">{{ $serie->description }}</p>
                    <div class="categories mb-3">
                        @forelse($serie->categories ?? [] as $category)
                            <span class="badge bg-primary">{{ $category->name }}</span>
                        @empty
                            <span class="badge bg-secondary">No categories</span>
                        @endforelse
                    </div>
                    <p class="text-muted">
                        <small>
                            <i class="fas fa-calendar-alt"></i> {{ $serie->created_at?->format('d/m/Y') ?? 'No date' }} |
                            <i class="fas fa-user"></i> {{ $serie->user->name ?? 'Unknown user' }}
                        </small>
                    </p>
                </div>
            </div>
        </div>

        <h2 class="mb-4">📺 Vídeos d'aquesta sèrie</h2>

        @if($serie->videos->count() > 0)
            <div class="row">
                @foreach($serie->videos as $video)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card video-card h-100">
                            <div class="card-img-top-container">
                                @if($video->thumbnail)
                                    <img src="{{ asset('storage/' . $video->thumbnail) }}" class="card-img-top" alt="{{ $video->title }}">
                                @else
                                    <div class="no-thumbnail">
                                        <i class="fas fa-play-circle"></i>
                                    </div>
                                @endif
                                <div class="duration-badge">
                                    {{ $video->duration }}
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $video->title }}</h5>
                                <p class="card-text">{{ Str::limit($video->description, 80) }}</p>
                            </div>
                            <div class="card-footer bg-transparent">
                                <a href="{{ route('videos.show', $video->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-play"></i> Reproduir
                                </a>
                                <span class="views-count float-end">
                            <i class="fas fa-eye"></i> {{ $video->views }}
                        </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

{{--            <!-- Pagination -->--}}
{{--            <div class="d-flex justify-content-center mt-4">--}}
{{--                {{ $serie->videos->links() }}--}}
{{--            </div>--}}
        @else
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i> Encara no hi ha vídeos en aquesta sèrie.
            </div>
        @endif

        <div class="mt-4">
            <a href="{{ route('series.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Tornar a totes les sèries
            </a>
        </div>
    </div>

    <style>
        .series-header {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
        }

        .no-image-series {
            height: 200px;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            font-size: 4rem;
            border-radius: 5px;
        }

        .video-card {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .video-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }

        .card-img-top-container {
            position: relative;
        }

        .card-img-top {
            height: 180px;
            object-fit: cover;
            width: 100%;
        }

        .no-thumbnail {
            height: 180px;
            background-color: #f1f1f1;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 3rem;
        }

        .duration-badge {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: rgba(0,0,0,0.7);
            color: white;
            padding: 3px 6px;
            border-radius: 3px;
            font-size: 0.8rem;
        }

        .views-count {
            color: #6c757d;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .series-header .col-md-4 {
                margin-bottom: 20px;
            }

            .no-image-series {
                height: 150px;
                font-size: 3rem;
            }
        }
    </style>
</x-videos-app-layout>
