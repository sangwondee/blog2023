<div class="flash-error">
    <b>This are some errors in your submission:</b>
    @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
</div>
