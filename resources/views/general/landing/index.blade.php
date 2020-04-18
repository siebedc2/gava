@extends('layouts.app')

@section('content')
@include('components.landing-menu')
<div class="bg-landing">
    <div class="container min-vh-100 d-flex align-items-center text-white pb-5">
        <div class="row d-flex align-items-center flex-wrap-reverse">
            <div class="col-12 div col-md-6">
                <div class="row mb-4">
                    <div class="col-12">
                        <h1 class="font-weight-normal text-white">learn, teach, innovate</h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-10">
                        <p class="text-white">Gava is a peer-to-peer platform that helps people all around the world to keep up with rapidly-evolving technologies.</p>
                        <p class="text-white">Enjoy interactive and personal guidance during the learning process. Get intrinsically motivated thanks to the active learning process. Enjoy a relevant and high-quality niche offer, adapted to your needs.</p>
                        <p class="text-white">Earn money by sharing knowledge and helping others. Help the population function in a changing society. Enjoy interacting with your community through video comments and exclusive videos.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <a class="rounded-pill btn btn-primary" href="">try 1 month for free</a>
                    </div>
                </div>
            </div>

            <div class="col-12 div col-md-6">
                <img class="w-100" src="images/intro.svg" alt="Header image">
            </div>
        </div>
    </div>

    <div class="what-to-learn-wrapper">
        <div class="container min-vh-100 d-flex align-items-center text-white" id="what-to-learn">
            <div class="row">
                <div class="col-12 col-md-4 p-4">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="font-weight-normal text-white">learn</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="text-white">Enjoy interactive and personal guidance during the learning process. Get intrinsically motivated thanks to the active learning process. Enjoy a relevant and high-quality niche offer, adapted to your needs.</p>
                            <p class="text-white">As a premium user, you can enjoy Gava even more. Premium status is more a way of thanking a creator. You pay a person $8 every month by subscribing to them and in return you can enjoy the Premium features on all of their courses.</p>
                            <p class="text-white">For example: acces to exclusive videos, visual attributes for better recognition, your comments pushed to the top of discussions and notifications when new content gets published.</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 p-4">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="font-weight-normal text-white">teach</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="text-white">Earn money by sharing knowledge and helping others. Users can subscribe to you to enjoy premium features.</p>
                            <p class="text-white">Help the population function in a changing society. Enjoy interacting with your community through video comments and exclusive videos.</p>
                            <p class="text-white">You have your own dashboard where you can follow up your statistics such as subscribers, views and revenue.</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 p-4">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="font-weight-normal text-white">innovate</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="text-white">More than 1 billion jobs, almost one-third of all jobs worldwide, are likely to be transformed by technology in the next decade, according to OECD estimates.</p>
                            <p class="text-white">By just 2022, the World Economic Forum estimates 133 million new jobs in major economies will be created to meet the demands of the Fourth Industrial Revolution.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="descriptionBackground position-fixed d-none"></div>

    <div class="about container text-white mt-5" id="about">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="font-weight-normal text-white">our community loves talking about ...</h2>
            </div>
        </div>

        <div class="description bg-white position-fixed d-none flex-wrap justify-content-center bg-landing">
            <img class="w-25" src="" alt="Icon image">
            <p class="mt-2 text-white"></p>
            <span class="rounded-pill btn btn-primary align-self-end">close</span>
        </div>

        <div class="subjects row mt-5 pb-5">
            <div id="sub1" class="subject col-6 col-md-4 col-lg-3 p-3">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <img class="icon" src="/images/icon1.svg" alt="Hardware icon">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <p class="text-white">interactive multimedia</p>
                    </div>
                </div>
            </div>

            <div id="sub2" class="subject col-6 col-md-4 col-lg-3 p-3">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <img class="icon" src="/images/icon2.svg" alt="Remote visual communications icon">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <p class="text-white">remote communications</p>
                    </div>
                </div>
            </div>

            <div id="sub3" class="subject col-6 col-md-4 col-lg-3 p-3">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <img class="icon" src="/images/icon3.svg" alt="Social enterprise management icon">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <p class="text-white">enterprise management</p>
                    </div>
                </div>
            </div>

            <div id="sub4" class="subject col-6 col-md-4 col-lg-3 p-3">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <img class="icon" src="/images/icon4.svg" alt="Cybersecurity and forensics icon">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <p class="text-white">cybersecurity</p>
                    </div>
                </div>
            </div>

            <div id="sub5" class="subject col-6 col-md-4 col-lg-3 p-3">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <img class="icon" src="/images/icon5.svg" alt="3D printing icon">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <p class="text-white">3D printing</p>
                    </div>

                </div>
            </div>

            <div id="sub6" class="subject col-6 col-md-4 col-lg-3 p-3">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <img class="icon" src="/images/icon6.svg" alt="VR, AR & MR icon">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <p class="text-white">VR, AR & MR</p>
                    </div>
                </div>
            </div>

            <div id="sub7" class="subject col-6 col-md-4 col-lg-3 p-3">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <img class="icon" src="/images/icon7.svg" alt="Cloud services and virtualization icon">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <p class="text-white">cloud services</p>
                    </div>
                </div>
            </div>

            <div id="sub8" class="subject col-6 col-md-4 col-lg-3 p-3">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <img class="icon" src="/images/icon8.svg" alt="Big data icon">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <p class="text-white">big data</p>
                    </div>
                </div>
            </div>

            <div id="sub9" class="subject col-6 col-md-4 col-lg-3 p-3">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <img class="icon" src="/images/icon9.svg" alt="AI & machine learning icon">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <p class="text-white">AI & machine learning</p>
                    </div>
                </div>
            </div>

            <div id="sub10" class="subject col-6 col-md-4 col-lg-3 p-3">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <img class="icon" src="/images/icon10.svg" alt="3D web icon">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <p class="text-white">3D web</p>
                    </div>
                </div>
            </div>

            <div id="sub11" class="subject col-6 col-md-4 col-lg-3 p-3">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <img class="icon" src="/images/icon11.svg" alt="Intelligent sensors and mahines icon">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <p class="text-white">intelligent sensors</p>
                    </div>
                </div>
            </div>

            <div id="sub12" class="subject col-6 col-md-4 col-lg-3 p-3">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <img class="icon" src="/images/icon12.svg" alt="Robotics and automation icon">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 text-center">
                        <p class="text-white">automation</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.footer')
</div>
@endsection