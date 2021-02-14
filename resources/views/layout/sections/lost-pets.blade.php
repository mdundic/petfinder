<section id="portfolio">
    <div class="container wow fadeInUp">
        <div class="section-header">
            <h3 class="section-title">@lang('dictionary.lost_pets.title')</h3>
            <p class="section-description">@lang('dictionary.lost_pets.description')</p>
        </div>
        <div class="row" id="portfolio-wrapper">
            <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                <a href="" data-toggle="modal" data-target="#preview-pet-details">
                    <img src="img/portfolio/app1.jpg" alt="" class="portfolio-img">
                    <div class="details">
                        <h4>Pet title</h4>
                        <span>Short description</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                If you haven't found your pet, please add your pet to the list of lost pets and if someone finds it, they will contact you.
            </div>
            <div class="col-lg-4">
                <button type="button" class="btn btn-primary search-btn" data-toggle="modal" data-target="#add-lost-pet">
                  @lang('dictionary.lost_pets.add_new')
                </button>
            </div>
        </div>
    </div>
</section>

@include('layout.modals.add-lost-pet')
@include('layout.modals.preview-pet')