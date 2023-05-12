<?php

return [
    'HEADER_TITLE' => [
        'REGISTER' => 'Register to our platform',
        'LOGIN' => 'Sign in to our platform',
    ],
    'BUTTON_LABELS' => [
        'SUBMIT' => 'Submit',
        'CANCEL' => 'Cancel',
        'LOGIN' => 'Login to your account',
    ],
    'FORM_LABELS' => [
        'USERNAME' => [
            'label' => 'Username',
            'value' => 'username'
        ],
        'EMAIL' => [
            'label' => 'Email',
            'value' => 'email'
        ],
        'PASSWORD' => [
            'label' => 'Password',
            'value' => 'password',
        ],
        'FIRSTNAME' => [
            'label' => 'First Name',
            'value' => 'first_name'
        ],
        'AGREE_T&C' => 'I agree	with the terms and conditions.',
        'CREATE_ACCOUNT' => 'Create account',
        'FORGOT_PASSWORD' => 'Forgot your Password?',
        'REMEMBER_ME' => 'Remember me',
        'LOGIN' => 'Log in',
        'LOGOUT' => 'Log out',
        'READ_MORE' => 'Read more',
    ],
    'NAV_LINKS' => [
        'Home' => [
            'label' => 'Home',
            'link' => 'homepage',
        ],
        'Listings' => [
            'label' => 'Listings',
            'link' => 'house.index',
        ],
        'Contact' => [
            'label' => 'Contact',
            'link' => '',
        ]
    ],
    'USER_DROPDOWN_LINKS' => [
        'Dashboard' => [
            'label' => 'Dashboard',
            'link' => 'account.dashboard',
            'role' => [
                'RENTEE',
                'RENTER'
            ],
        ],
        'Transactions' => [
            'label' => 'Transactions',
            'link' => 'account.showTransaction',
            'role' => [
                'RENTER'
            ],
        ],
        'Reservations' => [
            'label' => 'Reservations',
            'link' => 'reserve.index',
            'role' => [
                'RENTEE'
            ],
        ],
        'Settings' => [
            'label' => 'Settings',
            'link' => 'account.settings',
            'role' => [
                'RENTEE',
                'RENTER'
            ],
        ],
    ],
    'FOOTER_TABS' => [
        'RESOURCES' => [
            'label' => 'Resources',
            'tabs' => [
                'FLOWBITE' => [
                    'label' => 'Flowbite',
                    'link' => '',
                ],
                'TAILWIND' => [
                    'label' => 'Tailwind CSS',
                    'link' => '',
                ]
            ]
        ],
        'FOLLOW_US' => [
            'label' => 'Follow us',
            'tabs' => [
                'GITHUB' => [
                    'label' => 'Github',
                    'link' => '',
                ],
                'DISCORD' => [
                    'label' => 'Discord',
                    'link' => '',
                ]
            ]
        ],
        'LEGAL' => [
            'label' => 'Legal',
            'tabs' => [
                'POLICY' => [
                    'label' => 'Privacy Policy',
                    'link' => '',
                ],
                'TERMS' => [
                    'label' => 'Terms & Conditions',
                    'link' => '',
                ]
            ]
        ],
    ],
    'FOOTER_SOCIALS' => [
        'FACEBOOK' => [
            'label' => 'Facebook Page',
            'link' => '',
            'icon' => 'M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z'
        ],
        'INSTAGRAM' => [
            'label' => 'Instagram Page',
            'link' => '',
            'icon' => 'M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z'
        ],
        'TWITTER'  => [
            'label' => 'Twitter Page',
            'link' => '',
            'icon' => 'M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84'
        ],
        'GITHUB' => [
            'label' => 'Github account',
            'link' => '',
            'icon' => 'M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z'
        ],
        'DRIBBEBEL' => [
            'label' => 'Dribbbel account',
            'link' => '',
            'icon' => 'M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z'
        ]
    ],
    'FOOTER_COPYRIGHT' => '© 2023 ' . config('app.name')  . '. All Rights Reserved.',
    'FEATURE_CARD' => [
        'TITLE' => 'Featured Properties',
        'DESCRIPTION' => 'The walnut wood card tray is precision milled to perfectly fit a stack of Focus cards. The powder coated steel divider separates active cards from new
        ones, or can be used to archive important task lists.',
    ],
    'LISTINGS_CARD' => [
        'TITLE' => 'Explore our Airbnb Listings',
        'DESCRIPTION' => 'Find homes you would never have know to search for.',
    ],
    'STATS_ITEMS' => [
        0 => [
            'label' => 'Transactions every 24 hours',
            'description' => '44 million',
        ],
        1 => [
            'label' => 'Assets under holding',
            'description' => '$119 trillion',
        ],
        2 => [
            'label' => 'New users annually',
            'description' => '46,000',
        ],
    ],
    'TEAM_CARD' => [
        'TITLE' => 'Meet our leadership',
        'DESCRIPTION' => 'Libero fames augue nisl porttitor nisi, quis. Id ac elit odio vitae elementum enim vitae ullamcorper suspendisse.',
    ],
    'TEAM_ITEMS' => [
        0 => [
            'name' => 'Leslie Alexander',
            'title' => 'Co-Founder / CEO',
            'image' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
            'alt' => 'one',
        ],
        1 => [
            'name' => 'Roberta Casas',
            'title' => 'Co-Founder / CEO',
            'image' => 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/roberta-casas.png',
            'alt' => 'one',
        ],
    ],
    'TESTIMONIAL_CARD' => [
        'TITLE' => 'Satisfied Clients',
        'DESCRIPTION' => 'We want your experience with Airbnb to be easy and enjoyable. Check what our customers say about us:',
    ],
    'TESTIMONIAL_ITEMS' => [
        0 => [
            'excerpt' => 'Very easy this was to integrate',
            'comment' => '"If you care for your time, I hands down would go with this."',
            'name' => 'Bonnie Green',
            'title' => 'Developer at Open AI',
            'image' => 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/karen-nelson.png',
            'alt' => 'bonnie',
        ],
        1 => [
            'excerpt' => 'Solid foundation for any project',
            'comment' => '"Designing with Figma components that can be easily translated to the utility classes of Tailwind CSS is a huge timesaver!"',
            'name' => 'Roberta Casas',
            'title' => 'Lead designer at Dropbox',
            'image' => 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/roberta-casas.png',
            'alt' => 'roberta',
        ],
        2 => [
            'excerpt' => 'Mindblowing workflow',
            'comment' => '"Aesthetically, the well designed components are beautiful and will undoubtedly level up your next application."',
            'name' => 'Jese Leos',
            'title' => 'Software Engineer at Facebook',
            'image' => 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png',
            'alt' => 'jese',
        ],
        3 => [
            'excerpt' => 'Efficient Collaborating',
            'comment' => '"You have many examples that can be used to create a fast prototype for your team."',
            'name' => 'Joseph McFall',
            'title' => 'CTO at Google',
            'image' => 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/joseph-mcfall.png',
            'alt' => 'joseph',
        ],
    ],
    'RENTER_TABLE_COLUMN_TITLE' => [
        'house' => 'House Name',
        'address' => 'Address',
        'capacity' => 'Capacity',
        'price' => 'Price',
    ],
    'ACCOUNT_SETTINGS_CARD' => [
        'security' => [
            'title' => 'Account Security',
            'description' => 'Edit your password and email',
            'link' => 'account.editCredentials',
            'icon' => 'M16 .798l.555.37C20.398 3.73 24.208 5 28 5h1v12.5C29 25.574 23.21 31 16 31S3 25.574 3 17.5V5h1c3.792 0 7.602-1.27 11.445-3.832L16 .798zm-1 3.005c-3.2 1.866-6.418 2.92-9.648 3.149L5 6.972V17.5c0 6.558 4.347 10.991 10 11.459zm2 0V28.96c5.654-.468 10-4.901 10-11.459V6.972l-.352-.02c-3.23-.23-6.448-1.282-9.647-3.148z'
        ],
        'personal' => [
            'title' => 'Personal Info',
            'description' => 'Update your personal info',
            'link' => 'account.editInfo',
            'icon' => 'm29 5c1.0543618 0 1.9181651.81587779 1.9945143 1.85073766l.0054857.14926234v18c0 1.0543618-.8158778 1.9181651-1.8507377 1.9945143l-.1492623.0054857h-26c-1.0543618 0-1.91816512-.8158778-1.99451426-1.8507377l-.00548574-.1492623v-18c0-1.0543618.81587779-1.91816512 1.85073766-1.99451426l.14926234-.00548574zm0 2h-26v18h26zm-3 12v2h-8v-2zm-16-8c1.6568542 0 3 1.3431458 3 3 0 .6167852-.1861326 1.1900967-.5052911 1.6668281 1.4972342.8624949 2.5052911 2.4801112 2.5052911 4.3331719h-2c0-1.3058822-.8343774-2.4168852-1.9990993-2.8289758l-.0009007-3.1710242c0-.5522847-.4477153-1-1-1-.51283584 0-.93550716.3860402-.99327227.8833789l-.00672773.1166211.00008893 3.1706743c-1.16523883.4118113-2.00008893 1.5230736-2.00008893 2.8293257h-2c0-1.8530607 1.00805693-3.470677 2.50570706-4.3343854-.3195745-.4755179-.50570706-1.0488294-.50570706-1.6656146 0-1.6568542 1.34314575-3 3-3zm16 4v2h-8v-2zm0-4v2h-8v-2z',
        ]
    ],
    'RESERVATIONS_TABLE_COLUMN_TITLE' => [
        'house' => 'House Name',
        'address' => 'Address',
        'check_in' => 'Check In',
        'check_out' => 'Check Out',
        'status' => 'Status',
    ],
];
