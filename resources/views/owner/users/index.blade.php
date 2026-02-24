@extends('layouts.owner')

@section('title', 'Manajemen User')

@section('content')
<div class="max-w-7xl mx-auto">

    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 bg-gradient-to-r from-amber-500 to-amber-600 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-users-cog text-white text-xl"></i>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-slate-800">
                    Manajemen User
                </h1>
                <p class="text-sm text-slate-500 mt-1">
                    Kelola user admin dan kurir sistem
                </p>
            </div>
        </div>

        <a href="{{ route('owner.users.create') }}"
           class="px-6 py-3 rounded-xl
                  bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700
                  text-white font-semibold
                  shadow-lg hover:shadow-xl
                  transition-all duration-200 flex items-center">
            <i class="fas fa-plus mr-2"></i>
            Tambah User
        </a>
    </div>

    <!-- Alert -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-gradient-to-r from-emerald-50 to-green-50 border border-emerald-200 rounded-xl flex items-center">
            <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center mr-4">
                <i class="fas fa-check text-emerald-600"></i>
            </div>
            <div class="flex-1">
                <p class="font-medium text-emerald-800">{{ session('success') }}</p>
            </div>
            <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-800">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-gradient-to-br from-white to-blue-50 rounded-2xl shadow p-6 border border-blue-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-600 mb-1">Total User</p>
                    <p class="text-3xl font-bold text-slate-800">{{ $users->count() }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-users text-white"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-white to-blue-50 rounded-2xl shadow p-6 border border-blue-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-600 mb-1">Admin</p>
                    <p class="text-3xl font-bold text-blue-600">
                        {{ $users->where('level', 'admin')->count() }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-user-shield text-white"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-white to-emerald-50 rounded-2xl shadow p-6 border border-emerald-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-600 mb-1">Kurir</p>
                    <p class="text-3xl font-bold text-emerald-600">
                        {{ $users->where('level', 'kurir')->count() }}
                    </p>
                </div>
                <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-truck text-white"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-slate-100">
        @if($users->isNotEmpty())
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-amber-50 to-amber-100">
                        <tr>
                            <th class="p-4 text-left font-semibold text-slate-700">
                                <div class="flex items-center">
                                    <i class="fas fa-user mr-3 text-amber-500"></i>
                                    User
                                </div>
                            </th>
                            <th class="p-4 text-left font-semibold text-slate-700">
                                <div class="flex items-center">
                                    <i class="fas fa-envelope mr-3 text-amber-500"></i>
                                    Email
                                </div>
                            </th>
                            <th class="p-4 text-center font-semibold text-slate-700">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-user-tag mr-3 text-amber-500"></i>
                                    Role
                                </div>
                            </th>
                            <th class="p-4 text-center font-semibold text-slate-700 w-48">
                                <div class="flex items-center justify-center">
                                    <i class="fas fa-calendar-alt mr-3 text-amber-500"></i>
                                    Bergabung
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($users as $user)
                        <tr class="hover:bg-slate-50/50 transition-colors duration-150">
                            <td class="p-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gradient-to-r 
                                        {{ $user->level === 'admin' ? 'from-blue-500 to-blue-600' : 'from-emerald-500 to-emerald-600' }}
                                        rounded-xl flex items-center justify-center shadow">
                                        <i class="fas 
                                            {{ $user->level === 'admin' ? 'fa-user-shield' : 'fa-truck' }}
                                            text-white text-sm">
                                        </i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-slate-800">{{ $user->name }}</p>
                                        <p class="text-xs text-slate-500 mt-1">
                                            ID: {{ $user->id }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            
                            <td class="p-4">
                                <div class="flex items-center">
                                    <i class="fas fa-envelope text-slate-400 mr-2"></i>
                                    <a href="mailto:{{ $user->email }}" 
                                       class="text-slate-700 hover:text-amber-600 transition-colors">
                                        {{ $user->email }}
                                    </a>
                                </div>
                            </td>
                            
                            <td class="p-4">
                                <div class="flex justify-center">
                                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold
                                        {{ $user->level === 'admin' 
                                            ? 'bg-blue-100 text-blue-700 border border-blue-200' 
                                            : 'bg-emerald-100 text-emerald-700 border border-emerald-200' }}">
                                        @if($user->level === 'admin')
                                            <i class="fas fa-user-shield mr-2"></i>
                                        @else
                                            <i class="fas fa-truck mr-2"></i>
                                        @endif
                                        {{ ucfirst($user->level) }}
                                    </span>
                                </div>
                            </td>
                            
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Table Footer -->
            <div class="px-6 py-4 bg-slate-50 border-t border-slate-100">
                <div class="flex items-center justify-between text-sm text-slate-600">
                    <div class="flex items-center">
                        <i class="fas fa-users mr-2 text-amber-500"></i>
                        Menampilkan {{ $users->count() }} user
                    </div>
                    <div class="text-slate-500">
                        {{-- Total: {{ $users->total() }} user terdaftar --}}
                    </div>
                </div>
            </div>

        @else
            <!-- Empty State -->
            <div class="p-12 text-center">
                <div class="inline-block p-6 bg-slate-100 rounded-full mb-4">
                    <i class="fas fa-users text-slate-400 text-3xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-slate-700 mb-2">
                    Belum ada user
                </h3>
                <p class="text-slate-500 mb-6 max-w-md mx-auto">
                    Tambahkan user untuk mulai mengelola sistem catering
                </p>
                <a href="{{ route('owner.users.create') }}"
                   class="inline-flex items-center px-6 py-3 rounded-xl
                          bg-gradient-to-r from-amber-500 to-amber-600
                          text-white font-semibold hover:from-amber-600 hover:to-amber-700
                          transition-all duration-200">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah User Pertama
                </a>
            </div>
        @endif
    </div>

    <!-- User Roles Guide -->
    <div class="mt-8 bg-gradient-to-r from-slate-50 to-slate-100 rounded-2xl p-6 border border-slate-200">
        <div class="flex items-center mb-6">
            <div class="w-10 h-10 bg-amber-100 rounded-xl flex items-center justify-center mr-3">
                <i class="fas fa-info-circle text-amber-600"></i>
            </div>
            <h3 class="font-bold text-slate-800">Panduan Role User</h3>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-xl p-5 shadow-sm">
                <div class="flex items-center mb-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mr-3">
                        <i class="fas fa-user-shield text-white"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800">Admin</h4>
                        <p class="text-sm text-blue-600">Full Access</p>
                    </div>
                </div>
                <ul class="space-y-2 text-sm text-slate-600">
                    <li class="flex items-start">
                        <i class="fas fa-check text-blue-500 mt-1 mr-2"></i>
                        <span>Kelola paket catering</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-blue-500 mt-1 mr-2"></i>
                        <span>Kelola pesanan pelanggan</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-blue-500 mt-1 mr-2"></i>
                        <span>Kelola pembayaran</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-blue-500 mt-1 mr-2"></i>
                        <span>Akses dashboard lengkap</span>
                    </li>
                </ul>
            </div>
            
            <div class="bg-white rounded-xl p-5 shadow-sm">
                <div class="flex items-center mb-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center mr-3">
                        <i class="fas fa-truck text-white"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800">Kurir</h4>
                        <p class="text-sm text-emerald-600">Limited Access</p>
                    </div>
                </div>
                <ul class="space-y-2 text-sm text-slate-600">
                    <li class="flex items-start">
                        <i class="fas fa-check text-emerald-500 mt-1 mr-2"></i>
                        <span>Lihat pesanan yang perlu dikirim</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-emerald-500 mt-1 mr-2"></i>
                        <span>Update status pengiriman</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check text-emerald-500 mt-1 mr-2"></i>
                        <span>Upload bukti pengiriman</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-times text-red-500 mt-1 mr-2"></i>
                        <span class="text-slate-400">Tidak bisa mengelola data</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>
@endsection