@extends('layouts.sfc')

@section('title','مؤسسة غرف الأهلية')

@section('content')

<!-- Hero Section -->
<section class="home-section bg-lavender appear-animate" data-background="sfc/images/mainbg.png" id="home">
    <div class="container min-height-100vh d-flex align-items-center pt-100 pb-100">

        <div class="home-content hero-right text-end wow fadeInUpShort" data-wow-delay=".1s">
            <h2 class="hero-title">
                نحو بنية تنموية متكاملة <br> للجهات الأهلية
            </h2>

            <p class="hero-subtitle-en wow fadeInUpShort" data-wow-delay=".15s">
                TOWARDS AN INTEGRATED DEVELOPMENT ENVIRONMENT<br>
                FOR CIVIL SOCIETY ORGANIZATIONS
            </p>

            <div class="hero-logo mt-3">
                <img src="{{ asset('sfc/images/clients-logos/whitelogo.png') }}" alt="logo" width="100">
            </div>
        </div>
    </div>

    <div class="local-scroll scroll-down-wrap wow fadeInUpShort" data-wow-offset="0">
        <a href="#about" class="scroll-down"><i class="scroll-down-icon"></i><span class="sr-only">Scroll to the next section</span></a>
    </div>
</section>


<!-- End Dashboard Section -->

<!-- About -->
<!-- About Section -->
<section class="page-section bg-white" id="about">
    <div class="container relative wow fadeInUpShort" data-wow-delay=".2s">
        <div class="row align-items-center">

            <div class="col-lg-6 relative text-center wow scaleOutIn" data-wow-duration="1.2s">
                <img src="{{ asset('sfc/images/sfc-about.png') }}" alt="صورة 1" class="img-fluid rounded shadow mb-4" />
                <img src="{{ asset('sfc/images/m1.png') }}" alt="صورة 2" class="img-fluid rounded shadow" />
            </div>

            <div class="col-lg-5 offset-lg-1">
                <div class="mt-140 mt-lg-80 mt-md-60 mt-xs-30 mb-140 mb-lg-80">
                    <div class="banner-content wow fadeInUpShort" data-wow-duration="1.2s">
                        <h2 class="fw-bold mb-4" style="color:#3E0048;">عن المؤسّسة</h2>
                        <p class="lead" style="color:#3E0048; line-height:1.8;">
                            مؤسّسة غرف الأهلية مسجلة لدى المركز الوطني لتنمية القطاع غير الربحي، تسعى إلى بناء القدرات والشراكات وتعزيز دور الشركات في التنمية المستدامة بما يحقق أثراً إيجابياً ملموساً في حياة الناس.
                        </p>
                        <a href="#more" class="btn btn-mod btn-color btn-large btn-round mt-4">تعرّف أكثر</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- End About Section -->


<!-- Story Section -->
<!-- Vision Mission Goals Section -->
<section class="page-section vision-mission-section">

    <!-- خطوط/حركات ديكورية -->
    <div class="decor-line line1"></div>
    <div class="decor-line line2"></div>

    <div class="overlay-box">

        <!-- Vision -->
        <div class="section-block">
            <span class="small-title">OUR VISION</span>
            <h2 class="main-title">رؤيتنا</h2>
            <hr class="divider">
            <p class="description">
                أن نكون المؤسسة الرائدة في تمكين الجهات الأهلية، عبر بناء بيئة تنموية
                متكاملة تحقق أثرًا إيجابيًا مستدامًا في المجتمع.
            </p>
        </div>

        <!-- Mission -->
        <div class="section-block">
            <span class="small-title">OUR MISSION</span>
            <h2 class="main-title">رسالتنا</h2>
            <hr class="divider">
            <p class="description">
                تمكين الجهات الأهلية من خلال بناء القدرات وتعزيز الشراكات وتحقيق التنمية
                المستدامة بما يضمن الأثر الإيجابي والفاعلية.
            </p>
        </div>

        <!-- Goals -->
        <div class="section-block">
            <span class="small-title">OUR GOALS</span>
            <h2 class="main-title">أهدافنا</h2>
            <hr class="divider">
            <div class="goals">
                <p>الشفافية والحوكمة الرشيدة</p>
                <p>التميز والإبداع في العمل المؤسسي</p>
                <p>بناء شراكات فاعلة</p>
                <p>التركيز على الأثر المجتمعي الإيجابي</p>
            </div>

        </div>

    </div>
