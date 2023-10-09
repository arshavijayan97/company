<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <!-- resources/views/invoice_form.blade.php -->
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Enter The Details') }}
        </h2>

    </header>
    @if ($errors->has('error'))
    <div class="alert alert-danger">{{ $errors->first('error') }}</div>
@endif

<!-- Display errors for the 'email', 'logo', and 'website' fields -->
@error('email')
    <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
@enderror

@error('logo')
    <div class="alert alert-danger"  style="color: red;">{{ $message }}</div>
@enderror

@error('website')
    <div class="alert alert-danger"  style="color: red;">{{ $message }}</div>
@enderror

    <form id="myForm" method="post" action="{{ route('companies.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
 @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

        
    <div>
        <label for="name">Company Name</label>
        <input type="text" name="name" id="name"  required class="mt-1 block w-full">
        <span id="nameError" class="error-message"></span>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value=""  class="mt-1 block w-full" required>
    </div>

    <div class="form-group">
        <label for="logo">Logo (Minimum 100x100 pixels)</label>
        <input type="file" name="logo" id="logo"  class="mt-1 block w-full">
    </div>

    <div class="form-group">
        <label for="website">Website</label>
        <input type="text" name="website" id="website" value=""  class="mt-1 block w-full">
    </div>

    

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

        </div>
    </form>
</section>
                </div>
            </div>
        </div>
    </div>

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
    <!-- Script for handling input changes -->

@if(session('success'))
    <script>
        setTimeout(function() {
            document.querySelector('.alert').style.display = 'none';
        }, 1800); 
        
        
    </script>
    @else
    <script>
        setTimeout(function() {
            document.querySelector('.alert').style.display = 'none';
        }, 1800); 
        
        
    </script>

@endif
</x-app-layout>















