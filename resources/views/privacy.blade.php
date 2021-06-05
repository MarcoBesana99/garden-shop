@extends('layouts.base', ['enParam' => 'en', 'ruParam' => 'ru'])
@section('content')
    <div class="rellax top-section">
        <div class="overlay"></div>
        <div class="top-section__container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="h-100 col-md-9 d-flex flex-column justify-content-center align-items-center text-center">
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="{{ route('home', app()->getLocale()) }}">{{ __('Home') }}
                                <i class="fa fa-chevron-right"></i></a></span>
                    </p>
                    <h1 class="mb-3 bread text-capitalize">{{ __('privacy policy') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white position-relative">
        <div class="container p-4">
            <h2 class="font-weight-bold mt-3 mb-5 page-title text-capitalize">{{ __('our policy') }}</h2>
            <div class="row">
                <div class="col-12">
                    <h4 class="mb-3">{{ __('Privacy Policy') }}</h4 class="mb-3">
                    <p>{{ __('eurazijos-agro.com website administration is obliged to maintain your privacy on the Internet. We pay great attention to securing the data you provided to us. Our privacy policy is based on the General Data Protection Regulation (GDPR) of the European Union. The purposes, for which we collect your personal data are: improvement of our service, communication with visitors to this site, presenting the information requested by the user, providing services associated with the website’s specialization, , and for other actions listed below.') }}
                    </p>
                    <h4 class="mb-3">{{ __('Personal data storage and processing') }}</h4 class="mb-3">
                    <p>{{ __('We collect and process your personal data only with your willing consent. With your permission, we can collect and process the following data: name and surname, e-mail address, phone number, the name of the company. Collection and processing of your personal information is carried out in accordance with the laws of the European Union and the Lithuania.') }}
                    </p>
                    <h4 class="mb-3">{{ __('Data storage, alteration, and removal') }}</h4 class="mb-3">
                    <p>{{ __('The user, who has provided eurazijos-agro.com with their personal data, has the right for their alteration and removal, as well as the right to recall the agreement to data processing. Time, during which your personal data will be stored is: 12 months. After finishing with the processing of your personal data, the website’s administration will permanently delete it. To access your personal data, you can contact the administration on: eurazijos@mail.ru. We will be able to pass your data to a third party only with your willing consent. If the data was transferred to a third party, which is not associated with our organization, we cannot perform any changes to that data.') }}
                    </p>
                    <h4 class="mb-3">{{ __('Processing of visiting technical data') }}</h4 class="mb-3">
                    <p>{{ __('Records of your IP address, time of visit, browser settings, operational system and other technical information is saved in the database when you visit eurazijos-agro.com. This data is necessary for the correct display of the website’s content. It is impossible to identify the person of the visitor using this data.') }}
                    </p>
                    <h4 class="mb-3">{{ __('Children’s personal information') }}</h4 class="mb-3">
                    <p>{{ __('If you are a parent or a legal guardian of an underage child, and you know that the child has provided us with their personal information without your consent, please contact us on: eurazijos@mail.ru. It is forbidden to enter personal data of underage users without the agreement of parents or lawful guardians.') }}
                    </p>
                    <h4 class="mb-3">{{ __('Cookies processing') }}</h4 class="mb-3">
                    <p>{{ __('We use cookie files for the correct display of the website’s content and for the convenience of browsing eurazijos-agro.com. They are small files, that are stored on your device. They help the website to remember information about you, such as in which language you use the website and which pages have you already opened. This information will be useful in the next visit. Thanks to cookie files, the website’s browsing becomes much more convenient. You can learn more about these files here. You can set up cookies reception and blocking in your browser yourself. Inability to receive cookie files may limit the functionality of the website.') }}
                    </p>
                    <h4 class="mb-3">{{ __('Processing of personal data by other services') }}</h4 class="mb-3">
                    <p>{{ __('This website uses third-party online services, which perform data collecting, independent from us. Such services include: Google Analytics , Cookies.') }}
                    </p>
                    <p>{{ __('Data collected by these services may be provided to other services within those organizations. They can use the data for advertising personalization of their own advertising network. You can learn about user agreements of those organizations on their websites. You can also refuse their collection of your personal data. For example, Google Analytics Opt-out Browser Add-on can be found here . We do not pass any personal data to other organizations or services, which are not listed in this privacy policy. As an exception, the collected data may be provided on a lawful request of state authorities, that are authorized to request such information.') }}
                    </p>
                    <h4 class="mb-3">{{ __('Links to other websites') }}</h4 class="mb-3">
                    <p>{{ __('Our website eurazijos-agro.com may contain links to other websites, which are not under our control. We are not responsible for the content of these websites. We recommend you familiarize yourself with the privacy policy of every website that you visit, if such policy exists.') }}
                    </p>
                    <h4 class="mb-3">{{ __('Changes to the privacy policy') }}</h4 class="mb-3">
                    <p>{{ __('From time to time, our website eurazijos-agro.com may update our privacy policy. We inform about any changes to the privacy policy, placed on this webpage. We are monitoring any changes in legislation, which is related to personal data in European Union and Lithuania. If you have entered any of your personal data on our website, we will inform you about the changes in our privacy policy. If your personal data, and more specifically, your contact information was entered incorrectly, we will not be able to contact you.') }}
                    </p>
                    <h4 class="mb-3">{{ __('Feedback and final clauses') }}</h4 class="mb-3">
                    <p>{{ __('You can contact the administration of eurazijos-agro.com regarding any questions related to privacy policy on: eurazijos@mail.ru, or by filling a contact form specified in a corresponding section of this website. If you do not agree with this privacy policy, you cannot use the services of eurazijos-agro.com. In this case you should avoid visiting our website.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(() => {
            $('.set-bg').each(function() {
                let bg = $(this).data('setbg');
                $(this).css('background-image', 'url(' + bg + ')');
            });
        })

    </script>
@endpush