</section>
<!-- End Story Section -->

<section class="page-section" style="background-color: #ffffff;">
    <div class="container relative">
        <!-- Features Grid -->
        <section class="values-section">
            <div class="container">
                <h2 class="section-title">قيمنا</h2>
                <p class="values-desc section-desc colorFont text-center">
                    قيمنا هي الركائز الأساسية التي تقوم عليها المؤسسة، فهي تمثل نهجنا في العمل وتوجهنا نحو تحقيق رؤيتنا ورسالتنا بما يضمن أثرًا إيجابيًا مستدامًا في المجتمع.
                </p>

                <div class="row values-list">

                    <div class="col-md-3 value-item">
                        <div class="icon"><i class="fa fa-hand-holding-heart"></i></div>
                        <h4>الإحسان</h4>
                    </div>

                    <div class="col-md-3 value-item">
                        <div class="icon"><i class="fa fa-bullseye"></i></div>
                        <h4>التأثير</h4>
                    </div>

                    <div class="col-md-3 value-item">
                        <div class="icon"><i class="fa fa-users"></i></div>
                        <h4>التمكين</h4>
                    </div>

                    <div class="col-md-3 value-item">
                        <div class="icon"><i class="fa fa-check-circle"></i></div>
                        <h4>الثقة</h4>
                    </div>
                </div>
        </section>

        <!-- End Features Grid -->

    </div>
</section>
<!-- End our values -->
<hr class="mt-0 mb-0 white">

<!-- Stratigic Goal -->
<section class="page-section ">
    <div class="shapes">
        <span class="shape circle"></span>
        <span class="shape triangle"></span>
        <span class="shape square"></span>
        <span class="shape dot"></span>
    </div>
    <div class="bg-shapes">
        <span class="circle big"></span>
        <span class="circle small"></span>
        <span class="line"></span>
        <span class="line diagonal"></span>
    </div>
    <div class="container">
        <div class="text-center mb-50">
            <img src="{{ asset('sfc/images/clients-logos/whitelogo.png') }}" alt="logo" width="100">
            <h2 class="section-title text-white">الأهداف الاستراتيجية</h2>
            <p class="section-subtitle" style="color:#E0E0E0;">
                نعمل على تحقيق أهداف استراتيجية تعزز دور المؤسسة في التمكين والتأثير وبناء مجتمع مستدام
            </p>
        </div>

        <div class="row text-center">
            <!-- هدف 1 -->
            <div class="col-md-3 col-sm-6 mb-30">
                <div class="goal-box">
                    <div class="goal-icon"><i class="fas fa-handshake"></i></div>
                    <h4 class="goal-title">تعزيز الشراكات التنموية</h4>
                </div>
            </div>

            <!-- هدف 2 -->
            <div class="col-md-3 col-sm-6 mb-30">
                <div class="goal-box">
                    <div class="goal-icon"><i class="fas fa-lightbulb"></i></div>
                    <h4 class="goal-title">التميز والإبداع المؤسسي</h4>
                </div>
            </div>

            <!-- هدف 3 -->
            <div class="col-md-3 col-sm-6 mb-30">
                <div class="goal-box">
                    <div class="goal-icon"><i class="fas fa-users-cog"></i></div>
                    <h4 class="goal-title">التمكين وبناء القدرات</h4>
                </div>
            </div>

            <!-- هدف 4 -->
            <div class="col-md-3 col-sm-6 mb-30">
                <div class="goal-box">
                    <div class="goal-icon"><i class="fas fa-bullseye"></i></div>
                    <h4 class="goal-title">التركيز على الأثر المجتمعي</h4>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- End Stratigic Goal -->

