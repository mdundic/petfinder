<div class="modal fade" id="add-found-pet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">@lang('dictionary.found_pets.modal.title')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="row">
            <div class="col">
                <p>@lang('dictionary.found_pets.modal.description')</p>
            </div>
        </div>
        <div class="row">
            {{-- Type --}}
            <div class="col-6 search-filter">
                <select class="custom-select" id='found_pet_types'>
                    <option selected>@lang('dictionary.hero.type.select')</option>
                     @foreach ($pet_types as $type)
                        <option value="{{ $type }}">@lang('dictionary.hero.type.' . $type)</option>
                    @endforeach
                </select>
            </div>
            {{-- Size --}}
            <div class="col-6 search-filter" id='found_pet_sizes'>
                <select class="custom-select">
                    <option selected>@lang('dictionary.hero.size.select')</option>
                    @foreach ($pet_sizes as $size)
                        <option value="{{ $size }}">@lang('dictionary.hero.size.' . $size)</option>
                    @endforeach
                </select>
            </div>
            {{-- Color --}}
            <div class="col-6 search-filter" id='found_pet_colors'>
                <select class="custom-select">
                    <option selected>@lang('dictionary.hero.color.select')</option>
                    @foreach ($pet_colors as $color)
                        <option value="{{ $color }}">@lang('dictionary.hero.color.' . $color)</option>
                    @endforeach
                </select>
            </div>
            {{-- Town --}}
            <div class="col-6 search-filter" id='found_locations'>
                <select class="custom-select">
                    <option selected>@lang('dictionary.hero.location.select')</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location }}">@lang('dictionary.hero.location.' . $location)</option>
                    @endforeach
                </select>
            </div>
            {{-- Date --}}
            <div class="col-6 search-filter">
                <input type="date" class="custom-input"  id="found_at" name="found_at">
            </div>
            {{-- Name --}}
            <div class="col-6 search-filter">
                <input type="text" class="custom-input" id="name" name="name" placeholder="Enter pet's name">
            </div>
            {{-- Breed --}}
            <div class="col-6 search-filter">
                <input type="text" class="custom-input" id="breed" name="breed" placeholder="Enter pet's breed">
            </div>
            {{-- Phone --}}
            <div class="col-6 search-filter">
                <input type="text" class="custom-input" id="contact_phone" name="contact_phone" placeholder="Enter your contact phone">
            </div>
            {{-- Description --}}
            <div class="col-6 search-filter">
                <div class="form-group">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">@lang('dictionary.found_pets.modal.enter_description')</textarea>
                </div>
            </div>
            <div class="col-6">
            <!-- Upload image input-->
            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0">
                <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                <div class="input-group-append">
                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary search-btn">Add new found pet</button>
      </div>
    </div>
  </div>
</div>