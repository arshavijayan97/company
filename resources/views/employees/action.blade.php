<div class="btn-group">
    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary btn-sm" style="width: 70px; height:30px;">Edit</a>
    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Employee?')">Delete</button>
    </form>
</div>
