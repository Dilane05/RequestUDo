<form {{ $attributes }} enctype="multipart/form-data" class="form-modal">
    @csrf
    {{$slot}}
</form>