<section id="portfolio">
    <div class="container wow fadeInUp">
        <div class="section-header">
            <h3 class="section-title">@lang('dictionary.found_pets.title')</h3>
            <p class="section-description">@lang('dictionary.found_pets.description')</p>
        </div>
        <div class="row" id="portfolio-wrapper">
            <!-- foreach -->
            <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                <a href="">
                    <img src="img/portfolio/app1.jpg" alt="" class="portfolio-img">
                    <div class="details">
                        <h4>Pet title</h4>
                        <span>Short description</span>
                    </div>
                </a>
            </div>
            <!-- endforeach -->
            <div class="col-lg-12" id="load-more">
                <button type="submit" class='beige-btn'>
                    @lang('dictionary.found_pets.see_all')
                </button>
            </div>
        </div>
    </div>
</section>