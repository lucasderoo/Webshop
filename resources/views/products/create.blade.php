@include('layouts.app')


<form class="form-horizontal" role="form" method="POST" action="">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="row">
  <div class="col-md-4"></div>
  <div class="form-group col-md-4">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title">
  </div>
</div>
<div class="row">
  <div class="col-md-4"></div>
    <div class="form-group col-md-4">
      <label for="main_image">Images</label>
      <input type="file" name="main_image">
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4"></div>
    <div class="form-group col-md-4">
      <label for="price">Price</label>
      <input type="text" class="form-control" name="price">
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4"></div>
    <div class="form-group col-md-4">
      <label for="category">Category</label><br>
      <select name="category" class="form-control">
      @foreach($categories as $category)
      	<option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
      </select>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4"></div>
    <div class="form-group col-md-4">
      <label for="release_date">Release date</label>
      <input type="date" class="form-control" name="release_date">
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4"></div>
    <div class="form-group col-md-4">
      <label for="release_date">Description</label>
      <textarea class="form-control" name="release_date"></textarea>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4"></div>
    <div class="form-group col-md-4">
      <label for="artist">Artist</label>
      <input type="text" class="form-control" name="artist">
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4"></div>
    <div class="form-group col-md-4">
      <label for="genre">Genre</label><br>
      <select name="genre" class="form-control">
      @foreach($genres as $genre)
      	<option value="{{ $genre->id }}">{{ $genre->name }}</option>
      @endforeach
      </select>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4"></div>
    <div class="form-group col-md-4">
      <label for="carrier">Carrier</label><br>
      <select name="carrier" class="form-control">
      @foreach($carriers as $carrier)
      	<option value="{{ $carrier->id }}">{{ $carrier->name }}</option>
      @endforeach
      </select>
    </div>
  </div>
</div>







<div class="row">
</div>
<button type="submit" class="btn btn-primary">Save</button>
</form>