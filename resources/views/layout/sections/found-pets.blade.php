<section id="portfolio">
    <div class="container wow fadeInUp">
        <div class="section-header">
            <h3 class="section-title">@lang('dictionary.found_pets.title')</h3>
            <p class="section-description">@lang('dictionary.found_pets.description')</p>
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
        </div>
        <div class="row">
            <div class="col-lg-8">
                If you have found someone's pet, and you can not find it in the list of lost pets, please add the pet's detailsand help the owners to find their pets. If someone recognises their pet they will contact you. Thtank you!
            </div>
            <div class="col-lg-4">
                <button type="button" class="btn btn-primary search-btn" data-toggle="modal" data-target="#add-lost-pet">
                  @lang('dictionary.found_pets.add_new')
                </button>
            </div>
        </div>
    </div>
</section>

@include('layout.modals.add-found-pet')