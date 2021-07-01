@extends('layouts.login-style')

@section('content')



    {{-- <div class="">{{ __('Register') }}</div> --}}
    &nbsp;
    <div class="container">
        <div id="#register-hero" class="row px-2">
            <div class="col-lg-8 col-xl-6 card flex-row mx-auto px-4 shadow p-3 mb-5 border-3">
                <div class="card-body mx-auto ">
                    <form method="POST" class="form-box px-2" action="{{ route('register') }}">
                        @csrf
                        <div class="form-input ">
                            <label for="first_name" class="">{{ __('First name') }}</label>
                            <div class="">
                                <input id="first_name" type="text" pattern="[^()/><\][\\\x22,;|]+"
                                    class=" @error('first_name') is-invalid @enderror" name="first_name"
                                    value="{{ old('first_name') }}" autofocus>

                                @error('first_name')
                                    <span class="error-message pt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-input">
                            <label for="last_name" class="">{{ __('Last name') }}</label>

                            <div class="">
                                <input id="last_name" type="text" pattern="[^()/><\][\\\x22,;|]+"
                                    class=" @error('last_name') is-invalid @enderror" name="last_name"
                                    value="{{ old('last_name') }}" required autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-input">
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required>

                                @error('email')
                                    <span class="error-message pt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-input">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class=" @error('password') is-invalid @enderror"
                                    name="password" required>

                                @error('password')
                                    <span class="error-message pt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-input">
                            <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="">
                            <div class="">
                                <button id="plantify-button" type="submit"
                                    class="btn btn-block btn-success text-uppercase my-2 mx-a">
                                    {{ __('Register') }}
                                </button>
                            </div>

                            <a class="btn btn-block btn-social btn-google btn-danger text-uppercase font-weight-bold"
                                href="{{ url('/login/google') }}" class=""> <i class="fab fa-google"></i> Login with
                                Google</a>

                            <a class="btn btn-block btn-social btn-facebook btn-primary text-uppercase font-weight-bold my-2"
                                href="{{ url('/login/facebook') }}" class=""> <i class="fab fa-facebook-square"></i>
                                Login
                                with Facebook</a>

                        </div>

                        <div class="text-center mt-4">
                                <span> <input required type="checkbox" data-toggle="modal" data-target="#exampleModal">
                                    By checking, you agree to
                                    Plantify's terms and conditions
                                </span>
                        </div>
                        <div class="text-center mt-1">
                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalLong">
                                View terms and conditions
                            </button>
                        </div>
                        <br>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Plantfy Terms and Conditions
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        TERMS OF USE

                                        <br>
                                        Last updated March 15, 2021

                                        <br>

                                        AGREEMENT TO TERMS
                                        <br>

                                        <hr>

                                        <article>
                                            These Terms of Use constitute a legally binding agreement made between you,
                                            whether personally or on behalf of an entity (“you”) and Team Olverd LLC
                                            ("Company", “we”, “us”, or “our”), concerning your access to and use of the
                                            https://isproj2b.benilde.edu.ph/plantify/ website as well as any other media
                                            form, media channel, mobile website or mobile application related, linked,
                                            or
                                            otherwise connected thereto (collectively, the “Site”). You agree that by
                                            accessing the Site, you have read, understood, and agreed to be bound by all
                                            of
                                            these Terms of Use. IF YOU DO NOT AGREE WITH ALL OF THESE TERMS OF USE, THEN
                                            YOU
                                            ARE EXPRESSLY PROHIBITED FROM USING THE SITE AND YOU MUST DISCONTINUE USE
                                            IMMEDIATELY.
                                            <br>
                                        </article>

                                        <br>



                                        <article>
                                            Supplemental terms and conditions or documents that may be posted on the
                                            Site
                                            from time to time are hereby expressly incorporated herein by reference. We
                                            reserve the right, in our sole discretion, to make changes or modifications
                                            to
                                            these Terms of Use at any time and for any reason. We will alert you about
                                            any
                                            changes by updating the “Last updated” date of these Terms of Use, and you
                                            waive
                                            any right to receive specific notice of each such change. It is your
                                            responsibility to periodically review these Terms of Use to stay informed of
                                            updates. You will be subject to, and will be deemed to have been made aware
                                            of
                                            and to have accepted, the changes in any revised Terms of Use by your
                                            continued
                                            use of the Site after the date such revised Terms of Use are posted.
                                            <br>
                                        </article>


                                        <br>

                                        <article>
                                            The information provided on the Site is not intended for distribution to or
                                            use
                                            by any person or entity in any jurisdiction or country where such
                                            distribution
                                            or use would be contrary to law or regulation or which would subject us to
                                            any
                                            registration requirement within such jurisdiction or country. Accordingly,
                                            those
                                            persons who choose to access the Site from other locations do so on their
                                            own
                                            initiative and are solely responsible for compliance with local laws, if and
                                            to
                                            the extent local laws are applicable.

                                            The Site is intended for users who are at least 13 years of age. All users
                                            who
                                            are minors in the jurisdiction in which they reside (generally under the age
                                            of
                                            18) must have the permission of, and be directly supervised by, their parent
                                            or
                                            guardian to use the Site. If you are a minor, you must have your parent or
                                            guardian read and agree to these Terms of Use prior to you using the Site.
                                            <br>
                                        </article>


                                        <br>

                                        <article>

                                            INTELLECTUAL PROPERTY RIGHTS

                                            <br>
                                            Unless otherwise indicated, the Site is our proprietary property and all
                                            source
                                            code, databases, functionality, software, website designs, audio, video,
                                            text,
                                            photographs, and graphics on the Site (collectively, the “Content”) and the
                                            trademarks, service marks, and logos contained therein (the “Marks”) are
                                            owned
                                            or controlled by us or licensed to us, and are protected by copyright and
                                            trademark laws and various other intellectual property rights and unfair
                                            competition laws of the United States, international copyright laws, and
                                            international conventions. The Content and the Marks are provided on the
                                            Site
                                            “AS IS” for your information and personal use only. Except as expressly
                                            provided
                                            in these Terms of Use, no part of the Site and no Content or Marks may be
                                            copied, reproduced, aggregated, republished, uploaded, posted, publicly
                                            displayed, encoded, translated, transmitted, distributed, sold, licensed, or
                                            otherwise exploited for any commercial purpose whatsoever, without our
                                            express
                                            prior written permission.
                                            <br>
                                        </article>

                                        <br>

                                        <article>
                                            Provided that you are eligible to use the Site, you are granted a limited
                                            license to access and use the Site and to download or print a copy of any
                                            portion of the Content to which you have properly gained access solely for
                                            your
                                            personal, non-commercial use. We reserve all rights not expressly granted to
                                            you
                                            in and to the Site, the Content and the Marks.
                                            <br>
                                        </article>


                                        <br>

                                        <article>
                                            USER REPRESENTATIONS

                                            <br>

                                            By using the Site, you represent and warrant that: (1) all registration
                                            information you submit will be true, accurate, current, and complete; (2)
                                            you
                                            will maintain the accuracy of such information and promptly update such
                                            registration information as necessary; (3) you have the legal capacity and
                                            you
                                            agree to comply with these Terms of Use; (4) you are not under the age of
                                            13;
                                            (5) you are not a minor in the jurisdiction in which you reside, or if a
                                            minor,
                                            you have received parental permission to use the Site; (6) you will not
                                            access
                                            the Site through automated or non-human means, whether through a bot, script
                                            or
                                            otherwise; (7) you will not use the Site for any illegal or unauthorized
                                            purpose; and (8) your use of the Site will not violate any applicable law or
                                            regulation.
                                            <br>
                                        </article>

                                        <br>

                                        <article>

                                            If you provide any information that is untrue, inaccurate, not current, or
                                            incomplete, we have the right to suspend or terminate your account and
                                            refuse
                                            any and all current or future use of the Site (or any portion thereof).
                                            <br>
                                        </article>


                                        <br>

                                        <article>
                                            USER REGISTRATION

                                            <br>

                                            You may be required to register with the Site. You agree to keep your
                                            password
                                            confidential and will be responsible for all use of your account and
                                            password.
                                            We reserve the right to remove, reclaim, or change a username you select if
                                            we
                                            determine, in our sole discretion, that such username is inappropriate,
                                            obscene,
                                            or otherwise objectionable.

                                            <br>

                                            PRODUCTS

                                            <br>

                                            We make every effort to display as accurately as possible the colors,
                                            features,
                                            specifications, and details of the products available on the Site. However,
                                            we
                                            do not guarantee that the colors, features, specifications, and details of
                                            the
                                            products will be accurate, complete, reliable, current, or free of other
                                            errors,
                                            and your electronic display may not accurately reflect the actual colors and
                                            details of the products. All products are subject to availability, and we
                                            cannot
                                            guarantee that items will be in stock. We reserve the right to discontinue
                                            any
                                            products at any time for any reason. Prices for all products are subject to
                                            change.
                                            <br>
                                        </article>
                                        <br>
                                        <article>
                                            PURCHASES AND PAYMENT
                                            <br>

                                            We accept the following forms of payment:
                                            <br>
                                            - Visa
                                            <br>
                                            - Mastercard
                                            <br>
                                            - PayPal
                                            <br>


                                            You agree to provide current, complete, and accurate purchase and account
                                            information for all purchases made via the Site. You further agree to
                                            promptly
                                            update account and payment information, including email address, payment
                                            method,
                                            and payment card expiration date, so that we can complete your transactions
                                            and
                                            contact you as needed. Sales tax will be added to the price of purchases as
                                            deemed required by us. We may change prices at any time. All payments shall
                                            be
                                            in Philippine Pesos.
                                            <br>


                                            You agree to pay all charges at the prices then in effect for your purchases
                                            and
                                            any applicable shipping fees, and you authorize us to charge your chosen
                                            payment
                                            provider for any such amounts upon placing your order. If your order is
                                            subject
                                            to recurring charges, then you consent to our charging your payment method
                                            on a
                                            recurring basis without requiring your prior approval for each recurring
                                            charge,
                                            until such time as you cancel the applicable order. We reserve the right to
                                            correct any errors or mistakes in pricing, even if we have already requested
                                            or
                                            received payment.

                                            <br>


                                            We reserve the right to refuse any order placed through the Site. We may, in
                                            our
                                            sole discretion, limit or cancel quantities purchased per person, per
                                            household,
                                            or per order. These restrictions may include orders placed by or under the
                                            same
                                            customer account, the same payment method, and/or orders that use the same
                                            billing or shipping address. We reserve the right to limit or prohibit
                                            orders
                                            that, in our sole judgment, appear to be placed by dealers, resellers, or
                                            distributors.
                                            <br>
                                        </article>

                                        <br>
                                        <article>
                                            RETURN POLICY
                                            <br>
                                            Please review our Return Policy posted on the Site prior to making any
                                            purchases.

                                            <br>
                                            PROHIBITED ACTIVITIES

                                            <br>
                                            You may not access or use the Site for any purpose other than that for which
                                            we
                                            make the Site available. The Site may not be used in connection with any
                                            commercial endeavors except those that are specifically endorsed or approved
                                            by
                                            us.
                                            <br>

                                            As a user of the Site, you agree not to:
                                            <br>
                                            1. Systematically retrieve data or other content from the Site to create or
                                            compile, directly or indirectly, a collection, compilation, database, or
                                            directory without written permission from us.
                                            <br>
                                            2. Make any unauthorized use of the Site, including collecting usernames
                                            and/or
                                            email addresses of users by electronic or other means for the purpose of
                                            sending
                                            unsolicited email, or creating user accounts by automated means or under
                                            false
                                            pretenses.
                                            <br>
                                            3. Use a buying agent or purchasing agent to make purchases on the Site.
                                            <br>
                                            4. Circumvent, disable, or otherwise interfere with security-related
                                            features of
                                            the Site, including features that prevent or restrict the use or copying of
                                            any
                                            Content or enforce limitations on the use of the Site and/or the Content
                                            contained therein.
                                            <br>
                                            5. Engage in unauthorized framing of or linking to the Site.
                                            <br>
                                            6. Trick, defraud, or mislead us and other users, especially in any attempt
                                            to
                                            learn sensitive account information such as user passwords.
                                            <br>
                                            7. Make improper use of our support services or submit false reports of
                                            abuse or
                                            misconduct.
                                            <br>
                                            8. Engage in any automated use of the system, such as using scripts to send
                                            comments or messages, or using any data mining, robots, or similar data
                                            gathering and extraction tools.
                                            <br>
                                            9. Interfere with, disrupt, or create an undue burden on the Site or the
                                            networks or services connected to the Site.
                                            <br>
                                            10. Sell or otherwise transfer your profile.
                                            <br>
                                            11. Attempt to impersonate another user or person or use the username of
                                            another
                                            user.
                                            <br>
                                            12. Use the Site as part of any effort to compete with us or otherwise use
                                            the
                                            Site and/or the Content for any revenue-generating endeavor or commercial
                                            enterprise.
                                            <br>
                                            13. Decipher, decompile, disassemble, or reverse engineer any of the
                                            software
                                            comprising or in any way making up a part of the Site.
                                            <br>
                                            14. Use any information obtained from the Site in order to harass, abuse, or
                                            harm another person.
                                            <br>
                                            15. Attempt to bypass any measures of the Site designed to prevent or
                                            restrict
                                            <br>
                                            access to the Site, or any portion of the Site.
                                            16. Harass, annoy, intimidate, or threaten any of our employees or agents
                                            engaged in providing any portion of the Site to you.
                                            <br>
                                            17. Delete the copyright or other proprietary rights notice from any
                                            Content.
                                            <br>
                                            18. Copy or adapt the Site’s software, including but not limited to Flash,
                                            PHP,
                                            HTML, JavaScript, or other code.
                                            <br>
                                            19. Upload or transmit (or attempt to upload or to transmit) viruses, Trojan
                                            horses, or other material, including excessive use of capital letters and
                                            spamming (continuous posting of repetitive text), that interferes with any
                                            party’s uninterrupted use and enjoyment of the Site or modifies, impairs,
                                            disrupts, alters, or interferes with the use, features, functions,
                                            operation, or
                                            maintenance of the Site.
                                            <br>
                                            20. Upload or transmit (or attempt to upload or to transmit) any material
                                            that
                                            acts as a passive or active information collection or transmission
                                            mechanism,
                                            including without limitation, clear graphics interchange formats (“gifs”),
                                            1×1
                                            pixels, web bugs, cookies, or other similar devices (sometimes referred to
                                            as
                                            “spyware” or “passive collection mechanisms” or “pcms”).
                                            <br>
                                            21. Except as may be the result of standard search engine or Internet
                                            browser
                                            usage, use, launch, develop, or distribute any automated system, including
                                            without limitation, any spider, robot, cheat utility, scraper, or offline
                                            reader
                                            that accesses the Site, or using or launching any unauthorized script or
                                            other
                                            software.
                                            <br>
                                            22. Disparage, tarnish, or otherwise harm, in our opinion, us and/or the
                                            Site.
                                            <br>
                                            23. Use the Site in a manner inconsistent with any applicable laws or
                                            regulations.
                                            <br>
                                        </article>

                                        <br>
                                        <article>
                                            USER GENERATED CONTRIBUTIONS
                                            <br>
                                            The Site may invite you to chat, contribute to, or participate in blogs,
                                            message
                                            boards, online forums, and other functionality, and may provide you with the
                                            opportunity to create, submit, post, display, transmit, perform, publish,
                                            distribute, or broadcast content and materials to us or on the Site,
                                            including
                                            but not limited to text, writings, video, audio, photographs, graphics,
                                            comments, suggestions, or personal information or other material
                                            (collectively,
                                            "Contributions"). Contributions may be viewable by other users of the Site
                                            and
                                            the Marketplace Offerings and through third-party websites. As such, any
                                            Contributions you transmit may be treated as non-confidential and
                                            non-proprietary. When you create or make available any Contributions, you
                                            thereby represent and warrant that:
                                            <br>
                                            1. The creation, distribution, transmission, public display, or performance,
                                            and
                                            the accessing, downloading, or copying of your Contributions do not and will
                                            not
                                            infringe the proprietary rights, including but not limited to the copyright,
                                            patent, trademark, trade secret, or moral rights of any third party.
                                            <br>
                                            2. You are the creator and owner of or have the necessary licenses, rights,
                                            consents, releases, and permissions to use and to authorize us, the Site,
                                            and
                                            other users of the Site to use your Contributions in any manner contemplated
                                            by
                                            the Site and these Terms of Use.
                                            <br>
                                            3. You have the written consent, release, and/or permission of each and
                                            every
                                            identifiable individual person in your Contributions to use the name or
                                            likeness
                                            of each and every such identifiable individual person to enable inclusion
                                            and
                                            use of your Contributions in any manner contemplated by the Site and these
                                            Terms
                                            of Use.
                                            <br>
                                            4. Your Contributions are not false, inaccurate, or misleading.
                                            <br>
                                            5. Your Contributions are not unsolicited or unauthorized advertising,
                                            promotional materials, pyramid schemes, chain letters, spam, mass mailings,
                                            or
                                            other forms of solicitation.
                                            <br>
                                            6. Your Contributions are not obscene, lewd, lascivious, filthy, violent,
                                            harassing, libelous, slanderous, or otherwise objectionable (as determined
                                            by
                                            us).
                                            <br>
                                            7. Your Contributions do not ridicule, mock, disparage, intimidate, or abuse
                                            anyone.
                                            <br>
                                            8. Your Contributions are not used to harass or threaten (in the legal sense
                                            of
                                            those terms) any other person and to promote violence against a specific
                                            person
                                            or class of people.
                                            <br>
                                            9. Your Contributions do not violate any applicable law, regulation, or
                                            rule.
                                            <br>
                                            10. Your Contributions do not violate the privacy or publicity rights of any
                                            third party.
                                            <br>
                                            11. Your Contributions do not contain any material that solicits personal
                                            information from anyone under the age of 18 or exploits people under the age
                                            of
                                            18 in a sexual or violent manner.
                                            <br>
                                            12. Your Contributions do not violate any applicable law concerning child
                                            pornography, or otherwise intended to protect the health or well-being of
                                            minors;
                                            <br>
                                            13. Your Contributions do not include any offensive comments that are
                                            connected
                                            to race, national origin, gender, sexual preference, or physical handicap.
                                            <br>
                                            14. Your Contributions do not otherwise violate, or link to material that
                                            violates, any provision of these Terms of Use, or any applicable law or
                                            regulation.
                                            <br>
                                            Any use of the Site or the Marketplace Offerings in violation of the
                                            foregoing
                                            violates these Terms of Use and may result in, among other things,
                                            termination
                                            or suspension of your rights to use the Site and the Marketplace Offerings.
                                            <br>
                                        </article>


                                        <br>
                                        <article>

                                            CONTRIBUTION LICENSE
                                            <br>
                                            By posting your Contributions to any part of the Site or making
                                            Contributions
                                            accessible to the Site by linking your account from the Site to any of your
                                            social networking accounts, you automatically grant, and you represent and
                                            warrant that you have the right to grant, to us an unrestricted, unlimited,
                                            irrevocable, perpetual, non-exclusive, transferable, royalty-free,
                                            fully-paid,
                                            worldwide right, and license to host, use, copy, reproduce, disclose, sell,
                                            resell, publish, broadcast, retitle, archive, store, cache, publicly
                                            perform,
                                            publicly display, reformat, translate, transmit, excerpt (in whole or in
                                            part),
                                            and distribute such Contributions (including, without limitation, your image
                                            and
                                            voice) for any purpose, commercial, advertising, or otherwise, and to
                                            prepare
                                            derivative works of, or incorporate into other works, such Contributions,
                                            and
                                            grant and authorize sublicenses of the foregoing. The use and distribution
                                            may
                                            occur in any media formats and through any media channels.
                                            <br>
                                            This license will apply to any form, media, or technology now known or
                                            hereafter
                                            developed, and includes our use of your name, company name, and franchise
                                            name,
                                            as applicable, and any of the trademarks, service marks, trade names, logos,
                                            and
                                            personal and commercial images you provide. You waive all moral rights in
                                            your
                                            Contributions, and you warrant that moral rights have not otherwise been
                                            asserted in your Contributions.
                                            <br>
                                            We do not assert any ownership over your Contributions. You retain full
                                            ownership of all of your Contributions and any intellectual property rights
                                            or
                                            other proprietary rights associated with your Contributions. We are not
                                            liable
                                            for any statements or representations in your Contributions provided by you
                                            in
                                            any area on the Site. You are solely responsible for your Contributions to
                                            the
                                            Site and you expressly agree to exonerate us from any and all responsibility
                                            and
                                            to refrain from any legal action against us regarding your Contributions.
                                            <br>
                                            We have the right, in our sole and absolute discretion, (1) to edit, redact,
                                            or
                                            otherwise change any Contributions; (2) to re-categorize any Contributions
                                            to
                                            place them in more appropriate locations on the Site; and (3) to pre-screen
                                            or
                                            delete any Contributions at any time and for any reason, without notice. We
                                            have
                                            no obligation to monitor your Contributions.
                                            <br>
                                        </article>

                                        <br>
                                        <article>
                                            GUIDELINES FOR REVIEWS
                                            <br>
                                            We may provide you areas on the Site to leave reviews or ratings. When
                                            posting a
                                            review, you must comply with the following criteria: (1) you should have
                                            firsthand experience with the person/entity being reviewed; (2) your reviews
                                            should not contain offensive profanity, or abusive, racist, offensive, or
                                            hate
                                            language; (3) your reviews should not contain discriminatory references
                                            based on
                                            religion, race, gender, national origin, age, marital status, sexual
                                            orientation, or disability; (4) your reviews should not contain references
                                            to
                                            illegal activity; (5) you should not be affiliated with competitors if
                                            posting
                                            negative reviews; (6) you should not make any conclusions as to the legality
                                            of
                                            conduct; (7) you may not post any false or misleading statements; and (8)
                                            you
                                            may not organize a campaign encouraging others to post reviews, whether
                                            positive
                                            or negative.
                                            <br>
                                            We may accept, reject, or remove reviews in our sole discretion. We have
                                            absolutely no obligation to screen reviews or to delete reviews, even if
                                            anyone
                                            considers reviews objectionable or inaccurate. Reviews are not endorsed by
                                            us,
                                            and do not necessarily represent our opinions or the views of any of our
                                            affiliates or partners. We do not assume liability for any review or for any
                                            claims, liabilities, or losses resulting from any review. By posting a
                                            review,
                                            you hereby grant to us a perpetual, non-exclusive, worldwide, royalty-free,
                                            fully-paid, assignable, and sublicensable right and license to reproduce,
                                            modify, translate, transmit by any means, display, perform, and/or
                                            distribute
                                            all content relating to reviews.
                                            <br>
                                        </article>

                                        <br>
                                        <article>

                                            SOCIAL MEDIA
                                            <br>
                                            As part of the functionality of the Site, you may link your account with
                                            online
                                            accounts you have with third-party service providers (each such account, a
                                            “Third-Party Account”) by either: (1) providing your Third-Party Account
                                            login
                                            information through the Site; or (2) allowing us to access your Third-Party
                                            Account, as is permitted under the applicable terms and conditions that
                                            govern
                                            your use of each Third-Party Account. You represent and warrant that you are
                                            entitled to disclose your Third-Party Account login information to us and/or
                                            grant us access to your Third-Party Account, without breach by you of any of
                                            the
                                            terms and conditions that govern your use of the applicable Third-Party
                                            Account,
                                            and without obligating us to pay any fees or making us subject to any usage
                                            limitations imposed by the third-party service provider of the Third-Party
                                            Account. By granting us access to any Third-Party Accounts, you understand
                                            that
                                            (1) we may access, make available, and store (if applicable) any content
                                            that
                                            you have provided to and stored in your Third-Party Account (the “Social
                                            Network
                                            Content”) so that it is available on and through the Site via your account,
                                            including without limitation any friend lists and (2) we may submit to and
                                            receive from your Third-Party Account additional information to the extent
                                            you
                                            are notified when you link your account with the Third-Party Account.
                                            Depending
                                            on the Third-Party Accounts you choose and subject to the privacy settings
                                            that
                                            you have set in such Third-Party Accounts, personally identifiable
                                            information
                                            that you post to your Third-Party Accounts may be available on and through
                                            your
                                            account on the Site. Please note that if a Third-Party Account or associated
                                            service becomes unavailable or our access to such Third-Party Account is
                                            terminated by the third-party service provider, then Social Network Content
                                            may
                                            no longer be available on and through the Site. You will have the ability to
                                            disable the connection between your account on the Site and your Third-Party
                                            Accounts at any time. PLEASE NOTE THAT YOUR RELATIONSHIP WITH THE
                                            THIRD-PARTY
                                            SERVICE PROVIDERS ASSOCIATED WITH YOUR THIRD-PARTY ACCOUNTS IS GOVERNED
                                            SOLELY
                                            BY YOUR AGREEMENT(S) WITH SUCH THIRD-PARTY SERVICE PROVIDERS. We make no
                                            effort
                                            to review any Social Network Content for any purpose, including but not
                                            limited
                                            to, for accuracy, legality, or non-infringement, and we are not responsible
                                            for
                                            any Social Network Content. You acknowledge and agree that we may access
                                            your
                                            email address book associated with a Third-Party Account and your contacts
                                            list
                                            stored on your mobile device or tablet computer solely for purposes of
                                            identifying and informing you of those contacts who have also registered to
                                            use
                                            the Site. You can deactivate the connection between the Site and your
                                            Third-Party Account by contacting us using the contact information below or
                                            through your account settings (if applicable). We will attempt to delete any
                                            information stored on our servers that was obtained through such Third-Party
                                            Account, except the username and profile picture that become associated with
                                            your account.
                                            <br>
                                        </article>
                                        <br>
                                        <article>

                                            SUBMISSIONS
                                            <br>
                                            You acknowledge and agree that any questions, comments, suggestions, ideas,
                                            feedback, or other information regarding the Site or the Marketplace
                                            Offerings
                                            ("Submissions") provided by you to us are non-confidential and shall become
                                            our
                                            sole property. We shall own exclusive rights, including all intellectual
                                            property rights, and shall be entitled to the unrestricted use and
                                            dissemination
                                            of these Submissions for any lawful purpose, commercial or otherwise,
                                            without
                                            acknowledgment or compensation to you. You hereby waive all moral rights to
                                            any
                                            such Submissions, and you hereby warrant that any such Submissions are
                                            original
                                            with you or that you have the right to submit such Submissions. You agree
                                            there
                                            shall be no recourse against us for any alleged or actual infringement or
                                            misappropriation of any proprietary right in your Submissions.

                                            <br>
                                            THIRD-PARTY WEBSITES AND CONTENT
                                            <br>
                                            The Site may contain (or you may be sent via the Site or the Marketplace
                                            Offerings) links to other websites ("Third-Party Websites") as well as
                                            articles,
                                            photographs, text, graphics, pictures, designs, music, sound, video,
                                            information, applications, software, and other content or items belonging to
                                            or
                                            originating from third parties ("Third-Party Content"). Such Third-Party
                                            Websites and Third-Party Content are not investigated, monitored, or checked
                                            for
                                            accuracy, appropriateness, or completeness by us, and we are not responsible
                                            for
                                            any Third Party Websites accessed through the Site or any Third-Party
                                            Content
                                            posted on, available through, or installed from the Site, including the
                                            content,
                                            accuracy, offensiveness, opinions, reliability, privacy practices, or other
                                            policies of or contained in the Third-Party Websites or the Third-Party
                                            Content.
                                            Inclusion of, linking to, or permitting the use or installation of any
                                            Third-Party Websites or any Third-PartyContent does not imply approval or
                                            endorsement thereof by us. If you decide to leave the Site and access the
                                            Third-Party Websites or to use or install any Third-Party Content, you do so
                                            at
                                            your own risk, and you should be aware these Terms of Use no longer govern.
                                            You
                                            should review the applicable terms and policies, including privacy and data
                                            gathering practices, of any website to which you navigate from the Site or
                                            relating to any applications you use or install from the Site. Any purchases
                                            you
                                            make through Third-Party Websites will be through other websites and from
                                            other
                                            companies, and we take no responsibility whatsoever in relation to such
                                            purchases which are exclusively between you and the applicable third party.
                                            You
                                            agree and acknowledge that we do not endorse the products or services
                                            offered on
                                            Third-Party Websites and you shall hold us harmless from any harm caused by
                                            your
                                            purchase of such products or services. Additionally, you shall hold us
                                            harmless
                                            from any losses sustained by you or harm caused to you relating to or
                                            resulting
                                            in any way from any Third-Party Content or any contact with Third-Party
                                            Websites.
                                            <br>

                                            ADVERTISERS
                                            <br>
                                            We allow advertisers to display their advertisements and other information
                                            in
                                            certain areas of the Site, such as sidebar advertisements or banner
                                            advertisements. If you are an advertiser, you shall take full responsibility
                                            for
                                            any advertisements you place on the Site and any services provided on the
                                            Site
                                            or products sold through those advertisements. Further, as an advertiser,
                                            you
                                            warrant and represent that you possess all rights and authority to place
                                            advertisements on the Site, including, but not limited to, intellectual
                                            property
                                            rights, publicity rights, and contractual rights. We simply provide the
                                            space to
                                            place such advertisements, and we have no other relationship with
                                            advertisers.

                                            <br>
                                            SITE MANAGEMENT
                                            <br>
                                            We reserve the right, but not the obligation, to: (1) monitor the Site for
                                            violations of these Terms of Use; (2) take appropriate legal action against
                                            anyone who, in our sole discretion, violates the law or these Terms of Use,
                                            including without limitation, reporting such user to law enforcement
                                            authorities; (3) in our sole discretion and without limitation, refuse,
                                            restrict
                                            access to, limit the availability of, or disable (to the extent
                                            technologically
                                            feasible) any of your Contributions or any portion thereof; (4) in our sole
                                            discretion and without limitation, notice, or liability, to remove from the
                                            Site
                                            or otherwise disable all files and content that are excessive in size or are
                                            in
                                            any way burdensome to our systems; and (5) otherwise manage the Site in a
                                            manner
                                            designed to protect our rights and property and to facilitate the proper
                                            functioning of the Site and the Marketplace Offerings.
                                        </article>

                                        <br>

                                        <article>

                                            PRIVACY POLICY
                                            <br>
                                            We care about data privacy and security. By using the Site or the
                                            Marketplace
                                            Offerings, you agree to be bound by our Privacy Policy posted on the Site,
                                            which
                                            is incorporated into these Terms of Use. Please be advised the Site and the
                                            Marketplace Offerings are hosted in the Philippines. If you access the Site
                                            or
                                            the Marketplace Offerings from any other region of the world with laws or
                                            other
                                            requirements governing personal data collection, use, or disclosure that
                                            differ
                                            from applicable laws in the Philippines, then through your continued use of
                                            the
                                            Site, you are transferring your data to the Philippines, and you expressly
                                            consent to have your data transferred to and processed in the Philippines.
                                            <br>

                                            TERM AND TERMINATION
                                            <br>
                                            These Terms of Use shall remain in full force and effect while you use the
                                            Site.
                                            WITHOUT LIMITING ANY OTHER PROVISION OF THESE TERMS OF USE, WE RESERVE THE
                                            RIGHT
                                            TO, IN OUR SOLE DISCRETION AND WITHOUT NOTICE OR LIABILITY, DENY ACCESS TO
                                            AND
                                            USE OF THE SITE AND THE MARKETPLACE OFFERINGS (INCLUDING BLOCKING CERTAIN IP
                                            ADDRESSES), TO ANY PERSON FOR ANY REASON OR FOR NO REASON, INCLUDING WITHOUT
                                            LIMITATION FOR BREACH OF ANY REPRESENTATION, WARRANTY, OR COVENANT CONTAINED
                                            IN
                                            THESE TERMS OF USE OR OF ANY APPLICABLE LAW OR REGULATION. WE MAY TERMINATE
                                            YOUR
                                            USE OR PARTICIPATION IN THE SITE AND THE MARKETPLACE OFFERINGS OR DELETE
                                            YOUR
                                            ACCOUNT AND ANY CONTENT OR INFORMATION THAT YOU POSTED AT ANY TIME, WITHOUT
                                            WARNING, IN OUR SOLE DISCRETION.
                                            <br>
                                            If we terminate or suspend your account for any reason, you are prohibited
                                            from
                                            registering and creating a new account under your name, a fake or borrowed
                                            name,
                                            or the name of any third party, even if you may be acting on behalf of the
                                            third
                                            party. In addition to terminating or suspending your account, we reserve the
                                            right to take appropriate legal action, including without limitation
                                            pursuing
                                            civil, criminal, and injunctive redress.

                                            <br>
                                            MODIFICATIONS AND INTERRUPTIONS
                                            <br>
                                            We reserve the right to change, modify, or remove the contents of the Site
                                            at
                                            any time or for any reason at our sole discretion without notice. However,
                                            we
                                            have no obligation to update any information on our Site. We also reserve
                                            the
                                            right to modify or discontinue all or part of the Marketplace Offerings
                                            without
                                            notice at any time. We will not be liable to you or any third party for any
                                            modification, price change, suspension, or discontinuance of the Site or the
                                            Marketplace Offerings.
                                            <br>
                                            We cannot guarantee the Site and the Marketplace Offerings will be available
                                            at
                                            all times. We may experience hardware, software, or other problems or need
                                            to
                                            perform maintenance related to the Site, resulting in interruptions, delays,
                                            or
                                            errors. We reserve the right to change, revise, update, suspend,
                                            discontinue, or
                                            otherwise modify the Site or the Marketplace Offerings at any time or for
                                            any
                                            reason without notice to you. You agree that we have no liability whatsoever
                                            for
                                            any loss, damage, or inconvenience caused by your inability to access or use
                                            the
                                            Site or the Marketplace Offerings during any downtime or discontinuance of
                                            the
                                            Site or the Marketplace Offerings. Nothing in these Terms of Use will be
                                            construed to obligate us to maintain and support the Site or the Marketplace
                                            Offerings or to supply any corrections, updates, or releases in connection
                                            therewith.
                                            <br>

                                            GOVERNING LAW
                                            <br>
                                            These terms shall be governed by and defined following the laws of the
                                            Philippines. Team Olverd LLC and yourself irrevocably consent that the
                                            courts of
                                            the Philippines shall have exclusive jurisdiction to resolve any dispute
                                            which
                                            may arise in connection with these terms.
                                            <br>

                                            DISPUTE RESOLUTION
                                            <br>
                                            You agree to irrevocably submit all disputes related to Terms or the
                                            relationship established by this Agreement to the jurisdiction of the
                                            Philippines courts. Team Olverd LLC shall also maintain the right to bring
                                            proceedings as to the substance of the matter in the courts of the country
                                            where
                                            you reside or, if these Terms are entered into in the course of your trade
                                            or
                                            profession, the state of your principal place of business.
                                            <br>

                                            CORRECTIONS
                                            <br>
                                            There may be information on the Site that contains typographical errors,
                                            inaccuracies, or omissions that may relate to the Marketplace Offerings,
                                            including descriptions, pricing, availability, and various other
                                            information. We
                                            reserve the right to correct any errors, inaccuracies, or omissions and to
                                            change or update the information on the Site at any time, without prior
                                            notice.

                                            <br>
                                            DISCLAIMER
                                            <br>
                                            THE SITE IS PROVIDED ON AN AS-IS AND AS-AVAILABLE BASIS. YOU AGREE THAT YOUR
                                            USE
                                            OF THE SITE SERVICES WILL BE AT YOUR SOLE RISK. TO THE FULLEST EXTENT
                                            PERMITTED
                                            BY LAW, WE DISCLAIM ALL WARRANTIES, EXPRESS OR IMPLIED, IN CONNECTION WITH
                                            THE
                                            SITE AND YOUR USE THEREOF, INCLUDING, WITHOUT LIMITATION, THE IMPLIED
                                            WARRANTIES
                                            OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, AND NON-INFRINGEMENT.
                                            WE
                                            MAKE NO WARRANTIES OR REPRESENTATIONS ABOUT THE ACCURACY OR COMPLETENESS OF
                                            THE
                                            SITE’S CONTENT OR THE CONTENT OF ANY WEBSITES LINKED TO THIS SITE AND WE
                                            WILL
                                            ASSUME NO LIABILITY OR RESPONSIBILITY FOR ANY (1) ERRORS, MISTAKES, OR
                                            INACCURACIES OF CONTENT AND MATERIALS, (2) PERSONAL INJURY OR PROPERTY
                                            DAMAGE,
                                            OF ANY NATURE WHATSOEVER, RESULTING FROM YOUR ACCESS TO AND USE OF THE SITE,
                                            (3)
                                            ANY UNAUTHORIZED ACCESS TO OR USE OF OUR SECURE SERVERS AND/OR ANY AND ALL
                                            PERSONAL INFORMATION AND/OR FINANCIAL INFORMATION STORED THEREIN, (4) ANY
                                            INTERRUPTION OR CESSATION OF TRANSMISSION TO OR FROM THE SITE, (5) ANY BUGS,
                                            VIRUSES, TROJAN HORSES, OR THE LIKE WHICH MAY BE TRANSMITTED TO OR THROUGH
                                            THE
                                            SITE BY ANY THIRD PARTY, AND/OR (6) ANY ERRORS OR OMISSIONS IN ANY CONTENT
                                            AND
                                            MATERIALS OR FOR ANY LOSS OR DAMAGE OF ANY KIND INCURRED AS A RESULT OF THE
                                            USE
                                            OF ANY CONTENT POSTED, TRANSMITTED, OR OTHERWISE MADE AVAILABLE VIA THE
                                            SITE. WE
                                            DO NOT WARRANT, ENDORSE, GUARANTEE, OR ASSUME RESPONSIBILITY FOR ANY PRODUCT
                                            OR
                                            SERVICE ADVERTISED OR OFFERED BY A THIRD PARTY THROUGH THE SITE, ANY
                                            HYPERLINKED
                                            WEBSITE, OR ANY WEBSITE OR MOBILE APPLICATION FEATURED IN ANY BANNER OR
                                            OTHER
                                            ADVERTISING, AND WE WILL NOT BE A PARTY TO OR IN ANY WAY BE RESPONSIBLE FOR
                                            MONITORING ANY TRANSACTION BETWEEN YOU AND ANY THIRD-PARTY PROVIDERS OF
                                            PRODUCTS
                                            OR SERVICES. AS WITH THE PURCHASE OF A PRODUCT OR SERVICE THROUGH ANY MEDIUM
                                            OR
                                            IN ANY ENVIRONMENT, YOU SHOULD USE YOUR BEST JUDGMENT AND EXERCISE CAUTION
                                            WHERE
                                            APPROPRIATE.
                                            <br>

                                            LIMITATIONS OF LIABILITY
                                            <br>
                                            IN NO EVENT WILL WE OR OUR DIRECTORS, EMPLOYEES, OR AGENTS BE LIABLE TO YOU
                                            OR
                                            ANY THIRD PARTY FOR ANY DIRECT, INDIRECT, CONSEQUENTIAL, EXEMPLARY,
                                            INCIDENTAL,
                                            SPECIAL, OR PUNITIVE DAMAGES, INCLUDING LOST PROFIT, LOST REVENUE, LOSS OF
                                            DATA,
                                            OR OTHER DAMAGES ARISING FROM YOUR USE OF THE SITE, EVEN IF WE HAVE BEEN
                                            ADVISED
                                            OF THE POSSIBILITY OF SUCH DAMAGES. NOTWITHSTANDING ANYTHING TO THE CONTRARY
                                            CONTAINED HEREIN, OUR LIABILITY TO YOU FOR ANY CAUSE WHATSOEVER AND
                                            REGARDLESS
                                            OF THE FORM OF THE ACTION, WILL AT ALL TIMES BE LIMITED TO THE AMOUNT PAID,
                                            IF
                                            ANY, BY YOU TO US DURING THE SIX (6) MONTH PERIOD PRIOR TO ANY CAUSE OF
                                            ACTION
                                            ARISING. CERTAIN US STATE LAWS AND INTERNATIONAL LAWS DO NOT ALLOW
                                            LIMITATIONS
                                            ON IMPLIED WARRANTIES OR THE EXCLUSION OR LIMITATION OF CERTAIN DAMAGES. IF
                                            THESE LAWS APPLY TO YOU, SOME OR ALL OF THE ABOVE DISCLAIMERS OR LIMITATIONS
                                            MAY
                                            NOT APPLY TO YOU, AND YOU MAY HAVE ADDITIONAL RIGHTS.

                                            <br>
                                            INDEMNIFICATION
                                            <br>
                                            You agree to defend, indemnify, and hold us harmless, including our
                                            subsidiaries, affiliates, and all of our respective officers, agents,
                                            partners,
                                            and employees, from and against any loss, damage, liability, claim, or
                                            demand,
                                            including reasonable attorneys’ fees and expenses, made by any third party
                                            due
                                            to or arising out of: (1) your Contributions; (2) use of the Site; (3)
                                            breach of
                                            these Terms of Use; (4) any breach of your representations and warranties
                                            set
                                            forth in these Terms of Use; (5) your violation of the rights of a third
                                            party,
                                            including but not limited to intellectual property rights; or (6) any overt
                                            harmful act toward any other user of the Site with whom you connected via
                                            the
                                            Site. Notwithstanding the foregoing, we reserve the right, at your expense,
                                            to
                                            assume the exclusive defense and control of any matter for which you are
                                            required to indemnify us, and you agree to cooperate, at your expense, with
                                            our
                                            defense of such claims. We will use reasonable efforts to notify you of any
                                            such
                                            claim, action, or proceeding which is subject to this indemnification upon
                                            becoming aware of it.
                                            <br>
                                        </article>
                                        <br>
                                        <article>

                                            USER DATA
                                            <br>
                                            We will maintain certain data that you transmit to the Site for the purpose
                                            of
                                            managing the performance of the Site, as well as data relating to your use
                                            of
                                            the Site. Although we perform regular routine backups of data, you are
                                            solely
                                            responsible for all data that you transmit or that relates to any activity
                                            you
                                            have undertaken using the Site. You agree that we shall have no liability to
                                            you
                                            for any loss or corruption of any such data, and you hereby waive any right
                                            of
                                            action against us arising from any such loss or corruption of such data.

                                            <br>
                                            ELECTRONIC COMMUNICATIONS, TRANSACTIONS, AND SIGNATURES
                                            <br>
                                            Visiting the Site, sending us emails, and completing online forms constitute
                                            electronic communications. You consent to receive electronic communications,
                                            and
                                            you agree that all agreements, notices, disclosures, and other
                                            communications we
                                            provide to you electronically, via email and on the Site, satisfy any legal
                                            requirement that such communication be in writing. YOU HEREBY AGREE TO THE
                                            USE
                                            OF ELECTRONIC SIGNATURES, CONTRACTS, ORDERS, AND OTHER RECORDS, AND TO
                                            ELECTRONIC DELIVERY OF NOTICES, POLICIES, AND RECORDS OF TRANSACTIONS
                                            INITIATED
                                            OR COMPLETED BY US OR VIA THE SITE. You hereby waive any rights or
                                            requirements
                                            under any statutes, regulations, rules, ordinances, or other laws in any
                                            jurisdiction which require an original signature or delivery or retention of
                                            non-electronic records, or to payments or the granting of credits by any
                                            means
                                            other than electronic means.

                                            <br>
                                            MISCELLANEOUS
                                            <br>
                                            These Terms of Use and any policies or operating rules posted by us on the
                                            Site
                                            or in respect to the Site constitute the entire agreement and understanding
                                            between you and us. Our failure to exercise or enforce any right or
                                            provision of
                                            these Terms of Use shall not operate as a waiver of such right or provision.
                                            These Terms of Use operate to the fullest extent permissible by law. We may
                                            assign any or all of our rights and obligations to others at any time. We
                                            shall
                                            not be responsible or liable for any loss, damage, delay, or failure to act
                                            caused by any cause beyond our reasonable control. If any provision or part
                                            of a
                                            provision of these Terms of Use is determined to be unlawful, void, or
                                            unenforceable, that provision or part of the provision is deemed severable
                                            from
                                            these Terms of Use and does not affect the validity and enforceability of
                                            any
                                            remaining provisions. There is no joint venture, partnership, employment or
                                            agency relationship created between you and us as a result of these Terms of
                                            Use
                                            or use of the Site. You agree that these Terms of Use will not be construed
                                            against us by virtue of having drafted them. You hereby waive any and all
                                            defenses you may have based on the electronic form of these Terms of Use and
                                            the
                                            lack of signing by the parties hereto to execute these Terms of Use.

                                            <br>
                                            CONTACT US
                                            <br>
                                            In order to resolve a complaint regarding the Site or to receive further
                                            information regarding use of the Site, please contact us at:
                                            <br>
                                            Team Olverd LLC
                                            <br>
                                            2544 Taft Ave, Malate, Manila, 1004 Metro Manila
                                            Manila, Metro Manila 2544
                                            <br>
                                            Philippines
                                            <br>
                                            Phone: 09193560556
                                            <br>
                                            Fax: +63 323 555 1234
                                            <br>
                                            plantify@support.com
                                            <br>
                                            These terms of use were created using Termly’s Terms and Conditions
                                            Generator.
                                            <br>
                                        </article>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal">I have read
                                            the terms and conditions</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        &nbsp;
                        <div class="text-center">
                            <span>Already have an account? go back to the <a href="{{ route('loginf') }}">Login Page</a>
                            </span>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
