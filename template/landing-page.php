<?php

/**
 * Template Name: Landing Page
 *
 * VIGILANT Anti Grey Serum — 2+1 offer landing page.
 * Markup mirrors the Lovable design 1:1; its compiled Tailwind lives in
 * css/landing-vigilant.css, scoped under .lv-page so it cannot touch the theme.
 * Assets, order CPT and the form handler: inc/landing-vigilant.php
 */

$lv_status = isset($_GET['order']) ? sanitize_key(wp_unslash($_GET['order'])) : '';
$lv_old = levisage_landing_old_input();

get_header(); ?>

<div class="lv-primary" <?php astra_primary_class(); ?>>
    <div class="lv-page" dir="rtl">

        <div dir="rtl" class="font-arabic bg-background text-foreground overflow-x-hidden">
            <section class="relative bg-hero-cinematic text-white overflow-hidden">
                <div class="absolute inset-0 bg-grid-luxury opacity-30 pointer-events-none"></div>
                <div class="absolute inset-0 bg-noise opacity-[0.08] pointer-events-none"></div>
                <div class="relative border-b border-white/10 bg-black/20 backdrop-blur-md">
                    <div class="container-luxury py-2.5 flex flex-wrap justify-center gap-x-6 gap-y-1 text-[13px] text-white/80"><span
                                class="inline-flex items-center gap-1.5">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
     class="lucide lucide-check size-3.5 text-[color:var(--leaf)]" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg> منتج تجميلي</span><span
                                class="inline-flex items-center gap-1.5">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
     class="lucide lucide-check size-3.5 text-[color:var(--leaf)]" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg> +10,000 عميل</span><span
                                class="inline-flex items-center gap-1.5">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
     class="lucide lucide-check size-3.5 text-[color:var(--leaf)]" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg> شحن لكل مكان في مصر</span>
                    </div>
                </div>
                <div class="relative container-luxury py-14 lg:py-20 grid lg:grid-cols-2 gap-12 items-center">
                    <div class="fade-up order-2 lg:order-1"><span
                                class="inline-flex items-center gap-2 rounded-full glass-dark px-4 py-1.5 text-xs tracking-widest text-white/90 mb-6">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
     class="lucide lucide-sparkles size-3.5 text-[color:var(--gold)]" aria-hidden="true"><path
            d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z"></path><path
            d="M20 2v4"></path><path d="M22 4h-4"></path><circle cx="4" cy="20" r="2"></circle></svg>عرض حصري — 2 + 1 مجاناً</span>
                        <h1 class="text-3xl md:text-5xl font-black text-gradient-luxury mb-5" style="line-height:1.5">
                            بدون صبغات وبدون عناء.. روتين يومي بسيط يعيد لشعرك لونه الطبيعي</h1>
                        <p class="text-white/80 text-lg leading-relaxed mb-7">روتين عملي مصمم ليساعد على تقليل ظهور
                            الشيب تدريجياً، ويرجع الشعر إلى لونه الطبيعي مع الاستخدام المنتظم.</p>
                        <div class="rounded-2xl glass-dark p-5 mb-7 border border-white/15">
                            <div class="flex items-center gap-4 flex-wrap">
                                <div class="text-white/60 line-through text-xl">1800 ج.م</div>
                                <div class="text-4xl font-black text-[color:var(--gold)]">1200 ج.م</div>
                                <span class="inline-flex items-center gap-1 rounded-full bg-[color:var(--leaf)]/20 border border-[color:var(--leaf)]/40 px-3 py-1 text-sm text-white">وفّر 600 ج.م فوراً</span>
                            </div>
                        </div>
                        <a href="#order"
                           class="inline-flex items-center justify-center gap-2 whitespace-nowrap cursor-pointer transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 disabled:cursor-not-allowed [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 shadow hover:bg-primary/90 w-full md:w-auto h-14 px-8 text-base font-bold rounded-full bg-gradient-to-l from-[color:var(--leaf)] to-[color:var(--navy)] text-white shadow-glow hover:opacity-95">اطلب
                            العرض الآن — دفع عند الاستلام · شحن سريع</a>
                        <div class="mt-6 flex flex-wrap gap-x-5 gap-y-2 text-sm text-white/75"><span
                                    class="inline-flex items-center gap-1.5">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
     class="lucide lucide-shield-check size-4 text-[color:var(--gold)]" aria-hidden="true"><path
            d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path><path
            d="m9 12 2 2 4-4"></path></svg> آمن 100%</span><span class="inline-flex items-center gap-1.5">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
     class="lucide lucide-award size-4 text-[color:var(--gold)]" aria-hidden="true"><path
            d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526"></path><circle
            cx="12" cy="8" r="6"></circle></svg> نتائج مضمونة</span><span class="inline-flex items-center gap-1.5">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
     class="lucide lucide-credit-card size-4 text-[color:var(--gold)]" aria-hidden="true"><rect width="20" height="14"
                                                                                                x="2" y="5"
                                                                                                rx="2"></rect><line
            x1="2" x2="22" y1="10" y2="10"></line></svg> طرق دفع تناسبك: دفع عند الاستلام | فيزا | InstaPay</span><span
                                    class="inline-flex items-center gap-1.5">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
     class="lucide lucide-star size-4 fill-[color:var(--gold)] text-[color:var(--gold)]" aria-hidden="true"><path
            d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg> 4.8/5</span>
                        </div>
                    </div>
                    <div class="order-1 lg:order-2 relative fade-up">
                        <div class="relative aspect-square max-w-[520px] mx-auto">
                            <div class="absolute inset-10 rounded-full bg-gradient-to-br from-[color:var(--navy)]/40 to-[color:var(--leaf)]/30 blur-3xl animate-pulse-glow"></div>
                            <img src="https://levisage-pharma.com/wp-content/uploads/2023/08/Artboard-3.png"
                                 alt="سيروم VIGILANT لعلاج الشعر الأبيض"
                                 class="relative w-full h-full object-contain animate-float drop-shadow-[0_30px_60px_rgba(0,0,0,0.5)]">
                            <div class="absolute -top-2 -right-2 md:top-6 md:right-2 rotate-12 bg-gradient-to-br from-[color:var(--gold)] to-amber-500 text-[color:var(--navy-deep)] rounded-full size-24 md:size-28 flex flex-col items-center justify-center font-black shadow-luxury">
                                <span class="text-2xl leading-none">2+1</span><span
                                        class="text-[11px] mt-1">مجاناً</span></div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="py-20 bg-[color:var(--cream)]">
                <div class="container-luxury">
                    <h2 class="text-3xl md:text-4xl font-bold text-center text-gradient-brand mb-3">إنت مش لوحدك اللي
                        بتحس بده</h2>
                    <p class="text-center text-muted-foreground mb-12 max-w-2xl mx-auto">مشاعر بنسمعها من آلاف العملاء
                        قبل ما يبدأوا الروتين معانا.</p>
                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-5">
                        <div class="bg-white rounded-2xl p-6 shadow-soft border border-border hover:shadow-luxury transition">
                            <div class="size-10 rounded-full bg-[color:var(--navy)]/10 text-[color:var(--navy)] flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-x size-5" aria-hidden="true">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </div>
                            <h3 class="font-bold text-lg mb-2">ظهور الشعر الأبيض بشكل ملحوظ</h3>
                            <p class="text-sm text-muted-foreground">كل يوم تلاحظ شعرة جديدة تخطف نظرك في المرآة.</p>
                        </div>
                        <div class="bg-white rounded-2xl p-6 shadow-soft border border-border hover:shadow-luxury transition">
                            <div class="size-10 rounded-full bg-[color:var(--navy)]/10 text-[color:var(--navy)] flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-x size-5" aria-hidden="true">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </div>
                            <h3 class="font-bold text-lg mb-2">فقدان الثقة في المظهر</h3>
                            <p class="text-sm text-muted-foreground">تتجنّب الصور القريبة وتتجنّب اللقاءات المهمة.</p>
                        </div>
                        <div class="bg-white rounded-2xl p-6 shadow-soft border border-border hover:shadow-luxury transition">
                            <div class="size-10 rounded-full bg-[color:var(--navy)]/10 text-[color:var(--navy)] flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-x size-5" aria-hidden="true">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </div>
                            <h3 class="font-bold text-lg mb-2">الاعتماد المستمر على الصبغات</h3>
                            <p class="text-sm text-muted-foreground">روتين متعب، نتائج مؤقتة، وتأثير على فروة الرأس.</p>
                        </div>
                        <div class="bg-white rounded-2xl p-6 shadow-soft border border-border hover:shadow-luxury transition">
                            <div class="size-10 rounded-full bg-[color:var(--navy)]/10 text-[color:var(--navy)] flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-x size-5" aria-hidden="true">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </div>
                            <h3 class="font-bold text-lg mb-2">القلق من زيادة الشيب</h3>
                            <p class="text-sm text-muted-foreground">إحساس إنك تخسر السيطرة على مظهر شعرك مع الوقت.</p>
                        </div>
                    </div>
                    <blockquote
                            class="mt-14 max-w-3xl mx-auto rounded-2xl glass p-8 text-center border border-[color:var(--navy)]/15 shadow-soft">
                        <p class="text-lg leading-relaxed text-[color:var(--navy-deep)]">«بصراحة، كل ما كنت باخد بالي من
                            شعرة بيضاء جديدة كنت باحس إني باخد بالي من حاجة تانية بتتغير فيّا… مش بس شعري.»</p>
                    </blockquote>
                </div>
            </section>
            <section class="py-20 bg-background">
                <div class="container-luxury max-w-4xl">
                    <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 text-gradient-brand">جربت قبل كده حلول…
                        ومعظمها سابك في نفس النقطة</h2>
                    <ul class="grid sm:grid-cols-2 gap-4">
                        <li class="flex gap-4 p-5 bg-white rounded-xl border border-border shadow-soft"><span
                                    class="shrink-0 size-9 rounded-full bg-destructive/10 text-destructive flex items-center justify-center">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
     stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x size-5" aria-hidden="true"><path
            d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></span>
                            <div>
                                <div class="font-semibold">صبغات مؤقتة</div>
                                <div class="text-sm text-muted-foreground mt-1">تغطي اللون ساعات قليلة وترجع تظهر.</div>
                            </div>
                        </li>
                        <li class="flex gap-4 p-5 bg-white rounded-xl border border-border shadow-soft"><span
                                    class="shrink-0 size-9 rounded-full bg-destructive/10 text-destructive flex items-center justify-center">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
     stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x size-5" aria-hidden="true"><path
            d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></span>
                            <div>
                                <div class="font-semibold">نتائج غير مستقرة</div>
                                <div class="text-sm text-muted-foreground mt-1">كل وصفة بتدّيك نتيجة مختلفة، ومفيش
                                    ثبات.
                                </div>
                            </div>
                        </li>
                        <li class="flex gap-4 p-5 bg-white rounded-xl border border-border shadow-soft"><span
                                    class="shrink-0 size-9 rounded-full bg-destructive/10 text-destructive flex items-center justify-center">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
     stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x size-5" aria-hidden="true"><path
            d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></span>
                            <div>
                                <div class="font-semibold">حلول مرهقة</div>
                                <div class="text-sm text-muted-foreground mt-1">خطوات كتير وروتين يصعب الاستمرار عليه.
                                </div>
                            </div>
                        </li>
                        <li class="flex gap-4 p-5 bg-white rounded-xl border border-border shadow-soft"><span
                                    class="shrink-0 size-9 rounded-full bg-destructive/10 text-destructive flex items-center justify-center">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
     stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x size-5" aria-hidden="true"><path
            d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></span>
                            <div>
                                <div class="font-semibold">روتين صعب الالتزام</div>
                                <div class="text-sm text-muted-foreground mt-1">بتسيبه بعد فترة بسبب الوقت والتكاليف.
                                </div>
                            </div>
                        </li>
                    </ul>
                    <p class="text-center mt-10 text-lg font-medium text-[color:var(--navy-deep)]">المشكلة مش فيك…
                        المشكلة في الحل اللي كنت بتستخدمه.</p></div>
            </section>
            <section class="py-20 bg-aurora text-white relative overflow-hidden">
                <div class="absolute inset-0 bg-grid-luxury opacity-20"></div>
                <div class="container-luxury relative grid lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <img src="https://levisage-pharma.com/wp-content/uploads/2023/10/%D8%A7%D9%86%D9%8A-%D8%AC%D8%B1%D8%A7%D9%8A-%D9%87%D9%8A%D8%B1-%D8%B3%D9%8A%D8%B1%D9%85-%D8%A7%D8%A8%D9%8A%D8%B6.webp"
                             alt="سيروم VIGILANT" class="w-full max-w-md mx-auto drop-shadow-2xl animate-float"></div>
                    <div>
                        <span class="inline-block text-xs tracking-[0.3em] text-[color:var(--gold)] mb-4">THE SOLUTION</span>
                        <h2 class="text-3xl md:text-4xl font-bold text-gradient-luxury mb-5">VIGILANT Anti Grey Serum من
                            LeVisage</h2>
                        <p class="text-white/80 leading-relaxed mb-8">تركيبة سويسرية بمكونات فعالة للتخلص من الشيب
                            المبكر والشعر الأبيض في سن مبكر.</p>
                        <div class="space-y-5">
                            <div class="flex gap-4 p-5 rounded-2xl glass-dark border border-white/10">
                                <div class="size-10 shrink-0 rounded-full bg-[color:var(--gold)] text-[color:var(--navy-deep)] font-bold flex items-center justify-center">
                                    1
                                </div>
                                <div>
                                    <div class="font-bold text-lg">ليه مختلف؟</div>
                                    <p class="text-white/75 text-sm mt-1">يستهدف مظهر الشعر الأبيض من جذوره بدل تغطيته
                                        كالصبغات.</p></div>
                            </div>
                            <div class="flex gap-4 p-5 rounded-2xl glass-dark border border-white/10">
                                <div class="size-10 shrink-0 rounded-full bg-[color:var(--gold)] text-[color:var(--navy-deep)] font-bold flex items-center justify-center">
                                    2
                                </div>
                                <div>
                                    <div class="font-bold text-lg">ليه الاستمرارية أهم حاجة؟</div>
                                    <p class="text-white/75 text-sm mt-1">النتائج تراكمية وتحتاج كمية كافية لإكمال
                                        الرحلة.</p></div>
                            </div>
                            <div class="flex gap-4 p-5 rounded-2xl glass-dark border border-white/10">
                                <div class="size-10 shrink-0 rounded-full bg-[color:var(--gold)] text-[color:var(--navy-deep)] font-bold flex items-center justify-center">
                                    3
                                </div>
                                <div>
                                    <div class="font-bold text-lg">ليه عملاء الباندل بيشوفوا نتائج أفضل؟</div>
                                    <p class="text-white/75 text-sm mt-1">3 عبوات = تغطية كاملة للدورة بدون انقطاع.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="py-20 bg-[color:var(--cream)]">
                <div class="container-luxury max-w-3xl">
                    <h2 class="text-3xl md:text-4xl font-bold text-center text-gradient-brand mb-10">بص بنفسك قد إيه
                        بتوفّر</h2>
                    <div class="bg-white rounded-3xl shadow-luxury border border-border p-8 md:p-10">
                        <div class="flex justify-between py-4 border-b border-dashed border-border last:border-0"><span
                                    class="">العبوة الأولى</span><span class="font-medium">600 ج.م</span></div>
                        <div class="flex justify-between py-4 border-b border-dashed border-border last:border-0"><span
                                    class="">العبوة الثانية</span><span class="font-medium">600 ج.م</span></div>
                        <div class="flex justify-between py-4 border-b border-dashed border-border last:border-0"><span
                                    class="font-bold text-[color:var(--leaf)]">العبوة الثالثة (مجاناً 🎁)</span><span
                                    class="line-through text-muted-foreground">600 ج.م</span></div>
                        <div class="flex justify-between py-4 mt-2 border-t-2 border-[color:var(--navy)]/20"><span
                                    class="text-muted-foreground">القيمة الإجمالية</span><span
                                    class="line-through text-muted-foreground">1800 ج.م</span></div>
                        <div class="flex justify-between items-center py-4"><span
                                    class="text-lg font-bold">سعرك اليوم</span><span
                                    class="text-4xl font-black text-[color:var(--leaf)]">1200 ج.م</span></div>
                        <p class="text-center mt-2 mb-6 text-[color:var(--navy)] font-semibold">وفّر 600 جنيه — يعني
                            عبوة كاملة ببلاش</p>
                        <a href="#order"
                           class="inline-flex items-center justify-center gap-2 whitespace-nowrap cursor-pointer transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 disabled:cursor-not-allowed [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 shadow hover:bg-primary/90 px-8 w-full h-14 text-base font-bold rounded-full bg-gradient-to-l from-[color:var(--leaf)] to-[color:var(--navy)] text-white shadow-glow">احصل
                            على العرض دلوقتي</a></div>
                </div>
            </section>
            <section class="py-20 bg-background">
                <div class="container-luxury">
                    <h2 class="text-3xl md:text-4xl font-bold text-center text-gradient-brand mb-12">3 خطوات بس… دقايق
                        معدودة يومياً</h2>
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="relative bg-white rounded-2xl p-8 shadow-soft border border-border text-center hover:shadow-luxury transition">
                            <div class="mx-auto size-16 rounded-full bg-gradient-to-br from-[color:var(--navy)] to-[color:var(--navy-deep)] text-white text-2xl font-black flex items-center justify-center mb-5 shadow-glow">
                                1
                            </div>
                            <h3 class="font-bold text-xl mb-2">ضع السيروم</h3>
                            <p class="text-muted-foreground">بختين – 3 بخات على مناطق الشيب (30 ثانية).</p></div>
                        <div class="relative bg-white rounded-2xl p-8 shadow-soft border border-border text-center hover:shadow-luxury transition">
                            <div class="mx-auto size-16 rounded-full bg-gradient-to-br from-[color:var(--navy)] to-[color:var(--navy-deep)] text-white text-2xl font-black flex items-center justify-center mb-5 shadow-glow">
                                2
                            </div>
                            <h3 class="font-bold text-xl mb-2">دلّك بلطف</h3>
                            <p class="text-muted-foreground">حركات دائرية لمدة ~5 دقائق لتنشيط الدورة الدموية.</p></div>
                        <div class="relative bg-white rounded-2xl p-8 shadow-soft border border-border text-center hover:shadow-luxury transition">
                            <div class="mx-auto size-16 rounded-full bg-gradient-to-br from-[color:var(--navy)] to-[color:var(--navy-deep)] text-white text-2xl font-black flex items-center justify-center mb-5 shadow-glow">
                                3
                            </div>
                            <h3 class="font-bold text-xl mb-2">كرّر يومياً</h3>
                            <p class="text-muted-foreground">مرة كل يوم بثبات — ولا يُغسل بعد الاستخدام.</p></div>
                    </div>
                </div>
            </section>
            <section class="py-20 bg-background">
                <div class="container-luxury">
                    <div class="text-center mb-12">
                        <div class="inline-flex items-center gap-2 text-2xl font-black text-[color:var(--navy-deep)]"><span
                                    class="flex">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
     class="lucide lucide-star size-5 fill-[color:var(--gold)] text-[color:var(--gold)]" aria-hidden="true"><path
            d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
     class="lucide lucide-star size-5 fill-[color:var(--gold)] text-[color:var(--gold)]" aria-hidden="true"><path
            d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
     class="lucide lucide-star size-5 fill-[color:var(--gold)] text-[color:var(--gold)]" aria-hidden="true"><path
            d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
     class="lucide lucide-star size-5 fill-[color:var(--gold)] text-[color:var(--gold)]" aria-hidden="true"><path
            d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg>
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
     class="lucide lucide-star size-5 fill-[color:var(--gold)] text-[color:var(--gold)]" aria-hidden="true"><path
            d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path></svg></span><span>4.8/5</span>
                        </div>
                        <p class="text-muted-foreground mt-2">بناءً على أكثر من 2,300 تقييم</p></div>
                    <div class="grid md:grid-cols-2 gap-6 max-w-4xl mx-auto mb-10">
                        <div class="space-y-3">
                            <div class="relative aspect-video rounded-2xl overflow-hidden shadow-luxury bg-black">
                                <iframe class="absolute inset-0 w-full h-full"
                                        src="https://www.youtube.com/embed/CXACw6TNsZo"
                                        title="Vigilant Anti grey serum للشيب المبكر والشعر الأبيض في سن صغير"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen=""></iframe>
                            </div>
                            <p class="text-center text-sm font-semibold text-[color:var(--navy-deep)] leading-relaxed">
                                Vigilant Anti grey serum للشيب المبكر والشعر الأبيض في سن صغير</p></div>
                        <div class="space-y-3">
                            <div class="relative aspect-video rounded-2xl overflow-hidden shadow-luxury bg-black">
                                <iframe class="absolute inset-0 w-full h-full"
                                        src="https://www.youtube.com/embed/DuJ2ac8pLH8" title="Vigilant Anti grey serum"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen=""></iframe>
                            </div>
                            <p class="text-center text-sm font-semibold text-[color:var(--navy-deep)] leading-relaxed">
                                Vigilant Anti grey serum</p></div>
                    </div>
                    <div class="max-w-3xl mx-auto bg-gradient-to-br from-[color:var(--cream)] to-white rounded-2xl border border-border p-6 md:p-8 shadow-soft mb-10">
                        <div class="grid grid-cols-2 gap-4 mb-5">
                            <div class="relative aspect-square rounded-xl overflow-hidden bg-stone-100">
                                <img src="https://levisage-pharma.com/wp-content/uploads/2026/07/Artboard-6.png"
                                     alt="الأسبوع 1" class="absolute inset-0 w-full h-full object-cover" loading="lazy">
                                <div class="absolute bottom-2 right-2 bg-white/90 text-[color:var(--navy-deep)] text-xs font-bold px-2 py-1 rounded">
                                    الأسبوع 1
                                </div>
                            </div>
                            <div class="relative aspect-square rounded-xl overflow-hidden bg-stone-100">
                                <img src="https://levisage-pharma.com/wp-content/uploads/2026/07/Artboard-5.png"
                                     alt="الأسبوع 12" class="absolute inset-0 w-full h-full object-cover"
                                     loading="lazy">
                                <div class="absolute bottom-2 right-2 bg-white/90 text-[color:var(--navy-deep)] text-xs font-bold px-2 py-1 rounded">
                                    الأسبوع 12
                                </div>
                            </div>
                        </div>
                        <p class="text-center text-[color:var(--navy-deep)] leading-relaxed">«بعد 3 شهور التزام
                            بالروتين، حسيت إن مظهر شعري بقى أكثر صحة وأقل وضوحاً للشيب من الأول.»</p></div>
                    <div class="grid md:grid-cols-3 gap-5 max-w-5xl mx-auto">
                        <div class="bg-white rounded-2xl p-6 border border-border shadow-soft">
                            <div class="flex mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="lucide lucide-star size-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                                     aria-hidden="true">
                                    <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="lucide lucide-star size-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                                     aria-hidden="true">
                                    <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="lucide lucide-star size-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                                     aria-hidden="true">
                                    <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="lucide lucide-star size-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                                     aria-hidden="true">
                                    <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="lucide lucide-star size-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                                     aria-hidden="true">
                                    <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                                </svg>
                            </div>
                            <p class="text-sm text-muted-foreground leading-relaxed mb-4">«<!-- --> بعد شهرين من
                                الاستخدام بدأت ألاحظ فرق واضح في مظهر الشيب. الروتين بسيط جداً.<!-- --> »</p>
                            <div class="flex items-center gap-2 text-sm"><span class="font-bold">سارة م.</span><span
                                        class="text-[color:var(--leaf)] inline-flex items-center gap-1">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
     stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check size-3"
     aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg> عميل مؤكد</span></div>
                        </div>
                        <div class="bg-white rounded-2xl p-6 border border-border shadow-soft">
                            <div class="flex mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="lucide lucide-star size-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                                     aria-hidden="true">
                                    <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="lucide lucide-star size-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                                     aria-hidden="true">
                                    <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="lucide lucide-star size-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                                     aria-hidden="true">
                                    <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="lucide lucide-star size-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                                     aria-hidden="true">
                                    <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="lucide lucide-star size-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                                     aria-hidden="true">
                                    <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                                </svg>
                            </div>
                            <p class="text-sm text-muted-foreground leading-relaxed mb-4">«<!-- --> أول مرة أحس إن في حل
                                بيخليني مرتاح من فكرة الصبغة كل أسبوعين.<!-- --> »</p>
                            <div class="flex items-center gap-2 text-sm"><span class="font-bold">أحمد ع.</span><span
                                        class="text-[color:var(--leaf)] inline-flex items-center gap-1">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
     stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check size-3"
     aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg> عميل مؤكد</span></div>
                        </div>
                        <div class="bg-white rounded-2xl p-6 border border-border shadow-soft">
                            <div class="flex mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="lucide lucide-star size-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                                     aria-hidden="true">
                                    <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="lucide lucide-star size-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                                     aria-hidden="true">
                                    <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="lucide lucide-star size-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                                     aria-hidden="true">
                                    <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="lucide lucide-star size-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                                     aria-hidden="true">
                                    <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="lucide lucide-star size-4 fill-[color:var(--gold)] text-[color:var(--gold)]"
                                     aria-hidden="true">
                                    <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"></path>
                                </svg>
                            </div>
                            <p class="text-sm text-muted-foreground leading-relaxed mb-4">«<!-- --> بعد 4 شهور التزام،
                                شعري بقى مظهره أكثر صحة وثقة.<!-- --> »</p>
                            <div class="flex items-center gap-2 text-sm"><span class="font-bold">هبة س.</span><span
                                        class="text-[color:var(--leaf)] inline-flex items-center gap-1">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
     stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check size-3"
     aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg> عميل مؤكد</span></div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="py-20 bg-aurora text-white relative overflow-hidden">
                <div class="absolute inset-0 bg-grid-luxury opacity-20 pointer-events-none"></div>
                <div class="container-luxury relative max-w-5xl">
                    <div class="text-center mb-12"><span
                                class="inline-block text-xs tracking-[0.3em] text-[color:var(--gold)] mb-3">THE DIFFERENCE</span>
                        <h2 class="text-3xl md:text-4xl font-bold text-gradient-luxury">الفرق بين الصبغة المؤقتة والبديل
                            الفعّال</h2></div>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="rounded-3xl glass-dark p-8 border border-white/10 relative overflow-hidden">
                            <div class="size-12 rounded-2xl bg-destructive/20 text-white flex items-center justify-center mb-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-x size-6" aria-hidden="true">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </div>
                            <h3 class="text-white text-xl font-bold mb-3">الحلول العادية</h3>
                            <p class="text-white/80 leading-relaxed">الحلول العادية بتدارى الشيب وبتنتهي مع الوقت —
                                تغطية سطحية بترجع تختفي بعد كل غسلة.</p></div>
                        <div class="rounded-3xl p-8 border border-[color:var(--gold)]/40 bg-gradient-to-br from-[color:var(--navy)]/50 to-[color:var(--leaf)]/20 shadow-glow relative overflow-hidden">
                            <div class="flex items-center gap-3 mb-5">
                                <div class="size-12 rounded-2xl bg-[color:var(--gold)] text-[color:var(--navy-deep)] flex items-center justify-center shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                         stroke-linejoin="round" class="lucide lucide-check size-6" aria-hidden="true">
                                        <path d="M20 6 9 17l-5-5"></path>
                                    </svg>
                                </div>
                                <span class="text-[10px] bg-[color:var(--gold)] text-[color:var(--navy-deep)] px-3 py-1 rounded-full font-bold tracking-wider">الحل الفعّال</span>
                            </div>
                            <h3 class="text-white text-xl font-bold mb-3">سيروم VIGILANT Anti Grey</h3>
                            <p class="text-white/90 leading-relaxed">بيشتغل على صبغة الميلانين اللى بيرجع لونه الشعر
                                الأصلي — نتيجة تراكمية بتدوم مع الاستخدام المنتظم.</p></div>
                    </div>
                    <p class="text-center text-xs text-white/60 mt-8">* النتائج تختلف من شخص لآخر حسب الاستخدام المنتظم
                        وطبيعة الشعر.</p></div>
            </section>
            <section class="py-20 bg-background">
                <div class="container-luxury max-w-4xl">
                    <h2 class="text-3xl md:text-4xl font-bold text-center text-gradient-brand mb-12">ليه عرض 2+1 هو
                        الأفضل؟</h2>
                    <div class="rounded-3xl border border-border shadow-luxury bg-white pt-4">
                        <table class="w-full text-sm md:text-base border-collapse">
                            <thead>
                            <tr class="bg-[color:var(--cream)]">
                                <th class="p-4 text-right font-semibold align-top whitespace-normal break-words"></th>
                                <th class="p-4 text-center font-semibold align-top whitespace-normal break-words">عبوة
                                    واحدة
                                </th>
                                <th class="p-4 pt-6 text-center font-bold text-white bg-gradient-to-l from-[color:var(--leaf)] to-[color:var(--navy)] relative align-top whitespace-normal break-words">
                                    <span class="absolute -top-3 inset-x-0 mx-auto w-fit text-[10px] bg-[color:var(--gold)] text-[color:var(--navy-deep)] px-2 py-0.5 rounded-full whitespace-nowrap">الأكثر طلباً</span>باندل
                                    2+1
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="border-t border-border bg-white">
                                <td class="p-4 font-medium align-top whitespace-normal break-words">السعر</td>
                                <td class="p-4 text-center text-muted-foreground align-top whitespace-normal break-words">
                                    600 ج.م
                                </td>
                                <td class="p-4 text-center font-bold text-[color:var(--navy-deep)] bg-[color:var(--leaf)]/5 align-top whitespace-normal break-words">
                                    1200 ج.م
                                </td>
                            </tr>
                            <tr class="border-t border-border bg-white">
                                <td class="p-4 font-medium align-top whitespace-normal break-words">التغطية</td>
                                <td class="p-4 text-center text-muted-foreground align-top whitespace-normal break-words">
                                    شهر ونصف
                                </td>
                                <td class="p-4 text-center font-bold text-[color:var(--navy-deep)] bg-[color:var(--leaf)]/5 align-top whitespace-normal break-words">
                                    4 شهور كاملة
                                </td>
                            </tr>
                            <tr class="border-t border-border bg-white">
                                <td class="p-4 font-medium align-top whitespace-normal break-words">استمرارية الروتين
                                </td>
                                <td class="p-4 text-center text-muted-foreground align-top whitespace-normal break-words">
                                    احتمال انقطاع
                                </td>
                                <td class="p-4 text-center font-bold text-[color:var(--navy-deep)] bg-[color:var(--leaf)]/5 align-top whitespace-normal break-words">
                                    بدون انقطاع
                                </td>
                            </tr>
                            <tr class="border-t border-border bg-white">
                                <td class="p-4 font-medium align-top whitespace-normal break-words">التوفير</td>
                                <td class="p-4 text-center text-muted-foreground align-top whitespace-normal break-words">
                                    —
                                </td>
                                <td class="p-4 text-center font-bold text-[color:var(--navy-deep)] bg-[color:var(--leaf)]/5 align-top whitespace-normal break-words">
                                    600 ج.م
                                </td>
                            </tr>
                            <tr class="border-t border-border bg-white">
                                <td class="p-4 font-medium align-top whitespace-normal break-words">النتائج</td>
                                <td class="p-4 text-center text-muted-foreground align-top whitespace-normal break-words">
                                    بداية فقط
                                </td>
                                <td class="p-4 text-center font-bold text-[color:var(--navy-deep)] bg-[color:var(--leaf)]/5 align-top whitespace-normal break-words">
                                    نتيجة كاملة
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-8">
                        <a href="#order"
                           class="inline-flex items-center justify-center gap-2 whitespace-nowrap cursor-pointer transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 disabled:cursor-not-allowed [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 shadow hover:bg-primary/90 h-14 px-8 rounded-full text-base font-bold bg-gradient-to-l from-[color:var(--leaf)] to-[color:var(--navy)] text-white shadow-glow">اختر
                            عرض 2+1 ووفّر 600 جنيه</a></div>
                </div>
            </section>
            <section class="py-16 bg-[color:var(--navy-deep)] text-white">
                <div class="container-luxury max-w-3xl">
                    <div class="rounded-3xl glass-dark border border-[color:var(--gold)]/30 p-8 md:p-10 text-center">
                        <div class="inline-flex items-center gap-2 text-[color:var(--gold)] mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="lucide lucide-flame size-5" aria-hidden="true">
                                <path d="M12 3q1 4 4 6.5t3 5.5a1 1 0 0 1-14 0 5 5 0 0 1 1-3 1 1 0 0 0 5 0c0-2-1.5-3-1.5-5q0-2 2.5-4"></path>
                            </svg>
                            <span class="text-sm tracking-widest">عرض لفترة محدودة</span></div>
                        <h3 class="text-white text-2xl md:text-3xl font-bold mb-6">العرض ينتهي خلال:</h3>
                        <div class="flex justify-center gap-3 md:gap-5 mb-8">
                            <div class="bg-white/10 border border-white/20 rounded-2xl w-20 md:w-24 py-4">
                                <div class="text-3xl md:text-4xl font-black text-[color:var(--gold)] tabular-nums">05
                                </div>
                                <div class="text-xs text-white/70 mt-1">ساعة</div>
                            </div>
                            <div class="bg-white/10 border border-white/20 rounded-2xl w-20 md:w-24 py-4">
                                <div class="text-3xl md:text-4xl font-black text-[color:var(--gold)] tabular-nums">34
                                </div>
                                <div class="text-xs text-white/70 mt-1">دقيقة</div>
                            </div>
                            <div class="bg-white/10 border border-white/20 rounded-2xl w-20 md:w-24 py-4">
                                <div class="text-3xl md:text-4xl font-black text-[color:var(--gold)] tabular-nums">02
                                </div>
                                <div class="text-xs text-white/70 mt-1">ثانية</div>
                            </div>
                        </div>
                        <div class="text-right text-sm text-white/80 mb-2">تبقى 23% فقط من المخزون بهذا السعر</div>
                        <div class="h-2 rounded-full bg-white/10 overflow-hidden">
                            <div class="h-full bg-gradient-to-l from-[color:var(--gold)] to-amber-500"
                                 style="width:23%"></div>
                        </div>
                        <a href="#order"
                           class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm cursor-pointer transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 disabled:cursor-not-allowed [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 shadow py-2 mt-8 h-14 px-8 rounded-full font-bold bg-[color:var(--gold)] text-[color:var(--navy-deep)] hover:bg-[color:var(--gold)]/90">احجز
                            عرضك قبل انتهاء الوقت</a></div>
                </div>
            </section>
            <section class="py-20 bg-[color:var(--cream)]">
                <div class="container-luxury">
                    <div class="text-center mb-12"><span class="text-xs tracking-[0.3em] text-[color:var(--navy)]">العلم وراء VIGILANT</span>
                        <h2 class="text-3xl md:text-4xl font-bold text-gradient-brand mt-3">تركيبة معتمدة من الاتحاد
                            الأوروبي</h2>
                        <p class="text-muted-foreground mt-3 max-w-2xl mx-auto">60 مل تكفي لشهر ونصف تقريباً · مصرّح من
                            وزارة الصحة · متوفر بالصيدليات.</p></div>
                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-5">
                        <div class="bg-white rounded-2xl p-6 border border-border shadow-soft hover:shadow-luxury transition">
                            <div class="size-12 rounded-xl bg-gradient-to-br from-[color:var(--navy)] to-[color:var(--leaf)] text-white flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-beaker" aria-hidden="true">
                                    <path d="M4.5 3h15"></path>
                                    <path d="M6 3v16a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V3"></path>
                                    <path d="M6 14h12"></path>
                                </svg>
                            </div>
                            <div class="font-bold text-lg mb-1">MelanoGray</div>
                            <p class="text-sm text-muted-foreground">يحفّز إنتاج الميلانين ويؤخر ظهور الشيب.</p></div>
                        <div class="bg-white rounded-2xl p-6 border border-border shadow-soft hover:shadow-luxury transition">
                            <div class="size-12 rounded-xl bg-gradient-to-br from-[color:var(--navy)] to-[color:var(--leaf)] text-white flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-droplet" aria-hidden="true">
                                    <path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"></path>
                                </svg>
                            </div>
                            <div class="font-bold text-lg mb-1">Darkenyl</div>
                            <p class="text-sm text-muted-foreground">ينشّط الخلايا الصبغية ويعيد للشعر لونه الطبيعي
                                تدريجياً.</p></div>
                        <div class="bg-white rounded-2xl p-6 border border-border shadow-soft hover:shadow-luxury transition">
                            <div class="size-12 rounded-xl bg-gradient-to-br from-[color:var(--navy)] to-[color:var(--leaf)] text-white flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-sparkles" aria-hidden="true">
                                    <path d="M11.017 2.814a1 1 0 0 1 1.966 0l1.051 5.558a2 2 0 0 0 1.594 1.594l5.558 1.051a1 1 0 0 1 0 1.966l-5.558 1.051a2 2 0 0 0-1.594 1.594l-1.051 5.558a1 1 0 0 1-1.966 0l-1.051-5.558a2 2 0 0 0-1.594-1.594l-5.558-1.051a1 1 0 0 1 0-1.966l5.558-1.051a2 2 0 0 0 1.594-1.594z"></path>
                                    <path d="M20 2v4"></path>
                                    <path d="M22 4h-4"></path>
                                    <circle cx="4" cy="20" r="2"></circle>
                                </svg>
                            </div>
                            <div class="font-bold text-lg mb-1">Niacinamide</div>
                            <p class="text-sm text-muted-foreground">يعزّز نمو الشعر ويقاوم التلف والتساقط.</p></div>
                        <div class="bg-white rounded-2xl p-6 border border-border shadow-soft hover:shadow-luxury transition">
                            <div class="size-12 rounded-xl bg-gradient-to-br from-[color:var(--navy)] to-[color:var(--leaf)] text-white flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="lucide lucide-leaf" aria-hidden="true">
                                    <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"></path>
                                    <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"></path>
                                </svg>
                            </div>
                            <div class="font-bold text-lg mb-1">مكونات طبيعية</div>
                            <p class="text-sm text-muted-foreground">شاي أخضر، زيت زيتون، حلبة، زيت ثوم، فيتامين E و
                                C.</p></div>
                    </div>
                </div>
            </section>

            <section class="py-20 bg-[color:var(--cream)]">
                <div class="container-luxury max-w-3xl">
                    <h2 class="text-3xl md:text-4xl font-bold text-center text-gradient-brand mb-10">أسئلة شائعة</h2>
                    <div class="bg-white rounded-2xl border border-border shadow-soft p-2 md:p-4">
                        <div class="w-full lv-accordion">
                            <div class="border-b px-4" data-state="closed">
                                <h3 class="flex">
                                    <button type="button" id="lv-faq-t-1" aria-controls="lv-faq-1" aria-expanded="false"
                                            data-state="closed"
                                            class="lv-acc-trigger flex flex-1 items-center justify-between py-4 cursor-pointer transition-all hover:underline [&[data-state=open]>svg]:rotate-180 text-right font-bold text-base md:text-lg">
                                        هل هيشتغل معايا فعلاً؟
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="lucide lucide-chevron-down size-5 shrink-0 text-muted-foreground transition-transform duration-200"
                                             aria-hidden="true">
                                            <path d="m6 9 6 6 6-6"/>
                                        </svg>
                                    </button>
                                </h3>
                                <div id="lv-faq-1" role="region" aria-labelledby="lv-faq-t-1" data-state="closed" hidden
                                     class="lv-acc-content overflow-hidden text-sm data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down">
                                    <div class="pb-4 text-muted-foreground leading-relaxed">السيروم مبني على مكونات
                                        معتمدة من الاتحاد الأوروبي ومجرّب من آلاف العملاء. النتائج تختلف من شخص لآخر،
                                        لكن الالتزام بالروتين يومياً هو مفتاح النتيجة.
                                    </div>
                                </div>
                            </div>
                            <div class="border-b px-4" data-state="closed">
                                <h3 class="flex">
                                    <button type="button" id="lv-faq-t-2" aria-controls="lv-faq-2" aria-expanded="false"
                                            data-state="closed"
                                            class="lv-acc-trigger flex flex-1 items-center justify-between py-4 cursor-pointer transition-all hover:underline [&[data-state=open]>svg]:rotate-180 text-right font-bold text-base md:text-lg">
                                        إمتى هبدأ ألاحظ نتيجة؟
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="lucide lucide-chevron-down size-5 shrink-0 text-muted-foreground transition-transform duration-200"
                                             aria-hidden="true">
                                            <path d="m6 9 6 6 6-6"/>
                                        </svg>
                                    </button>
                                </h3>
                                <div id="lv-faq-2" role="region" aria-labelledby="lv-faq-t-2" data-state="closed" hidden
                                     class="lv-acc-content overflow-hidden text-sm data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down">
                                    <div class="pb-4 text-muted-foreground leading-relaxed">ملاحظات بسيطة خلال 4 أسابيع،
                                        نتائج أوضح بعد 8–12 أسبوع، والنتيجة الكاملة بعد حوالي 4 أشهر من الاستخدام
                                        المنتظم.
                                    </div>
                                </div>
                            </div>
                            <div class="border-b px-4" data-state="closed">
                                <h3 class="flex">
                                    <button type="button" id="lv-faq-t-3" aria-controls="lv-faq-3" aria-expanded="false"
                                            data-state="closed"
                                            class="lv-acc-trigger flex flex-1 items-center justify-between py-4 cursor-pointer transition-all hover:underline [&[data-state=open]>svg]:rotate-180 text-right font-bold text-base md:text-lg">
                                        يصلح للرجال والستات؟
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="lucide lucide-chevron-down size-5 shrink-0 text-muted-foreground transition-transform duration-200"
                                             aria-hidden="true">
                                            <path d="m6 9 6 6 6-6"/>
                                        </svg>
                                    </button>
                                </h3>
                                <div id="lv-faq-3" role="region" aria-labelledby="lv-faq-t-3" data-state="closed" hidden
                                     class="lv-acc-content overflow-hidden text-sm data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down">
                                    <div class="pb-4 text-muted-foreground leading-relaxed">نعم، مناسب للرجال والستات من
                                        سن 30 إلى 60 سنة.
                                    </div>
                                </div>
                            </div>
                            <div class="border-b px-4" data-state="closed">
                                <h3 class="flex">
                                    <button type="button" id="lv-faq-t-4" aria-controls="lv-faq-4" aria-expanded="false"
                                            data-state="closed"
                                            class="lv-acc-trigger flex flex-1 items-center justify-between py-4 cursor-pointer transition-all hover:underline [&[data-state=open]>svg]:rotate-180 text-right font-bold text-base md:text-lg">
                                        هل سهل في الاستخدام؟
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="lucide lucide-chevron-down size-5 shrink-0 text-muted-foreground transition-transform duration-200"
                                             aria-hidden="true">
                                            <path d="m6 9 6 6 6-6"/>
                                        </svg>
                                    </button>
                                </h3>
                                <div id="lv-faq-4" role="region" aria-labelledby="lv-faq-t-4" data-state="closed" hidden
                                     class="lv-acc-content overflow-hidden text-sm data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down">
                                    <div class="pb-4 text-muted-foreground leading-relaxed">جداً — بختين إلى 3 بخات على
                                        مناطق الشيب، تدليك 5 دقايق، ولا يُغسل بعد الاستخدام. مرة واحدة يومياً.
                                    </div>
                                </div>
                            </div>
                            <div class="border-b px-4" data-state="closed">
                                <h3 class="flex">
                                    <button type="button" id="lv-faq-t-5" aria-controls="lv-faq-5" aria-expanded="false"
                                            data-state="closed"
                                            class="lv-acc-trigger flex flex-1 items-center justify-between py-4 cursor-pointer transition-all hover:underline [&[data-state=open]>svg]:rotate-180 text-right font-bold text-base md:text-lg">
                                        ليه أشتري الباندل وليس عبوة واحدة؟
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="lucide lucide-chevron-down size-5 shrink-0 text-muted-foreground transition-transform duration-200"
                                             aria-hidden="true">
                                            <path d="m6 9 6 6 6-6"/>
                                        </svg>
                                    </button>
                                </h3>
                                <div id="lv-faq-5" role="region" aria-labelledby="lv-faq-t-5" data-state="closed" hidden
                                     class="lv-acc-content overflow-hidden text-sm data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down">
                                    <div class="pb-4 text-muted-foreground leading-relaxed">لأن النتائج تراكمية وتحتاج 3
                                        شهور على الأقل. الباندل بيضمن لك التغطية الكاملة من غير انقطاع، وبسعر يوفّر لك
                                        600 جنيه.
                                    </div>
                                </div>
                            </div>
                            <div class="border-b px-4" data-state="closed">
                                <h3 class="flex">
                                    <button type="button" id="lv-faq-t-6" aria-controls="lv-faq-6" aria-expanded="false"
                                            data-state="closed"
                                            class="lv-acc-trigger flex flex-1 items-center justify-between py-4 cursor-pointer transition-all hover:underline [&[data-state=open]>svg]:rotate-180 text-right font-bold text-base md:text-lg">
                                        لو اشتريت عبوة واحدة بس؟
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="lucide lucide-chevron-down size-5 shrink-0 text-muted-foreground transition-transform duration-200"
                                             aria-hidden="true">
                                            <path d="m6 9 6 6 6-6"/>
                                        </svg>
                                    </button>
                                </h3>
                                <div id="lv-faq-6" role="region" aria-labelledby="lv-faq-t-6" data-state="closed" hidden
                                     class="lv-acc-content overflow-hidden text-sm data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down">
                                    <div class="pb-4 text-muted-foreground leading-relaxed">هتبدأ تلاحظ تغيرات أولية، بس
                                        غالباً هتحتاج تكمل لأن النتيجة الحقيقية بعد 8–12 أسبوع. وبتشتري عبوة جديدة
                                        بسعرها الكامل بدل ما توفر.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="order" class="py-20 bg-background scroll-mt-20">
                <div class="container-luxury max-w-2xl">
                    <h2 class="text-3xl md:text-4xl font-bold text-center text-gradient-brand mb-3">أكمل طلبك
                        دلوقتي</h2>
                    <p class="text-center text-muted-foreground mb-10">الدفع نقداً عند استلام الشحنة — بدون أي
                        مخاطر.</p>

                    <?php if ('error' === $lv_status) : ?>
                        <div class="mb-6 rounded-2xl border-2 border-red-300 bg-red-50 text-red-800 p-4 text-sm text-center"
                             role="alert">
                            حصلت مشكلة في إرسال الطلب. راجع البيانات وحاول تاني، أو كلّمنا على واتساب.
                        </div>
                    <?php endif; ?>

                    <form class="bg-white rounded-3xl border border-border shadow-luxury p-6 md:p-8 space-y-6"
                          method="post" action="<?php echo esc_url(get_permalink()); ?>#order" novalidate>
                        <input type="hidden" name="lv_action" value="levisage_landing_order">
                        <?php wp_nonce_field('levisage_landing_order', 'levisage_landing_nonce'); ?>
                        <input type="hidden" name="lv_source" value="<?php echo esc_attr(get_the_ID()); ?>">
                        <p class="lv-hp" aria-hidden="true"><label>لا تملأ هذا الحقل<input type="text" name="lv_website"
                                                                                           tabindex="-1"
                                                                                           autocomplete="off"></label>
                        </p>

                        <div class="grid gap-3 lv-packages">
                            <label class="lv-pkg flex items-center gap-3 p-5 rounded-2xl border-2 cursor-pointer transition"
                                   data-price="1200" data-label="عرض 2+1 — 3 عبوات">
                                <input type="radio" name="lv_package" value="bundle"
                                       class="lv-pkg-input sr-only" <?php checked($lv_old['package'], 'bundle'); ?>>
                                <span class="lv-dot" aria-hidden="true"></span>
                                <span class="flex-1">
<span class="flex items-center gap-2 flex-wrap"><span class="font-bold">عرض 2+1 — 3 عبوات</span><span
            class="text-[10px] bg-[color:var(--gold)] text-[color:var(--navy-deep)] rounded-full px-2 py-0.5 font-bold">الأفضل</span></span>
<span class="block text-sm text-muted-foreground mt-1">وفّر 600 جنيه</span>
</span>
                                <span class="text-left">
<span class="block text-xs line-through text-muted-foreground">1800</span>
<span class="block text-xl font-black text-[color:var(--leaf)]">1200 ج.م</span>
</span>
                            </label>
                            <label class="lv-pkg flex items-center gap-3 p-5 rounded-2xl border-2 cursor-pointer transition"
                                   data-price="600" data-label="عبوة واحدة">
                                <input type="radio" name="lv_package" value="single"
                                       class="lv-pkg-input sr-only" <?php checked($lv_old['package'], 'single'); ?>>
                                <span class="lv-dot" aria-hidden="true"></span>
                                <span class="flex-1">
<span class="block font-bold">عبوة واحدة</span>
<span class="block text-sm text-muted-foreground mt-1">تكفي شهر ونصف</span>
</span>
                                <span class="text-xl font-black">600 ج.م</span>
                            </label>
                        </div>

                        <div class="grid sm:grid-cols-2 gap-4">
                            <div class="space-y-1.5">
                                <label class="text-sm font-medium leading-none" for="lv-name">الاسم بالكامل</label>
                                <input id="lv-name" name="lv_name" type="text" required placeholder="اكتب اسمك الكامل"
                                       value="<?php echo esc_attr($lv_old['name']); ?>"
                                       class="flex w-full rounded-md border border-input bg-transparent px-3 py-1 text-base shadow-sm transition-colors placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring md:text-sm h-12">
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-sm font-medium leading-none" for="lv-phone">رقم الموبايل</label>
                                <input id="lv-phone" name="lv_phone" type="tel" required inputmode="numeric"
                                       pattern="01[0-9]{9}" placeholder="01xxxxxxxxx"
                                       value="<?php echo esc_attr($lv_old['phone']); ?>"
                                       class="flex w-full rounded-md border border-input bg-transparent px-3 py-1 text-base shadow-sm transition-colors placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring md:text-sm h-12">
                            </div>
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-sm font-medium leading-none" for="lv-gov">المحافظة</label>
                            <select id="lv-gov" name="lv_governorate" required
                                    class="flex w-full items-center justify-between whitespace-nowrap rounded-md border border-input bg-transparent px-3 py-2 text-sm shadow-sm cursor-pointer focus:outline-none focus:ring-1 focus:ring-ring h-12 lv-select">
                                <option value="">اختر المحافظة</option>
                                <?php foreach (levisage_landing_governorates() as $lv_code => $lv_label) : ?>
                                    <option value="<?php echo esc_attr($lv_code); ?>"<?php selected($lv_old['governorate'], $lv_code); ?>><?php echo esc_html($lv_label); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-sm font-medium leading-none" for="lv-address">العنوان بالتفصيل</label>
                            <textarea id="lv-address" name="lv_address" required rows="3"
                                      placeholder="الشارع، المنطقة، رقم المبنى، علامة مميزة…"
                                      class="flex min-h-[60px] w-full rounded-md border border-input bg-transparent px-3 py-2 text-base shadow-sm placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring md:text-sm"><?php echo esc_textarea($lv_old['address']); ?></textarea>
                        </div>

                        <div class="bg-[color:var(--cream)] rounded-2xl p-4 border border-border space-y-2">
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-muted-foreground">قيمة الطلب</span>
                                <span class="font-bold"><span data-lv-subtotal>1200</span> ج.م</span>
                            </div>
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-muted-foreground">الشحن</span>
                                <span class="font-bold" data-lv-shipping>يتحدد حسب المحافظة</span>
                            </div>
                            <div class="flex justify-between items-center pt-2 border-t border-border">
                                <span class="font-bold">الإجمالي</span>
                                <span class="text-2xl font-black text-[color:var(--leaf)]"><span
                                            data-lv-total>1200</span> ج.م</span>
                            </div>
                        </div>

                        <button type="submit"
                                class="inline-flex items-center justify-center gap-2 whitespace-nowrap cursor-pointer transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 disabled:cursor-not-allowed [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 shadow px-8 w-full h-14 text-base font-bold rounded-full bg-gradient-to-l from-[color:var(--leaf)] to-[color:var(--navy)] text-white shadow-glow">
                            تأكيد الطلب الآن
                        </button>

                        <div class="flex flex-wrap justify-center gap-x-5 gap-y-2 text-xs text-muted-foreground">
                            <span class="inline-flex items-center gap-1">شحن لكل مصر</span>
                            <span class="inline-flex items-center gap-1">دفع عند الاستلام</span>
                            <span class="inline-flex items-center gap-1">آمن 100%</span>
                        </div>
                    </form>
                </div>
            </section>

            <section class="py-20 bg-aurora text-white text-center">
                <div class="container-luxury max-w-2xl">
                    <h2 class="text-3xl md:text-4xl font-bold text-gradient-luxury mb-5">ابدأ اليوم قبل ما يظهر المزيد
                        من الشيب</h2>
                    <p class="text-white/80 mb-8">2+1 مجاناً · وفّر 600 ج.م · دفع عند الاستلام · +2,300 تقييم</p>
                    <a href="#order"
                       class="inline-flex items-center justify-center gap-2 whitespace-nowrap cursor-pointer transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 disabled:cursor-not-allowed [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 shadow h-14 px-10 rounded-full text-base font-bold bg-[color:var(--gold)] text-[color:var(--navy-deep)] hover:bg-[color:var(--gold)]/90 shadow-luxury">اطلب
                        عرض 2+1 الآن</a></div>
            </section>
            <?php // The Lovable design shipped its own footer; the site footer below already
            // carries the logo, links and copyright, so only the product disclaimer is kept. ?>
            <div class="py-5 bg-[color:var(--navy-deep)] text-white/70 text-center text-xs">
                <div class="container-luxury">هذا المنتج مكمل عناية بالشعر وليس بديلاً عن استشارة طبية متخصصة.</div>
            </div>
            <div class="fixed bottom-0 inset-x-0 z-40 bg-white/95 backdrop-blur-md border-t border-border shadow-luxury">
                <div class="container-luxury py-3 flex items-center justify-between gap-3">
                    <div class="flex items-baseline gap-2"><span class="text-2xl font-black text-[color:var(--leaf)]">1200</span><span
                                class="text-xs line-through text-muted-foreground">1800</span><span
                                class="text-xs text-muted-foreground hidden sm:inline">ج.م</span></div>
                    <a href="#order"
                       class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm cursor-pointer transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 disabled:cursor-not-allowed [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 shadow hover:bg-primary/90 py-2 h-11 rounded-full px-5 font-bold bg-gradient-to-l from-[color:var(--leaf)] to-[color:var(--navy)] text-white shadow-glow">اطلب
                        2+1 الآن</a></div>
            </div>
            <a href="https://wa.me/201004025435?text=عايز%20أستفسر%20عن%20عرض%202+1%20لسيروم%20VIGILANT" target="_blank"
               rel="noreferrer"
               class="fixed bottom-24 left-4 z-40 size-14 rounded-full bg-[#25D366] text-white flex items-center justify-center shadow-luxury hover:scale-110 transition animate-pulse-glow"
               aria-label="تواصل عبر واتساب">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="lucide lucide-message-circle size-7" aria-hidden="true">
                    <path d="M2.992 16.342a2 2 0 0 1 .094 1.167l-1.065 3.29a1 1 0 0 0 1.236 1.168l3.413-.998a2 2 0 0 1 1.099.092 10 10 0 1 0-4.777-4.719"></path>
                </svg>
            </a></div>

        <div class="lv-exit fixed inset-0 z-50 items-center justify-center bg-black/50 p-4" hidden data-lv-exit
             role="dialog" aria-modal="true" aria-labelledby="lv-exit-title">
            <div class="bg-white rounded-3xl shadow-luxury max-w-md w-full p-8 text-center relative">
                <button type="button"
                        class="absolute top-4 left-4 text-muted-foreground cursor-pointer text-xl leading-none"
                        data-lv-exit-close aria-label="إغلاق">✕
                </button>
                <div class="text-sm font-bold text-[color:var(--leaf)] mb-2">انتظر لحظة!</div>
                <h3 id="lv-exit-title" class="text-2xl font-black text-gradient-brand mb-3">وفّر 600 جنيه إضافية</h3>
                <p class="text-muted-foreground text-sm mb-6">عرض 2+1 لسيروم VIGILANT بـ 1200 جنيه فقط بدلاً من 1800 —
                    لفترة محدودة.</p>
                <a href="#order" data-lv-exit-close
                   class="inline-flex items-center justify-center gap-2 whitespace-nowrap cursor-pointer transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 disabled:cursor-not-allowed [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 shadow w-full h-14 px-8 text-base font-bold rounded-full bg-gradient-to-l from-[color:var(--leaf)] to-[color:var(--navy)] text-white shadow-glow">احصل
                    على العرض الآن</a>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
