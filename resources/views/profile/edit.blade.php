@extends('layouts.admin', [
    'title' => 'Update Profile',
    'headerTitle' => 'Update Profile',
    'headerSubtitle' => 'Perbarui data akun Anda',
    'breadcrumb' => 'Profile',
    'headerIcon' => 'pe-7s-user',
])

@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
        @if(session('status'))
            <x-admin.alert variant="success">
                {{ session('status') }}
            </x-admin.alert>
        @endif

        <x-admin.panel title="Data Profile" icon="pe-7s-id">
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <x-admin.input
                    name="name"
                    label="Nama"
                    :value="$user->name"
                    placeholder="Nama lengkap"
                />

                <x-admin.input
                    name="email"
                    type="email"
                    label="Email"
                    :value="$user->email"
                    placeholder="Alamat email"
                />

                <x-admin.input
                    name="password"
                    type="password"
                    label="Password Baru"
                    help="Kosongkan jika tidak ingin mengubah password."
                    placeholder="Password baru"
                />

                <x-admin.input
                    name="password_confirmation"
                    type="password"
                    label="Konfirmasi Password Baru"
                    placeholder="Ulangi password baru"
                />

                <x-admin.button type="submit" variant="success" icon="pe-7s-check">
                    Simpan Perubahan
                </x-admin.button>
            </form>
        </x-admin.panel>
    </div>
</div>
@endsection