<!-- Core Issues -->
<section class="page-section core-issues text-center" style="background:#fff;">
    <div class="container relative">
        <!-- العنوان والوصف -->
        <div class="wow fadeInUpShort" data-wow-delay=".1s">
            <h2 class="mb-3" style="color:#123c24;">القضايا الأساسية</h2>
            <p style="color:#3E0048;max-width:700px;margin:0 auto;">
                القضايا الأساسية التي نركز عليها تمثل مرتكزات عمل المؤسسة وتوجهها نحو تحقيق الأثر الإيجابي المستدام في المجتمع.
            </p>
        </div>
        <!-- القضايا -->
        <div class="row mt-5">
            <div class="col-md-3 col-6">
                <div class="wow fadeInUpShort" data-wow-delay=".1s">
                    <i class="fas fa-graduation-cap fa-3x mb-3" style="color:#3E0048;"></i>
                    <h5 style="color:#3E0048;">التعليم</h5>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="wow fadeInUpShort" data-wow-delay=".1s">
                    <i class="fas fa-heartbeat fa-3x mb-3" style="color:#3E0048;"></i>
                    <h5 style="color:#3E0048;">الصحة</h5>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="wow fadeInUpShort" data-wow-delay=".1s">
                    <i class="fas fa-users-cog fa-3x mb-3" style="color:#3E0048;"></i>
                    <h5 style="color:#3E0048;">بناء القدرات</h5>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="wow fadeInUpShort" data-wow-delay=".1s">
                    <i class="fas fa-seedling fa-3x mb-3" style="color:#3E0048;"></i>
                    <h5 style="color:#3E0048;">جودة الحياة</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Current Initiatives -->
<section class="initiatives py-5" style="background:#f8f8f8;">
    <div class="container">

        <!-- عنوان -->
        <div class="text-center mb-5">
            <h2 style="color:#3E0048;">المبادرات الحالية</h2>
        </div>

        <!-- المبادرة 1 -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <h3 class="mb-3" style="color:#3E0048;">
                    <i class="fas fa-trophy" style="color:#3E0048;"></i> جائزة غرف
                </h3>
                <p style="color:#333;">
                    حفل سنوي لتكريم أفضل المبادرات والبرامج في الشركات.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img src="sfc/images/post-prev-1.jpg" alt="جائزة غرف" class="img-fluid rounded">
            </div>
        </div>

        <!-- المبادرة 2 -->
        <div class="row align-items-center mb-5 flex-row-reverse">
            <div class="col-md-6">
                <h3 class="mb-3" style="color:#3E0048;">
                    <i class="fas fa-graduation-cap" style="color:#3E0048;"></i> شهادة مهنية لمسؤولي المسؤولية الاجتماعية
                </h3>
                <p style="color:#333;">
                    برنامج مهني من أحد المراكز المتخصصة لتأهيل وتطوير قدرات مسؤولي العمل التنموي الاجتماعي.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img src="sfc/images/post-prev-1.jpg" alt="جائزة غرف" class="img-fluid rounded">
            </div>
        </div>

        <!-- المبادرة 3 -->
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <h3 class="mb-3" style="color:#3E0048;">
                    <i class="fas fa-building" style="color:#3E0048;"></i> تأسيس وحدات المسؤولية الاجتماعية
                </h3>
                <p style="color:#333;">
                    مبادرة لتأسيس وتطوير وحدات المسؤولية الاجتماعية في الشركات وفق أحدث المعايير والمناهج العالمية.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img src="sfc/images/post-prev-1.jpg" alt="جائزة غرف" class="img-fluid rounded">
            </div>
        </div>

        <!-- المبادرة 4 -->
        <div class="row align-items-center flex-row-reverse">
            <div class="col-md-6">
                <h3 class="mb-3" style="color:#3E0048;">
                    <i class="fas fa-hands-helping" style="color:#3E0048;"></i> دعم توظيف واستقلال الأيتام
                </h3>
                <p style="color:#333;">
                    برنامج بالشراكة مع القطاع الخاص لتأهيل وتوظيف الأيتام.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img src="sfc/images/post-prev-1.jpg" alt="جائزة غرف" class="img-fluid rounded">
            </div>
        </div>

    </div>
</section>

