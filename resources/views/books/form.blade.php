
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $book->title ?? '') }}" required>
</div>
<div class="form-group">
    <label for="author">Author</label>
    <input type="text" name="author" class="form-control" value="{{ old('author', $book->author ?? '') }}" required>
</div>
<div class="form-group">
    <label for="rating">Rating</label>
    <input type="number" name="rating" class="form-control" value="{{ old('rating', $book->rating ?? '') }}" required min="0" max="5" step="0.1">
</div>
<div class="form-group">
    <label for="cover_image_url">Cover Image URL</label>
    <input type="url" name="cover_image_url" class="form-control" value="{{ old('cover_image_url', $book->cover_image_url ?? '') }}">
</div>
<div class="form-group">
    <label for="comment">Comment</label>
    <textarea name="comment" class="form-control">{{ old('comment', $book->comment ?? '') }}</textarea>
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" class="form-control" required>{{ old('description', $book->description ?? '') }}</textarea>
</div>
<div class="form-group">
    <label for="language">Language</label>
    <input type="text" name="language" class="form-control" value="{{ old('language', $book->language ?? '') }}" required>
</div>
<div class="form-group">
    <label for="age_recommendation">Age Recommendation</label>
    <input type="text" name="age_recommendation" class="form-control" value="{{ old('age_recommendation', $book->age_recommendation ?? '') }}">
</div>
<div class="form-group">
    <label for="publication_year">Publication Year</label>
    <input type="number" name="publication_year" class="form-control" value="{{ old('publication_year', $book->publication_year ?? '') }}" required min="1000" max="9999">
</div>
