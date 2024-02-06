<label for="">Статус</label>
<select name="published" class="form-contrpl">
    @if (isset($category->id))
    <option value="0" @if ($category->published == 0) selected="" @endif>Не опубликовано</option>
    <option value="1" @if ($category->published == 1) selected="" @endif>Опубликовано</option>
    @else
    <option value="0">Не опубликовано</option>
    <option value="1">Опубликовано</option>
    @endif
</select>
<br>
<br>
<label for="">Наименование</label>
<input type="text" class="form-control" name="title" placeholder="Заголовок категории" 
value="{{ $category['title'] ?? '' }}" required>

<label for="">Slug</label>
<input type="text" class="form-control" name="slug" placeholder="Автоматическая генерация" 
value="{{ $category['slug'] ?? '' }}" readonly="">

<label for="">Родительская категория</label>
<select name="parent_id" class="form-control">
<option value="0">-- без родительской категории --</option>
@include('admin.categories.partials.categories', ['categories' => $categories])
</select>

<hr />

<input class="btn btn-primary" type="submit" value="Сохранить">
