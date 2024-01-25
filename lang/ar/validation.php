<?php

return [

    'accepted'             => 'يجب قبول :attribute.',
    'active_url'           => ':attribute ليس عنوان URL صالحًا.',
    'after'                => 'يجب أن يكون :attribute تاريخًا بعد :date.',
    'after_or_equal'       => 'يجب أن يكون :attribute تاريخًا بعد :date أو مساويًا له.',
    'alpha'                => 'قد يحتوي :attribute على أحرف فقط.',
    'alpha_dash'           => 'قد يحتوي :attribute فقط على أحرف وأرقام وشرطات وشرطات سفلية.',
    'alpha_num'            => 'قد يحتوي :attribute على أحرف وأرقام فقط.',
    'array'                => 'يجب أن يكون :attribute مصفوفة.',
    'before'               => 'يجب أن يكون :attribute تاريخًا قبل :date.',
    'before_or_equal'      => 'يجب أن يكون :attribute تاريخًا يسبق أو يساوي :date.',
    'between'              => [
        'numeric' => 'يجب أن يكون :attribute بين :min و :max.',
        'file'    => 'يجب أن يكون :attribute بين :min و :max كيلو بايت.',
        'string'  => 'يجب أن يكون :attribute بين :min و :max حرفًا.',
        'array'   => 'يجب أن تحتوي :attribute على بين :min و :max.'
    ],
    'boolean'              => 'يجب أن يكون الحقل :attribute صوابًا أو خطأً.',
    'confirmed'            => 'تأكيد :attribute غير متطابق.',
    'date'                 => ':attribute ليس تاريخًا صالحًا.',
    'date_equals'          => 'يجب أن يكون :attribute تاريخًا مساويًا لـ :date.',
    'date_format'          => 'لا يتطابق :attribute مع التنسيق :format.',
    'different'            => 'يجب أن يكون :attribute و :other مختلفين.',
    'digits'               => 'يجب أن تكون :attribute أرقامًا :digits.',
    'digits_between'       => 'يجب أن يكون :attribute بين :min ورقم :max.',
    'dimensions'           => ':attribute لها أبعاد صورة غير صالحة.',
    'distinct'             => 'يحتوي الحقل :attribute على قيمة مكررة.',
    'email'                => 'يجب أن يكون :attribute عنوان بريد إلكتروني صالحًا.',
    'exists'               => 'المحدد :attribute غير صالح.',
    'file'                 => 'يجب أن يكون :attribute ملفًا.',
    'filled'               => 'يجب أن يحتوي الحقل :attribute على قيمة.',
    'gt'                   => [
        'numeric' => 'يجب أن يكون :attribute أكبر من :value.',
        'file'    => 'يجب أن يكون :attribute أكبر من :value كيلو بايت.',
        'string'  => 'يجب أن يكون :attribute أكبر من :value حرفًا.',
        'array'   => 'يجب أن يحتوي :attribute على أكثر من :value من العناصر.'
    ],
    'gte'                  => [
        'numeric' => 'يجب أن يكون :attribute أكبر من أو يساوي :value.',
        'file'    => 'يجب أن يكون :attribute أكبر من أو يساوي :value كيلوبايت.',
        'string'  => 'يجب أن يكون :attribute أكبر من أو يساوي :value من الأحرف.',
        'array'   => 'يجب أن تحتوي :attribute على عناصر :value أو أكثر.'
    ],
    'image'                => 'يجب أن تكون :attribute صورة.',
    'in'                   => 'المحدد :attribute غير صالح.',
    'in_array'             => 'الحقل :attribute غير موجود في :other.',
    'integer'              => 'يجب أن يكون :attribute عددًا صحيحًا.',
    'ip'                   => 'يجب أن يكون :attribute عنوان IP صالحًا.',
    'ipv4'                 => 'يجب أن يكون :attribute عنوان IPv4 صالحًا.',
    'ipv6'                 => 'يجب أن يكون :attribute عنوان IPv6 صالحًا.',
    'json'                 => 'يجب أن تكون :attribute سلسلة JSON صالحة.',
    'lt'                   => [
        'numeric' => 'يجب أن يكون :attribute أقل من :value.',
        'file'    => 'يجب أن يكون :attribute أقل من :value كيلو بايت.',
        'string'  => 'يجب أن يكون :attribute أقل من :value حرفًا.',
        'array'   => 'يجب أن يحتوي :attribute على أقل من :value من العناصر.'
    ],
    'lte'                  => [
        'numeric' => 'يجب أن يكون :attribute أقل من أو يساوي :value.',
        'file'    => 'يجب أن يكون :attribute أقل من أو يساوي :value كيلوبايت.',
        'string'  => 'يجب أن يكون :attribute أقل من أو يساوي :value من الأحرف.',
        'array'   => 'يجب ألا يحتوي :attribute على أكثر من :value من العناصر.'
    ],
    'max'                  => [
        'numeric' => 'لا يجوز أن يكون :attribute أكبر من :max.',
        'file'    => 'لا يجوز أن يكون :attribute أكبر من :max كيلو بايت.',
        'string'  => 'لا يجوز أن يكون :attribute أكبر من :max حرفًا.',
        'array'   => 'لا يجوز أن يحتوي :attribute على أكثر من :max من العناصر.'
    ],
    'mimes'                => 'يجب أن يكون :attribute ملفًا من النوع: :values.',
    'mimetypes'            => 'يجب أن يكون :attribute ملفًا من النوع: :values.',
    'min'                  => [
        'numeric' => 'يجب أن تكون :attribute :min على الأقل.',
        'file'    => 'يجب أن يكون :attribute على الأقل :min كيلو بايت.',
        'string'  => 'يجب أن يكون :attribute من الأحرف :min على الأقل.',
        'array'   => 'يجب أن تحتوي :attribute على :min على الأقل من العناصر.'
    ],
    'not_in'               => 'المحدد :attribute غير صالح.',
    'not_regex'            => 'تنسيق :attribute غير صالح.',
    'numeric'              => 'يجب أن يكون :attribute رقمًا.',
    'present'              => 'يجب أن يكون الحقل :attribute موجودًا.',
    'regex'                => 'تنسيق :attribute غير صالح.',
    'required'             => 'حقل :attribute مطلوب.',
    'required_if'          => 'يكون الحقل :attribute مطلوبًا عندما تكون :other هي :value.',
    'required_unless'      => 'حقل :attribute مطلوب ما لم يكن :other في :values.',
    'required_with'        => 'يكون الحقل :attribute مطلوبًا عند وجود :values.',
    'required_with_all'    => 'يكون الحقل :attribute مطلوبًا عند وجود :values.',
    'required_without'     => 'يكون الحقل :attribute مطلوبًا عندما يكون :values غير موجود.',
    'required_without_all' => 'حقل :attribute مطلوب في حالة عدم وجود أي من :values.',
    'same'                 => 'يجب أن يتطابق :attribute و :other.',
    'size'                 => [
        'numeric' => 'يجب أن يكون :attribute :size.',
        'file'    => 'يجب أن يكون :attribute :size كيلو بايت.',
        'string'  => 'يجب أن يكون :attribute من الأحرف :size.',
        'array'   => 'يجب أن يحتوي :attribute على عناصر :size.'
    ],
    'starts_with'          => 'يجب أن يبدأ :attribute بأحد العناصر التالية: :values',
    'string'               => 'يجب أن يكون :attribute سلسلة.',
    'timezone'             => 'يجب أن تكون :attribute منطقة صالحة.',
    'unique'               => 'تم أخذ :attribute بالفعل.',
    'uploaded'             => 'فشل تحميل :attribute.',
    'url'                  => 'تنسيق :attribute غير صالح.',
    'uuid'                 => 'يجب أن يكون :attribute معرفًا فريدًا صالحًا.',
    'custom'               => [
        'attribute-name' => [
            'rule-name' => 'رسالة مخصصة'
        ]
    ],
    'accepted_if' => 'الخاصية :attribute يجب قبولها عندما :other تكون :value.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'declined' => 'الخاصية :attribute يجب رفضه.',
    'declined_if' => 'الخاصية :attribute يجب رفضه عندما :other هي :value.',
    'doesnt_start_with' => 'الخاصية :attribute قد لا تبدأ بواحد مما يلي: :values.',
    'ends_with' => 'الخاصية :attribute يجب أن ينتهي بواحد مما يلي: :values.',
    'enum' => 'الخاصية المختارة :attribute is invalid.',
    'mac_address' => 'الخاصية :attribute يجب أن يكون عنوان MAC صالحًا.',
    'multiple_of' => 'الخاصية :attribute يجب أن يكون من مضاعفات :value.',
    'password' => [
        'letters' => 'الخاصية :attribute يجب أن يحتوي على حرف واحد على الأقل.',
        'mixed' => 'الخاصية :attribute يجب أن يحتوي على حرف كبير واحد على الأقل وحرف صغير واحد.',
        'numbers' => 'الخاصية :attribute يجب أن يحتوي على رقم واحد على الأقل.',
        'symbols' => 'الخاصية :attribute يجب أن يحتوي على رمز واحد على الأقل.',
        'uncompromised' => 'الخاصية المعطاة :attribute ظهر في تسرب البيانات. الرجاء اختيار ملف :attribute.',
    ],
    'prohibited' => 'الخاصية :attribute المجال محظور.',
    'prohibited_if' => 'الخاصية :attribute الحقل محظور عندما :other هي :value.',
    'prohibited_unless' => 'الخاصية :attribute الحقل محظور ما لم :other في داخل :values.',
    'prohibits' => 'الخاصية :attribute يحظر المجال :other من الوجود.',
    'required_array_keys' => 'الخاصية :attribute يجب أن يحتوي الحقل على إدخالات لـ: :values.',
    'attributes' => [],

];
