<?php /* Template Name: contact */ ?>
<?php get_header(); ?>
<div id="primary" class="lv-page" style="margin-top:0;margin-bottom:0;background-color:#fbfaf8" <?php astra_primary_class(); ?>>

  <!-- Hero -->
  <section class="lv-hero">
    <div class="lv-wrap">
      <div class="lv-hero__inner">
        <span class="lv-badge">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l1.9 3.8 4.2.6-3 3 .7 4.2L12 16l-3.8 2 .7-4.2-3-3 4.2-.6L12 3z"/></svg>
          <?php echo esc_html(lv_t('لوفيزاج', 'LeVisage')); ?>
        </span>
        <h1 class="lv-hero__title"><?php echo esc_html(lv_t('تواصل معنا', 'Contact Us')); ?></h1>
        <p class="lv-hero__subtitle"><?php echo esc_html(lv_t('نحن هنا لمساعدتك', 'We are here to help you')); ?></p>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section class="lv-section">
    <div class="lv-wrap">

      <p class="lv-contact__intro"><?php echo esc_html(lv_t(
        'يمكنك الآن التواصل معنا من خلال نموذج التواصل بإدخال البيانات المطلوبة وكتابة الرسالة والضغط على "إرسال"، وسيقوم أحد ممثلي خدمة العملاء بالتواصل معك في أقرب وقت. كما يمكنك التواصل معنا عن طريق وسائل التواصل الموضحة بالأسفل ومتابعتنا على وسائل التواصل الاجتماعي.',
        'You can now contact us through the contact form by adding the required information, writing your message, and clicking "Send." One of our customer service representatives will get in touch with you as soon as possible. You can also reach us through the contact methods shown below and follow us on social media.'
      )); ?></p>

      <div class="lv-contact-grid">

        <!-- Contact form -->
        <div class="lv-card lv-form">
          <div class="lv-card__head">
            <span class="lv-card__icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 2 11 13"/><path d="M22 2 15 22l-4-9-9-4 20-7z"/></svg>
            </span>
            <h3 class="lv-card__title"><?php echo esc_html(lv_t('نموذج التواصل', 'Contact Form')); ?></h3>
          </div>
          <?php echo do_shortcode('[contact-form-7 id="ce08332" title="Contact us"]'); ?>
        </div>

        <!-- Contact info -->
        <div class="lv-card lv-card--dark">
          <div class="lv-card__head">
            <span class="lv-card__icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3-8.6A2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.8.6 2.6a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.5-1.1a2 2 0 0 1 2.1-.5c.8.3 1.7.5 2.6.6a2 2 0 0 1 1.7 2z"/></svg>
            </span>
            <h3 class="lv-card__title"><?php echo esc_html(lv_t('بيانات التواصل', 'Contact Details')); ?></h3>
          </div>

          <ul class="lv-cinfo">
            <li>
              <span class="lv-cinfo__ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3 19.5 19.5 0 0 1-6-6 19.8 19.8 0 0 1-3-8.6A2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1.9.3 1.8.6 2.6a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.5-1.1a2 2 0 0 1 2.1-.5c.8.3 1.7.5 2.6.6a2 2 0 0 1 1.7 2z"/></svg></span>
              <span>
                <span class="lv-cinfo__label"><?php echo esc_html(lv_t('هاتف', 'Phone')); ?></span>
                <a class="lv-cinfo__val" href="tel:+201004025435">01004025435</a>
              </span>
            </li>
            <li>
              <span class="lv-cinfo__ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg></span>
              <span>
                <span class="lv-cinfo__label"><?php echo esc_html(lv_t('واتساب', 'WhatsApp')); ?></span>
                <a class="lv-cinfo__val" href="https://wa.me/+201004025435" target="_blank" rel="noopener">01004025435</a>
              </span>
            </li>
            <li>
              <span class="lv-cinfo__ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 6-10 7L2 6"/></svg></span>
              <span>
                <span class="lv-cinfo__label"><?php echo esc_html(lv_t('البريد الإلكتروني', 'Email')); ?></span>
                <a class="lv-cinfo__val" href="mailto:Info@levisage-pharma.com">Info@levisage-pharma.com</a>
              </span>
            </li>
            <li>
              <span class="lv-cinfo__ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0z"/><circle cx="12" cy="10" r="3"/></svg></span>
              <span>
                <span class="lv-cinfo__label"><?php echo esc_html(lv_t('العنوان', 'Address')); ?></span>
                <span class="lv-cinfo__val lv-cinfo__val--rtl"><?php echo esc_html(lv_t('دار مصر - العبور - القليوبية', 'Dar Misr - Obour - Qalyubia')); ?></span>
              </span>
            </li>
          </ul>

          <div class="lv-csocial">
            <div class="lv-csocial__label"><?php echo esc_html(lv_t('تابعنا', 'Follow us')); ?></div>
            <div class="lv-csocial__row">
              <a href="https://www.instagram.com/levisage.pharma/" target="_blank" rel="noopener" aria-label="Instagram">
                <svg fill="currentColor" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M20.445 5h-8.891A6.559 6.559 0 0 0 5 11.554v8.891A6.559 6.559 0 0 0 11.554 27h8.891a6.56 6.56 0 0 0 6.554-6.555v-8.891A6.557 6.557 0 0 0 20.445 5zm4.342 15.445a4.343 4.343 0 0 1-4.342 4.342h-8.891a4.341 4.341 0 0 1-4.341-4.342v-8.891a4.34 4.34 0 0 1 4.341-4.341h8.891a4.342 4.342 0 0 1 4.341 4.341l.001 8.891z"/><path d="M16 10.312c-3.138 0-5.688 2.551-5.688 5.688s2.551 5.688 5.688 5.688 5.688-2.551 5.688-5.688-2.55-5.688-5.688-5.688zm0 9.163a3.475 3.475 0 1 1-.001-6.95 3.475 3.475 0 0 1 .001 6.95zM21.7 8.991a1.363 1.363 0 1 1-1.364 1.364c0-.752.51-1.364 1.364-1.364z"/></svg>
              </a>
              <a href="https://www.facebook.com/levisagepharma" target="_blank" rel="noopener" aria-label="Facebook">
                <svg fill="currentColor" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M21.95 5.005l-3.306-.004c-3.206 0-5.277 2.124-5.277 5.415v2.495H10.05v4.515h3.317l-.004 9.575h4.641l.004-9.575h3.806l-.003-4.514h-3.803v-2.117c0-1.018.241-1.533 1.566-1.533l2.366-.001.01-4.256z"/></svg>
              </a>
              <a href="https://www.tiktok.com/@levisage.pharma" target="_blank" rel="noopener" aria-label="TikTok">
                <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M6.977,15.532a2.791,2.791,0,0,0,2.791,2.792,2.859,2.859,0,0,0,2.9-2.757L12.7,3h2.578A4.8,4.8,0,0,0,19.7,7.288v2.995h0c-.147.014-.295.022-.443.022a4.8,4.8,0,0,1-4.02-2.172v7.4a5.469,5.469,0,1,1-5.469-5.469c.114,0,.226.01.338.017v2.7a2.909,2.909,0,0,0-.338-.034A2.791,2.791,0,0,0,6.977,15.532Z"/></svg>
              </a>
              <a href="https://wa.me/+201004025435" target="_blank" rel="noopener" aria-label="WhatsApp">
                <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2 22l5.25-1.38c1.45.79 3.08 1.21 4.79 1.21 5.46 0 9.91-4.45 9.91-9.91S17.5 2 12.04 2zm5.8 14.09c-.25.7-1.44 1.33-1.99 1.36-.53.03-1.02.22-3.42-.72-2.89-1.14-4.73-4.1-4.87-4.29-.14-.19-1.17-1.56-1.17-2.97 0-1.41.74-2.1 1-2.39.26-.29.57-.36.76-.36.19 0 .38.002.55.01.18.008.42-.067.65.5.25.6.85 2.07.92 2.22.07.15.12.33.02.52-.09.19-.14.31-.28.48-.14.17-.29.37-.42.5-.14.14-.28.29-.12.57.16.28.72 1.19 1.55 1.93 1.07.95 1.97 1.25 2.25 1.39.28.14.44.12.6-.07.16-.19.69-.8.87-1.08.18-.28.36-.23.61-.14.25.09 1.6.75 1.87.89.28.14.46.21.53.32.07.11.07.65-.18 1.35z"/></svg>
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

</div><!-- #primary -->
<?php get_footer(); ?>
