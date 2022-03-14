@php
$name = isset($curso->name) ? old($curso->name) : '';
$description = isset($curso->description) ? old($curso->description) : '';
$category = isset($curso->category) ? old($curso->category) : '';

$categories = ['uno', 'dos', 'tres', 'cuatro', 'cinco'];
@endphp
<fieldset>
  <label>Nombre:<br>
    <input type="text" name="name" id="name" value="{{ $name }}" />
  </label>

  <br><br>
  <label>Descripción:<br>
    <textarea name="description" row="5">{{ $description }}</textarea>
  </label>

  <br><br>
  <label>Categoría:<br>
    <select name="category">
      @php
        for ($i = 0; $i <= 4; $i++) {
            $selected = $categories[$i] == $category ? ' selected' : '';
            echo '<option value=' . $categories[$i] . $selected . '>' . $categories[$i] . '</option>';
        }
      @endphp
    </select>
  </label>

  <br><br>
  <button type="submit">Enviar</button>
</fieldset>
