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
            <div class="col-lg-12">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-found-pet">
                  Add found pet
                </button>
            </div>
        </div>
    </div>
</section>

@include('layout.modals.add-found-pet')