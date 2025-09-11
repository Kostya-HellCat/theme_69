<?php

    $lang = get_field('settings_lang','options') ? get_field('settings_lang','options') : 'en';
    $lang = strtolower($lang);

    $lang_content = array();

    $lang = strstr($lang, '-', true) ?: $lang;

    # EN & default
    $lang_content = [
        // page 404
        'page_404_bread_crumb'     => 'Page not found',
        'page_404_subtitle'        => 'This page was not found',
        'page_404_homepage_button' => 'Home page',

        // TOC block
        'toc_content_title' => 'Content',

        // To share
        'share_item_title'         => 'Share this post',

        // Comment form
        'comments_title'           => 'Comments',
        'comment_form_title'       => 'Add a comment',
        'comment_form_button'      => 'Submit',
        'comment_form_alert'       => 'Your comment has been sent for review',
        'comment_input_name'       => 'Name',
        'comment_input_comment'    => 'Your text',
        'comment_reply'            => 'Reply',
        'comments_rate'            => 'Your rate',
        'comment_rate'            => 'Rate',


        // plus and minus acf block
        'difference_title_plus'           => 'Pros',
        'difference_title_minus'          => 'Cons',
        'difference_title_plus_and_minus' => 'Pros and cons',

        // promocode acf bloc
        'promocode_copy_text'             => 'Copy',
        'promocode_copied_text'             => 'Copied',
        'promocode_date_text'             => 'Validity:',

        // breadcrumbs
        'default_home_breadcrumbs'        => 'Home',

        'last_win'                        => 'Last win',
        'subscribers'                     => 'subscribers',
        'step'                            => 'Step',
        'last_update'                     => 'Last Updated',
        'written_by'                      => 'Written by', # NEW
        'day_prefix'                      => 'th', # NEW

        'show' => 'Show',
        'hide' => 'Hide',

        'month_list' => [ 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ],
    ];

    switch ( $lang ) {
        case "en" :
            break;
        case "ru" :
            $lang_content = [
                // page 404
                'page_404_bread_crumb'     => 'Страница не найдена',
                'page_404_subtitle'        => 'Эта страница не найдена',
                'page_404_homepage_button' => 'Домашняя страница',

                // TOC block
                'toc_content_title' => 'Содержание',

                // To share
                'share_item_title'         => 'Поделиться',

                // Comment form
                'comments_title'           => 'Комментарии',
                'comment_form_title'       => 'Добавить комментарий',
                'comment_form_button'      => 'Отправить комментарий',
                'comment_form_alert'       => 'Ваш комментарий отправлен на проверку',
                'comment_input_name'       => 'Имя',
                'comment_input_comment'    => 'Комментарий',
                'comment_reply'            => 'Ответить',

                // plus and minus bloc
                'difference_title_plus'           => 'Плюсы',
                'difference_title_minus'          => 'Минусы',
                'difference_title_plus_and_minus' => 'Плюсы и минусы',

                // promocode acf bloc
                'promocode_copy_text'             => 'Копировать',
                'promocode_copied_text'             => 'Скопировано',
                'promocode_date_text'             => 'Срок действия:',

                // breadcrumbs
                'default_home_breadcrumbs'        => 'Домашняя',

                'last_win'                        => 'Последний выигрыш',
                'subscribers'                     => 'подписчиков',
                'step'                            => 'Шаг',
                'last_update'                     => 'Обновлено',


                'show' => 'Показать',
                'hide' => 'Свернуть',

                'month_list' => [ 'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь' ]
            ];
            break;
        case "pt" :
            $lang_content = [
                // page 404
                'page_404_bread_crumb'     => 'Página não encontrada',
                'page_404_subtitle'        => 'Esta página não foi encontrada',
                'page_404_homepage_button' => 'Página inicial',

                // TOC block
                'toc_content_title' => 'Conteúdo',

                // To share
                'share_item_title'         => 'Compartlhar post',

                // Comment form
                'comments_title'           => 'Comentário',
                'comment_form_title'       => 'Adicionar comentário',
                'comment_form_button'      => 'Enviar',
                'comment_form_alert'       => 'Seu comentário foi enviado para a revisão',
                'comment_input_name'       => 'Nome',
                'comment_input_comment'    => 'Seu texto',
                'comment_reply'            => 'Responder',
                'comments_rate'            => 'Sua taxa',
                'comment_rate'            => 'Avaliar',

                // plus and minus bloc
                'difference_title_plus'           => 'Prós',
                'difference_title_minus'          => 'Contras',
                'difference_title_plus_and_minus' => 'Prós e contras',

                // promocode acf bloc
                'promocode_copy_text'             => 'Copiar',
                'promocode_copied_text'             => 'Copiado',
                'promocode_date_text'             => 'Validação:',

                // breadcrumbs
                'default_home_breadcrumbs'        => 'Início',

                'last_win'                        => 'Última vitória',
                'subscribers'                     => 'Assinantes',
                'step'                            => 'Passo',
                'last_update'                     => 'Última atualização',

                'show' => 'Mostrar',
                'hide' => 'Ocultar',

                'month_list' => [ 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro' ],
            ];
            break;
        case "hi":
        case "in":
            $lang_content = [
                // page 404
                'page_404_bread_crumb'     => 'पेज नहीं मिला',
                'page_404_subtitle'        => 'यह पेज नहीं मिला',
                'page_404_homepage_button' => 'होम पेज',

                // TOC block
                'toc_content_title' => 'विषय',

                // To share
                'share_item_title'         => 'इस पोस्ट को शेयर करें',

                // Comment form
                'comments_title'           => 'टिप्पणियाँ',
                'comment_form_title'       => 'एक कॉमेंट जोड़े',
                'comment_form_button'      => 'प्रस्तुत करें',
                'comment_form_alert'       => 'आपके कॉमेंट को समीक्षा के लिए भेज दिया गया है',
                'comment_input_name'       => 'नाम',
                'comment_input_comment'    => 'अपका संदेश',
                'comment_reply'            => 'जवाब दे दो',
                'comments_rate'            => 'आपका दर',
                'comment_rate'            => 'दर',

                // plus and minus bloc
                'difference_title_plus'           => 'फ़ायदे',
                'difference_title_minus'          => 'नुकसान',
                'difference_title_plus_and_minus' => 'फ़ायदे और नुकसान',

                // promocode acf bloc
                'promocode_copy_text'             => 'कॉपी',
                'promocode_copied_text'             => 'कॉपी किया गया',
                'promocode_date_text'             => 'वैधता:',

                // breadcrumbs
                'default_home_breadcrumbs'        => 'होम',

                'last_win'                        => 'आखिरी जीत',
                'subscribers'                     => 'ग्राहक',
                'step'                            => 'चरण',
                'last_update'                     => 'अंतिम अपडेट',

                'show' => 'दिखाएँ',
                'hide' => 'छिपाएँ',

                'month_list' => [ 'जनवरी', 'फरवरी', 'मार्च', 'अप्रैल', 'मई', 'जून', 'जुलाई', 'अगस्त', 'सितंबर', 'अक्टूबर', 'नवंबर', 'दिसंबर' ],
            ];
            break;
        case "bn" :
            $lang_content = [
                // page 404
                'page_404_bread_crumb'     => 'পৃষ্ঠা টি খুঁজে পাওয়া যায়নি',
                'page_404_subtitle'        => 'এই পৃষ্ঠাটি খুঁজে পাওয়া যায়নি',
                'page_404_homepage_button' => 'হোম পেজ',

                // TOC block
                'toc_content_title' => 'কনটেন্ট ',

                // To share
                'share_item_title'         => 'এই পোস্টটি শেয়ার করুন ',

                // Comment form
                'comments_title'           => 'মন্তব্য',
                'comment_form_title'       => 'একটি কমেন্ট যোগ করুন ',
                'comment_form_button'      => 'জমা দিন ',
                'comment_form_alert'       => 'আপনার কমেন্টটি রিভিউ এর জন্য পাঠান হয়েছে ',
                'comment_input_name'       => 'নাম ',
                'comment_input_comment'    => 'আপনার বার্তা ',
                'comment_reply'            => 'উত্তর',
                'comments_rate'            => 'আপনার হার',
                'comment_rate'            => 'হার',


                // plus and minus bloc
                'difference_title_plus'           => 'সুবিধা ',
                'difference_title_minus'          => 'অসুবিধা ',
                'difference_title_plus_and_minus' => 'সুবিধা এবং অসুবিধা ',

                // promocode acf bloc
                'promocode_copy_text'             => 'কপি ',
                'promocode_copied_text'             => 'কপি করা হয়েছে',
                'promocode_date_text'             => 'বৈধতা:',

                // breadcrumbs
                'default_home_breadcrumbs'        => 'হোম ',

                'last_win'                        => 'শেষ বিজয়',
                'subscribers'                     => 'সদস্যরা',
                'step'                            => 'পদক্ষেপ',
                'last_update'                     => 'সর্বশেষ আপডেট',

                'show' => 'দেখান',
                'hide' => 'লুকান',

                'month_list' => [ 'জানুয়ারি', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর' ],
            ];
            break;
        case "fr" :
            $lang_content = [
                // page 404
                'page_404_bread_crumb'     => 'Page non trouvée',
                'page_404_subtitle'        => "Cette page n'a pas été trouvée",
                'page_404_homepage_button' => "Page d'accueil",

                // TOC block
                'toc_content_title' => 'Contenu',

                // To share
                'share_item_title'         => 'Partager cette publication',

                // Comment form
                'comments_title'           => 'Commentaires',
                'comment_form_title'       => 'Ajouter un commentaire',
                'comment_form_button'      => 'Soumettre',
                'comment_form_alert'       => 'Votre commentaire a été envoyé pour examen',
                'comment_input_name'       => 'Nom',
                'comment_input_comment'    => 'Ton texte',
                'comment_reply'            => 'Réponse',

                // plus and minus bloc
                'difference_title_plus'           => 'Pour',
                'difference_title_minus'          => 'Contre',
                'difference_title_plus_and_minus' => 'Pour et contre',

                // promocode acf bloc
                'promocode_copy_text'             => 'Copie',
                'promocode_copied_text'             => 'Copié',
                'promocode_date_text'             => 'Validité:',

                // breadcrumbs
                'default_home_breadcrumbs'        => 'Accueil',

                'last_win'                        => 'Dernière victoire',
                'subscribers'                     => 'Abonnés',
                'step'                            => 'Étape',
                'last_update'                     => 'Dernière mise à jour',

                'show' => 'Afficher',
                'hide' => 'Masquer',


                'month_list' => [ 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre' ],
            ];
            break;
        case "az" :
            $lang_content = [
                // page 404
                'page_404_bread_crumb'     => 'Səhifə tapılmadı',
                'page_404_subtitle'        => 'Bu səhifə tapılmadı',
                'page_404_homepage_button' => 'Ana səhifə',

                // TOC block
                'toc_content_title' => 'Məzmun',

                // To share
                'share_item_title'         => 'Bu postu paylaş',

                // Comment form
                'comment_form_title'       => 'Şərh əlavə et',
                'comment_form_button'      => 'Təqdim et',
                'comment_form_alert'       => 'Sənin şərhin baxılması üçün göndərilib',
                'comment_input_name'       => 'Ad',
                'comment_input_comment'    => 'Sənin mətnin',
                'comment_reply'            => 'Cavab ver',

                // plus and minus acf block
                'difference_title_plus'           => 'Müsbətlər',
                'difference_title_minus'          => 'Mənfilər',
                'difference_title_plus_and_minus' => 'Müsbətlər və mənfilər',

                // promocode acf bloc
                'promocode_copy_text'             => 'Köçürmək',
                'promocode_copied_text'             => 'Kopyalandı',
                'promocode_date_text'             => 'Etibarlılıq:',

                // breadcrumbs
                'default_home_breadcrumbs'        => 'Ev',

                'last_win'                        => 'Son qalib',
                'subscribers'                     => 'Abunəçilər',
                'step'                            => 'Addım',
                'last_update'                     => 'Son yeniləmə',

                'show' => 'Göstər',
                'hide' => 'Gizlət',

                'month_list' =>[ 'Yanvar', 'Fevral', 'Mart', 'Aprel', 'May', 'İyun', 'İyul', 'Avqust', 'Sentyabr', 'Oktyabr', 'Noyabr', 'Dekabr' ],
            ];
            break;
        case "ar" :
            $lang_content = [
                'page_404_bread_crumb'     => 'الصفحة غير موجودة',
                'page_404_subtitle'        => 'لم يتم العثور على هذه الصفحة',
                'page_404_homepage_button' => 'الصفحة الرئيسية',
                'toc_content_title' => 'المحتوى',
                'share_item_title'         => 'مشاركة هذا المنشور',
                'comments_title'           => 'التعليقات',
                'comment_form_title'       => 'إضافة تعليق',
                'comment_form_button'      => 'إرسال',
                'comment_form_alert'       => 'تم إرسال تعليقك للمراجعة',
                'comment_input_name'       => 'الاسم',
                'comment_input_comment'    => 'نصك',
                'comment_reply'            => 'رد',
                'comments_rate'            => 'تقييمك',
                'comment_rate'             => 'تقييم',
                'difference_title_plus'           => 'الإيجابيات',
                'difference_title_minus'          => 'السلبيات',
                'difference_title_plus_and_minus' => 'الإيجابيات والسلبيات',
                'promocode_copy_text'             => 'نسخ',
                'promocode_copied_text'             => 'تم نسخها',
                'promocode_date_text'             => 'صلاحيته:',
                'default_home_breadcrumbs'        => 'الرئيسية',

                'last_win'                        => 'آخر فوز',
                'subscribers'                     => 'المشتركين',
                'step'                            => 'خطوة',
                'last_update'                     => 'آخر تحديث',

                'show' => 'عرض',
                'hide' => 'إخفاء',

                'month_list' =>[ 'يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر' ],
            ];
            break;
        case "ms" :
            $lang_content = [
                'page_404_bread_crumb'     => 'Halaman tidak dijumpai',
                'page_404_subtitle'        => 'Halaman ini tidak dijumpai',
                'page_404_homepage_button' => 'Halaman Utama',
                'toc_content_title' => 'Kandungan',
                'share_item_title'         => 'Kongsi pos ini',
                'comments_title'           => 'Ulasan',
                'comment_form_title'       => 'Tambah ulasan',
                'comment_form_button'      => 'Hantar',
                'comment_form_alert'       => 'Ulasan anda telah dihantar untuk semakan',
                'comment_input_name'       => 'Nama',
                'comment_input_comment'    => 'Teks anda',
                'comment_reply'            => 'Balas',
                'comments_rate'            => 'Penilaian anda',
                'comment_rate'             => 'Penilaian',
                'difference_title_plus'           => 'Kelebihan',
                'difference_title_minus'          => 'Kekurangan',
                'difference_title_plus_and_minus' => 'Kelebihan dan kekurangan',
                'promocode_copy_text'             => 'Salin',
                'promocode_copied_text'             => 'Disalin',
                'promocode_date_text'             => 'Tarikh luput:',
                'default_home_breadcrumbs'        => 'Utama',

                'last_win'                        => 'Kemenangan terakhir',
                'subscribers'                     => 'Pelanggan',
                'step'                            => 'Langkah',
                'last_update'                     => 'Kemas kini terakhir',

                'show' => 'Tunjuk',
                'hide' => 'Sembunyi',


                'month_list' =>[ 'Januari', 'Februari', 'Mac', 'April', 'Mei', 'Jun', 'Julai', 'Ogos', 'September', 'Oktober', 'November', 'Disember' ]
            ];
            break;
        case "hy" :
            $lang_content = [
                // page 404
                'page_404_bread_crumb'     => 'Էջը չի գտնվել',
                'page_404_subtitle'        => 'Այս էջը չի գտնվել',
                'page_404_homepage_button' => 'Գլխավոր էջ',

                // TOC block
                'toc_content_title' => 'Բովանդակություն',

                // To share
                'share_item_title'         => 'Կիսվել այս գրառմամբ',

                // Comment form
                'comments_title'           => 'Մեկնաբանություններ',
                'comment_form_title'       => 'Ավելացնել մեկնաբանություն',
                'comment_form_button'      => 'Ուղարկել',
                'comment_form_alert'       => 'Ձեր մեկնաբանությունը ուղարկվել է ստուգման',
                'comment_input_name'       => 'Անուն',
                'comment_input_comment'    => 'Ձեր տեքստը',
                'comment_reply'            => 'Պատասխանել',
                'comments_rate'            => 'Ձեր գնահատականը',
                'comment_rate'             => 'Գնահատել',

                // plus and minus acf block
                'difference_title_plus'           => 'Առավելություններ',
                'difference_title_minus'          => 'Թերություններ',
                'difference_title_plus_and_minus' => 'Առավելություններ և թերություններ',

                // promocode acf block
                'promocode_copy_text'             => 'Պատճենել',
                'promocode_copied_text'           => 'Պատճենված է',
                'promocode_date_text'             => 'Վավերականություն:',

                // breadcrumbs
                'default_home_breadcrumbs'        => 'Գլխավոր',

                'last_win'                        => 'Վերջին հաղթանակ',
                'subscribers'                     => 'Բաժանորդներ',
                'step'                            => 'Քայլ',
                'last_update'                     => 'Վերջին թարմացում',

                'show' => 'Ցույց տալ',
                'hide' => 'Թաքցնել',

                'month_list' => [ 'Հունվար', 'Փետրվար', 'Մարտ', 'Ապրիլ', 'Մայիս', 'Հունիս', 'Հուլիս', 'Օգոստոս', 'Սեպտեմբեր', 'Հոկտեմբեր', 'Նոյեմբեր', 'Դեկտեմբեր' ],
            ];
            break;
        case "ta" :
            $lang_content = [
                // page 404
                'page_404_bread_crumb'     => 'பக்கம் கிடைக்கவில்லை',
                'page_404_subtitle'        => 'இந்தப் பக்கம் காணப்படவில்லை',
                'page_404_homepage_button' => 'முகப்பு பக்கம்',

                // TOC block
                'toc_content_title' => 'உள்ளடக்கம்',

                // To share
                'share_item_title'         => 'இந்த பதிவைப் பகிரவும்',

                // Comment form
                'comments_title'           => 'கருத்துகள்',
                'comment_form_title'       => 'கருத்து சேர்க்கவும்',
                'comment_form_button'      => 'சமர்ப்பிக்கவும்',
                'comment_form_alert'       => 'உங்கள் கருத்து மதிப்பீட்டிற்காக அனுப்பப்பட்டுள்ளது',
                'comment_input_name'       => 'பெயர்',
                'comment_input_comment'    => 'உங்கள் உரை',
                'comment_reply'            => 'பதிலளிக்கவும்',
                'comments_rate'            => 'உங்கள் மதிப்பீடு',
                'comment_rate'             => 'மதிப்பீடு',

                // plus and minus acf block
                'difference_title_plus'           => 'நன்மைகள்',
                'difference_title_minus'          => 'குறைவுகள்',
                'difference_title_plus_and_minus' => 'நன்மை மற்றும் குறைவு',

                // promocode acf bloc
                'promocode_copy_text'             => 'நகலெடுக்கவும்',
                'promocode_copied_text'           => 'நகலெடுக்கப்பட்டது',
                'promocode_date_text'             => 'செல்லுபடியாகும் நாள்:',

                // breadcrumbs
                'default_home_breadcrumbs'        => 'முகப்பு',

                'last_win'                        => 'கடைசி வெற்றி',
                'subscribers'                     => 'சந்தாதாரர்கள்',
                'step'                            => 'அடියடி',
                'last_update'                     => 'கடைசி புதுப்பிப்பு',

                'show' => 'காட்டுக',
                'hide' => 'மறைக்க',

                'month_list' =>                 [ 'ஜனவரி', 'பெப்ரவரி', 'மார்ச்', 'ஏப்ரல்', 'மே', 'ஜூன்', 'ஜூலை', 'ஆகஸ்ட்', 'செப்டம்பர்', 'அக்டோபர்', 'நவம்பர்', 'டிசம்பர்' ],
            ];
            break;
        case "th" :
            $lang_content = [
                // page 404
                'page_404_bread_crumb'     => 'ไม่พบหน้า',
                'page_404_subtitle'        => 'ไม่พบหน้านี้',
                'page_404_homepage_button' => 'หน้าแรก',

                // TOC block
                'toc_content_title' => 'สารบัญ',

                // To share
                'share_item_title'         => 'แชร์โพสต์นี้',

                // Comment form
                'comments_title'           => 'ความคิดเห็น',
                'comment_form_title'       => 'แสดงความคิดเห็น',
                'comment_form_button'      => 'ส่ง',
                'comment_form_alert'       => 'ความคิดเห็นของคุณถูกส่งเพื่อตรวจสอบ',
                'comment_input_name'       => 'ชื่อ',
                'comment_input_comment'    => 'ข้อความของคุณ',
                'comment_reply'            => 'ตอบกลับ',
                'comments_rate'            => 'คะแนนของคุณ',
                'comment_rate'             => 'ให้คะแนน',

                // plus and minus acf block
                'difference_title_plus'           => 'ข้อดี',
                'difference_title_minus'          => 'ข้อเสีย',
                'difference_title_plus_and_minus' => 'ข้อดีและข้อเสีย',

                // promocode acf block
                'promocode_copy_text'             => 'คัดลอก',
                'promocode_copied_text'           => 'คัดลอกแล้ว',
                'promocode_date_text'             => 'ใช้ได้ถึง:',

                // breadcrumbs
                'default_home_breadcrumbs'        => 'หน้าแรก',

                'last_win'                        => 'ชัยชนะครั้งสุดท้าย',
                'subscribers'                     => 'ผู้ติดตาม',
                'step'                            => 'ขั้นตอน',
                'last_update'                     => 'การอัปเดตล่าสุด',

                'show' => 'แสดง',
                'hide' => 'ซ่อน',

                'month_list' => [ 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม' ],
            ];
            break;
        case "am":
            $lang_content = [
                'page_404_bread_crumb'     => 'ገፁ አልተገኘም',
                'page_404_subtitle'        => 'ይህ ገፅ አልተገኘም',
                'page_404_homepage_button' => 'ዋና ገፅ',

                'toc_content_title'        => 'ይዘት',

                'share_item_title'         => 'ይህን ልጥፍ ያጋሩ',

                'comments_title'           => 'አስተያየቶች',
                'comment_form_title'       => 'አስተያየት ያክሉ',
                'comment_form_button'      => 'ላክ',
                'comment_form_alert'       => 'አስተያየትዎ ለክህሎት ተልኳል',
                'comment_input_name'       => 'ስም',
                'comment_input_comment'    => 'ጽሁፍዎ',
                'comment_reply'            => 'መልስ',
                'comments_rate'            => 'ደረጃዎ',
                'comment_rate'             => 'ደረጃ',

                'difference_title_plus'           => 'አማራጮች',
                'difference_title_minus'          => 'ጉዳዮች',
                'difference_title_plus_and_minus' => 'አማራጮች እና ጉዳዮች',

                'promocode_copy_text'             => 'ቅዳ',
                'promocode_copied_text'           => 'ተቀድቷል',
                'promocode_date_text'             => 'ትክክለኛነት:',

                'default_home_breadcrumbs'        => 'መነሻ ገፅ',

                'last_win'                        => 'መጨረሻ አሸናፊ',
                'subscribers'                     => 'ሰብስክራይበሮች',
                'step'                            => 'እርምጃ',
                'last_update'                     => 'መጨረሻ አዘምን',

                'show' => 'አሳይ',
                'hide' => 'ደብቅ',

                'month_list' => [
                    'ጃንዋሪ', 'ፌብሩወሪ', 'ማርች', 'ኤፕሪል', 'ሜይ', 'ጁን',
                    'ጁላይ', 'ኦገስት', 'ሴፕቴምበር', 'ኦክቶበር', 'ኖቬምበር', 'ዲሴምበር'
                ]
            ];

            break;
        case "de":
            $lang_content = [
                'page_404_bread_crumb'     => 'Seite nicht gefunden',
                'page_404_subtitle'        => 'Diese Seite wurde nicht gefunden',
                'page_404_homepage_button' => 'Startseite',

                'toc_content_title'        => 'Inhalt',

                'share_item_title'         => 'Diesen Beitrag teilen',

                'comments_title'           => 'Kommentare',
                'comment_form_title'       => 'Kommentar hinzufügen',
                'comment_form_button'      => 'Absenden',
                'comment_form_alert'       => 'Ihr Kommentar wurde zur Überprüfung gesendet',
                'comment_input_name'       => 'Name',
                'comment_input_comment'    => 'Ihr Text',
                'comment_reply'            => 'Antworten',
                'comments_rate'            => 'Ihre Bewertung',
                'comment_rate'             => 'Bewerten',

                'difference_title_plus'           => 'Vorteile',
                'difference_title_minus'          => 'Nachteile',
                'difference_title_plus_and_minus' => 'Vor- und Nachteile',

                'promocode_copy_text'             => 'Kopieren',
                'promocode_copied_text'           => 'Kopiert',
                'promocode_date_text'             => 'Gültig bis:',

                'default_home_breadcrumbs'        => 'Startseite',

                'last_win'                        => 'Letzter Gewinn',
                'subscribers'                     => 'Abonnenten',
                'step'                            => 'Schritt',
                'last_update'                     => 'Letzte Aktualisierung',

                'show' => 'Anzeigen',
                'hide' => 'Verbergen',

                'month_list' => [
                    'Januar', 'Februar', 'März', 'April', 'Mai', 'Juni',
                    'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'
                ]
            ];
            break;
        case "it":
            $lang_content = [
                'page_404_bread_crumb'     => 'Pagina non trovata',
                'page_404_subtitle'        => 'Questa pagina non è stata trovata',
                'page_404_homepage_button' => 'Pagina iniziale',

                'toc_content_title'        => 'Contenuto',

                'share_item_title'         => 'Condividi questo post',

                'comments_title'           => 'Commenti',
                'comment_form_title'       => 'Aggiungi un commento',
                'comment_form_button'      => 'Invia',
                'comment_form_alert'       => 'Il tuo commento è stato inviato per la revisione',
                'comment_input_name'       => 'Nome',
                'comment_input_comment'    => 'Il tuo testo',
                'comment_reply'            => 'Rispondi',
                'comments_rate'            => 'La tua valutazione',
                'comment_rate'             => 'Valuta',

                'difference_title_plus'           => 'Pro',
                'difference_title_minus'          => 'Contro',
                'difference_title_plus_and_minus' => 'Pro e contro',

                'promocode_copy_text'             => 'Copia',
                'promocode_copied_text'           => 'Copiato',
                'promocode_date_text'             => 'Validità:',

                'default_home_breadcrumbs'        => 'Home',

                'last_win'                        => 'Ultima vincita',
                'subscribers'                     => 'iscritti',
                'step'                            => 'Passo',
                'last_update'                     => 'Ultimo agg.',

                'show' => 'Mostra',
                'hide' => 'Nascondi',

                'month_list' => [
                    'Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno',
                    'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'
                ]
            ];
            break;
        case "lt":
            $lang_content = [
                'page_404_bread_crumb'     => 'Puslapis nerastas',
                'page_404_subtitle'        => 'Šis puslapis nerastas',
                'page_404_homepage_button' => 'Pagrindinis puslapis',

                'toc_content_title'        => 'Turinys',

                'share_item_title'         => 'Dalintis įrašu',

                'comments_title'           => 'Komentarai',
                'comment_form_title'       => 'Pridėti komentarą',
                'comment_form_button'      => 'Siųsti',
                'comment_form_alert'       => 'Jūsų komentaras išsiųstas peržiūrai',
                'comment_input_name'       => 'Vardas',
                'comment_input_comment'    => 'Jūsų tekstas',
                'comment_reply'            => 'Atsakyti',
                'comments_rate'            => 'Jūsų įvertinimas',
                'comment_rate'             => 'Įvertinti',

                'difference_title_plus'           => 'Privalumai',
                'difference_title_minus'          => 'Trūkumai',
                'difference_title_plus_and_minus' => 'Privalumai ir trūkumai',

                'promocode_copy_text'             => 'Kopijuoti',
                'promocode_copied_text'           => 'Nukopijuota',
                'promocode_date_text'             => 'Galioja iki:',

                'default_home_breadcrumbs'        => 'Pradžia',

                'last_win'                        => 'Paskutinis laimėjimas',
                'subscribers'                     => 'Prenumeratoriai',
                'step'                            => 'Žingsnis',
                'last_update'                     => 'Paskutinis atnaujinimas',

                'show' => 'Rodyti',
                'hide' => 'Slėpti',

                'month_list' => [
                    'Sausis', 'Vasaris', 'Kovas', 'Balandis', 'Gegužė', 'Birželis',
                    'Liepa', 'Rugpjūtis', 'Rugsėjis', 'Spalis', 'Lapkritis', 'Gruodis'
                ]
            ];
            break;
        case "pl":
            $lang_content = [
                'page_404_bread_crumb'     => 'Strona nie znaleziona',
                'page_404_subtitle'        => 'Ta strona nie została znaleziona',
                'page_404_homepage_button' => 'Strona główna',

                'toc_content_title'        => 'Spis treści',

                'share_item_title'         => 'Udostępnij ten post',

                'comments_title'           => 'Komentarze',
                'comment_form_title'       => 'Dodaj komentarz',
                'comment_form_button'      => 'Wyślij',
                'comment_form_alert'       => 'Twój komentarz został wysłany do moderacji',
                'comment_input_name'       => 'Imię',
                'comment_input_comment'    => 'Twój tekst',
                'comment_reply'            => 'Odpowiedz',
                'comments_rate'            => 'Twoja ocena',
                'comment_rate'             => 'Oceń',

                'difference_title_plus'           => 'Zalety',
                'difference_title_minus'          => 'Wady',
                'difference_title_plus_and_minus' => 'Zalety i wady',

                'promocode_copy_text'             => 'Kopiuj',
                'promocode_copied_text'           => 'Skopiowano',
                'promocode_date_text'             => 'Ważność:',

                'default_home_breadcrumbs'        => 'Strona główna',

                'last_win'                        => 'Ostatnia wygrana',
                'subscribers'                     => 'subskrybenci',
                'step'                            => 'Krok',
                'last_update'                     => 'Ostatnia akt.',

                'show' => 'Pokaż',
                'hide' => 'Ukryj',

                'month_list' => [
                    'Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec',
                    'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień'
                ]
            ];
            break;
        case "rw":
            $lang_content = [
                'page_404_bread_crumb'     => 'Urupapuro ntirwabonywe',
                'page_404_subtitle'        => 'Uru rupapuro ntirwabonywe',
                'page_404_homepage_button' => 'Urupapuro rw\'itangiriro',

                'toc_content_title'        => 'Ibirimo',

                'share_item_title'         => 'Sangiza iyi nkuru',

                'comments_title'           => 'Ibisobanuro',
                'comment_form_title'       => 'Ongeraho igitekerezo',
                'comment_form_button'      => 'Ohereza',
                'comment_form_alert'       => 'Igitekerezo cyawe cyoherejwe kugirango gisuzumwe',
                'comment_input_name'       => 'Izina',
                'comment_input_comment'    => 'Ubutumwa bwawe',
                'comment_reply'            => 'Subiza',
                'comments_rate'            => 'Urutonde rwawe',
                'comment_rate'             => 'Tanga amanota',

                'difference_title_plus'           => 'Ibyiza',
                'difference_title_minus'          => 'Ibibi',
                'difference_title_plus_and_minus' => 'Ibyiza n\'ibibi',

                'promocode_copy_text'             => 'Gukoporora',
                'promocode_copied_text'           => 'Byarakoporowe',
                'promocode_date_text'             => 'Igihe gishyizweho:',

                'default_home_breadcrumbs'        => 'Ahabanza',

                'last_win'                        => 'Insinzi ya nyuma',
                'subscribers'                     => 'Abamaze kwiyandikisha',
                'step'                            => 'Intambwe',
                'last_update'                     => 'Igihe gishya',

                'show' => 'Erekana',
                'hide' => 'Hisha',

                'month_list' => [
                    'Mutarama', 'Gashyantare', 'Werurwe', 'Mata', 'Gicurasi', 'Kamena',
                    'Nyakanga', 'Kanama', 'Nzeri', 'Ukwakira', 'Ugushyingo', 'Ukuboza'
                ]
            ];
            break;
        case "es":
            $lang_content = [
                'page_404_bread_crumb'     => 'Página no encontrada',
                'page_404_subtitle'        => 'Esta página no fue encontrada',
                'page_404_homepage_button' => 'Página principal',

                'toc_content_title'        => 'Contenido',

                'share_item_title'         => 'Compartir esta publicación',

                'comments_title'           => 'Comentarios',
                'comment_form_title'       => 'Agregar un comentario',
                'comment_form_button'      => 'Enviar',
                'comment_form_alert'       => 'Tu comentario ha sido enviado para revisión',
                'comment_input_name'       => 'Nombre',
                'comment_input_comment'    => 'Tu texto',
                'comment_reply'            => 'Responder',
                'comments_rate'            => 'Tu calificación',
                'comment_rate'             => 'Calificar',

                'difference_title_plus'           => 'Ventajas',
                'difference_title_minus'          => 'Desventajas',
                'difference_title_plus_and_minus' => 'Ventajas y desventajas',

                'promocode_copy_text'             => 'Copiar',
                'promocode_copied_text'           => 'Copiado',
                'promocode_date_text'             => 'Validez:',

                'default_home_breadcrumbs'        => 'Inicio',

                'last_win'                        => 'Última victoria',
                'subscribers'                     => 'suscriptores',
                'step'                            => 'Paso',
                'last_update'                     => 'Última act.',

                'show' => 'Mostrar',
                'hide' => 'Ocultar',

                'month_list' => [
                    'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                ]
            ];
            break;
        case "si":
            $lang_content = [
                'page_404_bread_crumb'     => 'පිටුව හමු නොවිනි',
                'page_404_subtitle'        => 'මෙම පිටුව සොයාගත නොහැකි විය',
                'page_404_homepage_button' => 'මුල් පිටුව',

                'toc_content_title'        => 'අන්තර්ගතය',

                'share_item_title'         => 'මෙම පෝස්ටුව බෙදාගන්න',

                'comments_title'           => 'අදහස්',
                'comment_form_title'       => 'අදහසක් එක් කරන්න',
                'comment_form_button'      => 'යවන්න',
                'comment_form_alert'       => 'ඔබේ අදහස සමාලෝචනය සඳහා යවා ඇත',
                'comment_input_name'       => 'නම',
                'comment_input_comment'    => 'ඔබේ පෙළ',
                'comment_reply'            => 'පිළිතුරු දෙන්න',
                'comments_rate'            => 'ඔබේ අගය',
                'comment_rate'             => 'අගයන්න',

                'difference_title_plus'           => 'වාසි',
                'difference_title_minus'          => 'අවාසි',
                'difference_title_plus_and_minus' => 'වාසි හා අවාසි',

                'promocode_copy_text'             => 'පිටපත් කරන්න',
                'promocode_copied_text'           => 'පිටපත් විය',
                'promocode_date_text'             => 'වලංගුතාවය:',

                'default_home_breadcrumbs'        => 'මුල් පිටුව',

                'last_win'                        => 'නවතම ජයක්',
                'subscribers'                     => 'දායකයින්',
                'step'                            => 'පියවර',
                'last_update'                     => 'අවසන් යාවත්කාලීනය',

                'show' => 'පෙන්වන්න',
                'hide' => 'සඟවන්න',

                'month_list' => [
                    'ජනවාරි', 'පෙබරවාරි', 'මාර්තු', 'අප්‍රේල්', 'මැයි', 'ජූනි',
                    'ජූලි', 'අගෝස්තු', 'සැප්තැම්බර්', 'ඔක්තෝබර්', 'නොවැම්බර්', 'දෙසැම්බර්'
                ]
            ];
            break;
        case "sw":
            $lang_content = [
                'page_404_bread_crumb'     => 'Ukurasa haujapatikana',
                'page_404_subtitle'        => 'Ukurasa huu haukupatikana',
                'page_404_homepage_button' => 'Ukurasa wa mwanzo',

                'toc_content_title'        => 'Yaliyomo',

                'share_item_title'         => 'Shiriki chapisho hili',

                'comments_title'           => 'Maoni',
                'comment_form_title'       => 'Ongeza maoni',
                'comment_form_button'      => 'Tuma',
                'comment_form_alert'       => 'Maoni yako yamepelekwa kwa mapitio',
                'comment_input_name'       => 'Jina',
                'comment_input_comment'    => 'Maandishi yako',
                'comment_reply'            => 'Jibu',
                'comments_rate'            => 'Kiwango chako',
                'comment_rate'             => 'Kadiria',

                'difference_title_plus'           => 'Faida',
                'difference_title_minus'          => 'Hasara',
                'difference_title_plus_and_minus' => 'Faida na hasara',

                'promocode_copy_text'             => 'Nakili',
                'promocode_copied_text'           => 'Imenakiliwa',
                'promocode_date_text'             => 'Uhalali:',

                'default_home_breadcrumbs'        => 'Mwanzo',

                'last_win'                        => 'Ushindi wa mwisho',
                'subscribers'                     => 'waliosajiliwa',
                'step'                            => 'Hatua',
                'last_update'                     => 'Marekebisho ya mwisho',

                'show' => 'Onyesha',
                'hide' => 'Ficha',

                'month_list' => [
                    'Januari', 'Februari', 'Machi', 'Aprili', 'Mei', 'Juni',
                    'Julai', 'Agosti', 'Septemba', 'Oktoba', 'Novemba', 'Desemba'
                ]
            ];
            break;
        case "uz":
            $lang_content = [
                'page_404_bread_crumb'     => 'Sahifa topilmadi',
                'page_404_subtitle'        => 'Bu sahifa topilmadi',
                'page_404_homepage_button' => 'Bosh sahifa',

                'toc_content_title'        => 'Tarkib',

                'share_item_title'         => 'Ushbu postni ulashing',

                'comments_title'           => 'Izohlar',
                'comment_form_title'       => 'Izoh qoldirish',
                'comment_form_button'      => 'Yuborish',
                'comment_form_alert'       => 'Sizning izohingiz ko‘rib chiqish uchun yuborildi',
                'comment_input_name'       => 'Ism',
                'comment_input_comment'    => 'Matningiz',
                'comment_reply'            => 'Javob berish',
                'comments_rate'            => 'Bahoyingiz',
                'comment_rate'             => 'Baholash',

                'difference_title_plus'           => 'Afzalliklar',
                'difference_title_minus'          => 'Kamchiliklar',
                'difference_title_plus_and_minus' => 'Afzallik va kamchiliklar',

                'promocode_copy_text'             => 'Nusxalash',
                'promocode_copied_text'           => 'Nusxalandi',
                'promocode_date_text'             => 'Amal qilish muddati:',

                'default_home_breadcrumbs'        => 'Bosh sahifa',

                'last_win'                        => 'Oxirgi yutuq',
                'subscribers'                     => 'obunachilar',
                'step'                            => 'Qadam',
                'last_update'                     => 'So‘nggi yangilanish',

                'show' => 'Ko‘rsatish',
                'hide' => 'Yashirish',

                'month_list' => [
                    'Yanvar', 'Fevral', 'Mart', 'Aprel', 'May', 'Iyun',
                    'Iyul', 'Avgust', 'Sentabr', 'Oktabr', 'Noyabr', 'Dekabr'
                ]
            ];
            break;
        case "sn":
            $lang_content = [
                'page_404_bread_crumb'     => 'Peji haripo',
                'page_404_subtitle'        => 'Peji iyi haina kuwanikwa',
                'page_404_homepage_button' => 'Peji rekutanga',

                'toc_content_title'        => 'Zviri Mukati',

                'share_item_title'         => 'Goverana chinyorwa ichi',

                'comments_title'           => 'Makomendi',
                'comment_form_title'       => 'Wedzera komendi',
                'comment_form_button'      => 'Tumira',
                'comment_form_alert'       => 'Komendi yako yatumirwa kuti iongororwe',
                'comment_input_name'       => 'Zita',
                'comment_input_comment'    => 'Mashoko ako',
                'comment_reply'            => 'Pindura',
                'comments_rate'            => 'Chiyero chako',
                'comment_rate'             => 'Yera',

                'difference_title_plus'           => 'Zvakanakira',
                'difference_title_minus'          => 'Zvazvakaipira',
                'difference_title_plus_and_minus' => 'Zvakanakira nezvazvakaipira',

                'promocode_copy_text'             => 'Kopa',
                'promocode_copied_text'           => 'Zvakakopwa',
                'promocode_date_text'             => 'Kushanda kusvikira:',

                'default_home_breadcrumbs'        => 'Kumba',

                'last_win'                        => 'Kukunda kwekupedzisira',
                'subscribers'                     => 'vanonyorera',
                'step'                            => 'Danho',
                'last_update'                     => 'Kugadziridzwa kwekupedzisira',

                'show' => 'Ratidza',
                'hide' => 'Viga',

                'month_list' => [
                    'Ndira', 'Kukadzi', 'Kurume', 'Kubvumbi', 'Chivabvu', 'Chikumi',
                    'Chikunguru', 'Nyamavhuvhu', 'Gunyana', 'Gumiguru', 'Mbudzi', 'Zvita'
                ]
            ];
            break;
    }


