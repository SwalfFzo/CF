<?php

return [
    'required' => 'حقل :attribute مطلوب.',
    'string'   => 'حقل :attribute يجب أن يكون نصًا.',
    'max'      => [
        'string' => 'يجب ألا يزيد :attribute عن :max حرفًا.',
        'file'   => 'يجب ألا يزيد :attribute عن :max كيلوبايت.',
    ],
    'date'   => 'صيغة :attribute غير صحيحة.',
    'in'     => 'قيمة :attribute غير صحيحة.',
    'image'  => 'يجب أن تكون :attribute صورة.',
    'mimes'  => 'امتداد :attribute غير مدعوم. المسموح: :values.',
    'uploaded' => 'فشل رفع :attribute. تأكد من الحجم والاتصال.',

    // أسماء الحقول (لن تحتاج تكتب $attributes بكل كنترولر)
    'attributes' => [
        'title'        => 'العنوان',
        'excerpt'      => 'الملخص',
        'content'      => 'المحتوى',
        'status'       => 'الحالة',
        'published_at' => 'تاريخ النشر',
        'image'        => 'الصورة الرئيسية',
        'email'        => 'البريد الإلكتروني',
        'password'     => 'كلمة المرور',
    ],
];
