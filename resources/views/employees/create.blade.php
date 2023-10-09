<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Employees') }}
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
@error('first_name')
    <div class="alert alert-danger" style="color: red;">{{ $message }}</div>
@enderror

@error('last_name')
    <div class="alert alert-danger"  style="color: red;">{{ $message }}</div>
@enderror

@error('email')
    <div class="alert alert-danger"  style="color: red;">{{ $message }}</div>
@enderror
@error('phone')
    <div class="alert alert-danger"  style="color: red;">{{ $message }}</div>
@enderror

    <form id="myForm" method="post" action="{{ route('employees.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
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
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name"  required class="mt-1 block w-full">
        <span id="first_nameError" class="error-message"></span>
    </div>
    <div>
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name"  required class="mt-1 block w-full">
        <span id="last_nameError" class="error-message"></span>
    </div>
    <div>
        <label for="company_id">Company Name:</label>
        <select name="company_id" id="company_id" required class="mt-1 block w-full">
            <option value=" "> --Choose Company--</option>
            @foreach ($companies as $company )
            <option value="{{$company->id}}">{{$company->name}}</option>
            @endforeach
            
           
        </select>
    </div>
    
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value=""  class="mt-1 block w-full" required>
    </div>
    <div>
        <label for="phone"> Phone</label>
        <input type="text" name="phone" id="phone"  required class="mt-1 block w-full">
        <span id="phoneError" class="error-message"></span>
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















