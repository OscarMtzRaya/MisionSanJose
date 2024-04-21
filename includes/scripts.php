        </div>
        <!-- /#page -->
        </div>
        <!-- /#wrapper -->

        <!-- cusor -->
        <div class="tf-mouse tf-mouse-outer"></div>
        <div class="tf-mouse tf-mouse-inner"></div>

        <!-- go top button -->
        <div class="progress-wrap active-progress">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewbox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                    style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;">
                </path>
            </svg>
        </div>

        <!-- Javascript -->
        <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
        </script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/swiper-bundle.min.js"></script>
        <script src="assets/js/swiper.js"></script>
        <script src="assets/js/map.min.js"></script>
        <script src="assets/js/map.js"></script>
        <script src="assets/js/countto.js"></script>
        <script src="assets/js/count-down.js"></script>
        <script src="assets/js/nouislider.min.js"></script>
        <script src="assets/js/magnific-popup.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/main.js"></script>
        <script>
$(document).ready(function() {
    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
                return item.el.attr('title') + '<small>Mision San José</small>';
            }
        }
    });
});
        </script>

        <!-- photoswipe -->
        <script type="module">
            import PhotoSwipeLightbox from '/assets/js/photoswipe-lightbox.esm.js';
            const lightbox = new PhotoSwipeLightbox({
                gallery: '#gallery--none-transition',
                children: 'a',
                showHideAnimationType: 'none',

                // optionally disable zoom transition,
                // to create more consistent experience
                zoomAnimationDuration: false,

                pswpModule: () => import('/assets/js/photoswipe.esm.js')
            });
            lightbox.init();
        </script>

        </body>

        <!-- </html> -->