<!-- Board of Trustees -->
<section id="board" class="page-section">
    <div class="container relative">

        <h2 class="section-title font-alt mb-40 text-center colorW">مجلس الأمناء</h2>
        <div class="row mb-120 mb-sm-50">
            <!-- Team item -->
            <div class="col-md-4 mb-xs-30">
                <div class="team-item-wrap wow fadeInUp" data-wow-delay=".1s" data-wow-duration="1.2s">
                    <div class="team-item-decoration" style="background-image: url(sfc/images/n1.png);"></div>
                    <div class="team-item">
                        <div class="team-item-image member">
                            <img src="sfc/images/ft.jpg" alt="فايز" />
                            <div class="team-item-detail">
                                <p class="team-item-detail-title">
                                </p>
                                <p>
                                </p>
                                <div class="team-social-links">
                                    <a href="#" target="_blank"><i class="fab fa-twitter"></i><span class="sr-only">Twitter profile</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item-descr">
                            <div class="team-item-name colorW">
                                الأستاذ: فايز بن اذعار الحربي
                            </div>
                            <div class="team-item-role colorW">
                                رئيس مجلس الأمناء
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Team item -->

            <!-- Team item -->
            <div class="col-md-4 mb-xs-30">
                <div class="team-item-wrap wow fadeInUp" data-wow-delay=".2s" data-wow-duration="1.2s">
                    <div class="team-item-decoration" style="background-image: url(sfc/images/n1.png);"></div>
                    <div class="team-item">
                        <div class="team-item-image member">
                            <img src="sfc/images/fz.jpg" alt="" />
                            <div class="team-item-detail">
                                <p class="team-item-detail-title">

                                </p>
                                <p>

                                </p>
                                <div class="team-social-links">
                                    <a href="#" target="_blank"><i class="fab fa-twitter"></i><span class="sr-only">Twitter profile</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item-descr">
                            <div class="team-item-name colorW">
                                الأستاذ: فايز بن أحمد المالكي
                            </div>
                            <div class="team-item-role colorW">
                                نائب رئيس مجلس الأمناء
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Team item -->

            <!-- Team item -->
            <div class="col-md-4 mb-xs-30">
                <div class="team-item-wrap wow fadeInUp" data-wow-delay=".3s" data-wow-duration="1.2s">
                    <div class="team-item-decoration" style="background-image: url(sfc/images/n1.png);"></div>
                    <div class="team-item">
                        <div class="team-item-image member">
                            <img src="sfc/images/id.jpg" alt="" />
                            <div class="team-item-detail">
                                <p class="team-item-detail-title">

                                </p>
                                <p>

                                </p>
                                <div class="team-social-links">
                                    <a href="#" target="_blank"><i class="fab fa-twitter"></i><span class="sr-only">Twitter profile</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="team-item-descr">
                            <div class="team-item-name colorW">
                                الأستاذ: إبراهيم بن محمد الدوسري
                            </div>
                            <div class="team-item-role colorW">
                                عضو مجلس الأمناء
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Team item -->

        </div>
    </div>
</section>



<!-- Blog Placeholder -->
@include('public.partials.latest-news')

<!-- اتصل بنا -->
<!-- اتصل بنا -->
<section id="contact-us" class="page-section bg-light-gray">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">اتصل بنا</h2>
            <p class="section-title-descr colorFont">نسعد بتواصلك معنا عبر وسائل التواصل أو نموذج المراسلة</p>
        </div>

        <!-- وسائل التواصل -->
        <div class="row text-center mb-4">
            <div class="col-md-4">
                <i class="fas fa-envelope fa-2x mb-2" style="color:#3E0048;"></i>
                <p><strong>البريد الإلكتروني:</strong><br><a href="mailto:info@yourdomain.com">info@cf.org.sa</a></p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-phone fa-2x mb-2" style="color:#3E0048;"></i>
                <p><strong>رقم التواصل:</strong><br>+966 50 000 0000</p>
            </div>
            <div class="col-md-4">
                <i class="fab fa-twitter fa-2x mb-2" style="color:#3E0048;"></i>
                <p><strong>تويتر:</strong><br><a href="https://twitter.com/your_org" target="_blank">@your_org</a></p>
            </div>
        </div>

        <!-- النموذج والخريطة -->
        <div class="row">
            <!-- النموذج -->
            <div class="col-md-6 wow fadeInUpShort colorFont" data-wow-delay=".3s">
                <form method="POST" action="{{ route('contact.send') }}" class="contact-form">
                    @csrf
                    <div class="mb-3">
                        <label>الاسم</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>البريد الإلكتروني</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>الموضوع</label>
                        <input type="text" name="subject" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>الرسالة</label>
                        <textarea name="message" rows="5" class="form-control" required></textarea>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btn-lg">إرسال</button>
                    </div>
                </form>
            </div>

            <!-- الخريطة -->
            <div class="col-md-6 wow fadeInUpShort" data-wow-delay=".4s">
                <div style="width: 100%; height: 100%;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=YOUR_MAP_EMBED_LINK"
                        width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection