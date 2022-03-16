@php
$name = old('name', isset($curso->name) ? $curso->name : '');
$description = old('description', isset($curso->description) ? $curso->description : '');
$category = old('category', isset($curso->category) ? $curso->category : '');
$categories = ['uno', 'dos', 'tres', 'cuatro', 'cinco'];
// dd([$category, $categories]);
@endphp
<fieldset>
  <label class="form-label" for="name">* Nombre:</label>
  <input type="text" name="name" value="{{ $name }}" id="name"
    class="form-control @error('name') is-invalid @enderror" placeholder="ingrese nombre" tabindex="1" autofocus>
  @error('name')
    <small>{{ $message }}</small>
  @enderror

  <br><br>
  <label class="form-label" for="description">* Descripción:</label>
  <textarea name="description" id="description" row="5" tabindex="2" autofocus
    placeholder="ingrese descripcion">{{ $description }}</textarea>
  </label>
  @error('description')
    <small>{{ $message }}</small>
  @enderror

  <br><br>
  <label>Categoría:<br>
    <select name="category" tabindex="3" autofocus placeholder="Categoria">
      @php
        for ($i = 0; $i <= 4; $i++) {
            $selected = $categories[$i] == $category ? ' selected' : '';
            echo '<option value=' . $categories[$i] . $selected . '>' . $categories[$i] . '</option>';
        }
      @endphp
    </select>
  </label>

  <br><br>
  <p>* : champ required</p>
  <div class="mb-3">
    <button class="btn btn-success btn-submit">Submit</button>
  </div>
</fieldset>
