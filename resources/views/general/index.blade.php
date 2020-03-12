@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container text-white mb-5">
    <div class="row d-flex align-items-center flex-wrap-reverse">
        <div class="col-12 div col-md-6">
            <div class="row mb-4">
                <div class="col-12">
                    <h1 class="font-weight-bold">learn, teach, innovate</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <p>Gava is a peer-to-peer platform that helps people all around the world to keep up with the latest technology. We focus on the newest technology such as programming, XR, drones, e-commerce, databases, Internet Of Things, bio-technology, graphic design and the 3D workflow.</p>
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
    <div class="container text-white" id="what-to-learn">
        <div class="row">
            <div class="col-12 col-md-4 p-4">
                <div class="row">
                    <div class="col-12">
                        <h2>who are we</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p>Hello! We are Gava. A group of enthusiastic Interactive Multimedia & Design students at the Thomas More academy in Mechelen. Allow us to introduce ourselves.</p>
                        <p>Siebe is our FullStack Developer. He makes sure that the peer-to-peer platform works and the technology is accessible to everyone. In addition, Sarah and Yannis are working on the visual appearance of Gava. They carefully designed the user interface and everything else related to learn a technology using the peer-to-peer platform.</p>
                        <p>For the business part and paperwork we work together or divide the work among each other. If you have any questions or would like to contact us, feel free to send us an email at hello@gava.be</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 p-4">
                <div class="row">
                    <div class="col-12">
                        <h2>what is our platform</h2>
                    </div>            
                </div>
                <div class="row">
                    <div class="col-12">
                        <p>Gava wants to connect people and give them the possibility to learn or teach a technology using the peer-to-peer learning method. Our goal is to ensure that users can teach and learn in the best way possible. Gava’s peer-to-peer target audience are both men and women, between 18 and 67 years.</p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4 p-4">
                <div class="row">
                    <div class="col-12">
                        <h2>our community</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p>Gava’s focus is to learn or teach the technology of today using the peer-to-peer learning method. Technology is really important nowadays. The importance has been growing for a while and does not immediately need a coffee break. It is therefore important for people in a sector that uses a certain technology or people with interest in a certain technology to stay informed and learn as much as possible due to the peer-to-peer platform Gava.</p>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container text-white mt-5" id="about">
    <div class="row">
        <div class="col-12 text-center">
            <h2>our community loves talking about ...</h2>
        </div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-6 col-md-4 col-lg-3 p-3">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <img class="icon" src="/images/icon1.svg" alt="Hardware icon">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p>hardware, software, and interactive services</p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3 p-3">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <img class="icon" src="/images/icon2.svg" alt="Remote visual communications icon">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p>remote visual communications</p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3 p-3">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <img class="icon" src="/images/icon3.svg" alt="Social enterprise management icon">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p>social enterprise management</p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3 p-3">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <img class="icon" src="/images/icon4.svg" alt="Cybersecurity and forensics icon">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p>cybersecurity and forensics</p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3 p-3">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <img class="icon" src="/images/icon5.svg" alt="3D printing icon">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p>3D printing</p>
                </div>
                
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3 p-3">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <img class="icon" src="/images/icon6.svg" alt="VR, AR & MR icon">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p>VR, AR & MR</p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3 p-3">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <img class="icon" src="/images/icon7.svg" alt="Cloud services and virtualization icon">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p>cloud services and virtualization</p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3 p-3">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <img class="icon" src="/images/icon8.svg" alt="Big data icon">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p>big data</p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3 p-3">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <img class="icon" src="/images/icon9.svg" alt="AI & machine learning icon">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p>AI & machine learning</p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3 p-3">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <img class="icon" src="/images/icon10.svg" alt="3D web icon">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p>3D web</p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3 p-3">
            <div class="row">
            <div class="col-12 d-flex justify-content-center">
                    <img class="icon" src="/images/icon11.svg" alt="Intelligent sensors and mahines icon">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p>intelligent sensors and machines</p>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-3 p-3">
            <div class="row">
            <div class="col-12 d-flex justify-content-center">
                    <img class="icon" src="/images/icon12.svg" alt="Robotics and automation icon">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <p>robotics and automation</p>
                </div>
            </div>
        </div>
    </div>
</div>

@include('components.footer')
@endsection