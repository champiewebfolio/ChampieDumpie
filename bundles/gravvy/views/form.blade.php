<!-- /bundles/gravvy/views/form.blade.php -->
<form action="{{ URL::to_action('gravvy::preview@preview') }}" method="POST">
    <p><label for="name">Email Address:</label></p>
    <p><input type="text" name="email" /></p>
    <p><label for="name">Avatar Size:</label></p>
    <p><input type="text" name="size" /></p>
    <p><input type="submit" value="Preview!" /></p>
</form>

<!-- /bundles/gravvy/views/preview.blade.php -->
<p>{{ $element }}</p>
<p>{{ HTML::link\_to\_action('gravvy::preview@form', '< Go Back!') }}</p>