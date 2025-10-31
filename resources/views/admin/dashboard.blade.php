@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row g-4">
    <div class="col-xxl-2 col-sm-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <p class="text-muted mb-1">Layanan</p>
                <h4 class="fw-semibold mb-0">{{ $metrics['services'] }}</h4>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-sm-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <p class="text-muted mb-1">Portofolio</p>
                <h4 class="fw-semibold mb-0">{{ $metrics['portfolios'] }}</h4>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-sm-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <p class="text-muted mb-1">Tim</p>
                <h4 class="fw-semibold mb-0">{{ $metrics['team_members'] }}</h4>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-sm-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <p class="text-muted mb-1">Blog</p>
                <h4 class="fw-semibold mb-0">{{ $metrics['blog_posts'] }}</h4>
            </div>
        </div>
    </div>
    <div class="col-xxl-2 col-sm-4">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <p class="text-muted mb-1">Pesan Baru</p>
                <h4 class="fw-semibold mb-0">{{ $metrics['unread_messages'] }}</h4>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mt-1">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-0 fw-semibold">Pesan Terbaru</div>
            <div class="card-body">
                <div class="list-group list-group-flush">
                    @forelse($recentMessages as $message)
                        <a href="{{ route('admin.messages.show', $message) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="mb-1">{{ $message->name }}</h6>
                                <small class="text-muted">{{ $message->created_at->diffForHumans() }}</small>
                            </div>
                            <span class="badge bg-{{ $message->is_read ? 'secondary' : 'primary' }}">{{ $message->is_read ? 'Dibaca' : 'Baru' }}</span>
                        </a>
                    @empty
                        <p class="text-muted">Belum ada pesan.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white border-0 fw-semibold">Portofolio Terbaru</div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @forelse($recentPortfolios as $portfolio)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $portfolio->title }}</strong>
                                <div class="small text-muted">{{ optional($portfolio->project_date)->translatedFormat('d F Y') }}</div>
                            </div>
                            <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="btn btn-sm btn-outline-primary">Kelola</a>
                        </li>
                    @empty
                        <li class="list-group-item text-muted">Belum ada portofolio.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
