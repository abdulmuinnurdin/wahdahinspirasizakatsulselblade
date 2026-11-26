@extends('layouts.admin', [
    'title' => 'Dashboard',
    'headerTitle' => 'Dashboard',
    'headerSubtitle' => 'Selamat datang kembali, ' . auth()->user()->name,
    'breadcrumb' => 'Dashboard',
    'headerIcon' => 'pe-7s-home',
])

@section('content')
<div class="row">
    <div class="col-xs-12">
        <x-admin.alert variant="success">
            Anda login sebagai <strong>{{ auth()->user()->name }}</strong> ({{ auth()->user()->email }}).
        </x-admin.alert>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
        <x-admin.panel title="Profil Saya" icon="pe-7s-user">
            <p><strong>Nama:</strong> {{ auth()->user()->name }}</p>
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
            <p><strong>Bergabung sejak:</strong> {{ auth()->user()->created_at->translatedFormat('d F Y') }}</p>
            <x-admin.button href="{{ route('profile.edit') }}" variant="primary" icon="pe-7s-pen">
                Update Profile
            </x-admin.button>
        </x-admin.panel>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
        <x-admin.panel title="Email Terverifikasi" icon="pe-7s-check">
            @if(auth()->user()->email_verified_at)
                <x-admin.badge variant="success">Terverifikasi</x-admin.badge>
            @else
                <x-admin.badge variant="warning">Belum terverifikasi</x-admin.badge>
            @endif
        </x-admin.panel>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
        <x-admin.panel title="Akses Cepat" icon="pe-7s-rocket">
            <ul class="list-unstyled">
                <li><a href="{{ route('profile.edit') }}"><i class="pe-7s-user"></i> Update Profile</a></li>
            </ul>
        </x-admin.panel>
    </div>
</div>
@endsection
