<form action="{{ route('kpi.destroy', $addKpi->id) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button> 
</form>