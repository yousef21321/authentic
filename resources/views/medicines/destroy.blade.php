<form action="{{ route('medicines.destroy', $medicine->id) }}" method="GET">
    @csrf
    @method('GET')
    <button type="submit">Delete</button>
</form>
