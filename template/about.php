<?php /* Template Name: about */ ?>
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
        <h1 class="lv-hero__title"><?php echo esc_html(lv_t('من نحن', 'About Us')); ?></h1>
        <p class="lv-hero__subtitle"><?php echo esc_html(lv_t('العناية الفاخرة بالعلم', 'Luxury care, backed by science')); ?></p>
        <p class="lv-hero__text"><?php echo esc_html(lv_t('شركة رائدة في صناعة مستحضرات التجميل ومنتجات المكملات الغذائية عالية الجودة.', 'A leading company in the manufacture of high-quality cosmetics and nutrition products.')); ?></p>
      </div>
    </div>
  </section>

  <!-- Mission -->
  <section class="lv-section">
    <div class="lv-wrap">
      <div class="lv-section__head">
        <span class="lv-label"><?php echo esc_html(lv_t('رسالتنا', 'Our Mission')); ?></span>
        <h2 class="lv-section__title"><?php echo esc_html(lv_t('نؤمن بعلم العناية الحقيقي', 'We believe in the real science of care')); ?></h2>
      </div>

      <div class="lv-mission">
        <!-- Vision (dark) -->
        <div class="lv-mcard lv-mcard--dark">
          <span class="lv-mcard__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg>
          </span>
          <h3><?php echo esc_html(lv_t('الرؤية', 'Our Vision')); ?></h3>
          <p><?php echo esc_html(lv_t(
            'أن نصبح شركة رائدة في مجال صناعة مستحضرات التجميل ومنتجات المكملات الغذائية عالية الجودة، مما نُمكّن الأفراد من الوصول للصحة والجمال. وكذلك نحن نسعى إلى الابتكار وتطوير منتجات آمنة وفعّالة ومستدامة، مع الحفاظ على التزامنا بالممارسات التجارية الأخلاقية والمسؤولية الاجتماعية.',
            'To become a leading pharmaceutical company that produces high-quality cosmetics and nutrition products, empowering individuals to achieve optimal health and beauty. We strive to innovate and develop products that are safe, effective, and sustainable, while maintaining our commitment to ethical business practices and social responsibility.'
          )); ?></p>
        </div>

        <!-- Goal (light) -->
        <div class="lv-mcard">
          <span class="lv-mcard__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1.5"/></svg>
          </span>
          <h3><?php echo esc_html(lv_t('الهدف', 'Our Goal')); ?></h3>
          <p><?php echo esc_html(lv_t(
            'رسالتنا هي تطوير وتصنيع منتجات آمنة وفعّالة وبأسعار مناسبة تلبي احتياجات عملائنا. نحن ملتزمون باستخدام أحدث الأبحاث العلمية والتكنولوجيا لصناعة منتجات تخدم تحسين الحياة الصحية، مع الالتزام بالاستدامة والممارسات التجارية الأخلاقية. نحن نسعى جاهدين إلى تقديم خدمة عملاء استثنائية، وتعزيز ثقافة الابتكار.',
            'Our mission is to develop and manufacture safe, effective, and affordable products that meet the needs of our customers. We are committed to using the latest scientific research and technology to create products that promote healthy living, while maintaining our commitment to sustainability and ethical business practices. We strive to provide exceptional customer service, foster a culture of innovation, and create value for our stakeholders.'
          )); ?></p>
        </div>
      </div>
    </div>
  </section>

</div><!-- #primary -->
<?php get_footer(); ?>
