<?php

namespace App\Http\Traits;

trait lang
{
    //Localization System
    public function lang($lang = 'en')
    {

        $english = [
            "Titles" => [
                'cardView' => 'ClientCount',
                'userCard' => 'UserService',
                'h3' => 'Call a client',
                'h4' => 'Your Number is:',
                'button' => 'Get Number',
                'Uh3' => 'Take a card number',
                'Uh4' => 'The current card is:',
                'Ubutton' => 'Get Client',

            ],

            'p' => [
                'prefix' => 'Time left for your turn in line is',
                'suffix' => 'minutes',
            ],

            "Navbar" => [
                'title' => 'Navbar Notes',
                'Idea' => 'N1:Project Idea',
                'N2' => 'N2:DB System',
                'N3' => 'N3:Interface',
                'N4' => 'N4:Controllers and Models',
                'lang' => [
                    'title' => 'Language',
                    'one' => 'Arabic',
                    'two' => 'English',
                ],
            ],

            "Components" =>
            [
                'idea' => [
                    'h3' => 'The idea of the project',
                    'h5' => 'The idea of building an organized queuing system:',
                    'p' => 'Establishing a software system to manage the organization of a service queue, whether it is like banking systems or any institution that provides services to the public.',
                ],

                'N1' => [
                    'h3' => 'The details of the project',
                    'h5' => 'Database System:',
                    'p1' => 'The database system is very simple, as only one table is needed to manage an organized queue system. The name of the table in the system is "cards" and it contains three four columns, which I list as follows:',
                    'p2' => 'In addition to the previous table, there is the users table that is used with the fortify security system to represent a bank employee or an administration for any local institution.',
                    'a' => 'Click here to see a concept map of the database.',

                    'ol' => [
                        '1' => 'Column "id" as the primary key of the table and as a tool that can be used to organize the queue.',
                        '2' => 'The column "clientnumber" as a foreign key in the table and also as a tool for organizing the queue.',
                        '3' => 'Column "clientname" in order to put a name as needed.',
                        '4' => 'column "user_id" to create a relationship with the "users" table.',
                    ],
                ],
                'N2' => [
                    'h3' => 'The details of the project',
                    'h5' => 'Project interface management system:',
                    'p1' => 'I designed a controller that allows me to display all the views files so that it is easy to access the files and modify them when needed.',
                    'p2' => 'In addition to the above, I have named all the directives in the project so that the views are easily accessible using the route helper.',
                    'a' => 'Click here to see the concept map of the project controllers.',
                ],

                'N3' => [
                    'h' => [
                        'h5' => [
                            '1' => 'Project control system:',
                            '2' => 'Basic functions are as follows:',
                            '3' => 'Secondary functions are as follows:',
                        ],
                        'h3' => [
                            '1' => 'The details of the project',
                        ],
                    ],

                    'p' => [
                        '1' => 'The CardController is designed with the aim of managing the internal operations of queuing organization. The controller consists of four functions.',
                        '2' => 'This is linked to the control module of the Card, which forms the link with the database.',
                    ],

                    'a' => 'Click on this link to view the concept map of the controllers.',

                    'ol1' => [
                        'f' => [
                            '1' => 'GetNumber function:',
                            '2' => 'getClient function:',
                        ],
                        'p' => [
                            '1' => 'It is responsible for giving the customer a reservation number on the queue in order of precedence.',
                            '2' => 'It is responsible for calling clients to perform their services in order of precedence.',
                        ],
                    ],

                    'ol2' => [
                        'f' => [
                            '1' => 'functions previousNumber and nextNumber:',
                            '2' => 'remainingTime function:',
                        ],
                        'p' => [
                            '1' => 'through which the customer can see the length of the queue that he will be waiting for.',
                            '2' => "The expected time for the client's role is determined.",
                        ],
                    ],
                ],
            ],

        ];

        $arabic = [
            "Titles" => [
                'cardView' => 'صفحة العملاء',
                'userCard' => 'صفحة العاملين',
                'h3' => 'استدعاء عميل',
                'h4' => 'الرقم الخاص بك هو',
                'button' => 'احصل على رقم',
                'Uh3' => 'خدمة العملاء',
                'Uh4' => 'البطاقة الحالية هي',
                'Ubutton' => 'استدعي عميل',

            ],

            'p' => [
                'prefix' => 'الوقت المتبقي لدورك',
                'suffix' => 'دقيقة',
            ],

            "Navbar" => [
                'title' => 'ملاحظات',
                'Idea' => 'فكرة المشروع',
                'N2' => 'نظام قاعدة البيانات',
                'N3' => 'صفحات المشروع',
                'N4' => 'أنظمة التحكم',
                'lang' => [
                    'title' => 'اللغة',
                    'one' => 'العربية',
                    'two' => 'الانجليزية',
                ],
            ],

            "Components" =>
            [
                'idea' => [
                    'h3' => 'فكرة المشروع',
                    'h5' => 'فكرة بناء نظام طابور منظم:',
                    'p' => 'إنشاء نظام برمجي لإدارة تنظيم قائمة انتظار الخدمات ، سواء كانت مثل الأنظمة المصرفية أو أي مؤسسة تقدم خدمات للجمهور.',
                ],

                'N1' => [
                    'h3' => 'The details of the project',
                    'h5' => 'Database System:',
                    'p1' => 'نظام قاعدة البيانات بسيط جدا، حيث لا يحتاج سوى جدول واحد لادارة نظام طابور منظم. اسم الجدول في النظام "cards" ويحتوي على ثلاثة اربعة أعمدة أسردها كالتالي: ',
                    'p2' => 'إضافة للجدول السابق يوجد جدول ال users الذي يستخدم مع نظام الامان fortify ليمثل موظف بنكي او إدارة لاي مؤسسة محلية.',
                    'a' => 'إضغط هنا لرؤية خريطة مفاهيمية لقاعدة البيانات.',

                    'ol' => [
                        '1' => 'العمود "id" كمفتاح أساسي للجدول وكأداة يمكن استخدامها لتنظيم الطابور.',
                        '2' => 'العمود "clientnumber" كمفتاح أجنبي في الجدول وأيضا كأداة لتنظيم الطابور.',
                        '3' => 'العمود "clientname" بهدف وضع اسم حسب الحاجة.',
                        '4' => 'العمود "user_id" لإنشاء علاقة مع جدول "users".',
                    ],
                ],
                'N2' => [
                    'h3' => 'The details of the project',
                    'h5' => 'النظام الإداري لواجهات المشروع: ',
                    'p1' => 'لقد قمت بتصميم متحكم يتيح لي عرض كافة ملفات ال views بحيث يسهل الوصول للملفات وتعديلها وقت الحاجة.',
                    'p2' => 'إضافة الى ما سبق، قمت بتسمية جميع الموجهات في المشروع بحيث يسهل الوصول لصفحات ال views باستخدام الوظيفة المساعدة route.',
                    'a' => 'اضغط هنا لرؤية الخريطة المفاهيمية لمتحكمات المشروع.',
                ],

                'N3' => [
                    'h' => [
                        'h5' => [
                            '1' => 'نظام التحكم في المشروع:',
                            '2' => 'وظائف أساسية وهي كالتالي: ',
                            '3' => 'وظائف ثانوية وهي كالتالي:',
                        ],
                        'h3' => [
                            '1' => 'The details of the project',
                        ],
                    ],

                    'p' => [
                        '1' => 'تم تصميم متحكم CardController بهدف إدراة العمليات الداخلية لتنظيم الطابور حيث يتكون المتحكم من أربع وظائف.
                    تنقسم الوظائف الى: ',
                        '2' => 'هذا ويرتبط بالتحكمات مودل ال Card الذي يشكل حلقة الوصل مع قاعدة البيانات.',
                    ],

                    'a' => 'اضغط على هذا الرابط لرؤية الخريطة المفاهيمية للمتحكمات.',

                    'ol1' => [
                        'f' => [
                            '1' => 'وظيفة getNumber: ',
                            '2' => 'وظيفة getClient:',
                        ],
                        'p' => [
                            '1' => 'هي المسئولة عن إعطاء العميل رقم حجز على الطابور حسب ترتيب الاسبقية.',
                            '2' => 'هي المسئولة عن استدعاء العملاء لتأدية خدماتهم على حسب ترتيب الاسبقية.',
                        ],
                    ],

                    'ol2' => [
                        'f' => [
                            '1' => 'الوظيفتان previousNumber و nextNumber : ',
                            '2' => 'وظيفة remainingTime:',
                        ],
                        'p' => [
                            '1' => 'من خلالهما يمكن للعميل رؤية طول الطابور الذي سوف ينتظره.',
                            '2' => "من خلالها يتم  تحديد الزمن المتوقع لدور العميل.",
                        ],
                    ],
                ],
            ],

        ];

        if ($lang == 'en') {

            return $english;
        }

        elseif ($lang == 'ar')
        {
            return $arabic;
        }
    }
}
