<div class="btn-group">
    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary btn-sm" style="width: 70px; height:30px;">Edit</a>
    <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
    </form>
</div>
