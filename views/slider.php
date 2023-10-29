<div class="container">
    <div class="splide">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide"><img src="public/Img/SLIDER_KALLPA.png" alt="" /></li>
                <li class="splide__slide"><img src="public/Img/SLIDER_KALLPA1.png" alt="" /></li>
                <li class="splide__slide"><img src="public/Img/SLIDER_KALLPA2.png" alt="" /></li>
            </ul>
        </div>
    </div>
</div>


<script>
    new Splide('.splide', {
        type: 'loop',
        autoplay: true,
        interval: '2000',
        pagination: false,
    }).mount();
</script>