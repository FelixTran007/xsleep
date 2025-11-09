<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Powerxsleep.vn</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="./assets/images/favicon.png">

    <!-- CSS (Font, Vendor, Icon, Plugins & Style CSS files) -->

    <!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,300;1,400;1,700&family=Poppins:wght@400;600&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <link rel="stylesheet" href="./assets/css/vendor/bootstrap.min.css">

    <!-- Plugins CSS (All Plugins Files) -->
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/plugins/simple-line-icons.css">
    <link rel="stylesheet" href="assets/css/plugins/icofont.min.css">
    <link rel="stylesheet" href="assets/css/plugins/fancybox.min.css">
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body>

    <!--== Wrapper Start ==-->
    <div class="wrapper">






        <?= $frontend_header ?>




        <main class="main-content">

        <?= $header_banner ?>    

        <?= $middle_banner ?>    

        

            <?= $various_products ?>

            <?= $group_products ?>

            <?= $featured_collections ?>

            <?= $client_says ?>

            <!--== Start Product Area Wrapper ==-->
            <div class="product-area section-top-space position-relative">
                <div class="container">
                    <div class="row mb-n2">
                        
                        <?= $mattress_bestseller ?>

                        <?= $pillow_bestseller ?>
                        
                        <?= $hot_banner ?>
                    </div>
                </div>
            </div>
            <!--== End Product Area Wrapper ==-->

            <?= $lastest_blog ?>

        </main>




        <!--== Start Footer Area Wrapper ==-->
        <footer class="footer-two-area">
            
            <?= $footer_menu ?>

            <?= $bottom_footer ?>    

        </footer>
        <!--== End Footer Area Wrapper ==-->


        <!--== Scroll Top Button ==-->
        <div class="scroll-to-top"><span class="icon-arrow-up"></span></div>

        <aside class="product-cart-view-modal modal fade" id="product-QuickViewModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="product-quick-view-content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"><span>×</span></button>
                            <div class="row row-gutter-0" id="quickview_content">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
       
        <?= $mobile_menu ?>

    </div>
    <!--== Wrapper End ==-->

    <!-- JS Vendor, Plugins & Activation Script Files -->

    <!-- Vendors JS -->
    <script src="./assets/js/vendor/modernizr-3.11.7.min.js"></script>
    <script src="./assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="./assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="./assets/js/vendor/bootstrap.bundle.min.js"></script>

    <!-- Plugins JS -->
    <script src="./assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="./assets/js/plugins/fancybox.min.js"></script>
    <script src="./assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="./assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="./assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="./assets/js/plugins/jquery.sticky-sidebar.min.js"></script>

    <!-- Custom Main JS -->
    <script src="./assets/js/main.js"></script>

    <script>
        let quickviewModal = new bootstrap.Modal(document.getElementById('product-QuickViewModal'));

        $(document).on("click", ".action-btn-quick-view", function() {
            let productId = $(this).data("id");

            $.ajax({
                url: "<?= site_url('product/quickview') ?>",
                type: "POST",
                data: { id: productId },
                success: function(response) {
                    $("#quickview_content").html(response);
                    quickviewModal.show(); // chỉ show, không new mỗi lần
                },
                error: function() {
                    $("#quickview_content").html("<p>Lỗi tải dữ liệu sản phẩm</p>");
                }
            });
        });
    </script>

   
    

</body>

</html>