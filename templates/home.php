<?php get_header(); ?>

<div class=" body_padding home_banner" dir="ltr">
    <div class="home_banner_left_note">
        <div class="home_banner_left_note_text">Scroll to explore</div>
        <div class="home_banner_left_note_line"></div>
    </div>
    <div class="home_banner_heading">
        <div class="home_banner_heading_container">
            <h2 class="home_banner_heading_text"><span>Y</span>our <span>I</span>magination <span>O</span>f
                <span>B</span>eauty
                <img class="home_banner_heading_image" src="<?php echo get_template_directory_uri() . "/assets/images/home_hero_image.jpg" ?>">
                <span>C</span>omes <span>T</span>rue <span>H</span>ere</h2>
        </div>
        <div class="home_banner_button_container">
            <a href="" class="btn_black">
                <span>نوبت دهی آنلاین</span>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 7.33333H16.5M4.83333 1.5V3.16667M13.1667 1.5V3.16667M4.16667 16.5H13.8333C14.7668 16.5 15.2335 16.5 15.59 16.3183C15.9036 16.1586 16.1586 15.9036 16.3183 15.59C16.5 15.2335 16.5 14.7668 16.5 13.8333V5.83333C16.5 4.89991 16.5 4.4332 16.3183 4.07668C16.1586 3.76308 15.9036 3.50811 15.59 3.34832C15.2335 3.16667 14.7668 3.16667 13.8333 3.16667H4.16667C3.23325 3.16667 2.76654 3.16667 2.41002 3.34832C2.09641 3.50811 1.84144 3.76308 1.68166 4.07668C1.5 4.4332 1.5 4.89991 1.5 5.83333V13.8333C1.5 14.7668 1.5 15.2335 1.68166 15.59C1.84144 15.9036 2.09641 16.1586 2.41002 16.3183C2.76654 16.5 3.23325 16.5 4.16667 16.5Z" stroke="#FCFBF9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <a href="" class="btn_white">درخواست مشاوره</a>
        </div>
    </div>
</div>
<div class="service_ticker_container">
    <div class="service_ticker">
        <div class="service_ticker_item"><img src="<?php echo get_template_directory_uri() . "/assets/images/ticker_icon.svg"?>" alt="">بیش از 16 نفر کادر درمانی</div>
        <div class="service_ticker_item"><img src="<?php echo get_template_directory_uri() . "/assets/images/ticker_icon.svg"?>" alt="">پزشکان متخصص</div>
        <div class="service_ticker_item"><img src="<?php echo get_template_directory_uri() . "/assets/images/ticker_icon.svg"?>" alt="">بیش از 27 هزار مراجعه کننده راضی</div>
        <div class="service_ticker_item"><img src="<?php echo get_template_directory_uri() . "/assets/images/ticker_icon.svg"?>" alt="">بالای 15 سال تجربه</div>
    </div>
</div>

<div class="body_padding home_clinic_services">
    <div class="home_clinic_services_text">
        <div class="home_clinic_services_text_header">
            <div class="header_line"></div>
            <div><h2 class="font_5xl_regular">خدمات شن&zwnj;های نقره&zwnj;ای</h2></div>
        </div>
        <div class="home_clinic_services_text_content">
            <p class="font_xl font_xl_lite">این که هدف شما جوانسازی پوست ، بازیابی حجم صورت و بدن است یا درمان موهای از دست رفته، کلینیک شن‌های نقره‌ای تمامی این خدمات را پوشش می‌دهد.</p>
        </div>
    </div>
    <div class="home_clinic_services_sections_container">
        <div class="home_clinic_services_section">
            <div class="home_clinic_services_section_image">
                <img src="<?php echo get_template_directory_uri() . "/assets/images/home_service_skin.jpg" ?>"
                    alt="پـوسـت">
                <div class="home_clinic_services_section_image_overlay">
                    <div class="home_clinic_services_section_image_overlay_icon">
                        <img src="<?php echo get_template_directory_uri() . "/assets/images/image_overlay_icon.svg" ?>" alt="">
                    </div>
                    <div class="home_clinic_services_section_image_overlay_text">SKIN TREATMENT</div>
                </div>
            </div>
            <h3 class="font_2xl font_2xl_regular">پـوسـت</h3>
        </div>
        <div class="home_clinic_services_section">
            <div class="home_clinic_services_section_image">
                <img src="<?php echo get_template_directory_uri() . "/assets/images/home_service_hair.jpg" ?>" alt="مـو">
            </div>
            <h3 class="font_2xl font_2xl_regular">مـو</h3>
        </div>
        <div class="home_clinic_services_section">
            <div class="home_clinic_services_section_image">
                <img src="<?php echo get_template_directory_uri() . "/assets/images/home_service_beauty.jpg" ?>"
                    alt="زیبـایـی">
            </div>
            <h3 class="font_2xl font_2xl_regular">زیبـایـی</h3>
        </div>
        <div class="home_clinic_services_section">
            <div class="home_clinic_services_section_image">
                <img src="<?php echo get_template_directory_uri() . "/assets/images/home_service_fitness.jpg" ?>"
                    alt="تنـاسـب انـدام">
            </div>
            <h3 class="font_2xl font_2xl_regular">تنـاسـب انـدام</h3>
        </div>
    </div>
    <div class="home_clinic_services_sections"></div>
</div>

<?php
get_footer();
?>
