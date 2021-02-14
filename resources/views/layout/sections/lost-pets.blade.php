<section id="portfolio">
    <div class="container wow fadeInUp">
        <div class="section-header">
            <h3 class="section-title">@lang('dictionary.lost_pets.title')</h3>
            <p class="section-description">@lang('dictionary.lost_pets.description')</p>
        </div>
        <div class="row" id="portfolio-wrapper">
            <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                <a href="">
                    <img src="img/portfolio/app1.jpg" alt="" class="portfolio-img">
                    <div class="details">
                        <h4>Pet title</h4>
                        <span>Short description</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-12" id="load-more">
                <button type="submit" class='beige-btn'>
                    @lang('dictionary.lost_pets.see_all')
                </button>
            </div>
            <div class="col-lg-12">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-lost-pet">
                  Launch demo modal
                </button>
            </div>
        </div>
    </div>
</section>







<!-- Modal -->
<div class="modal fade" id="add-lost-pet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">@lang('dictionary.lost_pets.modal.title')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="row">
            <div class="col">
                <p>@lang('dictionary.lost_pets.modal.description')</p>
            </div>
        </div>
        <div class="row">
            {{-- Type --}}
            <div class="col-6 search-filter">
                <select class="custom-select" id='lost_pet_types'>
                    <option selected>@lang('dictionary.hero.type.select')</option>
                     @foreach ($pet_types as $type)
                        <option value="{{ $type }}">@lang('dictionary.hero.type.' . $type)</option>
                    @endforeach
                </select>
            </div>
            {{-- Size --}}
            <div class="col-6 search-filter" id='lost_pet_sizes'>
                <select class="custom-select">
                    <option selected>@lang('dictionary.hero.size.select')</option>
                    @foreach ($pet_sizes as $size)
                        <option value="{{ $size }}">@lang('dictionary.hero.size.' . $size)</option>
                    @endforeach
                </select>
            </div>
            {{-- Color --}}
            <div class="col-6 search-filter" id='lost_pet_colors'>
                <select class="custom-select">
                    <option selected>@lang('dictionary.hero.color.select')</option>
                    @foreach ($pet_colors as $color)
                        <option value="{{ $color }}">@lang('dictionary.hero.color.' . $color)</option>
                    @endforeach
                </select>
            </div>
            {{-- Town --}}
            <div class="col-6 search-filter" id='lost_locations'>
                <select class="custom-select">
                    <option selected>@lang('dictionary.hero.location.select')</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location }}">@lang('dictionary.hero.location.' . $location)</option>
                    @endforeach
                </select>
            </div>
            {{-- Date --}}
            <div class="col-6 search-filter">
                <input type="date" class="custom-input"  id="lost_at" name="lost_at">
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
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">@lang('dictionary.lost_pets.modal.enter_description')</textarea>
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
        <button type="button" class="btn btn-primary search-btn">Add new lost pet</button>
      </div>
    </div>
  </div>
</div>